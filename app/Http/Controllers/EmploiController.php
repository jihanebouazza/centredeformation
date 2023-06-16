<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\User;
use App\Models\Classe;
use App\Models\Groupe;
use App\Models\Seance;
use App\Models\Matiere;
use App\Models\Formation;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    //
    public function manage() {
        $formateurs = User::where('role', 'formateur')->get();
        $formations = Formation::all();
        $matieres = Matiere::orderBy('formation_id')->get();
        $classes = Classe::all();
        $groupes = Groupe::all();
        $times = Time::all();



        return view('admin.emploidutemps.manage', ['formations' => $formations ,  'formateurs' => $formateurs , 'matieres' => $matieres , 'classes' => $classes , 'groupes' => $groupes , 'times' => $times ]);
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'groupe_id' => 'required',
            'matiere_id' => 'required',
            'classe_id' => 'required',
            'formateur_id' => 'required',
            'time_id' => 'required',
            ]);
            
            Seance::create($formFields);
        return redirect('/emploi')->with('success', 'Seance Ajoutèe avec succès !');
    }
    public function getOptions(Request $request, $type)
{
    // Retrieve the options based on the selected type
    if ($type === 'classe') {
        $options = Classe::all();
    } elseif ($type === 'groupe') {
        $options = Groupe::all();
    } elseif ($type === 'formateur') {
        $options = User::where('role', 'formateur')->get();
    } else {
        // Invalid type, return an empty response or an error message
        return response()->json(['error' => 'Invalid type'], 400);
    }

    // Fetch the seances based on the selected option
    $seances = [];
    if ($request->has('optionId')) {
        $optionId = $request->input('optionId');
        if ($type === 'classe') {
            $seances = Seance::where('classe_id', $optionId)->get();
        } elseif ($type === 'groupe') {
            $seances = Seance::where('groupe_id', $optionId)->get();
        } elseif ($type === 'formateur') {
            $seances = Seance::where('formateur_id', $optionId)->get();
        }
    }

    // Return the options and seances as a JSON response
    return response()->json(['options' => $options, 'seances' => $seances]);
}
public function destroy(Seance $seance)
    {
        
        $seance->delete();
        return redirect('/emploi')->with('success', 'Seance supprimé avec succès !');
    }
public function edit(Seance $seance)
    {
        $classes = Classe::all();
        $groupes = Groupe::all();
        $formateurs = User::where('role', 'formateur')->get();

        return view('admin.emploidutemps.edit', ['seance' => $seance ,  'formateurs' => $formateurs , 'classes' => $classes , 'groupes' => $groupes]);
    }
    public function update(Request $request , Seance $seance)
    {
        $formFields = $request->validate([
            'groupe_id' => 'required',
            'matiere_id' => 'required',
            'classe_id' => 'required',
            'formateur_id' => 'required',
            'time_id' => 'required',
            ]);
            
            $seance->update($formFields);
        return redirect('/emploi')->with('success', 'Seance Modifièe avec succès !');
    }
    
}
