<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripeSession(Request $request)
    {
        $user  = auth()->user(); //if you want this from user end payment system just enable it and below change the method
        $productItems = [];

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        foreach (session('cart') as $id => $details) {

            $product_name = $details['product_name'];
            $orginalTotal = $details['price']; //if discount haven't then only $total
            $discountParcent = 0.1;  //10%
            $discountAmount = ($orginalTotal * $discountParcent);
            $discountedTotal = $orginalTotal - $discountAmount;
            $quantity = $details['quantity'];

            $two0 = "00";
            $unit_amount = "$discountedTotal$two0";
            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency'  => 'BDT',
                    'unit_amount' => $unit_amount,
                ],
                'quantity' => $quantity
            ];
        }
        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'                        => [$productItems],
            'mode'                              => 'payment',
            'allow_promotion_codes'             => true,
            'metadata'                          => [
                'user_id' => "0001"
            ],
            'customer_email' => $user->email, //$user->email
            'success_url'    => route('success'),
            'cancel_url'     => route('cancel'),
        ]);
        return redirect()->away($checkoutSession->url);
    }
    public function success()
    {
        return "Thanks for your order You have just completed your payment.The seller will reach out to you as soon as possible";
    }
    public function cancel()
    {
        return "cancel";
    }
}
