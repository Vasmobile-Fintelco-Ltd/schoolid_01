<?php

namespace App\Http\Controllers;

use App\Models\EducationSystemLevelSubject;
use App\Models\Exam;
use App\Models\SubTopicSubStrand;
use App\Models\TopicStrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Subject;
use App\Models\Question;
use App\Models\EducationSystem;
use App\Models\EducationLevel;
use App\Models\Game;
use Exception;

use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::with(['subject.educationLevel', 'subject.educationSystem'])
            ->select('id', 'exam_id', 'question', 'answer', 'created_at')
            ->get();
        return view('teachers.questions', compact('questions'));
    }

    public function create_question($examId){
        $subjects = Subject::all();
        $education_systems = EducationSystem::all();
        $exam = Exam::with(['subject.educationLevel', 'subject.educationSystem'])
            ->select('id', 'subject_id', 'name',)
            ->where('id', $examId)
            ->first();

        return view('teachers.create_question',compact('subjects',  'education_systems', 'exam'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
      
         // Basic validation for static fields
         $validatedData = $request->validate([
             'exam_id' => 'required',
             'education_level_id' => 'required|array',
             'education_level_id.*' => 'required',
             'subtopic_id.*' => 'required',
             'topic_id.*' => 'required',
             'questions' => 'required|array',
             'questions.*' => 'required',
             'question_type' => 'required|array',  // Ensure question_type is validated as an array
             'question_type.*' => 'in:multiple_choice,no_option', // Validate that each question_type is either multiple_choice or no_option

         ]);
         
         // Conditional validation based on question_type
         foreach ($request->input('question_type') as $key => $value) {
             if ($value === 'multiple_choice') {
                 $request->validate([
                     "option1.{$key}" => 'required',
                     "option2.{$key}" => 'required',
                     "option3.{$key}" => 'required',
                     "option4.{$key}" => 'required',
                     "answer.{$key}" => 'required',
                 ]);
             }
         }
     
         $createdQuestions = [];
     
         foreach ($validatedData['questions'] as $index => $question) {
             $newQuestionData = [
                 'exam_id' => $validatedData['exam_id'],
                 'sub_topic_sub_strand_id' => $request->subtopic_id,
                 'topic_strand_id' =>  $request->topic_id,
                 'question' => $question,
                 'question_type' => $request->input('question_type')[$index],
                 'year' => $request->input('year')[$index],
                 'curriculum' => $request->input('curriculum')[$index],
                 'levelquestion' => $request->input('levelquestion')[$index],
             ];
             
             // Add options and answer for multiple choice questions
             if ($request->input('question_type')[$index] === 'multiple_choice') {
                 $newQuestionData['option1'] = $request->input('option1')[$index];
                 $newQuestionData['option2'] = $request->input('option2')[$index];
                 $newQuestionData['option3'] = $request->input('option3')[$index];
                 $newQuestionData['option4'] = $request->input('option4')[$index];
             }
            


               // Set the answer based on the selected option
               if ($request->input('question_type')[$index] === 'multiple_choice') {
                
            $answer = $request->input('answer')[$index];
            switch ($answer) {
                case 'option1':
                    $newQuestionData['answer'] = $request->input('option1')[$index];
                    break;
                case 'option2':
                    $newQuestionData['answer'] = $request->input('option2')[$index];
                    break;
                case 'option3':
                    $newQuestionData['answer'] = $request->input('option3')[$index];
                    break;
                case 'option4':
                    $newQuestionData['answer'] = $request->input('option4')[$index];
                    break;
            }
        }

     
             if (isset($validatedData['education_level_id'][$index])) {
                 $newQuestionData['education_level_id'] = $validatedData['education_level_id'][$index];
             }
     
             if ($request->hasFile('image_' . ($index + 1))) { // Use 'image_' . ($index + 1) to get the correct file for each question
                 $image = $request->file('image_' . ($index + 1));
                 $imageName = time() . '_' . ($index + 1) . '.' . $image->getClientOriginalExtension();
                 $image->storeAs('assets/images/exam_images', $imageName);
                 $newQuestionData['image'] = 'assets/images/exam_images/' . $imageName;
             }
             //dd($newQuestionData);
     
             $newQuestion = Question::create($newQuestionData);
             //dd($newQuestion);
             $createdQuestions[] = $newQuestion;
         }
     
         return redirect()->route('get_exams')->with('success', 'Questions created successfully!');
     }
     public function postGame()
    {
        $subjects = Subject::all();
        $education_systems = EducationSystem::all();
        $exam = Exam::with(['subject.educationLevel', 'subject.educationSystem'])
            ->select('id', 'subject_id', 'name',)
            ->first();
        return view('teachers.game_questions', compact('subjects',  'education_systems', 'exam'));
    }
     public function viewGame()
    {
        $questions = Game::get();

        return view('teachers.game', compact('questions'));
    }
     public function addGame(Request $request)
     {
     
         // Basic validation for static fields
         $validatedData = $request->validate([
           
             'questions' => 'required|array',
             'questions.*' => 'required',
             'question_type' => 'required|array',  // Ensure question_type is validated as an array
             'question_type.*' => 'in:multiple_choice,no_option', // Validate that each question_type is either multiple_choice or no_option

         ]);
         
         // Conditional validation based on question_type
         foreach ($request->input('question_type') as $key => $value) {
             if ($value === 'multiple_choice') {
                 $request->validate([
                     "option1.{$key}" => 'required',
                     "option2.{$key}" => 'required',
                     "option3.{$key}" => 'required',
                     "option4.{$key}" => 'required',
                     "answer.{$key}" => 'required',
                 ]);
             }
         }
     
         $createdQuestions = [];
     
         foreach ($validatedData['questions'] as $index => $question) {
             $newQuestionData = [               
                 'question' => $question,
                 'question_type' => $request->input('question_type')[$index],          
                 'levelquestion' => 'brain_game',
                 'exam_id' => '00099',
                 'sub_topic_sub_strand_id' =>  '00099',
                 'topic_strand_id' =>   '00099',
                 'education_level_id'=> '00099'
             ];
             
             // Add options and answer for multiple choice questions
             if ($request->input('question_type')[$index] === 'multiple_choice') {
                 $newQuestionData['option1'] = $request->input('option1')[$index];
                 $newQuestionData['option2'] = $request->input('option2')[$index];
                 $newQuestionData['option3'] = $request->input('option3')[$index];
                 $newQuestionData['option4'] = $request->input('option4')[$index];
             }
            


               // Set the answer based on the selected option
               if ($request->input('question_type')[$index] === 'multiple_choice') {
                
            $answer = $request->input('answer')[$index];
            switch ($answer) {
                case 'option1':
                    $newQuestionData['answer'] = $request->input('option1')[$index];
                    break;
                case 'option2':
                    $newQuestionData['answer'] = $request->input('option2')[$index];
                    break;
                case 'option3':
                    $newQuestionData['answer'] = $request->input('option3')[$index];
                    break;
                case 'option4':
                    $newQuestionData['answer'] = $request->input('option4')[$index];
                    break;
            }
        }

     
             if ($request->hasFile('image_' . ($index + 1))) { // Use 'image_' . ($index + 1) to get the correct file for each question
                 $image = $request->file('image_' . ($index + 1));
                 $imageName = time() . '_' . ($index + 1) . '.' . $image->getClientOriginalExtension();
                 $image->storeAs('assets/images/exam_images', $imageName);
                 $newQuestionData['image'] = 'assets/images/exam_images/' . $imageName;
             }
             //dd($newQuestionData);
     
             $newQuestion = Game::create($newQuestionData);
            
             $createdQuestions[] = $newQuestion;
         }
     
         return redirect()->route('view_game')->with('success', 'Brain Game Questions created successfully!');
     }
     

    public function getEducationLevels(Request $request)
    {
        $educationSystemId = $request->input('educationSystemId');
        $educationSystem = EducationSystem::with('educationLevels')->find($educationSystemId);
        $educationLevels = $educationSystem->educationLevels;

        return response()->json(['educationLevels' => $educationLevels]);
    }

    public function getSubjects(Request $request)
    {
        $subjects = Subject::with('educationLevel', 'educationSystem')->get();
        return response()->json(['subjects' => $subjects]);
    }

    public function getTopics($subjectId )
    {
        $subject = Subject::with('topicStrands')->find($subjectId);
        $topicStrands = $subject->topicStrands;
        return response()->json(['topicStrands' => $topicStrands]);
    }

    public function getSubtopics(Request $request)
    {

        $topicId = $request->input('topicId');
        $topicStrands = TopicStrand::with('subTopicSubStrands')->find($topicId);
        $subTopicSubStrands = $topicStrands->subTopicSubStrands;

        return response()->json(['subtopics' => $subTopicSubStrands]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
      
            // Basic validation for static fields
            $validatedData = $request->validate([
                'exam_id' => 'required',
                'education_level_id' => 'required|array',
                'education_level_id.*' => 'required',
                'subtopic_id.*' => 'required',
                'topic_id.*' => 'required',
                'questions' => 'required|array',
                'questions.*' => 'required',
                'question_type' => 'required|array',  // Ensure question_type is validated as an array
                'question_type.*' => 'in:multiple_choice,no_option', // Validate that each question_type is either multiple_choice or no_option
            ]);
    
            // Conditional validation based on question_type
            foreach ($request->input('question_type') as $key => $value) {
                if ($value === 'multiple_choice') {
                    $request->validate([
                        "option1.{$key}" => 'required',
                        "option2.{$key}" => 'required',
                        "option3.{$key}" => 'required',
                        "option4.{$key}" => 'required',
                    ]);
                }
            }
    
            // Find the question by ID
            $question = Question::find($id);
        
    
            if (!$question) {
                return redirect()->back()->with('error', 'Question not found');
            }
    
            foreach ($validatedData['questions'] as $index => $questionText) {
                // Update the question data
                $question->exam_id = $validatedData['exam_id'];
                $question->sub_topic_sub_strand_id = $request->subtopic_id[$index];
                $question->topic_strand_id = $request->topic_id[$index];
                $question->question = $questionText;
                $question->question_type = $request->input('question_type')[$index];
                $question->year = $request->input('year')[$index];
                $question->curriculum = $request->input('curriculum')[$index];
              //  $question->levelquestion = $request->input('levelquestion')[$index];
    
                if ($request->input('question_type')[$index] === 'multiple_choice') {
                    $question->option1 = $request->input('option1')[$index];
                    $question->option2 = $request->input('option2')[$index];
                    $question->option3 = $request->input('option3')[$index];
                    $question->option4 = $request->input('option4')[$index];
    
                    // Set the answer based on the selected option
                    $answer = $request->input('answer')[$index];
                    switch ($answer) {
                        case 'option1':
                            $question->answer = $request->input('option1')[$index];
                            break;
                        case 'option2':
                            $question->answer = $request->input('option2')[$index];
                            break;
                        case 'option3':
                            $question->answer = $request->input('option3')[$index];
                            break;
                        case 'option4':
                            $question->answer = $request->input('option4')[$index];
                            break;
                    }
                }
    
                if (isset($validatedData['education_level_id'][$index])) {
                    $question->education_level_id = $validatedData['education_level_id'][$index];
                }
    
                if ($request->hasFile('image_' . ($index + 1))) { // Use 'image_' . ($index + 1) to get the correct file for each question
                    $image = $request->file('image_' . ($index + 1));
                    $imageName = time() . '_' . ($index + 1) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('assets/images/exam_images', $imageName);
                    $question->image = 'assets/images/exam_images/' . $imageName;
                }
                //dd($question);
                // Save the updated question
                $question->save();
            }
    
            return redirect()->route('view_exam_questions', ['id' => $question->exam_id])->with('success', 'Question updated successfully!');
        
    }

    public function updateGame(Request $request, $id)
    {
       
      
            // Basic validation for static fields
            $validatedData = $request->validate([
              
                'questions' => 'required|array',
                'questions.*' => 'required',
                'question_type' => 'required|array',  // Ensure question_type is validated as an array
                'question_type.*' => 'in:multiple_choice,no_option', // Validate that each question_type is either multiple_choice or no_option
            ]);
    
            // Conditional validation based on question_type
            foreach ($request->input('question_type') as $key => $value) {
                if ($value === 'multiple_choice') {
                    $request->validate([
                        "option1.{$key}" => 'required',
                        "option2.{$key}" => 'required',
                        "option3.{$key}" => 'required',
                        "option4.{$key}" => 'required',
                    ]);
                }
            }
    
            // Find the question by ID
            $question = Game::find($id);
        
    
            if (!$question) {
                return redirect()->back()->with('error', 'Question not found');
            }
    
            foreach ($validatedData['questions'] as $index => $questionText) {
                // Update the question data
              
                $question->question = $questionText;
                $question->question_type = $request->input('question_type')[$index];
               
              //  $question->levelquestion = $request->input('levelquestion')[$index];
    
                if ($request->input('question_type')[$index] === 'multiple_choice') {
                    $question->option1 = $request->input('option1')[$index];
                    $question->option2 = $request->input('option2')[$index];
                    $question->option3 = $request->input('option3')[$index];
                    $question->option4 = $request->input('option4')[$index];
    
                    // Set the answer based on the selected option
                    $answer = $request->input('answer')[$index];
                    switch ($answer) {
                        case 'option1':
                            $question->answer = $request->input('option1')[$index];
                            break;
                        case 'option2':
                            $question->answer = $request->input('option2')[$index];
                            break;
                        case 'option3':
                            $question->answer = $request->input('option3')[$index];
                            break;
                        case 'option4':
                            $question->answer = $request->input('option4')[$index];
                            break;
                    }
                }
    
              
    
                if ($request->hasFile('image_' . ($index + 1))) { // Use 'image_' . ($index + 1) to get the correct file for each question
                    $image = $request->file('image_' . ($index + 1));
                    $imageName = time() . '_' . ($index + 1) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('assets/images/exam_images', $imageName);
                    $question->image = 'assets/images/exam_images/' . $imageName;
                }
                //dd($question);
                // Save the updated question
                $question->save();
            }
    
            return redirect()->route('view_game')->with('success', 'Question updated successfully!');
        
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::find($id);

        if (!$question) {
            return redirect()->back()->with('error', 'Question not Found.');
        }

        $examId = $question->exam_id;

        $question->delete();

        return redirect()->route('view_exam_questions', ['id' => $examId])->with('success', 'Exam deleted successfully!');
    }

    public function gameDestroy(string $id)
    {
        $question = Game::find($id);

        if (!$question) {
            return redirect()->back()->with('error', 'Question not Found.');
        }

        $examId = $question->exam_id;

        $question->delete();

        return redirect()->route('view_game')->with('success', 'Brain Game deleted successfully!');
    }
}
