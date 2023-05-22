<?php
/**
 * Created by PhpStorm for ehpcz
 * User: VinceGee
 * Date: 8/2/2022
 * Time: 2:36 PM
 */ ?>
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
                            <h5 class="card-title mb-0 flex-grow-1">Update employment information</h5>
                            <div class="flex-shrink-0">
                                <a href="{{url('/practitioners/employment/'.$practitionerEmployment->id.'/index')}}"
                                   class="btn btn-soft-danger">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="card-body border border-dashed border-end-0 border-start-0">

                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form method="post" action="{{url('/practitioners/employment/'.$practitionerEmployment->id.'/update')}}"
                                          enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row">

                                            <div>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label for="company" class="form-label">Company</label>
                                                        <input type="text" class="form-control" id="company"
                                                               name="company" placeholder="Enter the company name"
                                                               value="{{$practitionerEmployment->company}}">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="contact_person" class="form-label">Contact
                                                            Person</label>
                                                        <input type="text" class="form-control" id="contact_person"
                                                               name="contact_person"
                                                               placeholder="Enter company contact person"
                                                               value="{{$practitionerEmployment->contact_person}}">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="company_address" class="form-label">Company
                                                            Address</label>
                                                        <input type="text" class="form-control" id="company_address"
                                                               name="company_address"
                                                               placeholder="Enter company address"
                                                               value="{{$practitionerEmployment->company_address}}">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="company_phone" class="form-label">Company
                                                            Phone</label>
                                                        <input type="tel" class="form-control" id="company_phone"
                                                               name="company_phone"
                                                               placeholder="Enter company phone number"
                                                               value="{{$practitionerEmployment->company_phone}}">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="company_email" class="form-label">Company
                                                            Email</label>
                                                        <input type="email" class="form-control" id="company_email"
                                                               name="company_email"
                                                               placeholder="Enter company email address"
                                                               value="{{$practitionerEmployment->company_email}}">
                                                    </div>
                                                </div>

                                                <br/>
                                                <br/>
                                                <br/>
                                                <br/>
                                                <div class="col-lg-12">
                                                    <div
                                                        class="hstack gap-2 justify-content-left">

                                                        <button type="submit" class="btn btn-primary">update
                                                        </button>
                                                        <a href="{{url('/practitioners/employment/'.$practitionerEmployment->practitioner->id.'/index')}}"
                                                                class="btn btn-light">Cancel
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <!--end col-->
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

    @endpush


