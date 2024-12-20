<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\OTPVerificationController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\SubTopicSubStrandController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\ChatsGPTController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\EduacationSystemsController;
use App\Http\Controllers\EducationSystemLevelSubjectController;
use App\Http\Controllers\NonStudentController;
use App\Http\Controllers\TopicsAndStrandsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/otp/enter', [OTPVerificationController::class, 'enterOTP'])->name('otp.enter');
Route::post('/otp/validate', [OTPVerificationController::class, 'validateOTP'])->name('otp.validate');
Route::post('/nonstudent', [RegisterController::class, 'nonstudent'])->name('nonstudent');
//new register
Route::post('/signup', [RegisterController::class, 'register'])->name('signup');
Route::get('/otp', [RegisterController::class, 'showOtpForm'])->name('otp');
Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])->name('verify-otp');
Route::get('/set-pin', [RegisterController::class, 'showSetPinForm'])->name('set-pin');
Route::post('/submit/set-pin', [RegisterController::class, 'setPin'])->name('submit-pin');

//Route::get('loginUser', [LoginController::class, 'showLoginForm'])->name('logincUser');
Route::post('logout', [LoginController::class, 'logoutt'])->name('logout');

Route::get('payment_form', [LoginController::class, 'showPlanForm'])->name('payment_form');
Route::post('subscribe_payment', [LoginController::class, 'subscribeUser'])->name('subscribe_payment');
// web.php
Route::get('/payment', [LoginController::class, 'showPaymentPage'])->name('payment_page');
Route::post('/user_login', [LoginController::class, 'userLogin'])->name('user_login');

Route::get('payment_plan', [LoginController::class, 'showPaymentForm'])->name('payment.user');
Route::post('submit_plan', [LoginController::class, 'userSubscribe'])->name('submit_plan');

Route::get('proceed', [LoginController::class, 'proceed'])->name('proceed');
Route::post('mpesa_confirm', [LoginController::class, 'mpesaConfirm'])->name('mpesa_confirm');




Route::prefix('/admin')->middleware(['isAdmin'])->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/teachers', [AdminController::class, 'get_teachers'])->name('get_teachers');
    Route::post('/teachers', [AdminController::class, 'store_teachers'])->name('store_teachers');
    Route::get('/getTeachers', [AdminController::class, 'display_Teachers'])->name('teachers.list');
    Route::get('/teacher-profile', [AdminController::class, 'teacher_profile'])->name('teacher_profile');

    Route::get('/customers', [AdminController::class, 'get_customers'])->name('get_customers');
    Route::get('/view_students', [AdminController::class, 'get_students'])->name('view_students');
    Route::put('/edit_account_status/{id}', [AdminController::class, 'update_student_account'])->name('update_student_account_status');
    Route::delete('/delete-students/{id}', [AdminController::class, 'destroy_student_account'])->name('destroy_student_account');

    Route::get('/transactions', [AdminController::class, 'get_transactions'])->name('get_transactions');
    Route::get('/brain_game_transactions', [AdminController::class, 'get_brain_game_transactions'])->name('get_brain_game_transactions');


    Route::get('/education_system', [EduacationSystemsController::class, 'get_education_system'])->name('get_education_system');
    Route::post('/education_system', [EduacationSystemsController::class, 'store_education_system'])->name('store_education_system');

    Route::get('/education_level', [EduacationSystemsController::class, 'get_education_level'])->name('get_education_level');
    Route::post('/education_level', [EduacationSystemsController::class, 'store_education_level'])->name('store_education_level');

    Route::get('/sms', [AdminController::class, 'get_sms'])->name('get_sms');
    Route::delete('/delete_teacher/{id}', [AdminController::class, 'teacherDestroy'])->name('delete_teacher');

    // Subscriptions Plan Routes
    Route::resource('subscriptions', SubscriptionPlanController::class);

    Route::get('/view-parent/{id}', [AdminController::class,'parent_details'])->name('view_parent_details');
    Route::delete('/education-levels/{id}', [EduacationSystemsController::class, 'destroy'])->name('education_levels.destroy');
});

Route::prefix('parent')->middleware(['isParent'])->group(function(){
    Route::get('/', [GuardianController::class, 'index'])->name('parent.dashboard');
    Route::get('/create_students', [GuardianController::class, 'createStudent'])->name('get_students');
    Route::post('/students', [GuardianController::class, 'store'])->name('store_student');
    ///
    Route::post('/education-levels', [EduacationSystemsController::class, 'getEducationLevels'])->name('get_education_levels');
    Route::post('/stk-push', [GuardianController::class, 'activateStudent'])->name('stk_push');
    ///
    ///
    Route::post('/edit-students/{id}', [GuardianController::class, 'update'])->name('update_student');
    Route::delete('/delete-students/{id}', [GuardianController::class, 'destroy'])->name('delete_student');

    Route::get('/view-students/{id}', [GuardianController::class,'student_details'])->name('view_student_details');
    Route::get('/profile', [GuardianController::class, 'parent_profile'])->name('parent_profile');
    Route::post('/brain_game_non', [GuardianController::class, 'submitNonBrainGame'])->name('parentbrain_game.submit');
    Route::post('/evaluate-answer', [ChatsGPTController::class, 'evaluateAnswer']);
    Route::get('/brain_game_play', [GuardianController::class, 'noBrainGame'])->name('parentstudent_brain_game');
    Route::get('/accounts', [GuardianController::class, 'accounts'])->name('accounts');

});

