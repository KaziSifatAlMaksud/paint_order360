<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendInvoice;
use App\Models\Invoice;

use Stripe;
use Stripe\Charge;
use Illuminate\View\View;

use Illuminate\Support\Facades\Log;



class StripePaymentController extends Controller
{


    public function StripeCheckout(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $successUrl = route('stripe.checkout.success', [
            'session_id' => '{CHECKOUT_SESSION_ID}',
            'invoice_id' => $request->invoice_id,
        ]);
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'USD',
                    'unit_amount' => $request->price * 100,
                    'product_data' => ['name' => $request->product],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $successUrl,
            'cancel_url' => route('stripe.checkout.cancel'),
        ]);

        return redirect()->to($session->url); // Redirect to Stripe Checkout
    }


    public function stripeCheckoutCancel()
    {
        return redirect()->route('invoices_all')->with('error', 'Payment was cancelled.');
    }







    public function stripeCheckoutSuccess(Request $request)
    {
        $invoiceId = $request->input('invoice_id');

        if (!$invoiceId) {
            // Handle the case where invoiceId is not provided
            return redirect()->route('some_error_route')->with('error', 'Invoice ID not provided');
        }

        $invoice = Invoice::find($invoiceId);
        if (!$invoice) {
            // Handle the case where the invoice is not found
            Log::error("Invoice not found with ID: " . $invoiceId);
            return redirect()->route('some_error_route')->with('error', 'Invoice not found');
        }

        // Update the invoice status
        $invoice->update(['status' => 3]);

        return redirect()->route('invoices_all')->with([
            'success' => 'Payment Successful',
            'invoiceId' => $invoiceId
        ]);
    }
}
