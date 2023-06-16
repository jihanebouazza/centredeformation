<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Formation;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class PaiementController extends Controller
{
    public function checkout($id_formation)
    {
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

        $session = Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true),
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
       return view('etudiant.paiement.success');
    }

    public function cancel()
    {
        return view('etudiant.paiement.failed');
    }
}
