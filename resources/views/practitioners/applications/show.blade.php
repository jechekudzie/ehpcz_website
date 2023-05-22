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
                            <h5 class="card-title mb-0 flex-grow-1">{{$practitioner_profession_qualification->practitioner_profession->profession->name}}</h5>

                            <a style="margin: 5px;"
                               href="{{url('/practitioners/applications/'.$practitioner->id.'/index')}}"
                               class="btn btn-danger">
                                Back
                            </a>
                        </div>
                    </div>
                    @if($errors->any())
                        @include('errors')
                    @endif
                    <div class="row">

                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="font-weight: bold;font-size: larger;" class="card-title mb-3">
                                        Professional Qualifications</h5>

                                    <h5 class="card-title mb-3">{{$practitioner_profession_qualification->qualification->name}}</h5>

                                    @if($practitionerApplication->reception == 0)
                                        <div class="text-left mb-4">
                                            <a href="" class="btn btn-success btn-label right ms-auto"><i
                                                    class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i>
                                                Submit for approval
                                            </a>
                                        </div>
                                    @endif

                                    @if($practitionerApplication->accounts == 0)
                                        <div class="text-left mb-4">
                                            <a href="{{url('/practitioners/applications/'.$practitionerApplication->id.'/registration_checkout')}}" class="btn btn-success btn-label right ms-auto"><i
                                                    class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i>
                                                Registration fee: {{$profession_fee = \App\Models\ProfessionFee::where('profession_id', $practitioner_profession_qualification->practitioner_profession->profession->id)
                                                                ->where('register_category_id', $practitioner_profession_qualification->register_category->id)->first()->registration}}
                                                Checkout</a>
                                        </div>
                                    @endif

                                    @if($practitionerApplication->admin == 0)
                                        <div class="text-left mb-4">
                                            <a href="" class="btn btn-success btn-label right ms-auto"><i
                                                    class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i>
                                                Verify Documents
                                            </a>
                                        </div>
                                    @endif

                                    @if($practitionerApplication->registrar == 0)
                                        <div class="text-left mb-4">
                                            <a href="" class="btn btn-success btn-label right ms-auto"><i
                                                    class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i>
                                                Verify Sign Off
                                            </a>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">

                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Professional qualification :</p>
                                                    <h6 class="text-truncate mb-0">{{$practitioner_profession_qualification->qualification->name}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">

                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Accredited Institution :</p>
                                                    <h6 class="text-truncate mb-0">{{$practitioner_profession_qualification->accredited_institution->institution->name}}</h6>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end col-->

                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">

                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Qualification category :</p>
                                                    <h6 class="text-truncate mb-0">
                                                        {{$practitioner_profession_qualification->qualification_category->name}}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">

                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Commencement date :</p>
                                                    <h6 class="text-truncate mb-0">{{$practitioner_profession_qualification->commencement_date}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">

                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Completion date:</p>
                                                    <h6 class="text-truncate mb-0">
                                                        {{$practitioner_profession_qualification->completion_date}}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end col-->

                                        <div class="col-6 col-md-4">
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0 avatar-xs align-self-center me-3">

                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="mb-1">Application status :</p>
                                                    <a href="#"
                                                       class="fw-semibold">
                                                        {{$practitioner_profession_qualification->application_status->name}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @livewire('qualification-requirements.requirement-document',
                                    ['practitioner_profession_qualification' =>
                                    $practitioner_profession_qualification])
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @stop



        @push('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="{{asset('js/functions.js')}}"></script>
            <script src="{{asset('administrator/assets/js/pages/modal.init.js')}}"></script>


            <script src="{{asset('administrator/assets/js/pages/form-wizard.init.js')}}"></script>
            <script src="{{asset('administrator/assets/js/pages/form-pickers.init.js')}}"></script>

    @endpush
