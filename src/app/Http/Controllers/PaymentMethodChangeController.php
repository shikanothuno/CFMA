<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PaymentMethodChangeController extends Controller
{
    public function paymentMethodChange(User $user)
    {
        return view("payment-method-change", compact("user"));
    }

    public function paymentMethodChangeStore(User $user, Request $request)
    {
        $payment_method = $request->input("payment-method");
        $user->paymentMethodChange($user, $payment_method);

        return redirect(route("payment.method.change", $user));
    }
}
