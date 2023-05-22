<?php
/**
 * Project: council_system
 * User: user
 * Date: 27/07/2022
 * Time: 16:23
 */
?>

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
                            <h5 class="card-title mb-0 flex-grow-1">{{$practitionerProfession->profession->name}}: Choose Applicant Register</h5>
                            <div class="flex-shrink-0">
                                <a href="{{url('/practitioners/professions/'.$practitionerProfession->id.'/index')}}"
                                   class="btn btn-soft-danger">Back To Professions</a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">

                                    <form action="{{url('/practitioners/profession_register_categories/'.$practitionerProfession->id.'/store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="title"
                                                               class="form-label">Choose a registers</label>
                                                        <select name="register_category_id"
                                                                class="form-control js-example-basic-single"
                                                                id="register_category_id" required>
                                                            <option value="">Select register</option>
                                                            @foreach($register_categories as $register_category)
                                                                <option
                                                                    value="{{ $register_category->id }}">{{ $register_category->name }} </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->any())
                                                            <span style="color: red;">@error('register_category_id'){{$message}}@enderror</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content">
                                                <button type="submit" class="btn btn-success">Add Register</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-5 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                   colors="primary:#405189,secondary:#f06548"
                                   style="width:90px;height:90px"></lord-icon>
                        <div class="mt-4 text-center">
                            <h4>You are about to delete a practitioner ?</h4>
                            <p class="text-muted fs-14 mb-4">Deleting the practitioner will remove all of
                                their information from our database.</p>
                            <div class="hstack gap-2 justify-content-center remove">
                                <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none"
                                        data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close
                                </button>
                                <button class="btn btn-danger" id="delete-record">Yes, Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end delete modal -->

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
