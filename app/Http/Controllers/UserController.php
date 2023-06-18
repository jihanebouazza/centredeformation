<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use App\Mail\ResetMail;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login')->with('success', 'Vous avez été déconnecté !');
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

        return redirect('/login')->with('message', 'Nous avons envoyé un e-mail de vérification.');
    }

    public function auth()
    {
        $formFields = request()->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $user = User::where(function ($query) use ($formFields) {
            $query->where('email', $formFields['login']);
        })->first();

        
        if (!$user) {
            return back()->withErrors(['login' => 'Invalid credentials'])->onlyInput('login');
        }

        if ($user->code !== null) {
            return back()->with('message', 'Votre compte n\'est pas vérifié. Veuillez vérifier votre adresse e-mail.');
        }

        if (Auth::attempt(['email' => $formFields['login'], 'password' => $formFields['password']])) {
            request()->session()->regenerate();
            if (auth()->user()->role == 'admin') {
                return redirect('/dashboard')->with('success', 'Vous êtes maintenant connecté !');
            }
            return redirect('/')->with('success', 'Vous êtes maintenant connecté !');
        }

        return back()->withErrors(['login' => 'Invalid credentials'])->onlyInput('login');
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
            return redirect('/login')->with('message', 'Votre adresse e-mail a été vérifiée. Veuillez vous connecter pour continuer.');
        } else {
            // Redirect the user to the login page with an error message
            return redirect('/login')->with('error', 'Lien de vérification invalide.');
        }
    }
    public function forget()
    {
        $formFields = request()->validate([
            'email' => ['required', 'email']
        ]);
        $user = User::where('email', $formFields['email'])->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Nous n\'avons pas pu trouver de compte associé à cette adresse e-mail.']);
        }
        $formFields['code_reset'] = bcrypt(rand());
        $user->code_reset = $formFields['code_reset'];
        $user->save();
        Mail::to($user->email)->send(new ResetMail($user->id, $user->code_reset));

        return redirect('/login')->with('message', 'Nous avons envoyé un e-mail de réinitialisation.');
    }
    public function reset()
    {
        $formFields = request()->validate([
            'password' => 'required|confirmed|min:6'
        ]);
        $formFields['id'] = request()->id;
        $user = User::find($formFields['id']);
        if (!$user) {
            abort(404, 'user not found');
        }
        $formFields['password'] = bcrypt($formFields['password']);
        $user->code_reset = null;
        $user->password = $formFields['password'];
        $user->save();
        return redirect('/login')->with('message', 'Votre mot de passe a été changé.');
    }


    public function edit()
{
    $user = auth()->user();
    return view('etudiant.profile', compact('user'));
}


    public function update(Request $request)
    {
        $formFields = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'telephone' => ['required', 'regex:/^06\d{8}$/'],
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('etudiants', 'public');
        }
        $user = auth()->user();
        $user->update($formFields);

        return redirect('/profileE')->with('success', 'Profile mise à jour avec succès !');
    }
    public function passwordformE()
    {
        $user = auth()->user();
        return view('etudiant.password', ['user' => $user]);
    }

    public function passwordformF()
    {
        $user = auth()->user();
        return view('formateur.password', ['user' => $user]);
    }

    public function changePassword()
    {

        $user = Auth::user();

        $formFields = request()->validate([
            'old_password' => ['required', new MatchOldPassword],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user->password = bcrypt($formFields['password']);
        $user->save();

        return redirect()->back()->with('message', 'Password changed successfully.');
    }
}
