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
                    <h4 class="card-title mb-0">Practitioner and Student Application</h4>
                </div><!-- end card header -->
                @if($errors->any())
                    @include('errors')
                @endif


                <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
                    <strong>Message
                        ! </strong> Please note that, for Practitioner applications, application fee stated below is
                    required to process the initial stage,
                    once you are approved you will pay the registration fee before you can get the Practising
                    certificate. For all student application is it a once of payment.
                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>

                <div class="card-body form-steps">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card pricing-box ribbon-box right">
                                <div class="card-body p-4 m-2">
                                    <div class="ribbon-two ribbon-two-danger"><span>STUDENT</span></div>
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">Student application</h5>
                                                <p class="text-muted mb-0">Initial registration</p>
                                            </div>
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-light rounded-circle text-primary">
                                                    <i class="ri-medal-line fs-20"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-4">
                                            <h2><sup><small>$</small></sup> {{$student_fee->first()->fee}}</h2>
                                        </div>
                                    </div>
                                    <hr class="my-4 text-muted">
                                    <div>
                                        <ul class="list-unstyled vstack gap-3 text-muted">
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">PERSONAL REQUIREMENTS</h5>
                                            </div>
                                            <div class="row g-3">
                                                @foreach($personal_requirements as $personal_requirement)
                                                    <div class="col-md-4">
                                                        <li>
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 text-success me-1">
                                                                    <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    {{$personal_requirement->name}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">QUALIFICATION REQUIREMENTS</h5>
                                            </div>
                                            <div class="row g-3">
                                                @foreach($qualification_requirements as $qualification_requirement)
                                                    <div class="col-md-4">
                                                        <li>
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 text-success me-1">
                                                                    <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    {{$qualification_requirement->name}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">FOREIGN REQUIREMENTS</h5>
                                            </div>
                                            <div class="row g-3">
                                                @foreach($foreign_requirements as $foreign_requirement)
                                                    <div class="col-md-4">
                                                        <li>
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 text-success me-1">
                                                                    <i class="ri-close-fill fs-15 align-middle"></i>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    {{$foreign_requirement->name}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </ul>
                                        <div class="mt-4">
                                            <a href="{{url('/practitioners/choose/1')}}"
                                               class="btn btn-success w-100 waves-effect waves-light">Get started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card pricing-box ribbon-box right">
                                <div class="card-body p-4 m-2">
                                    <div class="ribbon-two ribbon-two-danger"><span>PRACTITIONER</span></div>
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">Practitioner application</h5>
                                                <p class="text-muted mb-0">Initial registration</p>
                                            </div>
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-light rounded-circle text-primary">
                                                    <i class="ri-medal-line fs-20"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-4">
                                            <h2><sup><small>$</small></sup> {{$practitioner_fee->first()->fee}}</h2>
                                        </div>
                                    </div>
                                    <hr class="my-4 text-muted">
                                    <div>
                                        <ul class="list-unstyled vstack gap-3 text-muted">
                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">PERSONAL REQUIREMENTS</h5>
                                            </div>
                                            <div class="row g-3">
                                                @foreach($personal_requirements as $personal_requirement)
                                                    <div class="col-md-4">
                                                        <li>
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 text-success me-1">
                                                                    <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    {{$personal_requirement->name}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">QUALIFICATION REQUIREMENTS</h5>
                                            </div>
                                            <div class="row g-3">
                                                @foreach($qualification_requirements as $qualification_requirement)
                                                    <div class="col-md-4">
                                                        <li>
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 text-success me-1">
                                                                    <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    {{$qualification_requirement->name}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="flex-grow-1">
                                                <h5 class="mb-1 fw-semibold">FOREIGN REQUIREMENTS</h5>
                                            </div>
                                            <div class="row g-3">
                                                @foreach($foreign_requirements as $foreign_requirement)
                                                    <div class="col-md-4">
                                                        <li>
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 text-success me-1">
                                                                    <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    {{$foreign_requirement->name}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </ul>
                                        <div class="mt-4">
                                            <a href="{{url('/practitioners/choose/2')}}"
                                               class="btn btn-success w-100 waves-effect waves-light">Get started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

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


