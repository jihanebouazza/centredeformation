<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function manage() {
        $formations = Formation::all();

        return view('admin.formations.manage', compact('formations'));
    }
    public function create() {
        return view('admin.formations.create');
    }
    public function edit(Formation $formation) {
        return view('admin.formations.edit', ['formation' => $formation]);
    }
    public function destroy(Formation $formation) {
        
        
        if($formation->image && Storage::disk('public')->exists($formation->image)) {
            Storage::disk('public')->delete($formation->image);
        }
        $listing->delete();
        return redirect('/formations')->with('message', 'Listing deleted successfully');
    }
    public function store(Request $request) {
        $formFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'duree' => 'required'
        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('formations', 'public');
        }


        Formation::create($formFields);

        return redirect('/formations')->with('message', 'Formation created successfully!');
    }

}
