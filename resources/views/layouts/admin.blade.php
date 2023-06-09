<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('../assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('../assets/images/favicon.png')}}" type="image/x-icon">
    <title>AHPCZ</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/fontawesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/owlcarousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/whether-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/select2.css')}}">

    @stack('head')
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('../assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/responsive.css')}}">
</head>
<body>
<!-- Loader starts-->

<!-- Loader ends-->
<!-- page-wrapper Start-->
<!-- page-wrapper Start-->

<div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-main-header close_icon">
        <div class="main-header-right row m-0">
            <div class="main-header-left">
                <div class="logo-wrapper"><a href="{{url('#')}}"><img class="img-fluid" src="{{asset('logo.png')}}" alt=""></a></div>
                <div class="dark-logo-wrapper"><a href="{{url('#')}}"><img class="img-fluid" src="{{asset('logo.png')}}" alt=""></a></div>

                <div class="toggle-sidebar">
                    <i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i>
                </div>
            </div>
            <div class="left-menu-header col">
                <ul>
                    <li>
                        <form class="form-inline search-form">
                            <div class="search-bg"><i class="fa fa-search"></i>
                                <input class="form-control-plaintext" placeholder="Search here.....">
                            </div>
                        </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                    </li>
                </ul>
            </div>
            <div class="nav-right col pull-right right-menu p-0">
                <ul class="nav-menus">
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>

                    <li class="onhover-dropdown">
                        <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>
                        <ul class="notification-dropdown onhover-show-div">
                            <li>
                                <p class="f-w-700 mb-0">You have 3 Notifications<span class="pull-right badge badge-primary badge-pill">4</span></p>
                            </li>
                            <li class="noti-primary">
                                <div class="media"><span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                                    <div class="media-body">
                                        <p>Delivery processing </p><span>10 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                            <li class="noti-secondary">
                                <div class="media"><span class="notification-bg bg-light-secondary"><i data-feather="check-circle"> </i></span>
                                    <div class="media-body">
                                        <p>Order Complete</p><span>1 hour ago</span>
                                    </div>
                                </div>
                            </li>
                            <li class="noti-success">
                                <div class="media"><span class="notification-bg bg-light-success"><i data-feather="file-text"> </i></span>
                                    <div class="media-body">
                                        <p>Tickets Generated</p><span>3 hour ago</span>
                                    </div>
                                </div>
                            </li>
                            <li class="noti-danger">
                                <div class="media"><span class="notification-bg bg-light-danger"><i data-feather="user-check"> </i></span>
                                    <div class="media-body">
                                        <p>Delivery Complete</p><span>6 hour ago</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="onhover-dropdown p-0">
                        <button class="btn btn-primary-light" type="button"><a href="login_two.html"><i data-feather="log-out"></i>Log out</a></button>
                    </li>
                </ul>
            </div>
            <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div style="padding-top: 80px;"  class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        <header class="main-nav close_icon">
            <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i
                        data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{asset('../assets/images/dashboard/1.png')}}" alt="">
                <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="#">
                    <h6 class="mt-3 f-14 f-w-600">Nigel Jeche</h6></a>
                <p class="mb-0 font-roboto">Admin</p>

            </div>
            <nav>
                <div class="main-navbar">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="mainnav">
                        <ul class="nav-menu custom-scrollbar">
                            <li class="back-btn">
                                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                            </li>
                            <li class="sidebar-main-title">
                                <div>
                                    <h6>General </h6>
                                </div>
                            </li>
                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                        data-feather="home"></i><span>Administration</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="{{url('/admin')}}">Admin</a></li>
                                    <li><a href="{{url('/users')}}">Users</a></li>

                                </ul>
                            </li>


                            <li><a class="nav-link menu-title link-nav" href="support-ticket.html"><i data-feather="headphones"></i><span>Support Ticket</span></a></li>
                        </ul>
                    </div>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </div>
            </nav>
        </header>
        <!-- Page Sidebar Ends-->
       @yield('content')
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright {{date('Y')}} ©  All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Developed by Leading Digital <i class="fa fa-heart
                        font-secondary"></i></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- latest jquery-->
<!-- latest jquery-->
<script src="{{asset('../assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('../assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('../assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('../assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('../assets/js/config.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('../assets/js/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('../assets/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{asset('../assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('../assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('../assets/js/height-equal.js')}}"></script>
<script src="{{asset('../assets/js/tooltip-init.js')}}"></script>
<script src="{{asset('../assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('../assets/js/select2/select2-custom.js')}}"></script>
<!-- Theme js-->
<script src="{{asset('../assets/js/script.js')}}"></script>
{{--
<script src="{{asset('../assets/js/theme-customizer/customizer.js')}}"></script>
--}}
<!-- login js-->

@stack('scripts')
<!-- Plugins JS Ends-->

<!-- Theme js-->
<script src="{{asset('../assets/js/script.js')}}"></script>
'<!-- login js-->
<!-- Plugin used-->
</body>
</html>
