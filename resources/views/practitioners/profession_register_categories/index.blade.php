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
                        <h5 class="card-title mb-0 flex-grow-1">Professions</h5>
                        <div class="flex-shrink-0">
                            <a href="{{url('/practitioners/professions/'.$practitioner->id.'/create')}}" class="btn btn-soft-danger">Add Profession</a>
                        </div>
                    </div>
                </div>


                <div class="card-body border border-dashed border-end-0 border-start-0">
                </div>
                <!--end card-body-->
                <div class="card-body">
                    <div class="table-responsive table-card mb-4">
                        <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                            <thead class="table-light text-muted">
                            <tr>
                                <th scope="col" style="width: 40px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th>
                                <th class="sort" data-sort="title">Profession</th>
                                <th class="sort" data-sort="full_name">Qualifications</th>
                                <th class="sort" data-sort="id_number">Registration number</th>
                                <th class="sort" data-sort="profession">Status</th>
                                <th class="sort" data-sort="status">Compliance</th>
                                <th class="sort">View</th>
                                <th class="sort">Edit</th>
                                <th class="sort">Delete</th>
                            </tr>
                            </thead>
                            <tbody class="list form-check-all">
                            @if($practitioner->practitioner_professions)
                                @foreach($practitioner->practitioner_professions as $practitioner_profession)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chk_child"
                                                       value="option1">
                                            </div>
                                        </th>
                                        <td class="title">{{$practitioner_profession->profession->name}}</td>
                                        <td class="first_name">@if($practitioner_profession->qualifications){{$practitioner_profession->qualifications->count()}}@endif</td>
                                        <td class="id_number">{{$practitioner_profession->registration_number}}</td>
                                        <td class="profession">@if($practitioner_profession->application_status){{$practitioner_profession->application_status->name}}@endif</td>
                                        <td class="profession">@if($practitioner_profession->compliance_status){{$practitioner_profession->compliance_status->name}}@endif</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 ms-4">
                                                    <ul class="list-inline {{--tasks-list-menu--}} mb-0">
                                                        <li class="list-inline-item"><a
                                                                href="{{url('/practitioners/professions/'.$practitioner_profession->id)}}/show"><i
                                                                    class="ri-eye-fill align-bottom me-2 "></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{url('/practitioners/professions/'.$practitioner_profession->id)}}/edit">
                                                <i class="ri-pencil-fill align-bottom me-2 "></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{url('/practitioners/professions/'.$practitioner_profession->id)}}/edit">
                                                <i data-feather="delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <!--end table-->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                           colors="primary:#121331,secondary:#08a88a"
                                           style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 200k+ tasks We did not find any
                                    tasks for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
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
                               colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
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

@endpush
