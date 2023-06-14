<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FormateurController extends Controller
{
    //
    public function manage()
    {
        $formateurs = User::where('role', 'formateur')->get();;

        return view('admin.formateurs.manage', compact('formateurs'));
    }
    public function create()
    {
        return view('admin.formateurs.create');
    }
    public function edit(User $formateur)
    {
        return view('admin.formateurs.edit', ['formateur' => $formateur]);
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => ['required', 'email'],
            'telephone' => ['required', 'regex:/^06\d{8}$/'], 
            'specialisation' => 'required',
            'password' => 'required|min:6'
            ]);
            $formFields['password'] = bcrypt($formFields['password']);
            $formFields['role'] = 'formateur';


        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('formateurs', 'public');
        }


        User::create($formFields);

        return redirect('/formateurs')->with('success', 'Formateur crée avec succès !');
    }
    public function destroy(User $formateur)
    {
        if ($formateur->image && Storage::disk('public')->exists($formateur->image)) {
            Storage::disk('public')->delete($formateur->image);
        }
        $formateur->delete();
        return redirect('/formateurs')->with('success', 'Formateur supprimé avec succès !');
    }
    public function update(Request $request, User $formateur)
    {
        $formFields = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => ['required', 'email'],
            'telephone' => ['required', 'regex:/^06\d{8}$/'], 
            'specialisation' => 'required'
                    ]);
            $formFields['role'] = 'formateur';

        if ($request->has('password')) {
            $formFields['password'] = bcrypt($request->input('password'));
        } 
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('formateurs', 'public');
        }

        $formateur->update($formFields);

        return redirect('/formateurs')->with('success', 'Formateur mise à jour avec succès !');
    }

}
