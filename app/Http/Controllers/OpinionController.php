<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function index()
    {
        $opinions = Opinion::all();
        // Retrieve the user information for each opinion
        $users = User::whereIn('id', $opinions->pluck('etudiant_id'))->get();

        // Map the user information to each opinion
        $opinions = $opinions->map(function ($opinion) use ($users) {
            $user = $users->firstWhere('id', $opinion->etudiant_id);
            $opinion->user_name = $user->first_name . ' ' . $user->last_name;
            $opinion->user_image = $user->image;
            return $opinion;
        });

        return view('etudiant.opinions.index', compact('opinions'));
    }

    public function create()
    {
        return view('etudiant.opinions.create');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'commentaire' => 'required',
        ]);

        // Create a new opinion instance
        $opinion = new Opinion();
        $opinion->commentaire = $validatedData['commentaire'];
        $opinion->etudiant_id = auth()->user()->id; // Set the authenticated user's ID

        // Save the opinion
        $opinion->save();

        // Redirect or return a response
        return redirect('/opinions')->with('success', 'Opinion ajouté avec succèss !');
    }
    public function edit(Opinion $opinion)
    {
        // Check if the currently authenticated user owns the opinion
        if ($opinion->etudiant_id !== auth()->user()->id) {
            return redirect('/opinions')->with('error', 'Vous n\'êtes pas autorisé à modifier cette opinion.');
        }

        return view('etudiant.opinions.edit', compact('opinion'));
    }

    public function update(Request $request, Opinion $opinion)
    {
        // Check if the currently authenticated user owns the opinion
        if ($opinion->etudiant_id !== auth()->user()->id) {
            return redirect('/opinions')->with('error', 'Vous n\'êtes pas autorisé à modifier cette opinion.');
        }

        // Validate the request data
        $validatedData = $request->validate([
            'commentaire' => 'required',
        ]);

        // Update the opinion with the validated data
        $opinion->commentaire = $validatedData['commentaire'];
        $opinion->save();

        // Redirect or return a response
        return redirect('/opinions')->with('success', 'Opinion mise à jour avec succès !');
    }


    public function destroy(Opinion $opinion)
    {
        // Check if the currently authenticated user owns the opinion
        if ($opinion->etudiant_id !== auth()->user()->id) {
            return redirect('/opinions')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette opinion.');
        }

        // Delete the opinion
        $opinion->delete();

        // Redirect or return a response
        return redirect('/opinions')->with('success', 'Opinion supprimée avec succès !');
    }
}
