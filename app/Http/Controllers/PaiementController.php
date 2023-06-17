<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Formation;
use Illuminate\Http\Request;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\InscriptionController;

class PaiementController extends Controller
{
    public function checkout($id_formation)
    {
        $user = auth()->user();
        if ($user->hasGroup()) {
            return back()->with('error', 'Vous êtes déjà inscrit à une autre formation.');
        }
        $formation = Formation::find($id_formation);
        $unitAmount = intval($formation->prix * 100); // Convert to cents

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $lineItems = [[
            'price_data' => [
                'currency' => 'MAD',
                'product_data' => [
                    'name' => $formation->titre,
                    'images' => [$formation->image]
                ],
                'unit_amount' => $unitAmount,
            ],
            'quantity' => 1,
        ]];

        $session = StripeSession::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true),
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        Session::put('formation_id', $id_formation);

        return redirect($session->url);
    }

    public function success()
    {
        // Retrieve the formation_id from the session
        $formationId = Session::get('formation_id');

        // Perform any necessary actions with the formation_id
        $inscriptionController = new InscriptionController();
        $request = new Request(); // Create a new instance of Request
        $inscriptionController->store($request, $formationId); // Call the store method

        // Clear the formation_id from the session
        Session::forget('formation_id');

        return view('etudiant.paiement.success');
    }

    public function cancel()
    {
        return view('etudiant.paiement.failed');
    }
}
