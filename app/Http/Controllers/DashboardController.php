<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $formationCount = Formation::count();
        $groupesCount = Groupe::count();
        $openGroupesCount = Groupe::where('statut', 'open')->count();
        $finishedGroupesCount = Groupe::where('statut', 'finished')->count();
        $startedGroupesCount = Groupe::where('statut', 'started')->count();
        $fullGroupesCount = Groupe::where('statut', 'full')->count();
        $etudiantCount = User::where('role', 'etudiant')->count();

        $groupesByFormation = Groupe::select('formation_id', DB::raw('count(*) as count'))
            ->groupBy('formation_id')
            ->pluck('count', 'formation_id');

            $formationNames = Formation::pluck('titre', 'id');

        return view('admin.dashboard', compact(
            'formationCount',
            'groupesCount',
            'openGroupesCount',
            'finishedGroupesCount',
            'startedGroupesCount',
            'fullGroupesCount',
            'groupesByFormation',
            'etudiantCount',
            'formationNames'
        ));
    }
}
