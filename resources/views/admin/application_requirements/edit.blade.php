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
                        <h3>{{$applicationRequirement->name}} </h3>
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
                                    <li><h4>Application </h4></li>
                                </ul>
                            </div>
                            <div class="media-body text-end">
                                <div class="d-inline-flex">
                                    <a href="{{url('/admin/application_requirements')}}" class="btn btn-primary">
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
                                    <h5>Edit {{$applicationRequirement->name}}</h5>
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
                                    <form method="post" action="{{url('/admin/application_requirements/'
                                    .$applicationRequirement->id.'/update')}}"
                                          enctype="multipart/form-data"
                                          class="theme-form">
                                        @method('PATCH')
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0" for="exampleInputEmail1">Name</label>
                                            <input class="form-control" id="exampleInputEmail1" type="text"  name="name"
                                                   placeholder="Enter application name"
                                                   value="{{$applicationRequirement->name}}">
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
