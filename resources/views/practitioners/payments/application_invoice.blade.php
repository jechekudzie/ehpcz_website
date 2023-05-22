<?php
/**
 * Project: council_system
 * User: user
 * Date: 27/07/2022
 * Time: 17:13
 */
?>

@extends('layouts.practitioners')

@push('head')
    <link rel="stylesheet" href="{{asset('administrator/assets/libs/@simonwep/pickr/themes/monolith.min.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

@endpush

@section('bread_crumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Practitioners</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Practitioners</a></li>
                        <li class="breadcrumb-item active">Add Practitioner</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@stop

@section('content')

    @if($errors->any())
        @include('errors')
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Practitioner Application Invoice</h4>
                </div><!-- end card header -->
                @if($errors->any())
                    @include('errors')
                @endif

                @if (session('message'))
                    <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
                        <strong>Message
                            ! </strong> {{session('message')}}
                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body form-steps">
                    <form class="vertical-navs-step" method="post" action="{{url('/practitioners/payments/'.$practitioner->id.'/application_invoice_confirm')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-5">
                            <div class="col-lg-12">
                                <div class="row justify-content-center">
                                    <div class="col-xxl-9">
                                        <div class="card" id="demo">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card-header border-bottom-dashed p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <img src="{{asset('logo.png')}}"
                                                                     class="card-logo card-logo-dark" alt="logo dark"
                                                                     height="50">
                                                                <img src="{{asset('logo.png')}}"
                                                                     class="card-logo card-logo-light" alt="logo light"
                                                                     height="50">
                                                                <div class="mt-sm-5 mt-4">
                                                                    <p class="mb-0" id="zip-code">
                                                                        <span>{{$practitioner->first_name.' '.$practitioner->last_name}}</span>
                                                                    </p>
                                                                    <h6 class="text-muted text-uppercase fw-semibold">
                                                                        Address</h6>
                                                                    <p class="text-muted mb-1"
                                                                       id="address-details">
                                                                        @if($practitioner->practitioner_contact)
                                                                            {{$practitioner->practitioner_contact->address}}
                                                                        @endif
                                                                    </p>
                                                                    <p class="text-muted mb-0" id="zip-code"><span>country:</span>
                                                                        Zimbabwe</p>
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0 mt-sm-0 mt-3">
                                                                <h6><span
                                                                        class="text-muted fw-normal">Address:</span><span
                                                                        id="addreess">20, Worcester Road Eastlea, Harare</span>
                                                                </h6>
                                                                <h6><span
                                                                        class="text-muted fw-normal">Email:</span><span
                                                                        id="email">registrations@ahpcz.co.zw</span></h6>
                                                                <h6><span class="text-muted fw-normal">Website:</span>
                                                                    <a href="https://ahpcz.co.zw/" class="link-primary"
                                                                       target="_blank" id="website">www.ahpcz.co.zw</a>
                                                                </h6>
                                                                <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span
                                                                        id="contact-no"> +(0242) 747482</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end card-header-->
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="card-body p-4">
                                                        <div class="row g-3">
                                                            <!--end col-->
                                                            <div class="col-lg-3 col-6">
                                                                <p class="text-muted mb-2 text-uppercase fw-semibold">
                                                                    Date</p>
                                                                <h5 class="fs-14 mb-0"><span
                                                                        id="invoice-date">{{date('d F Y')}}</span></h5>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-3 col-6">
                                                                <p class="text-muted mb-2 text-uppercase fw-semibold">
                                                                    Payment Status</p>
                                                                <span class="badge badge-soft-danger fs-11"
                                                                      id="payment-status">Pending</span>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-3 col-6">
                                                                <p class="text-muted mb-2 text-uppercase fw-semibold">
                                                                    Total Amount $USD</p>
                                                                <h5 class="fs-14 mb-0">$<span
                                                                        id="total-amount">{{$amount_invoiced}}</span>
                                                                </h5>
                                                            </div>

                                                            <div class="col-lg-3 col-6">
                                                                <p class="text-muted mb-2 text-uppercase fw-semibold">
                                                                    Total Amount $ZWL</p>
                                                                <h5 class="fs-14 mb-0">$<span
                                                                        id="total-amount">{{$amount_invoiced * $rate}}</span>
                                                                </h5>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                    <!--end card-body-->
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="card-body p-4">
                                                        <div class="table-responsive">
                                                            <table
                                                                class="table table-borderless text-center table-nowrap align-middle mb-0">
                                                                <thead>
                                                                <tr class="table-active">
                                                                    <th scope="col" style="width: 50px;">#</th>
                                                                    <th scope="col">Product Details</th>
                                                                    <th scope="col" class="text-end">Amount</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="products-list">
                                                                <tr>
                                                                    <th scope="row">01</th>
                                                                    <td class="col">
                                                                        <span class="fw-medium">Application fee</span>
                                                                    </td>
                                                                    <td class="text-end">${{$amount_invoiced}}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table><!--end table-->
                                                        </div>
                                                        <div class="border-top border-top-dashed mt-2">
                                                            <table
                                                                class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                                                style="width:250px">
                                                                <tbody>
                                                                <tr>
                                                                    <td>$ZWL Total</td>
                                                                    <td class="text-end">
                                                                        ${{$amount_invoiced * $rate}}</td>
                                                                </tr>

                                                                <tr class="border-top border-top-dashed fs-15">
                                                                    <th scope="row">$USD Total</th>
                                                                    <th class="text-end">${{$amount_invoiced}}</th>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <!--end table-->
                                                        </div>
                                                        <div class="mt-3">
                                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">
                                                                Payment Details:</h6>
                                                            <p class="text-muted mb-1">Payment Method: <span
                                                                    class="fw-medium"
                                                                    id="payment-method">Mastercard</span></p>
                                                            <div>
                                                                <div class="col-sm-6">
                                                                    <label for="mobile" class="form-label">Payment
                                                                        channel</label>
                                                                    <select class="form-control js-example-basic-single"
                                                                            name="payment_channel_id" id="profession_id"
                                                                            required>
                                                                        <option value="">Select payment channel</option>
                                                                        @if ($payment_channels)
                                                                            @foreach($payment_channels as $payment_channel)
                                                                                <option
                                                                                    value="{{ $payment_channel->id }}" {{old('payment_channel_id') == $payment_channel->id ? 'selected' : '' }} >{{ $payment_channel->name }} </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>

                                                                <input type="hidden" value="{{$amount_invoiced}}" name="amount_invoiced">
                                                            </div>

                                                            <div>
                                                                <div class="col-sm-6">
                                                                    <label for="mobile" class="form-label">Choose
                                                                        currency</label>
                                                                    <select class="form-control js-example-basic-single"
                                                                            name="currency" id="profession_id" required>
                                                                        <option value="">choose payment currency</option>
                                                                        <option value="zwl">$zwl</option>
                                                                        <option value="zwl">$usd</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <div class="alert alert-info">
                                                                <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                                                    <span id="note">All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or
                                                            credit card or direct payment online. If account is not paid within 7
                                                            days the credits details supplied as confirmation of work undertaken
                                                            will be charged the agreed quoted fee noted above.
                                                        </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                                            <a href="javascript:window.print()" class="btn btn-success"><i
                                                                    class="ri-printer-line align-bottom me-1"></i> Print</a>
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="ri-currency-fill align-bottom me-1"></i>
                                                                Proceed
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!--end card-body-->
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end col-->
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                    </form>
                </div>
            </div>
            <!-- end -->
        </div>
        <!-- end col -->
    </div>
@stop



@push('scripts')
    <script src="{{asset('administrator/assets/js/pages/form-wizard.init.js')}}"></script>
    <script src="{{asset('administrator/assets/js/pages/form-pickers.init.js')}}"></script>

    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{asset('administrator/assets/js/pages/select2.init.js')}}"></script>

    <script>
        $(function () {
            $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
@endpush


