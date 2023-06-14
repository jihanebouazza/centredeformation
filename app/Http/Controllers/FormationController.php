<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function manage()
    {
        $formations = Formation::all();

        return view('admin.formations.manage', compact('formations'));
    }
    public function create()
    {
        return view('admin.formations.create');
    }
    public function edit(Formation $formation)
    {
        return view('admin.formations.edit', ['formation' => $formation]);
    }

    public function destroy(Formation $formation)
    {
        if ($formation->image && Storage::disk('public')->exists($formation->image)) {
            Storage::disk('public')->delete($formation->image);
        }
        $formation->delete();
        return redirect('/formations')->with('success', 'Formation supprimé avec succès !');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'duree' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('formations', 'public');
        }


        Formation::create($formFields);

        return redirect('/formations')->with('success', 'Formation crée avec succès !');
    }
    public function update(Request $request, Formation $formation)
    {
        $formFields = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'duree' => 'required'
        ]);

        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($formation->image && Storage::disk('public')->exists($formation->image)) {
                Storage::disk('public')->delete($formation->image);
            }
            // Store the new image
            $formFields['image'] = $request->file('image')->store('formations', 'public');
        }

        $formation->update($formFields);

        return redirect('/formations')->with('success', 'Formation mise à jour avec succès !');
    }

}
