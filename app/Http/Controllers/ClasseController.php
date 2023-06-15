<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    //
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nom' => 'required',
        ]);
        Classe::create($formFields);

        return redirect('/emploi')->with('success', 'Classe crée avec succès !');
    }
    public function destroy(Classe $classe)
    {
        $classe->delete();
        return redirect('/emploi')->with('success', 'Classe supprimé avec succès !');
    }
}
