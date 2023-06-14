<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    //
    public function manage() {
        $etudiants = User::where('role', 'etudiant')->get();

        return view('admin.etudiants.manage', compact('etudiants'));
    }
    public function create() {
        return view('admin.etudiants.create');
    }
    public function edit(User $user) {
        return view('admin.etudiants.edit', ['etudiant' => $etudiant]);
    }
}
