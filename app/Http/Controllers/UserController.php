<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // validating the user email if existed or not
    public function verifyEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if ($user) {
            $request->session()->put('email', $email);
            return redirect()->route('membership.confirm-password');
        } else {
            $request->session()->put('email', $email);
            return redirect()->route('signup.set-password', ['email' => $email]);
        }
    }

    // if the email not existed create a password
    public function createPassword(Request $request)
    {
        $email = session('email');

        $request->validate(
            [
                'password' => ['required', 'min:8', "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]+$/"],
            ],
            [
                'password.regex' => 'requires at least one lowercase, one uppercase, one digit, and one special character',
            ],
        );

        if (empty($email)) {
            return redirect()
                ->route('signup.set-password')
                ->with('error', 'Please input your email first.');
        }

        $newUser = User::create([
            'email' => $email,
            'password' => bcrypt($request->input('password')),
        ]);

        Auth::guard('web')->login($newUser);

        return redirect()->route('membership.membership-plan');
    }

    // select a membership plan
    public function selectPlan(Request $request)
    {
        $plan = $request->input('plan');
        $price = $request->input('price');

        $request->session()->put('selected_plan', $plan);
        $request->session()->put('selected_price', $price);

        return redirect()->route('membership.payment-method');
    }

    // validation for credit option
    public function creditValidation(Request $request)
    {
        $request->validate(
            [
                'cardnumber' => ['required', "regex:/^[0-9]{16}$/"],
                'expiredate' => ['required', 'date_format:m/y'],
                'cvv' => ['required', 'digits:3'],
                'fn' => ['required', 'alpha'],
                'ln' => ['required', 'alpha'],
                'agree' => ['required'],
            ],
            [
                'cardnumber.required' => 'Card number is required.',
                'cardnumber.regex' => 'Invalid card number format.',
                'expiredate.required' => 'Expiration date is required.',
                'expiredate.date_format' => 'Invalid expiration date format. Use MM/YY format.',
                'cvv.required' => 'CVV is required.',
                'cvv.digits' => 'CVV must be a 3-digit number.',
                'fn.required' => 'First name is required.',
                'fn.alpha' => 'First name must contain only alphabetic characters.',
                'ln.required' => 'Last name is required.',
                'ln.alpha' => 'Last name must contain only alphabetic characters.',
                'agree.required' => 'Please check the checkbox for the agreement.',
            ],
        );

        $email = session('email');
        $user = User::where('email', $email)->first();

        $userId = $user->id;
        $request->session()->put('userId', $userId);

        $subscriptionExpiration = date('Y-m-d H:i:s', strtotime('+1 month'));

        UserSubscription::create([
            'user_id' => $request->session()->get('userId'),
            'level' => $request->session()->get('selected_plan'),
            'price' => $request->session()->get('selected_price'),
            'subscription_status' => 'active',
            'subscription_expiration' => $subscriptionExpiration,
        ]);

        Auth::guard('web')->logout();
        session()->flush();

        return redirect()->route('signin.index');
    }

    // validation for e-wallet option
    public function walletValidation(Request $request)
    {
        $request->validate(
            [
                'mobile' => ['required', "regex:/^(09|\+639)\d{9}$/"],
                'agree' => ['required'],
            ],
            [
                'mobile.required' => 'Mobile number is required.',
                'mobile.regex' => 'Invalid GCash Philippines mobile number format.',
                'agree.required' => 'Please check the checkbox for the agreement.',
            ],
        );

        $email = session('email');
        $user = User::where('email', $email)->first();

        $userId = $user->id;
        $request->session()->put('userId', $userId);

        $subscriptionExpiration = date('Y-m-d H:i:s', strtotime('+1 month'));

        UserSubscription::create([
            'user_id' => $request->session()->get('userId'),
            'level' => $request->session()->get('selected_plan'),
            'price' => $request->session()->get('selected_price'),
            'subscription_status' => 'active',
            'subscription_expiration' => $subscriptionExpiration,
        ]);

        Auth::guard('web')->logout();
        session()->flush();

        return redirect()->route('signin.index');
    }

    // validation for user password
    public function pendingAccount(Request $request)
    {
        $formData = $request->validate([
            'password' => 'required',
        ]);

        $email = session('email');

        $user = User::where('email', $email)->first();

        if ($user) {
            if (auth()->attempt(['email' => $email, 'password' => $formData['password']])) {
                Auth::guard('web')->login($user);

                return redirect()->route('membership.membership-plan');
            } else {
                return redirect()
                    ->route('membership.confirm-password')
                    ->withErrors(['password' => 'Invalid credentials. Please try again.']);
            }
        } else {
            return redirect()
                ->route('membership.confirm-password')
                ->withErrors(['password' => 'Invalid credentials. Please try again.']);
        }
    }

    // logout user
    public function logout()
    {
        Auth::guard('web')->logout();
        session()->flush();
        return redirect()->route('login');
    }

    // validating credentials for login page
    public function accountValidation(Request $request)
    {
        $formData = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (
            auth()
            ->guard('admin')
            ->attempt($formData)
        ) {
            $admin = auth()
                ->guard('admin')
                ->user();
            if ($admin->subscription && $admin->subscription->subscription_status === 'active') {
                return redirect()->route('netflix.homepage');
            } else {
                return redirect()
                    ->route('signin.index')
                    ->withErrors(['password' => 'Sorry your not a member of netflix. please be a member first!'])
                    ->withInput();
            }
        } else {
            return redirect()
                ->route('signin.index')
                ->withErrors(['password' => 'Invalid credentials'])
                ->withInput();
        }
    }
}