Route::prefix('teacher')->middleware([ 'isTeacher'])->group(function(){
    Route::get('/', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('/subjects', [SubjectController::class, 'index'])->name('get_subjects');
    Route::post('/subjects', [SubjectController::class, 'store'])->name('store_subjects');
    Route::post('/edit-subjects/{id}', [SubjectController::class, 'update'])->name('update_subjects');
    Route::delete('/delete-subjects/{id}', [SubjectController::class, 'destroy'])->name('delete_subjects');

    Route::get('/questions', [QuestionController::class, 'index'])->name('get_questions');
    Route::put('/edit-questions/{id}', [QuestionController::class, 'update'])->name('update_questions');
    Route::get('/create_question/{examId}', [QuestionController::class, 'create_question'])->name('create_question');
    Route::delete('/delete-question/{id}', [QuestionController::class, 'destroy'])->name('delete_question');


    Route::get('/get-education-levels', [QuestionController::class, 'getEducationLevels']);
    Route::get('/get-subjects', [QuestionController::class, 'getSubjects']);
    Route::get('/get-topics/{subjectId}', [QuestionController::class, 'getTopics']);
    Route::get('/get-subtopics', [QuestionController::class, 'getSubtopics']);


    Route::get('/create_topics_and_strands/', [TopicsAndStrandsController::class, 'index'])->name('topics_strands.index');
    Route::post('/create_topics_and_strands', [TopicsAndStrandsController::class, 'store'])->name('store_topics_and_strands');

    Route::get('/create_subtopics', [SubTopicSubStrandController::class, 'index'])->name('createSubtopicSubStrand');
    Route::post('/create_subtopics', [SubTopicSubStrandController::class, 'store'])->name('storeSubtopicSubStrand');

    Route::post('/questions', [QuestionController::class, 'store'])->name('store_questions');
    Route::post('/display_education_level', [EduacationSystemsController::class, 'getEducationLevels'])->name('getEducationLevels');

    Route::get('/exams', [ExamController::class, 'index'])->name('get_exams');
    Route::post('/exams', [ExamController::class, 'store'])->name('store_exams');
    Route::post('/edit-exams/{id}', [ExamController::class, 'update'])->name('update_exams');
    Route::delete('/delete-exams/{id}', [ExamController::class, 'destroy'])->name('delete_exams');
    Route::get('/view-questions/{id}', [ExamController::class, 'viewQuestion'])->name('view_exam_questions');

    Route::post('/brain-game', [QuestionController::class, 'addGame'])->name('add_game');
    Route::get('/view/brain-game', [QuestionController::class, 'viewGame'])->name('view_game');
    Route::get('/post/brain-game', [QuestionController::class, 'postGame'])->name('post_game');
    Route::delete('/delete-game/{id}', [QuestionController::class, 'gameDestroy'])->name('delete_game');
    Route::post('/edit-game/{id}', [QuestionController::class, 'updateGame'])->name('update_game');
});

Route::prefix('student')->middleware(['auth', 'isStudent'])->group(function(){
    Route::get('/', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/view_exams', [StudentController::class, 'getExams'])->name('view_exams');
    Route::get('/brain_game', [StudentController::class, 'brainGame'])->name('student_brain_game');
    Route::get('/brain_game_play', [StudentController::class, 'brainGame'])->name('brain_game_play');
    Route::get('/view_questions', [StudentController::class, 'getSubjects'])->name('view_questions');
    Route::get('/questions/{exam}', [StudentController::class, 'showQuestions'])->name('show_questions');
    Route::post('/questions/{exam}', [StudentController::class, 'submitAnswers'])->name('questions.submit');
    Route::get('/view_result/{result}', [StudentController::class, 'viewResult'])->name('students.view_results');
    Route::post('/brain_game', [StudentController::class, 'submitBrainGame'])->name('brain_game.submit');
    Route::post('/evaluate-answer', [ChatsGPTController::class, 'evaluateAnswer']);
    Route::post('/stk-push/brain-game', [StudentController::class, 'activateBrainGame'])->name('stk_push.brain_game');
    Route::get('/account', [StudentController::class, 'account'])->name('account');
});

Route::prefix('nonstudent')->middleware(['auth', 'isNonstudent'])->group(function(){
    Route::get('/', [NonStudentController::class, 'index'])->name('nonstudent.dashboard');
   // Route::get('/view_exams', [NonStudentController::class, 'getExams'])->name('view_exams');
    Route::get('/brain_game_play', [NonStudentController::class, 'noBrainGame'])->name('nonstudent_brain_game');
   // Route::get('/view_questions', [NonStudentController::class, 'getSubjects'])->name('view_questions');
   // Route::get('/questions/{exam}', [NonStudentController::class, 'showQuestions'])->name('show_questions');
   // Route::post('/questions/{exam}', [NonStudentController::class, 'submitAnswers'])->name('questions.submit');
   // Route::get('/view_result/{result}', [NonStudentController::class, 'viewResult'])->name('students.view_results');
    Route::post('/brain_game_non', [NonStudentController::class, 'submitNonBrainGame'])->name('nonbrain_game.submit');
    Route::post('/evaluate-answer', [ChatsGPTController::class, 'evaluateAnswer']);
    //Route::post('/stk-push/brain-game', [NonStudentController::class, 'activateBrainGame'])->name('stk_push.brain_game');
});
