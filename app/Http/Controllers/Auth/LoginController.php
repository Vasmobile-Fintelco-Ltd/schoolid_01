<?php

namespace App\Http\Controllers\Auth;

use App\Enums\AccountStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Enums\CentyOtpVerified;
use App\Http\Controllers\MpesaTransactionController;
use App\Jobs\SendUserOtp;
use App\Models\StudentSubscriptionPlan;
use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{


   

    public function username()
    {
        $login = request()->input('centy_plus_id'); // Get the input value from the login form

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'centy_plus_id'; // Determine if the input is an email or centy_plus_id

        request()->merge([$fieldType => $login]); // Merge the input value into the request
      

        return $fieldType; // Return the field type (email or centy_plus_id)
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);
    
        return $this->guard()->attempt(
            $credentials,
            $request->filled('remember')
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
       
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
       // dd($errors);
        return redirect()->back()
            ->withInput($request->only('centy_plus_id', 'remember'))
            ->withErrors($errors);
    }

    protected function authenticated(Request $request, $user)
    {

     
        
      
       if ($user->first_login) {
        return view('auth.plans');
      }
//        if ($user->needsOTPVerification()){
//            session(['otp_user_id' => $user->id]);
//            app('redirect')->setIntendedUrl(route($user->role . '.dashboard'));
//
//            Auth::guard('web')->logout();
//
//            return redirect()->route('otp.enter');
//        }
if (isset($user->role)) {
            return redirect()->route($user->role . '.dashboard');
        } else {
            return redirect()->route('login')->with("message", "Your user type is not recognized");
        }
        
    }
    public function showPlanForm()
    {
        return view('auth.plans');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'digits:4', 'confirmed'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->first_login = false;
        $user->save();

        return redirect()->route('login')->with('status', 'Password reset successfully! Please Login with new password.');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    { //dd($request);
        $credentials = $request->only('centy_plus_id', 'password');

        $user =Auth::get();
      
        if (Auth::attempt($credentials)) {
            // Authentication passed
            
            return redirect()->intended('dashboard');
        } else {
            // Authentication failed
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logoutt(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function userLogin (Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Check the user's payment status and role
            if (in_array($user->role, ['student', 'parent', 'nonstudent'])) {
                if ($user->payment_status == 1) {
                    // Redirect to the appropriate dashboard if payment is active
                    return redirect()->route($user->role . '.dashboard');
                } else {
                    // Redirect to payment form if payment is not active
                    return redirect()->route('payment_form')->with('message', 'Your payment is not active. Please complete the payment.');
                }
            } elseif (in_array($user->role, ['teacher', 'admin'])) {
                // Redirect to the appropriate dashboard directly for teacher and admin roles
                return redirect()->route($user->role . '.dashboard');
            } else {
                // Redirect to login if the user role is not recognized
                return redirect()->route('login')->with('message', 'Your user type is not recognized.');
            }
        } else {
            // Authentication failed
            return back()->withErrors([
                'centy_plus_id' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function subscribeUser (Request $request)
    {
       
     
        // Validate the incoming request
        $validated = $request->validate([
            'plan' => 'required|string',
            'cost' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        // Create a subscription record or process the subscription
        // $subscription = StudentSubscriptionPlan::create([
        //     'student_id' => $validated['user_id'],
        //     'subscription_plan_id' => $validated['plan'],
        //     'cost' => $validated['cost'],
        //     'status' => '0', // Mark as pending until payment is confirmed
        // ]);

        // Redirect to the payment page with the plan and cost
        return redirect()->route('payment.user', [
       
            'plan' => $validated['plan'],
            'cost' => $validated['cost'],
            'user_id' => $request->user_id
        ]);
    }

 public function showPaymentForm(Request $request)
    {  
      
        $plan = $request->plan;
        $cost = $request->cost;
        $user_id = $request->user_id;

        return view('auth.payment', compact('plan', 'cost','user_id'));
    }

    public function userSubscribe(Request $request)
    {
  

        $request->validate([
            'phone_number' => 'required'
        ]);

        $phone_number = $request->phone_number;
        $user = $request->user_id;
        $cost = $request->cost;
        $plan = $request->plan;

        $response = (new MpesaTransactionController)->customerMpesaSTKPush($phone_number, $cost, $user, $plan);
        $response = json_decode($response, true);
   

        if ($response["ResponseCode"] == "0") {
            
        $use = User::find($user);
        $use->payment_status = 1;
        $use->save();
       
        }

        if ($response["ResponseCode"] === "0") {
            // If payment request was successful, redirect back to the payment form with a message
            return redirect()->route('proceed', [
                'plan' => $request->plan,
                'cost' => $request->cost,
                'user_id' => $request->user_id,
            ])->with('message', $response["ResponseDescription"] . " Check your phone for a prompt to complete the payment. Enter the M-Pesa PIN and complete payment");
        } else {
            // Handle error case if needed
            return redirect()->back()->withErrors([
                'payment' => 'An error occurred while processing your payment.',
            ]);
        }
    }

    public function proceed(Request $request)
    {  
      
        $plan = $request->plan;
        $cost = $request->cost;
        $user_id = $request->user_id;

        return view('auth.prroceed', compact('plan', 'cost','user_id'));
    }


    public function mpesaConfirm(Request $request)
    {
        $user=  $request->user_id;

        $use = User::find($user);

        $use->mpesa = $request->mpesa;
        $use->save();
       
        return view('auth.login')->with('message', " Login now the payment was successful");
       
        
    }





}
