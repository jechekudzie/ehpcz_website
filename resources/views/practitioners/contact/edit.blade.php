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
                            <h5 class="card-title mb-0 flex-grow-1">Update contact information</h5>
                            <div class="flex-shrink-0">
                                <a href="{{url('/practitioners/contact/'.$practitionerContact->practitioner->id.'/index')}}"
                                   class="btn btn-soft-danger">Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="card-body border border-dashed border-end-0 border-start-0">

                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form method="post"
                                          action="{{url('/practitioners/contact/'.$practitionerContact->practitioner->id.'/update')}}"
                                          enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row">

                                            <div>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email"
                                                               placeholder="Enter practitioner email"
                                                               value="{{$practitionerContact->email}}">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="mobile" class="form-label">Mobile Number</label>
                                                        <input type="text" class="form-control" id="mobile"
                                                               name="mobile" placeholder="Enter practitioner number"
                                                               value="{{$practitionerContact->mobile}}">
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="address"
                                                               name="address" value="{{$practitionerContact->address}}">
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <label for="nationality" class="form-label">Country</label>
                                                        <select class="form-control js-example-basic-single"
                                                                name="country_id" id="nationality_id" required>
                                                            <option value="">Select Country</option>
                                                            @if ($nationalities)
                                                                @foreach($nationalities as $nationality)
                                                                    <option
                                                                        value="{{ $nationality->id }}" {{$nationality->id == $practitionerContact->country_id ? 'selected':''}}>
                                                                        {{ $nationality->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="mobile" class="form-label">Province</label>
                                                        <select class="form-control js-example-basic-single"
                                                                name="province_id" id="province_id" required>
                                                            <option value="">Select Province</option>
                                                            @if ($provinces)
                                                                @foreach($provinces as $province)
                                                                    <option
                                                                        value="{{ $province->id }}" {{$province->id == $practitionerContact->province_id ? 'selected':''}}>{{ $province->name }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="mobile" class="form-label">City</label>
                                                        <select class="form-control js-example-basic-single"
                                                                name="city_id" id="city_id" required>
                                                            <option value="">Select City</option>
                                                            @if ($cities)
                                                                @foreach($cities as $city)
                                                                    <option
                                                                        value="{{ $city->id }}" {{$city->id == $practitionerContact->city_id ? 'selected':''}}>{{ $city->name }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>

                                                    <br/>
                                                    <br/>
                                                    <br/>
                                                    <br/>
                                                    <div class="col-lg-12">
                                                        <div
                                                            class="hstack gap-2 justify-content-left">

                                                            <button type="submit" class="btn btn-primary">Update contact
                                                            </button>
                                                            <a href="{{url('/practitioners/contact/'.$practitioner->id.'/index')}}"
                                                               class="btn btn-light">Cancel
                                                            </a>
                                                        </div>
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


