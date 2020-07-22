<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Mail\PaymentConfirm;
use App\Models\Author\Submit;
use App\Models\Category;
use App\Models\Custompay;
use App\Models\Paypal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;
use Stripe;

class PaymentController extends Controller
{

    public function pay($id){
        $paper = Submit::find($id);
        $discount = User::find($paper->user_id);
        $journal = Category::find($paper->journal_id);
        return view('author.pages.submit.pay', compact('paper','journal','discount'));
    }
    public function stripepost(Request $request){
//        sk_test_key: sk_test_g0oXgPkG2IOSWSeRfVcxJFlG00qckkjv2U
//        sk_live_key: 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
        Stripe\Stripe::setApiKey('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');
        try{
            $data = Stripe\Charge::create ([
                "amount" => $request->price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Pay Against this Paper ID: ".$request->paper_id
            ]);
        }catch (\Exception $e){
            Session::flash('danger', 'The system is not accepting your card/payment method!');
            return back();
        }

        $email = Auth::user()->email;
        $billing_name = $request->holder_name;
        $paper_id = $request->paper_id;
        $payment_id = $data->id;
        $transaction_id = $data->balance_transaction;
        $payment_method = $data->payment_method;
        $info = $data->receipt_url;
        $amount = $data->amount/100;
        $pay_type = $data->source->object;
        $card_type = $data->source->brand;
        $fingerprint = $data->source->fingerprint;
        $last4 = $data->source->last4;

        $stripe = new \App\Models\Stripe();
        $stripe->user_id = Auth::user()->id;
        $stripe->paper_id = $paper_id;
        $stripe->card_holder_name = $billing_name;
        $stripe->payment_id = $payment_id;
        $stripe->transaction_id = $transaction_id;
        $stripe->payment_method = $payment_method;
        $stripe->amount = $amount;
        $stripe->receipt_url = $info;
        $stripe->pay_type = $pay_type;
        $stripe->card_type = $card_type;
        $stripe->fingerprint = $fingerprint;
        $stripe->last4 = $last4;
        $stripe->save();

        DB::table('submits')->where('paper_id', $paper_id)->update(['is_payment' => 1]);
        Mail::to($email)->queue(new PaymentConfirm($paper_id, $payment_id, $billing_name, $amount, $info));
        Session::flash('success', 'Payment Successful! Please check your email');
        return redirect()->route('author.paper-submission.index');
    }
    public function paypost(Request $request){
        $details = $request->cdetails;
        $paper_id = $request->paper_id;
        //===================================
        $payment_id = $details['id'];
        $bcountry_code = $details['payer']['address']['country_code'];
        $email = $details['payer']['email_address'];
        $payer_id = $details['payer']['payer_id'];
        $pfirst_name = $details['payer']['name']['given_name'];
        $plast_name = $details['payer']['name']['surname'];
        $billing_name = implode(' ', [$pfirst_name, $plast_name]);
        $amount = $details['purchase_units'][0]['amount']['value'];
        $currency = $details['purchase_units'][0]['amount']['currency_code'];
        $sname = $details['purchase_units'][0]['shipping']['name']['full_name'];
        $saddress1 = $details['purchase_units'][0]['shipping']['address']['address_line_1'];
        $saddress2 = $saddress1;
        $sstate = $details['purchase_units'][0]['shipping']['address']['admin_area_1'];
        $scity = $details['purchase_units'][0]['shipping']['address']['admin_area_2'];
        $spostal = $details['purchase_units'][0]['shipping']['address']['postal_code'];
        $scountry_code = $details['purchase_units'][0]['shipping']['address']['country_code'];

        $paypal = new Paypal();
        $paypal->user_id = Auth::user()->id;
        $paypal->paper_id = $paper_id;
        $paypal->payment_id = $payment_id;
        $paypal->payer_id = $payer_id;
        $paypal->billing_name = $billing_name;
        $paypal->email = $email;
        $paypal->billing_country_code = $bcountry_code;
        $paypal->amount = $amount;
        $paypal->currency = $currency;
        $paypal->shipping_name = $sname;
        $paypal->shipping_address = $saddress1;
        $paypal->city = $scity;
        $paypal->state = $sstate;
        $paypal->postal = $spostal;
        $paypal->shipping_country_code = $scountry_code;
        $paypal->publish = 0;
        $info = implode(', ', [$saddress1, $scity, $sstate, $spostal, $scountry_code]);
        $paypal->save();

        DB::table('submits')->where('paper_id', $paper_id)->update(['is_payment' => 1]);

        Mail::to($email)->queue(new PaymentConfirm($paper_id, $payment_id, $billing_name, $amount, $info));

        return response()->json(['success' => 'Your payment have been successfully done! Please check your mail']);
    }

    public function custom_pay($id){
        $paper = Submit::find($id);
        $discount = User::find($paper->user_id);
        $journal = Category::find($paper->journal_id);
        return view('author.pages.submit.custom_pay', compact('paper','journal','discount'));
    }

    public function stripe_custom(Request $request){
//        sk_test_key: sk_test_g0oXgPkG2IOSWSeRfVcxJFlG00qckkjv2U
//        sk_live_key: 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
        Stripe\Stripe::setApiKey('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');
        try{
            $data = Stripe\Charge::create ([
                "amount" => $request->price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken
            ]);
        }catch (\Exception $e){
            Session::flash('danger', 'The system is not accepting your card/payment method!');
            return back();
        }

        $billing_name = $request->holder_name;
        $payment_id = $data->id;
        $amount = $data->amount/100;
        $paper_id = $request->paper_id;
        $purpose = $request->purpose;
        $pay_type = $request->pay_type;

        $stripe = new Custompay();
        $stripe->user_id = Auth::user()->id;
        $stripe->paper_id = $paper_id;
        $stripe->payment_id = $payment_id;
        $stripe->amount = $amount;
        $stripe->pay_type = 2;
        $stripe->purpose = $purpose;
        $stripe->save();
        Session::flash('success', 'Payment Successful! Thanks for your payment');
        return back();
    }
    public function paypal_custom(Request $request){
        $details = $request->cdetails;
        $paper_id = $request->paper_id;
        $purpose = $request->purpose;
        //===================================
        $payment_id = $details['id'];
        $pfirst_name = $details['payer']['name']['given_name'];
        $amount = $details['purchase_units'][0]['amount']['value'];

        $paypal = new Custompay();
        $paypal->user_id = Auth::user()->id;
        $paypal->paper_id = $paper_id;
        $paypal->payment_id = $payment_id;
        $paypal->amount = $amount;
        $paypal->purpose = $purpose;
        $paypal->pay_type = 1;
        $paypal->save();

        return response()->json(['success' => 'Your payment have been successfully done!']);
    }
}
