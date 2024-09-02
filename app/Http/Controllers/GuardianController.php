<?php

namespace App\Http\Controllers;

use App\Enums\AccountStatus;
use App\Http\Controllers\MpesaTransactionController;
use App\Models\EducationSystem;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Guardian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Datatables;
use App\Jobs\SendStudentAccountEmail;
use App\Jobs\SendStudentAccountSms;
use App\Models\BrainGameResult;
use App\Models\Game;
use Illuminate\Support\Facades\Log;

class GuardianController extends Controller
{

    public function index()
    {
        $guardian = Guardian::where('user_id', auth()->user()->id)->first();
        $students = $guardian->students;
        $brainGameresults = BrainGameResult::where('user_id', $guardian->id)->get();
        return view('parents.dashboard', compact('students','brainGameresults'));
    }

    /**
     * create Students blade file.
     */
    public function createStudent()
    {
        $guardian = Guardian::where('user_id', auth()->user()->id)->first();
        $students = $guardian->students;
        $education_systems = EducationSystem::all();
        $subscription_plans = SubscriptionPlan::all();
        return view('parents.create_student', compact('education_systems', 'students', 'subscription_plans'));
    }

    /**
     * Activate Students Account .
     */
    public function activateStudent(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'subscription_plan_name' => 'required',
            'subscription_plan_price' => 'required',
        ]);

        $student = Student::findOrFail($request->student_id);
        $guardian =  $student->guardian()->first();
        $user = User::findOrFail($student->user_id);

        $response = (new MpesaTransactionController)->customerMpesaSTKPush($guardian->user->phone_number, $request->subscription_plan_price, $user->centy_plus_id, $request->subscription_plan_name);
        $response = json_decode($response, true);

        if ($response["ResponseCode"] == "0") {
            $student->account_status = AccountStatus::PENDING;
            $student->save();
        }

        return response()->json([
            "success" => $response["ResponseCode"],
            "message" => $response["ResponseDescription"] . " Check your phone for a prompt to complete the payment."
        ]);
    }

    /**
     * Store a newly students resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'school_name' => 'required',
            'education_system_id' => 'required',
            'education_level_id' => 'required',
            'phone_number' => 'required',
        ]);

        //Auth user (Guardian)
        $auth_user = auth()->user();
        $guardian = Guardian::where('user_id', $auth_user->id)->first();

        if ($guardian) {

            // Create a new user
            $user = new User();
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->centy_plus_id  = User::generateStudentSequence($guardian->id, $auth_user->phone_number);
            $password = strval(mt_rand(1000, 9999));
            $user->password = Hash::make($password);
            $user->role = 'student';
            $user->save();

            // Create a new student
            $student = new Student();
            $student->date_of_birth = $request->date_of_birth;
            $student->school_name = $request->school_name;
            $student->education_system_id = $request->education_system_id;
            $student->education_level_id = $request->education_level_id;

            $student->guardian_id = $guardian->id;
            $user->student()->save($student);
        }

        // Send email to the parent with the student's username and password
        dispatch(new SendStudentAccountEmail($user, $guardian->user->email, $password));

        // Send sms to the parent with the student's username and password
        dispatch(new SendStudentAccountSms($student, $password));

        return redirect()->route('get_students')
            ->with('success', 'Student account created successfully. The account details have been sent to your email.');
    }

    /**
     * Display the student details  resource.
     */
    public function student_details(string $id)
    {
        $student = Student::find($id);
        return view('parents.view_student_details', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'school_name' => 'required',
            'education_system_id' => 'required',
            'education_level_id' => 'required',
        ]);

        $student = Student::find($id);
        $student->name = $request->name;
        $student->date_of_birth = $request->date_of_birth;
        $student->school_name = $request->school_name;
        $student->education_system_id = $request->education_system_id;
        $student->education_level_id = $request->education_level_id;
        $student->save();

        return redirect()->route('get_students')
            ->with('success', 'Student account updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('get_students')
            ->with('success', 'Student account deleted successfully.');
    }

    /**
     * Display the parent's Personal info .
     */

    public function parent_profile(){
        //Auth user (Guardian)
        $auth_user = auth()->user();
        $guardian = Guardian::where('user_id', $auth_user->id)->first();

        return view('parents.profile', compact( 'guardian'));
    }
    public function noBrainGame(Request $request)
    {
        $user = Auth::user();
        $student = Guardian::where('user_id', $user->id)->first();
        if (!$student) {
            // Handle the case where the student record does not exist
            return redirect()->back()->with('error', 'Student record not found.');
        }

        // Check if a result exists for the given student and exam
        //$result = BrainGame::where('student_id', $student->id)->first();

     



        $subscription_plans =SubscriptionPlan::where('name', 'brain_game')->get();
  


        // Retrieve questions
        // Retrieve questions
        $questions = Game::inRandomOrder() // Randomize the order
        ->take(20) // Limit to 20 questions
        ->get();


        Log::info('random questions'. $questions);
        $formatedQuestions = [];

        foreach ($questions as $key => $question) {
            $question = [
                'numb' => $key + 1,
                'question' => $question['question'],
                'answer' => $question['answer'],
                'question_type' => $question['question_type'],
                'year' => $question['year'],
                'curriculum' => $question['curriculum'],
                'options' => [
                    $question['option1'],
                    $question['option2'],
                    $question['option3'],
                    $question['option4']
                ]
            ];

            $formatedQuestions[] = $question;
        }

        Log::info($formatedQuestions);

        return view('parents.brain_game', compact('formatedQuestions', 'questions', 'user', 'student','subscription_plans'));
    }

    public function submitNonBrainGame(Request $request){

        $user = Auth::user();
        $user_id = User::where('id', $user->id)->first();

        // fetch the users whose email is teacher@admin.com
//        $teacher_user = User::where('email', 'teacher@admin.com')->first();
//        $admin_teacher = Teacher::where('user_id', $teacher_user->id)->first();

        $correctQuestionCount = intval($request->input('yes_ans')) ;
        $incorrectQuestionCount = intval($request->input('no_ans'));

        // Accumulate the total marks
        $totalMarks = $correctQuestionCount + $incorrectQuestionCount;
        $marksObtained = $totalMarks > 0 ? ($correctQuestionCount / $totalMarks) * 100 : 0;

        $brain_result = BrainGameResult::create([
            'name' => $user->name ." 's Brain Game on ". date('m-d-Y'),
            'user_id' => $user_id->id,
            'yes_ans' => $correctQuestionCount, // Count the number of correct answers
            'no_ans' => $incorrectQuestionCount, // Count the number of incorrect answers
            'result_json' => json_encode($request->input('result_json')), // Store the answers in JSON format
            'marks_obtained' => $marksObtained, // Store the marks obtained
        ]);
        $brain_result->save();

        return redirect()->route('parent.brain_game_results', ['result' => $brain_result->id])->with('success', 'Answers submitted successfully.');

    }
}
