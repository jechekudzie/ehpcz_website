<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentChannel;
use App\Models\PaymentMethod;
use App\Models\Practitioner;
use App\Models\PractitionerApplication;
use App\Models\PractitionerProfessionQualification;
use App\Models\ProfessionFee;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Paynow\Payments\Paynow;

class PaymentsController extends Controller
{
    //

    public function application_invoice(Practitioner $practitioner)
    {
        $application_data = Session::get('application_data');

        $type = $application_data['type'];
        $amount_invoiced = $application_data['amount_invoiced'];
        $rate = 630;
        $payment_channels = PaymentChannel::all();
        return view('practitioners.payments.application_invoice',
            compact('practitioner', 'amount_invoiced', 'type', 'rate', 'payment_channels'));
    }

    public function application_invoice_confirm(Practitioner $practitioner)
    {

        $application_data = Session::get('application_data');
        $payment = request()->validate([
            'payment_channel_id' => 'required',
            'amount_invoiced' => 'required',
            'currency' => 'required',
        ]);
        $payment['type'] = $application_data['type'];

        if ($payment['currency'] == 'zwl') {
            $payment['amount_invoiced'] = $payment['amount_invoiced'] * 630;
        }

        Session::put('payment', $payment);

        return view('practitioners.payments.application_invoice_confirm', compact('practitioner', 'payment'));
    }

    public function submit_payment(Practitioner $practitioner)
    {
        $proof_of_payment = '';
        $payment = Session::get('payment');

        if ($payment['payment_channel_id'] == 1) {
            $data = request()->validate([
                'amount_invoiced' => ['required'],
                'amount_paid' => ['required'],
                'proof_of_payment' => ['nullable'],
            ]);
        }

        if ($payment['payment_channel_id'] == 2) {
            $data = request()->validate([
                'amount_invoiced' => ['required'],
                'amount_paid' => ['required'],//mobile number
                'proof_of_payment' => ['required'],//mobile number
            ]);
        }
        if ($payment['payment_channel_id'] == 3) {
            $data = request()->validate([
                'amount_invoiced' => ['required'],
                'amount_paid' => ['required'],
                'proof_of_payment' => ['required'],//transaction reference number from POP or Deposit slip
            ]);

            if (request()->hasfile('proof_of_payment')) {

                $file = request()->file('proof_of_payment');

                //get file original name
                $name = $file->getClientOriginalName();

                //create a unique file name using the time variable plus the name
                $file_name = time() . $name;

                //upload the file to a directory in Public folder
                $proof_of_payment = $file->move('proof_of_payments', $file_name);

                $data['proof_of_payment'] = $proof_of_payment;
            }
        }

        $practitioner_profession = $practitioner->practitioner_professions->first();

        $application_data = Session::get('application_data');


        $subscription = Subscription::create([
            'practitioner_id' => $practitioner->id,
            'practitioner_profession_id' => $practitioner_profession->id,
            'application_status_id' => 1,
            'compliance_status_id' => 4,
            'period' => date('Y'),
        ]);


        $subscription->add_payment([
            'practitioner_id' => $practitioner->id,
            'period' => $subscription->period,
            'application_category_id' => $application_data['application']['application_category_id'],
            'application_id' => $application_data['application']['id'],
            'amount_invoiced' => $data['amount_invoiced'],
            'amount_paid' => $data['amount_paid'],
            'currency' => $payment['currency'],
            'rate' => 630,
            'date_of_payment' => date('Y-m-d'),
            'proof_of_payment' => $data['proof_of_payment'],
            'payment_channel_id' => $payment['payment_channel_id'],
            'payment_status_id' => 1,
        ]);

        return redirect('/practitioners/professions/'.$practitioner_profession->id.'/show')
            ->with('message','Payment done, you may add your qualification and upload required document.');
    }

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

        return back()->with('message', 'Payment was successful, your reference number is,' . $payment['paynowreference']);
    }


}
