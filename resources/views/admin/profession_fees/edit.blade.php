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
                        {{-- <h3>Professional Qualifications</h3>--}}
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
                                    <li><h4>{{$professionFee->profession->name}} Fees</h4></li>
                                </ul>
                            </div>
                            <div class="media-body text-end">
                                <div class="d-inline-flex">
                                    <a href="{{url('/admin/profession_fees/'.$professionFee->profession->id.'/index')}}"
                                       class="btn
                                    btn-primary">
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
                                    <div class="row">

                                                <div class="col-md-4">
                                                    <h5>{{$professionFee->register_category->name}}
                                                        ({{$professionFee->register_category->description}})</h5>
                                                    <form method="post" action="{{url('/admin/profession_fees/'
                                    .$professionFee->id.'/update')}}" enctype="multipart/form-data"
                                                          class="theme-form">
                                                        @method('PATCH')
                                                        @csrf

                                                        <div class="mb-3">
                                                            <label class="col-form-label pt-0"
                                                                   for="exampleInputEmail1">Registration fee</label>
                                                            <input class="form-control" id="exampleInputEmail1"
                                                                   type="text"
                                                                   name="registration"
                                                                   value="{{$professionFee->registration}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="col-form-label pt-0"
                                                                   for="exampleInputEmail1">Renewal fee</label>
                                                            <input class="form-control" id="exampleInputEmail1"
                                                                   type="text"
                                                                   name="renewal"
                                                                   value="{{$professionFee->renewal}}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="col-form-label pt-0"
                                                                   for="exampleInputEmail1">Application fee</label>
                                                            <input class="form-control" id="exampleInputEmail1"
                                                                   type="text"
                                                                   name="application"
                                                                   value="{{$professionFee->application}}">
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
