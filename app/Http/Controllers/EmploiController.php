<?php

namespace App\Http\Controllers;

use App\Models\Time;
use App\Models\User;
use App\Models\Classe;
use App\Models\Groupe;
use App\Models\Matiere;
use App\Models\Formation;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    //
    public function manage() {
        $formateurs = User::where('role', 'formateur')->get();
        $formations = Formation::all();
        $matieres = Matiere::all();
        $classes = Classe::all();
        $groupes = Groupe::all();
        $times = Time::all();



        return view('admin.emploidutemps.manage', ['formations' => $formations ,  'formateurs' => $formateurs , 'matieres' => $matieres , 'classes' => $classes , 'groupes' => $groupes , 'times' => $times ]);
    }
    
}
