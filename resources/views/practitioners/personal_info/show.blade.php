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
                            <h5 class="card-title mb-0 flex-grow-1">Overview</h5>
                            <div class="flex-shrink-0">
                                <a href="{{url('/practitioners/'.$practitioner->id.'/edit')}}"
                                   class="btn btn-soft-danger">Edit Profile</a>
                            </div>
                        </div>
                    </div>

                    @if ($profession_count == 0)
                        <div class="col-lg-6">
                            <!-- Primary Alert -->
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong> Hi! </strong> <b>You need to add your profession and upload qualification document to complete application:  </b>
                                <br/>
                                <a href="{{url('/practitioners/professions/'.$practitioner->id.'/index')}}"> Click here to proceed</a>!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                <!-- Tab panes -->
                    <div class="card-body border border-dashed border-end-0 border-start-0">

                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-3">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Contact Info</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Mobile :</th>
                                                        <td class="text-muted">@if($practitioner->practitioner_contact){{$practitioner->practitioner_contact->mobile}}@endif</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                        <td class="text-muted">@if($practitioner->practitioner_contact){{$practitioner->practitioner_contact->email}}@endif</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Address :</th>
                                                        <td class="text-muted">@if($practitioner->practitioner_contact){{$practitioner->practitioner_contact->address}}@endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">City :</th>
                                                        <td class="text-muted">@if($practitioner->practitioner_contact){{$practitioner->practitioner_contact->city->name}}@endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Province :</th>
                                                        <td class="text-muted">@if($practitioner->practitioner_contact){{$practitioner->practitioner_contact->province->name}}@endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <br/>
                                                <div class="col-lg-12">
                                                    <div
                                                        class="hstack gap-2 justify-content-left">
                                                        <a href="{{url('/practitioners/contact/'.$practitioner->practitioner_contact->id.'/edit')}}"
                                                           class="btn btn-light">Edit
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->


                                    <!--end card-->
                                </div>
                                <!--end col-->
                                <div class="col-xxl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">About</h5>
                                            <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                            <div
                                                                class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                <i class="ri-user-2-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">First Name :</p>
                                                            <h6 class="text-truncate mb-0">{{$practitioner->first_name}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                            <div
                                                                class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                <i class="ri-user-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Middle Name :</p>
                                                            <h6 class="text-truncate mb-0">{{$practitioner->middle_name}}</h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--end col-->

                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                            <div
                                                                class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                <i class="ri-user-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Last Name :</p>
                                                            <h6 class="text-truncate mb-0">{{$practitioner->last_name}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                            <div
                                                                class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                <i class="ri-barcode-box-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">ID Number :</p>
                                                            <h6 class="text-truncate mb-0">{{$practitioner->identification}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                            <div
                                                                class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                <i class="ri-calendar-event-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Date of Birth :</p>
                                                            <h6 class="text-truncate mb-0">{{$practitioner->dob}}</h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--end col-->

                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                            <div
                                                                class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                <i class="ri-global-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Nationality :</p>
                                                            <a href="#"
                                                               class="fw-semibold">{{$practitioner->nationality->name}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                            <div
                                                                class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                <i class=" ri-time-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Joined At :</p>
                                                            <a href="#"
                                                               class="fw-semibold">{{$practitioner->created_at}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">

                                                    </div>
                                                </div>

                                                <!--end col-->

                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">

                                                    </div>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end card-body-->
                                    </div><!-- end card -->

                                </div>

                                <div class="col-xxl-3">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex border-bottom-dashed">
                                            <h4 class="card-title mb-0 flex-grow-1">Requirements</h4>
                                            <div class="flex-shrink-0">

                                            </div>
                                        </div>

                                        @livewire('practitioner-requirements.requirement-document', ['practitioner' =>
                                        $practitioner])

                                        <!-- end card body -->
                                    </div>

                                </div>
                                <!--end col-->
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


