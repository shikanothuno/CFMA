<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Stripe\Charge;

class PaymentMethodController extends Controller
{
    public function paymentCard(Item $item)
    {
        return view("payment-card",compact("item"));
    }

    public function paymentStripe(Request $request, Item $item)
    {
        $request->session()->regenerateToken();

        \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

        $charge = Charge::create([
            "amount" => $item->item_price,
            "currency" => "jpy",
            "source" => $request->stripeToken,
        ]);

        return redirect(route("items.list"));
    }

    public function paymentStore(Item $item)
    {
        return view("payment-store",compact("item"));
    }

    public function paymentBank(Item $item)
    {
        return view("payment-bank",compact("item"));
    }
}
