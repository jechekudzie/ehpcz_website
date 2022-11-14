@extends('layouts.admin')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>General</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General</li>
                        </ol>
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
        <div class="container-fluid general-widget">
            <div class="row">
                <div class="col-sm-6 col-xl-4 col-lg-6">
                    <a href="{{url('/admin/professions')}}">
                        <div class="card o-hidden border-0">
                            <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa fa-product-hunt"></i></div>
                                    <div class="media-body"><span class="m-0">Professions</span>

                                        <i class="icon-bg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-4 col-lg-6">
                    <a href="{{url('/admin/qualifications')}}">
                        <div class="card o-hidden border-0">
                            <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa
                                    fa-certificate"></i></div>
                                    <div class="media-body"><span class="m-0">Qualifications</span>

                                        <i class="icon-bg fa-certificate"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-4 col-lg-6">
                    <a href="{{url('/admin/institutions')}}">
                        <div class="card o-hidden border-0">
                            <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa
                                    fa-certificate"></i></div>
                                    <div class="media-body"><span class="m-0">Accredited Institutions</span>

                                        <i class="icon-bg fa-building"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-xl-4 col-lg-6">
                    <a href="{{url('/admin/requirement_categories')}}">
                        <div class="card o-hidden border-0">
                            <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa
                                    fa-certificate"></i></div>
                                    <div class="media-body"><span class="m-0">Requirements</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-4 col-lg-6">
                    <a href="{{url('/admin/register_categories')}}">
                        <div class="card o-hidden border-0">
                            <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa
                                    fa-certificate"></i></div>
                                    <div class="media-body"><span class="m-0">Registers</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-4 col-lg-6">
                    <a href="{{url('/admin/application_categories')}}">
                        <div class="card o-hidden border-0">
                            <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa
                                    fa-certificate"></i></div>
                                    <div class="media-body"><span class="m-0">Application categories</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-4 col-lg-6">
                    <a href="{{url('/admin/practitioners')}}" target="_blank">
                        <div class="card o-hidden border-0">
                            <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa
                                    fa-certificate"></i></div>
                                    <div class="media-body"><span class="m-0">Practitioners</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-4 col-lg-6">
                    <a href="{{url('/admin/restorations')}}">
                        <div class="card o-hidden border-0">
                            <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa
                                    fa-certificate"></i></div>
                                    <div class="media-body"><span class="m-0">Restorations</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-4 col-lg-6">
                    <a href="{{url('/admin/penalties')}}">
                        <div class="card o-hidden border-0">
                            <div class="bg-secondary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i class="fa
                                    fa-certificate"></i></div>
                                    <div class="media-body"><span class="m-0">Penalties</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@stop
