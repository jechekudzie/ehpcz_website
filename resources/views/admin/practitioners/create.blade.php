@extends('layouts.admin')
@push('head')
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/datatables.css')}}">
@endpush

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Practitioners</h3>
                    </div>
                    <div class="col-sm-6">
                        <!-- Bookmark Start-->
                        <div class="bookmark">

                        </div>
                        <!-- Bookmark Ends-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 project-list">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6 p-0">
                                <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                                    <li><h4>Practitioners</h4></li>
                                </ul>
                            </div>
                            <div class="media-body text-end">
                                <div class="d-inline-flex">
                                    <a href="{{url('/admin/practitioners')}}" class="btn btn-primary">
                                        <i style="color:white;" data-feather="arrow-left"></i>Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Zero Configuration  Starts-->
                <div class="col-sm-12 col-xl-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h5>Add new</h5>
                                </div>
                                <div class="card-body">
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

                                        <form method="post" action="{{url('/admin/practitioners')}}" class="needs-validation"
                                              novalidate="">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationCustom04">Title</label>
                                                    <select name="title_id" class="form-select"
                                                            id="validationCustom04"
                                                            required="">
                                                        <option value="">Choose...</option>
                                                        @foreach($titles as $title)
                                                            <option value="{{$title->id}}">{{$title->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Please select a title.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationCustom04">Gender</label>
                                                    <select name="gender_id"
                                                            class="form-select"
                                                            id="validationCustom04"
                                                            required="">
                                                        <option value="">Choose...</option>
                                                        @foreach($genders as $gender)
                                                            <option
                                                                value="{{$gender->id}}">{{$gender->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Please select a gender.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationCustom01">Identification</label>
                                                    <input name="identification"
                                                           class="form-control digits"
                                                           type="text" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>

                                            <div class="mb-3"></div>
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationCustom01">First name</label>
                                                    <input name="first_name"
                                                           class=" form-control "
                                                           type="text"
                                                           required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationCustom01">Middle name</label>
                                                    <input name="middle_name"
                                                           class="form-control "
                                                           type="text"
                                                    >
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationCustom01">Last name</label>
                                                    <input name="last_name"
                                                           class=" form-control"
                                                           type="text"
                                                           required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>

                                            </div>
                                            <div class="mb-3"></div>
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationCustom04">Nationality</label>
                                                    <select name="nationality_id" class="form-select"
                                                            id="validationCustom04"
                                                            required="">
                                                        <option value="">Choose...</option>
                                                        @foreach($nationalities as $nationality)
                                                            <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Please select nationality.</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationCustom01">Date Of Birth</label>
                                                    <input name="dob"
                                                           class="datepicker-here form-control digits"
                                                           type="text"
                                                           data-language="en" data-position="top left" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>

                                            <div class="mb-3"></div>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Zero Configuration  Ends-->
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@stop

@push('scripts')
    <!-- Plugins JS start-->
    <script src="{{asset('../assets/js/form-wizard/form-wizard.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Plugins JS start-->
    <script src="{{asset('../assets/js/form-validation-custom.js')}}"></script>
    <!-- Plugins JS Ends-->
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

    <!-- Plugins JS start-->
    <script src="{{asset('../assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('../assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('../assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('../assets/js/tooltip-init.js')}}"></script>
    <!-- Plugins JS Ends-->

@endpush
