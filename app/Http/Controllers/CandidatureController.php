<?php

namespace App\Http\Controllers;

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
}
