<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Guardian;
use App\Models\Nonstudent;
use App\Models\Student;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'digits:10', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'digits:4', 'confirmed'],

        ]);
    }

    protected function create(array $data)
    {


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'role' => 'parent',
        ]);

        $guardian = new Guardian();
        $guardian->user_id = $user->id;
        $guardian->credit = '0.00';
        $guardian->save();
        echo $user->centy_plus_id;
        return $user;
    }

    protected function registered(Request $request, $user)
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    protected function nonstudent(Request $request)
    {
      


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => 'nonstudent',
        ]);
        $nonstudent = new Nonstudent();
        $nonstudent->user_id = $user->id;
        $nonstudent->save();
        
        echo $user->centy_plus_id;
        return $user;
    }

    public function register(Request $request) {
      
        // Validate the form data
    
        // Create the user and save OTP in session or DB
        $otp = rand(1000, 9999);
        $name =  $request->name;
        Session::put('otp', $otp);
        Session::put('name', $name);
        Session::put('last', $request->last);
        Session::put('phone_number', $request->phone_number);
        Session::put('grade', $request->grade);
        Session::put('level', $request->level);
        Session::put('role', $request->role);
        Session::put('email', $request->email);
        Session::put('school', $request->school);
   
        
        // Send OTP to the user's email
        Mail::to($request->email)->send(new OtpMail ($otp, $name));
    
        return redirect()->route('otp');
    }
    private function maskEmail($email)
    {
        $emailParts = explode('@', $email);
        $name = $emailParts[0];
        $domain = $emailParts[1];

        // Mask the name part, keeping the first and last character
        $maskedName = substr($name, 0, 1) . str_repeat('*', strlen($name) - 2) . substr($name, -1);

        return $maskedName . '@' . $domain;
    }
    public function showOtpForm() {
        $email =  Session::get('email');
        $maskedEmail = $this->maskEmail($email);
        return view('auth.otp' , compact('maskedEmail'));
    }
    public function verifyOtp(Request $request) {
        $request->validate(['otp' => 'required|integer']);

        if ($request->otp == Session::get('otp')) {
            return redirect()->route('set-pin');
        } else {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }
    }

    public function showSetPinForm() {
        return view('auth.set_pin');
    }

    public function setPin(Request $request) {    
   
        //dd(session()->all());
        // Assuming user data is stored in the session after OTP verification
        $hashedPassword = bcrypt($request->pin);   
      
        $user = User::create([
            'name' => Session::get('name'),
            'last' => Session::get('last'),
            'email' => Session::get('email'),
            'phone_number' => Session::get('phone_number'),
            // 'school_name' => Session::get('role') === 'Student' ? Session::get('school_name') : null,
            // 'grade' => Session::get('role') === 'tudent' ? Session::get('grade') : null,
            'role' => Session::get('role'),
            'password' => $hashedPassword,
        ]);


        if(Session::get('role') == 'parent'){
            $guardian = new Guardian();
            $guardian->user_id = $user->id;
            $guardian->credit = '0.00';
            $guardian->save();
        }

        if(Session::get('role') == 'student'){
            $student = new Student();
            $student->user_id = $user->id;
            $student->school_name = Session::get('school');
            $student->active_subscription = 0;
            $student->education_system_id = Session::get('level');
            $student->education_level_id = Session::get('grade');
            $student->brain_game_status = 0;
            $student->guardian_id = '9cc7a110-3a64-4300-a4bf-9ebaa2365fb4';
            $student->Date_of_birth = 0;
            $student->save();
        }

        if(Session::get('role') == 'nonstudent'){
            $nonstudent = new Nonstudent();
            $nonstudent->user_id = $user->id;
            $nonstudent->brain_game_status = 0;
            $nonstudent->active_subscription = 0;
            $nonstudent->phone_number = Session::get('phone_number');
            $nonstudent->save();
        }
            
       
    
        // Clear session
        Session::forget(['otp', 'name', 'last', 'email', 'phone_number', 'school_name', 'grade', 'role']);
    
        return redirect()->route('login')->with('status', 'Account created successfully! Please sign in.');
    }
}
