<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeanceController extends Controller
{
    //
    public function inscrire(Request $request , User $etudiant)
    {
        $formFields = $request->validate([
            'groupe_id' => 'required'
            ]);
            $formFields['etudiant_id'] = $etudiant->id  ;
            
            Inscription::create($formFields);
        return redirect('/etudiants')->with('success', 'Etudiant Inscrit avec succès !');
    }
}
