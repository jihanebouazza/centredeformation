<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.signup');
    }

    public function forgetform()
    {
        return view('auth.forgotpassword');
    }

    public function resetform(Request $request)
    {
        $resetCode = $request->input('reset');
        $userId = $request->input('id');
        $user = User::find($userId);
        if (!$user) {
            abort(404, 'user not found');
        }
        if ($user->code_reset !== $resetCode) {
            abort(404, 'user not found');
        }
        return view('auth.newpassword', ['id' => $userId]);
    }

    public function store()
    {
        $formFields = request()->validate([
            'last_name' => ['required', 'min:3'],
            'first_name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'telephone' => ['required', 'regex:/^06\d{8}$/'],
            'password' => 'required|confirmed|min:6'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['code'] = bcrypt(rand());
        $user = User::create($formFields);

        Mail::to($user->email)->send(new VerificationMail($user->id, $user->code));

        return redirect('/login')->with('message', 'We have sent a verification email');
    }

    public function auth()
    {
        $formFields = request()->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
        $fieldType = filter_var($formFields['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'telephone';

        $user = User::where(function ($query) use ($formFields) {
            $query->where('email', $formFields['login'])
                ->orWhere('telephone', $formFields['login']);
        })->first();

        if (!$user) {
            return back()->withErrors(['login' => 'Invalid Credentials'])->onlyInput('login');
        }

        if ($user->code !== null) {
            return back()->with('message', 'Your account is not verified. Please verify your email.');
        }
        if (auth()->attempt([$fieldType => $formFields['login'], 'password' => $formFields['password']])) {
            request()->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['login' => 'Invalid Credentials'])->onlyInput('login');
    }

    public function verify(Request $request)
    {
        $verificationCode = $request->input('verification');
        $userId = $request->input('id');

        // Get the user record from the database using the user id
        $user = User::find($userId);

        // Check if the verification code matches the one in the user record
        if ($user->code === $verificationCode) {
            // Update the user record to mark the email as verified
            $user->email_verified_at = now();
            $user->code = null;
            $user->save();

            // Redirect the user to the login page with a success message
            return redirect('/login')->with('message', 'Your email has been verified. Please login to continue.');
        } else {
            // Redirect the user to the login page with an error message
            return redirect('/login')->with('error', 'Invalid verification link.');
        }
    }
}
