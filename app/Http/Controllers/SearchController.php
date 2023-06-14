<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $nom = $request->input('nom');
        $duree = $request->input('duree');
        $prix = $request->input('prix');

        $query = Formation::query();

        if ($nom) {
            $query->where('titre', 'like', '%' . $nom . '%');
        }

        if ($duree) {
            $query->where('duree', $duree);
        }

        if ($prix) {
            if ($prix === 'Moins de 100 MAD') {
                $query->where('prix', '<', 100);
            } elseif ($prix === '100 - 500 MAD') {
                $query->whereBetween('prix', [100, 500]);
            } elseif ($prix === '1 000 - 5 000 MAD') {
                $query->whereBetween('prix', [1000, 5000]);
            } elseif ($prix === '5 000 - 10 000 MAD') {
                $query->whereBetween('prix', [5000, 10000]);
            } elseif ($prix === 'Plus de 10 000 MAD') {
                $query->where('prix', '>', 10000);
            }
        }

        $formations = $query->get();

        if (count($formations) === 0) {
            return Redirect::route('search')->with('message', 'Aucun résultat ne correspond à votre recherche.');
        }

        return view('etudiant.formations', compact('formations'));
    }
}