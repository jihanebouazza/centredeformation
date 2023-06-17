<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function store(Request $request, $formation_id)
    {
        $groupe = Groupe::where(['statut' => 'open', 'formation_id' => $formation_id])->first();

        if ($groupe) {
            $inscriptionFields = [
                'etudiant_id' => auth()->user()->id,
                'groupe_id' => $groupe->id,
            ];

            Inscription::create($inscriptionFields);
        }

        return true;
    }


    public function index()
    {
        $user = auth()->user();
        $inscriptions = $user->inscriptions()->with('groupe.formation')->get();

        return view('etudiant.inscription.index', compact('inscriptions'));
    }
}
