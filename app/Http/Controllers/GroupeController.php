<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Groupe;
use App\Models\Formation;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    //
    public function manage() {
        $groupes = Groupe::all();

        return view('admin.groupes.manage', compact('groupes'));
    }
    public function create() {
        $formations = Formation::all();
        return view('admin.groupes.create' , compact('formations'));
    }
    public function edit(Groupe $groupe) {
        $formations = Formation::all();
        return view('admin.groupes.edit', ['groupe' => $groupe , 'formations' => $formations ]);
    }
    public function destroy(Groupe $groupe) {
        $groupe->delete();
        return redirect('/groupes')->with('message', 'group deleted successfully');
    }
    public function store(Request $request) {
        $formFields = $request->validate([
            'nom' => 'required',
            'capacite' => 'required',
            'date_debut' => 'required',
            'formation_id' => 'required'
        ]);

        $formation = Formation::find($formFields['formation_id']);
        $numberOfmonths = $formation->duree;
        $date_debut = Carbon::parse($formFields['date_debut']);
        $date_fin = $date_debut->addMonths($numberOfmonths);
        
            $formFields['date_fin'] = $date_fin ;


        Groupe::create($formFields);

        return redirect('/groupes')->with('message', 'Group created successfully!');
    }
    public function update(Request $request, Groupe $groupe) {
        // Make sure logged in user is owner
        
        $formFields = $request->validate([
            'nom' => 'required',
            'capacite' => 'required',
            'date_debut' => 'required',
            'formation_id' => 'required'
        ]);

        
        $formation = Formation::find($formFields['formation_id']);
        $numberOfmonths = $formation->duree;
        $date_debut = Carbon::parse($formFields['date_debut']);
        $date_fin = $date_debut->addMonths($numberOfmonths);
        
            $formFields['date_fin'] = $date_fin ;

        $groupe->update($formFields);

        return redirect('/groupes')->with('message', 'Group updated successfully!');
    }
}
