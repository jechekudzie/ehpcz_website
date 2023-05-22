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
                                <a href="{{url('/practitioners/professions/'.$practitioner->id.'/create')}}"
                                   class="btn btn-soft-danger">Add Profession</a>
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
                                            <input class="form-check-input" type="checkbox" id="checkAll"
                                                   value="option">
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="title">Application category</th>
                                    <th class="sort" data-sort="full_name">Application</th>
                                    <th class="sort" data-sort="id_number">Reference</th>
                                    <th class="sort" data-sort="profession">Status</th>
                                    <th class="sort" data-sort="profession">Attention</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                @if($practitioner->practitioner_applications)
                                    @foreach($practitioner->practitioner_applications as $practitioner_application)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                           value="option1">
                                                </div>
                                            </th>
                                            <td class="title">{{$practitioner_application->application_category->name}}</td>
                                            <td class="title">{{$practitioner_application->application->name}}</td>
                                            <td class="title">

                                                @if($practitioner_application->application->id == 1)
                                                    {{\App\Models\PractitionerProfessionQualification::find($practitioner_application->reference)->practitioner_profession->profession->name}}
                                                    ({{\App\Models\PractitionerProfessionQualification::find($practitioner_application->reference)->qualification->name}}
                                                    )
                                                @endif

                                            </td>
                                            <td class="title">{{$practitioner_application->application_status->name}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 ms-4">
                                                        <ul class="list-inline {{--tasks-list-menu--}} mb-0">
                                                            @if($practitioner_application->application->id == 1)
                                                                <li class="list-inline-item"><a
                                                                        href="{{url('/practitioners/applications/'.$practitioner_application->id)}}/show"><i
                                                                            class="ri-eye-fill align-bottom me-2 "></i></a>
                                                                </li>
                                                            @endif

                                                                @if($practitioner_application->application->id == 2)
                                                                    <li class="list-inline-item"><a
                                                                            href="{{url('/practitioners/applications/'.$practitioner_application->id)}}/renewal"><i
                                                                                class="ri-eye-fill align-bottom me-2 "></i></a>
                                                                    </li>
                                                                @endif

                                                            <li class="list-inline-item">
                                                                <a class="remove-item-btn" data-bs-toggle="modal"
                                                                   href="#deleteOrder">
                                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
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


@stop



@push('scripts')

@endpush
