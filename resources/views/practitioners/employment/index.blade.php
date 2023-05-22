<?php
/**
 * Created by PhpStorm for ehpcz
 * User: VinceGee
 * Date: 8/3/2022
 * Time: 10:31 AM
 */ ?>
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
                            <h5 class="card-title mb-0 flex-grow-1">Employment History</h5>
                            <div class="flex-shrink-0">
                                <a href="{{url('/practitioners/employment/'.$practitioner->id.'/create')}}"
                                   class="btn btn-soft-danger">Add Employment</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="card-body border border-dashed border-end-0 border-start-0">


                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-9">
                                    <div class="card">
                                        <div class="card-body">
                                            @foreach($practitioner->practitioner_employments as $employment)
                                                <div class="row">
                                                    <div class="col-6 col-md-4">
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <p class="mb-1">Company :</p>
                                                                <h6 class="text-truncate mb-0">{{$employment->company}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-6 col-md-4">
                                                        <div class="d-flex mt-4">

                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <p class="mb-1">Contact Person :</p>
                                                                <h6 class="text-truncate mb-0">{{$employment->contact_person}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--end col-->

                                                    <div class="col-6 col-md-4">
                                                        <div class="d-flex mt-4">

                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <p class="mb-1">Company Address :</p>
                                                                <h6 class="text-truncate mb-0">{{$employment->company_address}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 col-md-4">
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <p class="mb-1">Company Phone :</p>
                                                                <h6 class="text-truncate mb-0">{{$employment->company_phone}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-6 col-md-4">
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <p class="mb-1">Company Email :</p>
                                                                <h6 class="text-truncate mb-0">{{$employment->company_email}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--end col-->
                                                    <div class="col-md-12">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <a href="{{url('/practitioners/employment/'.$employment->id.'/edit')}}"
                                                               class="btn btn-primary">Edit
                                                            </a>
                                                            <button type="button" class="btn btn-soft-success" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalgrid">Delete
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--end row-->
                                                <hr>
                                                <div class="modal fade" id="exampleModalgrid" tabindex="-1"
                                                     aria-labelledby="exampleModalgridLabel"
                                                     aria-modal="true">
                                                    <div class="modal-dialog  modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="exampleModalgridLabel">Delete employment record for company: {{$employment->company}}

                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{url('/practitioners/employment/'.$employment->id.'/destroy')}}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <div class="row g-3">
                                                                        <p>Are you sure you want to delete this
                                                                            employment record for
                                                                            company {{$employment->company}}</p>

                                                                        <div class="col-lg-12">
                                                                            <div
                                                                                class="hstack gap-2 justify-content-end">

                                                                                <button type="submit"
                                                                                        class="btn btn-primary">Yes
                                                                                </button>
                                                                                <button type="button"
                                                                                        class="btn btn-light"
                                                                                        data-bs-dismiss="modal">No
                                                                                </button>
                                                                            </div>
                                                                        </div><!--end col-->
                                                                    </div><!--end row-->
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!--end card-body-->
                                    </div><!-- end card -->

                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                    <!--end tab-content-->
                </div>
            </div>
            <!--end col-->
        </div>
        @stop



        @push('scripts')
            <script src="{{asset('administrator/assets/js/pages/form-wizard.init.js')}}"></script>
    @endpush


