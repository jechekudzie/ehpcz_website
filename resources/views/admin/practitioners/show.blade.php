@extends('layouts.admin')
@push('head')
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/datatables.css')}}">

    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/rating.css')}}">
    <!-- Plugins css Ends-->
@endpush

@livewireStyles
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>{{$practitioner->first_name.' '.$practitioner->last_name}} </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/admin/practitioners')}}">Home</a></li>
                            <li class="breadcrumb-item active">Practitioner dashboard</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="user-profile social-app-profile">
                <div class="row">
                    <div class="col-sm-12">
                        <div style="height: 200px;" class="card profile-header">
                            <img class="img-fluid bg-img-cover" src="{{asset('banner.jpg')}}" alt="">
                            <div class="profile-img-wrrap">
                                <img class="img-fluid bg-img-cover" src="{{asset('.
                                ./assets/images/user-profile/bg-profile.jpg')}}" alt="">
                            </div>
                            <div class="userpro-box">
                                <div class="img-wrraper">
                                    <div class="avatar"><img class="img-fluid" alt="" src="../assets/images/user/7.jpg">
                                    </div>
                                    <a class="icon-wrapper" href="edit-profile.html"><i
                                            class="icofont icofont-pencil-alt-5"> </i></a>
                                </div>
                                <div class="user-designation">
                                    <div class="title"><a target="_blank" href="">
                                            <h4>{{$practitioner->first_name. ' '.$practitioner->last_name}}</h4>
                                            <h6>{{$practitioner->identification}}</h6></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  user profile first-style start-->
                    <div class="col-sm-12 box-col-12">
                        <div class="card">
                            <div class="social-tab">
                                <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="top-about"
                                                            data-bs-toggle="tab" href="#timeline" role="tab"
                                                            aria-controls="timeline" aria-selected="true">
                                            About</a></li>

                                    <li class="nav-item"><a class="nav-link" id="top-about" data-bs-toggle="tab"
                                                            href="#practitioner_contacts" role="tab"
                                                            aria-controls="practitioner_contacts"
                                                            aria-selected="false">Contacts
                                        </a></li>
                                    <li class="nav-item"><a class="nav-link" id="top-friends" data-bs-toggle="tab"
                                                            href="#qualifications" role="tab"
                                                            aria-controls="qualifications"
                                                            aria-selected="false">Qualifications</a></li>

                                    <li class="nav-item"><a class="nav-link" id="top-photos" data-bs-toggle="tab"
                                                            href="#employement" role="tab" aria-controls="employement"
                                                            aria-selected="false">Employment</a>
                                    </li>

                                    <li class="nav-item"><a class="nav-link" id="top-photos" data-bs-toggle="tab"
                                                            href="#applications" role="tab" aria-controls="applications"
                                                            aria-selected="false">Applications</a>
                                    </li>

                                    <li class="nav-item"><a class="nav-link" id="top-photos" data-bs-toggle="tab"
                                                            href="#payments" role="tab" aria-controls="payments"
                                                            aria-selected="false">Payments</a>
                                    </li>

                                    <li class="nav-item"><a class="nav-link" id="top-photos" data-bs-toggle="tab"
                                                            href="#cpds" role="tab" aria-controls="cpds"
                                                            aria-selected="false">CPDs</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session('message'))
                    <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
                        <strong>Message
                            ! </strong> {{session('message')}}
                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                    </div>
                @endif
                <div class="tab-content" id="top-tabContent">
                    <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="default-according style-1 faq-accordion job-accordion">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="p-0">
                                                        <button class="btn btn-link ps-0" data-bs-toggle="collapse"
                                                                data-bs-target="#collapseicon2" aria-expanded="true"
                                                                aria-controls="collapseicon2">About Me
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div class="collapse show" id="collapseicon2"
                                                     aria-labelledby="collapseicon2" data-parent="#accordion">
                                                    <div class="card-body post-about">
                                                        <ul>
                                                            @if($practitioner->practitioner_requirements)
                                                                @foreach($practitioner->practitioner_requirements as $identity_requirement)
                                                                    <li>
                                                                        <div class="icon"><i
                                                                                data-feather="briefcase"></i>
                                                                        </div>
                                                                        <div>
                                                                            <h5>{{$identity_requirement->requirement->name}}</h5>
                                                                            <p>{{'pending verification'}}</p>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="card">
                                    <div class="card-header social-header">
                                        <h5 class="f-w-600">Personal information<span class="pull-right"><i
                                                    data-feather="more-vertical"></i></span></h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row details-about">
                                            <div class="col-sm-4">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">First name:</h6>
                                                    <p>{{$practitioner->first_name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Middle name:</h6>
                                                    <p>{{$practitioner->middle_name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Last name:</h6>
                                                    {{$practitioner->last_name}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row details-about">
                                            <div class="col-sm-4">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Identification:</h6>
                                                    <p>{{$practitioner->identification}}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Dirt of Birth:</h6>
                                                    <p>{{$practitioner->dob}}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Nationality:</h6>
                                                    {{$practitioner->nationality->name}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row details-about">
                                            <div class="col-sm-4">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Gender:</h6>
                                                    <p>{{$practitioner->gender->name}}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <hr/>
                                        <div class="row details-about">
                                            <div class="pro-group pb-0">
                                                <div class="">
                                                    <a class="btn btn-primary m-r-10" href="">
                                                        <i class="fa fa-pencil"></i>Edit Personal info
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="practitioner_contacts" role="tabpanel" aria-labelledby="about">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="card">
                                    <div class="card-header social-header">
                                        <h5 class="f-w-600">Contact information<span class="pull-right"><i
                                                    data-feather="more-vertical"></i></span></h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row details-about">
                                            <div class="col-sm-4">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Physical address: </h6>
                                                    <p>
                                                        @if($practitioner->practitioner_contact)
                                                            {{$practitioner->practitioner_contact->physical_address}}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Province:</h6>
                                                    <p>
                                                        @if($practitioner->practitioner_contact)
                                                            @if($practitioner->practitioner_contact->province)
                                                                {{$practitioner->practitioner_contact->province->name}}
                                                            @endif
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">City:</h6>
                                                    <p>
                                                        @if($practitioner->practitioner_contact)
                                                            @if($practitioner->practitioner_contact->city)
                                                                {{$practitioner->practitioner_contact->city->name}}
                                                            @endif
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row details-about">
                                            <div class="col-sm-4">
                                                <div class="your-details">
                                                    <h6 class="f-w-600">Email:</h6>
                                                    <p>
                                                        @if($practitioner->practitioner_contact)
                                                            {{$practitioner->practitioner_contact->email}}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Primary phone:</h6>
                                                    <p>
                                                        @if($practitioner->practitioner_contact)
                                                            {{$practitioner->practitioner_contact->primary_phone}}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="your-details your-details-xs">
                                                    <h6 class="f-w-600">Secondary phone:</h6>
                                                    <p>
                                                        @if($practitioner->practitioner_contact)
                                                            {{$practitioner->practitioner_contact->secondary_phone}}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row details-about">
                                            <div class="pro-group pb-0">
                                                <div class="">
                                                    @if($practitioner->practitioner_contact == null)
                                                        <a class="btn btn-primary m-r-10" href="{{url
                                                        ('/admin/practitioner_contacts/'.$practitioner->id
                                                        .'/create')
                                                        }}">
                                                            <i class="fa fa-plus"></i> Add practitioner_contacts
                                                        </a>
                                                    @else
                                                        <a class="btn btn-primary m-r-10" href="{{url
                                                        ('/admin/practitioner_contacts/'.$practitioner->practitioner_contact->id
                                                        .'/edit')
                                                        }}">
                                                            <i class="fa fa-pencil"></i>Edit practitioner_contacts
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="qualifications" role="tabpanel" aria-labelledby="friends">
                        <div class="row">
                            <div class="row details-about">
                                <div class="pro-group pb-0">
                                    <div class="">
                                        <a class="btn btn-primary m-r-10" href="{{url
                                        ('/admin/practitioner_professions/'.$practitioner->id.'/add_profession')}}">
                                            <i class="fa fa-plus"></i> Add Profession
                                        </a>
                                    </div>
                                </div>
                                <hr/>
                                <br/>
                            </div>
                            <hr/>
                            @if($practitioner->practitioner_professions != null)
                                @foreach($practitioner->practitioner_professions as $practitioner_profession)
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="default-according style-1 faq-accordion job-accordion">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="p-0">
                                                                <button class="btn btn-link ps-0"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseicon{{$practitioner_profession->id}}"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseicon2">
                                                                    @if($practitioner_profession->profession)
                                                                        {{$practitioner_profession->profession->name}}
                                                                    @endif
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        <div class="collapse show"
                                                             id="collapseicon{{$practitioner_profession->id}}"
                                                             aria-labelledby="collapseicon2" data-parent="#accordion">
                                                            <div class="card-body post-about">
                                                                <ul>
                                                                    @foreach($practitioner_profession->practitioner_qualifications as $practitioner_qualification)
                                                                        <li>
                                                                            <div>
                                                                            <span
                                                                                class="badge badge-primary
                                                                                pull-right">Pending approval</span>
                                                                                <h5>{{$practitioner_qualification->accredited_institution->professional_qualification->name}}</h5>
                                                                                <p style="color: black;">

                                                                                    {{date("d F Y", strtotime
                                                                                    ($practitioner_qualification->commencement_date))}}
                                                                                    - {{date("d F Y", strtotime($practitioner_qualification->completion_date))}}</p>
                                                                            </div>
                                                                        </li>
                                                                        <br/>
                                                                        <br/>
                                                                        <a class="btn btn-success btn-sm" href="{{url
                                                                        ('/admin/practitioner_qualifications/'
                                                                        .$practitioner_qualification->id.'/show')}}">
                                                                            View
                                                                        </a>
                                                                    @endforeach

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a class="btn btn-primary m-r-10" href="{{url
                                                            ('/admin/practitioner_qualifications/'.$practitioner_profession->id
                                                            .'/create')}}"
                                                        >
                                                            <i class="fa fa-plus"></i> Add qualification
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="employement" role="tabpanel" aria-labelledby="photos">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="card">
                                            <div class="card-header social-header">
                                                <h5 class="f-w-600">Employment information<span class="pull-right"><i
                                                            data-feather="more-vertical"></i></span></h5>
                                            </div>
                                            <div class="card-body pt-0">
                                                @if($practitioner->practitioner_employments)
                                                    @foreach($practitioner->practitioner_employments as $practitioner_employment)
                                                        <div class="row details-about">
                                                            <div class="col-sm-4">
                                                                <div class="your-details">
                                                                    <h6 class="f-w-600">Employer/Company: </h6>
                                                                    <p>
                                                                        @if($practitioner_employment)
                                                                            {{$practitioner_employment->name}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <div class="your-details your-details-xs">
                                                                    <h6 class="f-w-600">Employment Position:</h6>
                                                                    <p>
                                                                        @if($practitioner_employment)
                                                                            {{$practitioner_employment->employment_position}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="your-details your-details-xs">
                                                                    <h6 class="f-w-600">Contact Person:</h6>
                                                                    <p>
                                                                        @if($practitioner_employment)
                                                                            {{$practitioner_employment->contact_person}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row details-about">
                                                            <div class="col-sm-4">
                                                                <div class="your-details">
                                                                    <h6 class="f-w-600">Physical address: </h6>
                                                                    <p>
                                                                        @if($practitioner_employment)
                                                                            {{$practitioner_employment->physical_address}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="your-details your-details-xs">
                                                                    <h6 class="f-w-600">Province:</h6>
                                                                    <p>
                                                                        @if($practitioner_employment)
                                                                            @if($practitioner_employment->province)
                                                                                {{$practitioner_employment->province->name}}
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="your-details your-details-xs">
                                                                    <h6 class="f-w-600">City:</h6>
                                                                    <p>
                                                                        @if($practitioner_employment)
                                                                            @if($practitioner_employment->city)
                                                                                {{$practitioner_employment->city->name}}
                                                                            @endif
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row details-about">
                                                            <div class="col-sm-4">
                                                                <div class="your-details">
                                                                    <h6 class="f-w-600">Email:</h6>
                                                                    <p>
                                                                        @if($practitioner_employment)
                                                                            {{$practitioner_employment->email}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="your-details your-details-xs">
                                                                    <h6 class="f-w-600">Primary phone:</h6>
                                                                    <p>
                                                                        @if($practitioner_employment)
                                                                            {{$practitioner_employment->primary_phone}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="your-details your-details-xs">
                                                                    <h6 class="f-w-600">Secondary phone:</h6>
                                                                    <p>
                                                                        @if($practitioner_employment)
                                                                            {{$practitioner_employment->secondary_phone}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                        <div class="row details-about">
                                                            <div class="pro-group pb-0">
                                                                <div class="">
                                                                    @if($practitioner_employment == null)
                                                                        <a class="btn btn-primary m-r-10" href="{{url
                                                        ('/admin/practitioner_employments/'.$practitioner->id
                                                        .'/create')
                                                        }}">
                                                                            <i class="fa fa-plus"></i> Add practitioner
                                                                            employment
                                                                        </a>
                                                                    @else
                                                                        <a class="btn btn-primary m-r-10" href="{{url
                                                        ('/admin/practitioner_employments/'
                                                        .$practitioner_employment->id
                                                        .'/edit')
                                                        }}">
                                                                            <i class="fa fa-pencil"></i>Edit
                                                                            practitioner
                                                                            employment
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="applications" role="tabpanel" aria-labelledby="photos">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <h5>Applications</h5>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display" id="basic-1">
                                                    <thead>
                                                    <tr>
                                                        <th>Period</th>
                                                        <th>Application category</th>
                                                        <th>Application</th>
                                                        <th>Make payment</th>
                                                        <th>View</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody
                                                    @if($practitioner->practitioner_applications->count() > 0)
                                                        @foreach($practitioner->practitioner_applications as $practitioner_application)
                                                            <tr>
                                                                <td>{{$practitioner_application->year}}</td>
                                                                <td>{{$practitioner_application->application_category->name}}</td>
                                                                <td>
                                                                    @if($practitioner_application->application_category_id == 1 || $practitioner_application->application_category_id == 2 )
                                                                        {{\App\Models\PractitionerQualification::find
                                                                        ($practitioner_application->reference)
                                                                        ->accredited_institution->professional_qualification->name}}
                                                                    @endif
                                                                </td>
                                                                <td>

                                                                    <a href="{{url('/admin/payments/'
                                                                    .$practitioner_application->id.'/create')
                                                                    }}">Make payment</a>
                                                                </td>
                                                                <td>
                                                                    @if($practitioner_application->application_category_id == 1 || $practitioner_application->application_category_id == 2 )
                                                                        <a href="{{url('/admin/practitioner_qualifications/'
                                                                    .$practitioner_application->reference.'/show')

                                                                    }}">View</a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @endif
                                                            </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="photos">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row details-about">
                                    <div class="pro-group pb-0">
                                        <div class="">
                                            <a class="btn btn-primary m-r-10" href="{{url
                                                        ('/admin/payments/'.$practitioner->id.'/application_categories') }}">
                                                <i class="fa fa-plus"></i> Make Payment
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <br/>
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <h5>Payments</h5>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display" id="basic-3">
                                                    <thead>
                                                    <tr>
                                                        <th>Period</th>
                                                        <th>Payment for</th>
                                                        <th>Amount invoiced</th>
                                                        <th>Amount paid</th>
                                                        <th>Balance</th>
                                                        <th>Payment channel</th>
                                                        <th>POP</th>
                                                        <th>View</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody
                                                    @if($practitioner->payments->count() > 0)
                                                        @foreach($practitioner->payments as $payment)
                                                            <tr>
                                                                <td>{{$payment->year}}</td>
                                                                <td>{{$payment->application_category->name}}</td>
                                                                <td>${{$payment->amount_invoiced}}</td>
                                                                <td>${{$payment->amount_paid}}</td>
                                                                <td>${{$payment->balance}}</td>
                                                                <td>{{$payment->payment_channel->name}}</td>
                                                                <td>
                                                                    @if($payment->payment_channel_id == 5)
                                                                        {{$payment->proof_of_payment}}
                                                                        {{--<a href="{{url($payment->poll_url)}}"
                                                                           target="_blank">Check status
                                                                        </a>--}}
                                                                    @else
                                                                        <a href="{{url($payment->proof_of_payment)}}"
                                                                           target="_blank">POP
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{url('/admin/practitioner_qualifications/'
                                                                    .$payment->id.'/index')
                                                                    }}">View</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @endif
                                                            </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cpds" role="tabpanel" aria-labelledby="photos">
                        <div class="row">
                            <div class="col-sm-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@stop
@livewireScripts

@push('scripts')
    <script src="{{asset('../assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('../assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('../assets/js/rating/jquery.barrating.js')}}"></script>
    <script src="{{asset('../assets/js/rating/rating-script.js')}}"></script>
    <script src="{{asset('../assets/js/slick-slider/slick.min.js')}}"></script>
    <script src="{{asset('../assets/js/slick-slider/slick-theme.js')}}"></script>
    <!-- Plugins JS Ends-->
@endpush
