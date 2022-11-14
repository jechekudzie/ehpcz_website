<?php
/**
 * Project: council_system
 * User: user
 * Date: 27/07/2022
 * Time: 16:23
 */
?>

@extends('layouts.practitioners')

@push('head')
    <link rel="stylesheet" href="{{asset('administrator/assets/libs/@simonwep/pickr/themes/monolith.min.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

@endpush

@section('content')

    @include('menu.profile-header')

    <div class="row">
        <div class="col-lg-12">
            <div>
                @include('menu.profile-nav')

                <div class="card" id="tasksList">
                    <div class="card-header border-0">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">Payments</h5>
                            <div class="flex-shrink-0">
                                <a href="{{url('/practitioners/applications/'.$practitionerApplication->id.'/show')}}"
                                   class="btn btn-soft-danger">Back</a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <div class="card-body p-4">
                            <div class="tab-content">
                                @if (session('message'))
                                    <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
                                        <strong>Message
                                            ! </strong> {{session('message')}}
                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">

                                    <form method="post" action="{{url('/practitioners/applications/'.$practitionerApplication->id.'/payment')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="tab-pane fade active show" id="pills-payment" role="tabpanel"
                                             aria-labelledby="pills-payment-tab">
                                            <div>
                                                <h5 class="mb-1">Payment Selection</h5>
                                                <p class="text-muted mb-4">Please select and enter your billing
                                                    information</p>
                                            </div>

                                            <div class="row g-4">
                                                @foreach($payment_channels as $payment_channel)
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div class="form-check form-radio-primary mb-3">
                                                            <input class="form-check-input" type="radio" name="payment_channel_id" value="{{$payment_channel->id}}" id="formradioRight5">
                                                            <label class="form-check-label" for="formradioRight5">
                                                                {{$payment_channel->name}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="collapse show" id="paymentmethodCollapse">
                                                <div class="card p-4 border shadow-none mb-0 mt-4">
                                                    <div class="row gy-3">

                                                        <div class="form-check card-radio">
                                                            <input id="shippingMethod02" type="radio" class="form-check-input" >
                                                            <label class="form-check-label" for="shippingMethod02">
                                                            <span
                                                                class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">${{$amount_invoiced}}</span>
                                                                <span
                                                                    class="fs-14 mb-1 text-wrap d-block">Amount Invoiced</span>
                                                                <span class="text-muted fw-normal text-wrap d-block">{{$practitioner_profession_qualification->practitioner_profession->profession->name}}.</span>
                                                            </label>
                                                        </div>


                                                        <input type="hidden" name="amount_invoiced" class="form-control"
                                                               id="cc-number" value="{{$amount_invoiced}}">


                                                        <div class="col-md-6">
                                                            <label for="cc-number" class="form-label">Amount paid or to
                                                                be
                                                                paid ($usd)</label>
                                                            <input type="text" name="amount_paid" class="form-control"
                                                                   id="cc-number"
                                                                   value="{{$amount_invoiced}}">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label for="cc-expiration" class="form-label">Payment
                                                                date</label>
                                                            <input name="date_of_payment" type="text"
                                                                   class="form-control flatpickr-input active" id="dob"
                                                                   data-provider="flatpickr" data-date-format="Y-m-d"
                                                                   readonly="readonly" required>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label for="cc-expiration" class="form-label">POP</label>
                                                            <input name="proof_of_payment" type="file"
                                                                   class="form-control"
                                                                   id="cc-expiration">
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>

                                            <div class="d-flex align-items-start gap-3 mt-4">
                                                <a href="{{url('/practitioners/applications/'.$practitionerApplication->id.'/show')}}"
                                                   class="btn btn-light btn-label previestab"
                                                   data-previous="pills-bill-address-tab"><i
                                                        class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back

                                                </a>
                                                <button type="submit"
                                                        class="btn btn-primary btn-label right ms-auto nexttab"
                                                        data-nexttab="pills-finish-tab"><i
                                                        class="ri-shopping-basket-line label-icon align-middle fs-16 ms-2"></i>Make
                                                    Payment
                                                </button>
                                            </div>

                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->


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

    @endpush
