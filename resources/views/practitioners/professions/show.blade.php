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
                            <h5 class="card-title mb-0 flex-grow-1">{{$practitionerProfession->profession->name}}</h5>

                            <a style="margin: 5px;"
                               href="{{url('/practitioners/professions/'.$practitionerProfession->practitioner_id.'/index')}}"
                               class="btn btn-danger">
                                Back
                            </a>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalgrid">
                                Add qualifications
                            </button>
                        </div>
                    </div>
                    @if($errors->any())
                        @include('errors')
                    @endif
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{url('/practitioners/professions/'.$practitionerProfession->practitioner_id.'/index')}}"
                                       class="btn btn-primary">
                                        Transfer to new register
                                    </a>
                                    <div class="pt-3 border-top border-top-dashed mt-4">
                                        <div class="table-responsive table-card mb-4">
                                            <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                                                <thead class="table-light text-muted">
                                                <tr>
                                                    <th class="sort" data-sort="register">Register</th>
                                                    <th class="sort" data-sort="registration_number">Registration
                                                        identification
                                                    </th>
                                                    <th class="sort" data-sort="status">Status</th>
                                                    <th class="sort" data-sort="view">View</th>
                                                </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                @if($practitionerProfession->practitioner_profession_registers->count() > 0)
                                                    @foreach($practitionerProfession->practitioner_profession_registers->sortByDesc('is_active') as $practitioner_profession_register)
                                                        <tr>
                                                            <td class="register">{{$practitioner_profession_register->register_category->name}}</td>
                                                            <td class="registration_number">{{$practitioner_profession_register->registration_number}}</td>
                                                            <td class="status">
                                                                @if($practitioner_profession_register->is_active == 0)
                                                                    <div class="badge bg-danger fs-12">inactive</div>
                                                                @else
                                                                    <div class="badge bg-success fs-12">active</div>
                                                                @endif
                                                            </td>
                                                            <td class="view">
                                                                <a href="">
                                                                    <i data-feather="eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                    </div>
                                    <!--qualifications list-->
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="font-weight: bold;font-size: larger;" class="card-title mb-3">
                                        Professional Qualifications</h5>
                                    @if($practitionerProfession->practitioner_profession_qualifications)
                                        @foreach($practitionerProfession->practitioner_profession_qualifications as $practitioner_profession_qualification)
                                            <h5 class="card-title mb-3">
                                                @if($practitioner_profession_qualification->qualification){{$practitioner_profession_qualification->qualification->name}}@endif
                                            </h5>

                                            <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Professional qualification :</p>
                                                            <h6 class="text-truncate mb-0">@if($practitioner_profession_qualification->qualification)
                                                                    {{$practitioner_profession_qualification->qualification->name}}
                                                                @endif
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">

                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Accredited Institution :</p>
                                                            <h6 class="text-truncate mb-0">{{$practitioner_profession_qualification->accredited_institution->institution->name}}</h6>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--end col-->

                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">

                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Qualification category :</p>
                                                            <h6 class="text-truncate mb-0">
                                                                {{$practitioner_profession_qualification->qualification_category->name}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <!--end col-->
                                                <div class="col-6 col-md-4">
                                                    <div class="d-flex mt-4">
                                                        <div class="flex-shrink-0 avatar-xs align-self-center me-3">

                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="mb-1">Application status :</p>
                                                            <a href="#"
                                                               class="fw-semibold">
                                                                {{$practitioner_profession_qualification->application_status->name}}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             @livewire('qualification-requirements.requirement-document',
                                             ['practitioner_profession_qualification' =>
                                             $practitioner_profession_qualification])

                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
                 aria-modal="true">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"
                                id="exampleModalgridLabel">{{$practitionerProfession->profession->name}} - add
                                qualification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form
                                action="{{url('/practitioners/qualifications/'.$practitionerProfession->id.'/store')}}"
                                method="post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="title" class="form-label">Qualification Category</label>
                                        <select class="form-control js-example-basic-single"
                                                name="qualification_category_id" id="qualification_category"
                                                onchange="myFunction()"
                                                required>
                                            <option value="">Choose Category</option>

                                            @foreach($qualification_categories as $title)
                                                <option value="{{ $title->id }}">{{ $title->name }} </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <input type="hidden" name="profession_id" id="profession_id"
                                           value="{{$practitionerProfession->profession->id}}">

                                    <div id="pq_div" style="display: none;" class="col-sm-6">
                                        <label for="title" class="form-label">Professional Qualifications</label>
                                        <select class="form-control js-example-basic-single" name="qualification_id"
                                                id="professional_qualifications" required>
                                            <option value=''>Choose Qualifications</option>

                                        </select>
                                    </div>


                                    <div id="accredited_institution_div" style="display: none;" class="col-sm-6">
                                        <label for="title" class="form-label">Accredited Institutions</label>
                                        <select class="form-control js-example-basic-single"
                                                name="accredited_institution_id" id="accredited_institutions" required>
                                            <option value=''>Choose Institutions</option>

                                        </select>
                                    </div>


                                    <div id="pq_name_div" style="display: none;" class="col-xxl-6">
                                        <div>
                                            <label for="lastName" class="form-label">Professional Qualification
                                                name</label>
                                            <input type="text" class="form-control"
                                                   name="qualification_name">
                                        </div>
                                    </div><!--end col-->


                                    <div id="institution_div" style="display: none;" class="col-xxl-6">
                                        <div>
                                            <label for="lastName" class="form-label">University/College</label>
                                            <input type="text" class="form-control"
                                                   name="institution_name">
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-sm-6">
                                        <label for="dob" class="form-label">Commencement date </label>
                                        <input type="text" class="form-control flatpickr-input active"
                                               id="commencement_date" name="commencement_date" data-provider="flatpickr"
                                               data-date-format="Y -m-d" readonly="readonly" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="dob" class="form-label">Completion date</label>
                                        <input type="text" class="form-control flatpickr-input active"
                                               id="completion_date" name="completion_date" data-provider="flatpickr"
                                               data-date-format="Y -m-d" readonly="readonly" required>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @stop



        @push('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="{{asset('js/functions.js')}}"></script>
            <script src="{{asset('administrator/assets/js/pages/modal.init.js')}}"></script>


            <script src="{{asset('administrator/assets/js/pages/form-wizard.init.js')}}"></script>
            <script src="{{asset('administrator/assets/js/pages/form-pickers.init.js')}}"></script>

    @endpush
