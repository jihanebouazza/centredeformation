<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    //
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'nom' => 'required',
            'formation_id' => 'required',
        ]);


        Matiere::create($formFields);

        return redirect('/emploi')->with('success', 'Matiere crée avec succès !');
    }
    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
        return redirect('/emploi')->with('success', 'Matiere supprimé avec succès !');
    }
}
