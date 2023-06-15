<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TimeController extends Controller
{
    //
    public function getAvailableTimeSlots(Request $request)
    {
        $groupeId = $request->input('groupeId');
        $formateurId = $request->input('formateurId');
        $classeId = $request->input('classeId');

        $times = Time::whereDoesntHave('seances', function ($query) use ($groupeId, $formateurId, $classeId) {
            $query->where('groupe_id', $groupeId)
                ->where('formateur_id', $formateurId)
                ->where('classe_id', $classeId);
        })->get();    

        return response()->json(['times' => $times]);
    }
}
