<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentChannel;
use App\Models\Practitioner;
use App\Models\PractitionerApplication;
use App\Models\PractitionerProfessionQualification;
use App\Models\ProfessionFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Paynow\Payments\Paynow;

class PaymentsController extends Controller
{
    //

    public function index(Practitioner $practitioner)
    {
        return view('practitioners.payments.index', compact('practitioner'));
    }

    public function registration_checkout(PractitionerApplication $practitionerApplication)
    {
        $practitioner = $practitionerApplication->practitioner;

        $practitioner = $practitionerApplication->practitioner;


        $practitioner_profession_qualification = PractitionerProfessionQualification::find($practitionerApplication->reference);

        $amount_invoiced = ProfessionFee::where('profession_id', $practitioner_profession_qualification->practitioner_profession->profession->id)
            ->where('register_category_id', $practitioner_profession_qualification->register_category->id)->first()->registration;

        $payment_channels = PaymentChannel::all();

        return view('practitioners.payments.registration', compact('practitioner', 'practitionerApplication',
            'practitioner_profession_qualification', 'amount_invoiced', 'payment_channels'));

    }

    public function payment(PractitionerApplication $practitionerApplication)
    {
        $practitioner = $practitionerApplication->practitioner;

        $data = request()->validate([
            'amount_invoiced' => 'required',
            'amount_paid' => 'required',
            'payment_channel_id' => 'required',
            'date_of_payment' => 'required',
        ]);

        $amount_paid = (int)$data['amount_paid'];

        $id = time() . $data['amount_paid'];

        //dd($amount_paid);

        if ((int)$data['payment_channel_id'] == 5) {
            $paynow = new Paynow
            (
            //usd account
                '5865',
                '23962222-9610-4f7c-bbd5-7e12f19cdfc6',
                'http://localhost:8000/practitioners/applications/' . $practitionerApplication->id . '/check_payment',
                'http://localhost:8000/practitioners/applications/' . $practitionerApplication->id . '/check_payment'

            );

            //create a payment and add items required
            $payment = $paynow->createPayment($id, 'nigel@leadingdigital.africa');
            $payment->add('Sub', $amount_paid);
            //initiate payment
            $response = $paynow->send($payment);

            //check if initiation was a success
            if ($response->success()) {
                $status = 1;
                // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
                $payment_link = $response->redirectUrl();
                // Get the poll url (used to check the status of a transaction). You might want to save this in your DB
                $pollUrl = $response->pollUrl();
                //create an array of data to be saved in the database
                $attributes['poll_url'] = $pollUrl;

                $data['poll_url'] = $pollUrl;

                session()->put('payment', $data);

                return redirect($payment_link);
                //Redirect::away($payment_link);
            } else {

                return redirect('/practitioners/applications/' . $practitionerApplication->id . '/payment');
            }
        }

    }


    public function check_payment(PractitionerApplication $practitionerApplication)
    {

        $practitioner = $practitionerApplication->practitioner;
        $paynow = new Paynow
        (
        //usd account
            '5865',
            '23962222-9610-4f7c-bbd5-7e12f19cdfc6',
            'http://localhost:8000/practitioners/applications/' . $practitionerApplication->id . '/check_payment',
            'http://localhost:8000/practitioners/applications/' . $practitionerApplication->id . '/check_payment'

        );

        $payment = Session::get('payment');

        $poll_url = $payment['poll_url'];

        //paynow data
        $paynow_data = $paynow->pollTransaction($poll_url);
        $status = $paynow_data->status();
        $ref = $paynow_data->reference();
        $paynowref = $paynow_data->paynowreference();

        //add to payment
        $payment['status'] = $status;
        $payment['reference'] = $ref;
        $payment['paynowreference'] = $paynowref;

        Payment::create([
            'practitioner_id' => $practitioner->id,
            'application_category_id' => $practitionerApplication->application_category->id,
            'application_id' => $practitionerApplication->application_category->id,
            'reference' => $practitionerApplication->reference,
            'year' => date('Y'),
            'amount_invoiced' => $payment['amount_invoiced'],
            'amount_paid' => $payment['amount_paid'],
            'payment_channel_id' => $payment['payment_channel_id'],
            'payment_method_id' => 1,
            'date_of_payment' => $payment['date_of_payment'],
            'poll_url' => $payment['poll_url'],
            'proof_of_payment' => $payment['paynowreference'],
            'currency' => 'ZWL',
        ]);

        return back()->with('message','Payment was successful, your reference number is,'.$payment['paynowreference'] );
    }


}
