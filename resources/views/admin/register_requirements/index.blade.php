@extends('layouts.admin')
@push('head')
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/datatables.css')}}">
@endpush

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">

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
                                    <li><h4>{{$registerCategory->name}} Requirements</h4></li>
                                </ul>
                            </div>
                            <div class="media-body text-end">
                                <div class="d-inline-flex">
                                    <a href="{{url('/admin/register_requirements/'.$registerCategory->id.'/create')}}"
                                       class="btn
                                    btn-primary" >
                                            <i style="color:white;" data-feather="plus-square"></i>Add new
                                    </a>
                                </div>
                                <div class="d-inline-flex">
                                    <a href="{{url('/admin/register_categories')}}" class="btn btn-primary">
                                        <i style="color:white;" data-feather="arrow-left"></i>Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Zero Configuration  Starts-->
                <div class="col-sm-12">
                    <div class="card">
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
                            <div class="table-responsive">
                                <table class="display" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th>Register</th>
                                        <th>Requirement</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($registerCategory->register_requirements as $registerCategory_requirement)
                                        <tr>
                                            <td>{{$registerCategory_requirement->register_category->name}}</td>
                                            <td>{{$registerCategory_requirement->requirement->name}}</td>
                                            <td>
                                                <a href="{{url('/admin/register_requirements/'.$registerCategory_requirement->id
                                                .'/edit')
                                                }}">Edit</a>
                                            </td>
                                            <td><a href="{{url('/admin/register_requirements/'.$registerCategory_requirement->id
                                            .'/show')
                                            }}">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
