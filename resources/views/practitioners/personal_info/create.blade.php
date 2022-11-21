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
    <link rel="stylesheet" href="{{asset('administrator/assets/libs/@simonwep/pickr/themes/monolith.min.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                    <h4 class="card-title mb-0">Practitioner Details</h4>
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
                    <form class="vertical-navs-step" method="post" action="{{url('/practitioners')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-5">
                            <div class="col-lg-3">
                                <div class="nav flex-column custom-nav nav-pills" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-bill-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-info" type="button" role="tab" aria-controls="v-pills-bill-info" aria-selected="true">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i> Step 1
                                                        </span>
                                        Personal Info
                                    </button>
                                    <button class="nav-link" id="v-pills-bill-address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bill-address" type="button" role="tab" aria-controls="v-pills-bill-address" aria-selected="false">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i> Step 2
                                                        </span>
                                        Contact info
                                    </button>
                                    <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-payment" type="button" role="tab" aria-controls="v-pills-payment" aria-selected="false">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i> Step 3
                                                        </span>
                                        Profession Info
                                    </button>
                                </div>
                                <!-- end nav -->
                            </div> <!-- end col-->
                            <div class="col-lg-9">
                                <div class="px-lg-4">
                                    <div class="tab-content">
                                                <div class="tab-pane fade show active" id="v-pills-bill-info" role="tabpanel" aria-labelledby="v-pills-bill-info-tab">
                                                    <div>
                                                        <h5>Personal Info</h5>
                                                        <p class="text-muted"></p>
                                                    </div>

                                                        <div>
                                                        <div class="row g-3">
                                                            <div class="col-sm-6">
                                                                <label for="title" class="form-label">Title</label>
                                                                <select class="form-control js-example-basic-single" name="title_id" id="title_id" required>
                                                                    <option value="">Select Title</option>
                                                                    @if ($titles)
                                                                        @foreach($titles as $title)
                                                                            <option value="{{ $title->id }}" {{old('title_id') == $title->id ? 'selected' : '' }}>{{ $title->name }} </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="gender_id" class="form-label">Gender</label>
                                                                <select class="form-control js-example-basic-single" name="gender_id" id="gender_id" required>
                                                                    <option value="">Select Gender</option>
                                                                    @if ($genders)
                                                                        @foreach($genders as $gender)
                                                                            <option value="{{ $gender->id }}" {{old('gender_id') == $gender->id ? 'selected' : '' }}>{{ $gender->name }} </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="first_name" class="form-label">First name</label>
                                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{old('first_name')}}" required>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="last_name" class="form-label">Last name</label>
                                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{old('last_name')}}" required>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="middle_name" class="form-label">Middle name</label>
                                                                <input type="text" class="form-control" id="middle_name"  name="middle_name" value="{{old('middle_name')}}" placeholder="Enter Middle Name">
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="dob" class="form-label">Date of Birth</label>
                                                                <input type="text" class="form-control flatpickr-input active" id="dob" name="dob" data-provider="flatpickr" data-date-format="Y-d-m" value="{{old('dob')}}" required>
                                                            </div>



                                                            <div class="col-sm-6">
                                                                <label for="nationality" class="form-label">Nationality</label>
                                                                <select class="form-control js-example-basic-single" name="nationality_id" id="nationality_id" required>
                                                                    <option value="">Select Nationality</option>
                                                                    @if ($nationalities)
                                                                        @foreach($nationalities as $nationality)
                                                                            <option value="{{ $nationality->id }}" {{old('nationality_id') == $nationality->id ? 'selected' : '' }}>{{ $nationality->name }} </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="identification" class="form-label">Identification (Passport Number/ID Number)</label>
                                                                <input type="text" class="form-control" id="identification" name="identification" value="43173039Q47" placeholder="Enter your identification/passport number" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <div class="d-flex align-items-start gap-3 mt-4">
                                                            <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-bill-address-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next</button>
                                                        </div>

                                                </div>
                                                <!-- end tab pane -->
                                                <div class="tab-pane fade" id="v-pills-bill-address" role="tabpanel" aria-labelledby="v-pills-bill-address-tab">
                                                    <div>
                                                        <h5>Contact Info</h5>
                                                        <p class="text-muted"></p>
                                                    </div>

                                                    <div>
                                                        <div class="row g-3">
                                                            <div class="col-sm-6">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter practitioner email" value="{{old('email')}}">
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="mobile" class="form-label">Mobile Number</label>
                                                                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter practitioner number" value="{{old('mobile')}}">
                                                            </div>

                                                            <div class="col-12">
                                                                <label for="address" class="form-label">Address</label>
                                                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter practitioner physical address" value="{{old('address')}}">
                                                            </div>


                                                            <div class="col-sm-6">
                                                                <label for="nationality" class="form-label">Country</label>
                                                                <select class="form-control js-example-basic-single" name="country_id" id="nationality_id" required>
                                                                    <option value="">Select Country</option>
                                                                    @if ($nationalities)
                                                                        @foreach($nationalities as $nationality)
                                                                            <option value="{{ $nationality->id }}" {{old('country_id') == $nationality->id ? 'selected' : '' }}>{{ $nationality->name }} </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="mobile" class="form-label">Province</label>
                                                                <select class="form-control js-example-basic-single" name="province_id" id="province_id" required>
                                                                    <option value="">Select Province</option>
                                                                    @if ($provinces)
                                                                        @foreach($provinces as $province)
                                                                            <option value="{{ $province->id }}" {{old('province_id') == $province->id ? 'selected' : '' }}>{{ $province->name }} </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label for="mobile" class="form-label">City</label>
                                                                <select class="form-control js-example-basic-single" name="city_id" id="city_id" required>
                                                                    <option value="">Select City</option>
                                                                    @if ($cities)
                                                                        @foreach($cities as $city)
                                                                            <option value="{{ $city->id }}" {{old('city_id') == $city->id ? 'selected' : '' }} >{{ $city->name }} </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button type="button" class="btn btn-light btn-label previestab" data-previous="v-pills-bill-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back </button>
                                                        <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="v-pills-payment-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next</button>
                                                    </div>
                                                </div>
                                                <!-- end tab pane -->
                                                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
                                                    <div>
                                                        <h5>Profession info</h5>
                                                        <p class="text-muted">Please select a profession you are studying for or you want to register for.</p>
                                                    </div>

                                                    <div>
                                                        <div class="col-sm-6">
                                                            <label for="mobile" class="form-label">Profession</label>
                                                            <select class="form-control js-example-basic-single" name="profession_id" id="profession_id" required>
                                                                <option value="">Select Profession</option>
                                                                @if ($professions)
                                                                    @foreach($professions as $profession)
                                                                        <option value="{{ $profession->id }}" {{old('profession_id') == $profession->id ? 'selected' : '' }} >{{ $profession->name }} </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <button type="button" class="btn btn-light btn-label previestab" data-previous="v-pills-bill-address-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back </button>
                                                        <button type="submit" class="btn btn-success btn-label right ms-auto " ><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i> Finish</button>
                                                    </div>
                                                </div>
                                    </div>
                                    <!-- end tab content -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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


