<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
public function createIntent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plan' => 'required|exists:subscription_plans,id',
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid request data.'], 422);
        }

        try {
            $plan = SubscriptionPlan::findOrFail($request->plan);
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

            // Step 1: Create a Stripe customer
            $customer = $stripe->customers->create([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // Step 2: Create a PaymentIntent with the customer
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => $plan->price * 100,
                'currency' => 'eur',
                'description' => 'Payment for Plan: ' . $plan->name,
                'customer' => $customer->id,
                'payment_method_types' => ['card'],
            ]);

            return response()->json([
                'client_secret' => $paymentIntent->client_secret,
            ]);

        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'message' => 'Stripe API error: ' . $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server error: ' . $e->getMessage(),
            ], 500);
        }
    }



}
