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
                    @if($payment['payment_channel_id'] == '1')
                        <form class="vertical-navs-step" method="post"
                              action="{{url('/practitioners/payments/'.$practitioner->id.'/submit_payment')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <h4>CASH</h4>
                            <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel"
                                 aria-labelledby="pills-bill-info-tab">
                                <div>
                                    <h5 class="mb-1">Billing Information</h5>
                                    <p class="text-muted mb-4">Please fill all information below</p>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-firstName" class="form-label">Amount
                                                    invoiced</label>
                                                <input type="text" class="form-control" name="amount_invoiced"
                                                       value="{{$payment['amount_invoiced']}}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-lastName" class="form-label">Amount paid</label>
                                                <input type="text" class="form-control" name="amount_paid"
                                                       value="{{$payment['amount_invoiced']}}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-phone" class="form-label">Currency</label>
                                                <input type="text" class="form-control" name="currency"
                                                       value="{{$payment['currency']}}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-phone" class="form-label">Receipt number
                                                    number</label>
                                                <input type="text"  name="proof_of_payment" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-3 mt-3">
                                        <button type="submit" class="btn btn-primary btn-label">
                                            <i class="label-icon align-middle fs-16 ms-2"></i>Submit Payment
                                        </button>
                                    </div>

                                    <div class="d-flex gap-3 mt-3">
                                        <a href="{{url('/practitioners/payments/'.$practitioner->id.'/application_invoice')}}"
                                           class="btn btn-success btn-label">
                                            <i class="label-icon align-middle fs-16 ms-2"></i>Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <!-- end row -->
                        </form>
                    @endif
                    @if($payment['payment_channel_id'] == 2)
                        <form class="vertical-navs-step" method="post"
                              action="{{url('/practitioners/payments/'.$practitioner->id.'/submit_payment')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <h4>ECOCASH</h4>
                            <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel"
                                 aria-labelledby="pills-bill-info-tab">
                                <div>
                                    <h5 class="mb-1">Billing Information</h5>
                                    <p class="text-muted mb-4">Please fill all information below</p>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-firstName" class="form-label">Amount
                                                    invoiced</label>
                                                <input type="text" class="form-control" name="amount_invoiced"
                                                       value="{{$payment['amount_invoiced']}}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-lastName" class="form-label">Amount paid</label>
                                                <input type="text" class="form-control" name="amount_piad"
                                                       value="{{$payment['amount_invoiced']}}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-phone" class="form-label">Currency</label>
                                                <input type="text" class="form-control" name="currency"
                                                       value="{{$payment['currency']}}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-phone" class="form-label">Ecocash reference
                                                    number</label>
                                                <input type="text" name="proof_of_payment" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-3 mt-3">
                                        <button type="submit" class="btn btn-primary btn-label">
                                            <i class="label-icon align-middle fs-16 ms-2"></i>Submit Payment
                                        </button>
                                    </div>
                                    <div class="d-flex gap-3 mt-3">
                                        <a href="{{url('/practitioners/payments/'.$practitioner->id.'/application_invoice')}}"
                                           class="btn btn-success btn-label">
                                            <i class="label-icon align-middle fs-16 ms-2"></i>Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <!-- end row -->
                        </form>
                    @endif
                    @if($payment['payment_channel_id'] == 3)
                        <form class="vertical-navs-step" method="post"
                              action="{{url('/practitioners/payments/'.$practitioner->id.'/submit_payment')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <h4>TRANSFER</h4>
                            <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel"
                                 aria-labelledby="pills-bill-info-tab">
                                <div>
                                    <h5 class="mb-1">Billing Information</h5>
                                    <p class="text-muted mb-4">Please fill all information below</p>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-firstName" class="form-label">Amount
                                                    invoiced</label>
                                                <input type="text" class="form-control" name="amount_invoiced"
                                                       value="{{$payment['amount_invoiced']}}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-lastName" class="form-label">Amount paid</label>
                                                <input type="text" class="form-control" name="amount_paid"
                                                       value="{{$payment['amount_invoiced']}}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-phone" class="form-label">Currency</label>
                                                <input type="text" class="form-control"  name="currency"
                                                       value="{{$payment['currency']}}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="billinginfo-phone" class="form-label">Proof of
                                                    payment</label>
                                                <input type="file" name="proof_of_payment" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-3 mt-3">
                                        <button type="submit" class="btn btn-primary btn-label">
                                            <i class="label-icon align-middle fs-16 ms-2"></i>Submit Payment
                                        </button>
                                    </div>

                                    <div class="d-flex gap-3 mt-3">
                                        <a href="{{url('/practitioners/payments/'.$practitioner->id.'/application_invoice')}}"
                                           class="btn btn-success btn-label">
                                            <i class="label-icon align-middle fs-16 ms-2"></i>Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <!-- end row -->
                        </form>
                    @endif
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


