<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Exception;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    { 
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'stripeToken' => 'required|string',
        ]);
 
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                "amount" => $request->amount * 100, 
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Paiement de " . Auth::user()->name,
            ]);

            return back()->with('success', 'Paiement effectué avec succès !');
        } catch (Exception $e) {
            return back()->with('error', 'Erreur de paiement : ' . $e->getMessage());
        }
    }
}
