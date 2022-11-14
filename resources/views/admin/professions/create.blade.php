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
                        <h3>Professions</h3>
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
                                    <li><h4>Professions</h4></li>
                                </ul>
                            </div>
                            <div class="media-body text-end">
                                <div class="d-inline-flex">
                                    <a href="{{url('/admin/professions')}}" class="btn btn-primary">
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
                                    <h5>Create new profession</h5>
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
                                    <form method="post" action="{{url('/admin/professions/')}}"
                                          enctype="multipart/form-data"
                                          class="theme-form">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0" for="exampleInputEmail1">Name</label>
                                            <input class="form-control" id="exampleInputEmail1" type="text" name="name"
                                                   placeholder="Enter profession name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0" for="exampleInputEmail1">Plural</label>
                                            <input class="form-control" id="exampleInputEmail1" type="text"
                                                   name="plural"
                                                   placeholder="Enter profession name">

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom04">Certificate
                                                Expiry</label>
                                            <select name="expiry" class="form-select"
                                                    id="validationCustom04"
                                                    required="">
                                                <option value="">Choose...</option>
                                                @for($m=1; $m<=12; $m++)
                                                    <option value="{{date('m',  mktime(0, 0,  0, $m))}}">
                                                        {{date('F',  mktime(0, 0, 0, $m))}}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0"
                                                   for="exampleInputEmail1">Professional Prefix</label>
                                            <input class="form-control" id="exampleInputEmail1" type="text"
                                                   name="professional_prefix"
                                                   placeholder="Enter practitioner registration prefix for this profession">


                                        </div>

                                        <div class="mb-3">
                                            <label class="col-form-label pt-0" for="exampleInputEmail1">Student
                                                Prefix</label>
                                            <input class="form-control" id="exampleInputEmail1" type="text"
                                                   name="student_prefix"
                                                   placeholder="Enter student registration prefix for this profession">

                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-primary">Submit</button>
                                            <button class="btn btn-secondary">Cancel</button>
                                        </div>
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
    <script src="{{asset('../assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('../assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endpush
