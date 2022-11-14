<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>AHPCZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="AHPCZ System" name="Leading Digital" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('logo/png')}}">

    <!-- Sweet Alert css-->
    <link href="{{asset('administrator/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Layout config Js -->
    <script src="{{asset('administrator/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('administrator/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('administrator/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('administrator/assets/css/app.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- custom Css-->
    <link href="{{asset('administrator/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css"/>


    @stack('head')
    <x-notyf::styles/>
    @livewireStyles
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

   @include('menu.nav')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                @yield('bread_crumb')
                <!-- end page title -->

               @yield('content')
                <!--end modal-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © AHPCZ.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Leading Digital
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!-- JAVASCRIPT -->
<script src="{{asset('administrator/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('administrator/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('administrator/assets/js/plugins.js')}}"></script>

<!-- list.js min js -->
<script src="{{asset('administrator/assets/libs/list.js/list.min.js')}}"></script>
<script src="{{asset('administrator/assets/libs/list.pagination.js/list.pagination.min.js')}}"></script>

<!-- Sweet Alerts js -->
<script src="{{asset('administrator/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<script src="{{asset('administrator/assets/js/pages/crm-companies.init.js')}}"></script>

<!-- App js -->
<script src="{{asset('administrator/assets/js/app.js')}}"></script>

@stack('scripts')


<x-notyf::scripts/>
@livewireScripts
</body>

</html>
