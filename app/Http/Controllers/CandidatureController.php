<?php

namespace App\Http\Controllers;

use App\Mail\InviteEmail;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CandidatureController extends Controller
{
    public function manage()
    {
        $candidatures = Candidature::orderBy('statut')->get();

        return view('admin.candidatures.manage', compact('candidatures'));
    }

    public function destroy(Candidature $candidature)
    {
        if ($candidature->cv && Storage::disk('public')->exists($candidature->cv)) {
            Storage::disk('public')->delete($candidature->cv);
        }
        if ($candidature->motivation && Storage::disk('public')->exists($candidature->motivation)) {
            Storage::disk('public')->delete($candidature->motivation);
        }
        $candidature->delete();
        return redirect('/candidatures')->with('success', 'Candidature supprimé avec succès !');
    }
    public function accept(Request $request, Candidature $candidature)
    {

        $formFields['statut'] = "Invite";
        $candidature->update($formFields);
        Mail::to($candidature->email)->send(new InviteEmail($candidature->first_name, $candidature->last_name));


        return redirect('/candidatures')->with('success', 'Candidature acceptée avec succès !');
    }
    public function show(Candidature $candidature)
    {
        return view('admin.candidatures.show', ['candidature' => $candidature]);
    }
    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'specialisation' => 'required',
            'cv' => 'required|file',
            'motivation' => 'required|file',
        ]);

        // Store the uploaded files
        $cvPath = $request->file('cv')->store('cv', 'public');
        $motivationPath = $request->file('motivation')->store('lettredemotivation', 'public');

        // Create a new Candidature instance
        $candidature = new Candidature();
        $candidature->first_name = $validatedData['first_name'];
        $candidature->last_name = $validatedData['last_name'];
        $candidature->telephone = $validatedData['telephone'];
        $candidature->email = $validatedData['email'];
        $candidature->specialisation = $validatedData['specialisation'];
        $candidature->cv = $cvPath;
        $candidature->motivation = $motivationPath;
        $candidature->save();

        return redirect('/candidature')->with('success', 'Candidature soumise avec succès !');
    }
    public function single()
    {
        return view('auth.candidature');
    }
}
