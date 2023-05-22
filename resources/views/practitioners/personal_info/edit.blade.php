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
                            <h5 class="card-title mb-0 flex-grow-1">Update Personal and contact Information</h5>
                            <div class="flex-shrink-0">
                                <a href="{{url('/practitioners/'.$practitioner->id)}}"
                                   class="btn btn-soft-danger">Back To Practitioner</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="card-body border border-dashed border-end-0 border-start-0">

                       <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form method="post" action="{{url('/practitioners/'.$practitioner->id)}}"
                                          enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <select class="form-control js-example-basic-single"
                                                            name="title_id"
                                                            id="title_id" required>
                                                        <option value="">Select Title</option>
                                                        @if ($titles)
                                                            @foreach($titles as $title)
                                                                <option
                                                                    value="{{ $title->id }}" {{ $title->id == $practitioner->title_id ? 'selected="selected"' : '' }} >{{ $title->name }} </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Gender</label>
                                                    <select class="form-control js-example-basic-single"
                                                            name="gender_id"
                                                            id="gender_id" required>
                                                        <option value="">Select Gender</option>
                                                        @if ($genders)
                                                            @foreach($genders as $gender)
                                                                <option
                                                                    value="{{ $gender->id }}" {{ $gender->id == $practitioner->gender_id ? 'selected="selected"' : '' }} >{{ $gender->name }} </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="first_name" class="form-label">First name</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           name="first_name"
                                                           placeholder="Enter First Name"
                                                           value="{{$practitioner->first_name}}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="last_name" class="form-label">Last name</label>
                                                    <input type="text" class="form-control" id="last_name"
                                                           name="last_name"
                                                           placeholder="Enter Last Name"
                                                           value="{{$practitioner->last_name}}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="middle_name" class="form-label">Middle name</label>
                                                    <input type="text" class="form-control" id="middle_name"
                                                           name="middle_name"
                                                           placeholder="Enter Middle Name"
                                                           value="{{$practitioner->middle_name}}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="dob" class="form-label">Date of Birth</label>
                                                    <input type="text" class="form-control flatpickr-input active"
                                                           id="dob"
                                                           name="dob" value="{{$practitioner->dob}}"
                                                           data-provider="flatpickr"
                                                           data-date-format="Y-d-m" readonly="readonly">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nationality" class="form-label">Nationality</label>
                                                    <select class="form-control js-example-basic-single"
                                                            name="nationality_id"
                                                            id="nationality_id" required>
                                                        <option value="">Select Nationality</option>
                                                        @if ($nationalities)
                                                            @foreach($nationalities as $nationality)
                                                                <option
                                                                    value="{{ $nationality->id }}" {{ $nationality->id == $practitioner->nationality_id ? 'selected="selected"' : '' }} >{{ $nationality->name }} </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="identification" class="form-label">Identification
                                                        (Passport
                                                        Number/ID Number)</label>
                                                    <input type="text" class="form-control" id="identification"
                                                           name="identification"
                                                           placeholder="Enter your identification number"
                                                           value="{{$practitioner->identification}}">
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Update Profile
                                                    </button>
                                                    <button type="button" class="btn btn-soft-success">Cancel
                                                    </button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->
                               {{-- <div class="tab-pane" id="contactInfo" role="tabpanel">
                                    <form method="post" action="{{url('/practitioners/'.$practitioner->id)}}"
                                          enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row g-2">
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                           placeholder="Enter practitioner email"
                                                           value="{{$practitioner->practitioner_contact->email}}">
                                                </div>
                                            </div>

                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="mobile" class="form-label">Mobile Number</label>
                                                    <input type="text" class="form-control" id="mobile"
                                                           name="mobile"
                                                           placeholder="Enter practitioner number"
                                                           value="{{$practitioner->practitioner_contact->mobile}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div>
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address"
                                                           name="address"
                                                           placeholder="Enter practitioner physical address"
                                                           value="{{$practitioner->practitioner_contact->address}}">
                                                </div>
                                            </div>

                                            --}}{{--<div class="col-lg-6">
                                                <div>
                                                <label for="nationality" class="form-label">Country</label>
                                                <select class="form-control js-example-basic-single" name="country_id" id="nationality_id" required>
                                                    <option value="">Select Country</option>
                                                    @if ($nationalities)
                                                        @foreach($nationalities as $nationality)
                                                            <option value="{{ $nationality->id }}" {{ $nationality->id == $practitioner->practitioner_contact-> ? 'selected="selected"' : '' }}>{{ $nationality->name }} </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                </div>
                                            </div>--}}{{--

                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="mobile" class="form-label">Province</label>
                                                    <select class="form-control js-example-basic-single"
                                                            name="province_id"
                                                            id="province_id" required>
                                                        <option value="">Select Province</option>
                                                        @if ($provinces)
                                                            @foreach($provinces as $province)
                                                                <option
                                                                    value="{{ $province->id }}" {{ $province->id == $practitioner->practitioner_contact->province_id ? 'selected="selected"' : '' }} >{{ $province->name }} </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="mobile" class="form-label">City</label>
                                                    <select class="form-control js-example-basic-single"
                                                            name="city_id"
                                                            id="city_id" required>
                                                        <option value="">Select City</option>
                                                        @if ($cities)
                                                            @foreach($cities as $city)
                                                                <option
                                                                    value="{{ $city->id }}" {{ $city->id == $practitioner->practitioner_contact->city_id ? 'selected="selected"' : '' }} >{{ $city->name }} </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success">Update Contact
                                                        Info
                                                    </button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>--}}
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


