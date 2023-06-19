<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seance;
use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class EtudiantController extends Controller
{
    //
    public function manage() {
        $etudiants = User::where('role', 'etudiant')->get();

        return view('admin.etudiants.manage', compact('etudiants'));
    }
    public function getGroups($formationId) {
        $formation = Formation::findOrFail($formationId);
        $groupes = $formation->OpenGroups();

        return response()->json([
            'groupes' => $groupes
        ]);
    }
    public function create() {
        return view('admin.etudiants.create');
    }
    public function edit(User $etudiant) {
        return view('admin.etudiants.edit', ['etudiant' => $etudiant]);
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'telephone' => ['required', 'regex:/^06\d{8}$/'], 
            'password' => 'required|min:6'
            ]);
            $formFields['password'] = bcrypt($formFields['password']);


        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('etudiants', 'public');
        }


        User::create($formFields);

        return redirect('/etudiants')->with('success', 'Etudiant crée avec succès !');
    }
    public function update(Request $request, User $etudiant)
    {
        $formFields = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => ['required', 'email'],
            'telephone' => ['required', 'regex:/^06\d{8}$/'], 
            ]);

        if ($request->has('password')) {
            $formFields['password'] = bcrypt($request->input('password'));
        } 
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('etudiants', 'public');
        }

        $etudiant->update($formFields);

        return redirect('/etudiants')->with('success', 'Etudiant mise à jour avec succès !');
    }
    public function destroy(User $etudiant)
    {
        if ($etudiant->image && Storage::disk('public')->exists($etudiant->image)) {
            Storage::disk('public')->delete($etudiant->image);
        }
        $etudiant->delete();
        return redirect('/etudiants')->with('success', 'Etudiant supprimé avec succès !');
    }
    public function inscrireForm(User $etudiant) {
        $formations = Formation::all();
        return view('admin.etudiants.inscrire', ['etudiant' => $etudiant , 'formations' => $formations ]);
    }
    public function inscrire(Request $request , User $etudiant)
    {
        $formFields = $request->validate([
            'groupe_id' => 'required'
            ]);
            $formFields['etudiant_id'] = $etudiant->id  ;
            
            Inscription::create($formFields);
        return redirect('/etudiants')->with('success', 'Etudiant Inscrit avec succès !');
    }

    public function emploi(){
        if(auth()->user()->hasGroup()){
            $groupeId = DB::table('inscriptions')
            ->join('groupes', 'inscriptions.groupe_id', '=', 'groupes.id')
            ->where('inscriptions.etudiant_id', auth()->user()->id)
            ->where(function ($query) {
                $query->where('groupes.statut', 'open')
                    ->orWhere('groupes.statut', 'full')
                    ->orWhere('groupes.statut', 'started');
            })
            ->value('inscriptions.groupe_id');

            $seances = Seance::where('groupe_id', $groupeId )->get();

            return view('etudiant.emploi', ['seances' => $seances ]);
        }else{
           $seances = null ;
           return view('etudiant.emploi', ['seances' => $seances ]);
           
        }  
    }

}
