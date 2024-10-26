<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        "payment_method"
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function createPaymentMethod($payment_method)
    {
        PaymentMethod::create([
            "payment_method" => $payment_method
        ]);
    }
}
