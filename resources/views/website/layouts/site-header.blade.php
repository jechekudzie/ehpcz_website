<?php
/**
 * Created by PhpStorm for ehpcz
 * User: VinceGee
 * Date: 8/4/2022
 * Time: 11:35 AM
 */ ?>
<header class="header-one">
    <div class="top-header">
        <div class="container clearfix">
            <div class="logo float-left"><a href="{{url('/')}}"><img src="{{asset('/logo.png')}}" alt=""></a></div>
            <div class="address-wrapper float-right">
                <ul>
                    <li class="address">
                        <i class="icon flaticon-placeholder"></i>
                        <h6>Address:</h6>
                        <p>14 Buckingham Rd, Eastlea, Harare </p>
                    </li>
                    <li class="address">
                        <a href="mailto:info@ehpcz.co.zw">
                        <i class="icon flaticon-multimedia"></i>
                        <h6>Mail us:</h6>

                        </a>
                    </li>
                    {{--<li class="quotes"><a href="{{url('/login')}}">Login</a></li>--}}

                </ul>
            </div> <!-- /.address-wrapper -->
        </div> <!-- /.container -->
    </div> <!-- /.top-header -->

    <div class="theme-menu-wrapper">
        <div class="container">
            <div class="bg-wrapper clearfix">
                <!-- ============== Menu Warpper ================ -->
                <div class="menu-wrapper float-left">
                    <nav id="mega-menu-holder" class="clearfix">
                        <ul class="clearfix">
                            <li class="{{ Request::is('/') ? 'active' : null }}"><a href="{{url('/')}}">Home</a></li>
                            <li><a href="#">About EHPCZ</a>
                                <ul class="dropdown">
                                    <li class="{{ Request::is('/about-ehpcz') ? 'active' : null }}"><a href="{{url('/about-ehpcz')}}">About us</a></li>
                                    <li class="{{ Request::is('/organizational-structure') ? 'active' : null }}"><a href="{{url('/organizational-structure')}}">Organizational Structure</a></li>
                                    <li class="{{ Request::is('/core-function') ? 'active' : null }}"><a href="{{url('/core-function')}}">Core Function</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Education</a>
                                <ul class="dropdown">
                                    <li class="{{ Request::is('/education-training') ? 'active' : null }}"><a href="{{url('/education-training')}}">Education & Training</a></li>
                                    <li class="{{ Request::is('/role-ehpcz') ? 'active' : null }}"><a href="{{url('/role-of-ehpcz')}}">Role of EHPCZ</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Membership</a>
                                <ul class="dropdown">
                                    <li class="{{ Request::is('/ehpcz-membership') ? 'active' : null }}"><a href="{{url('/ehpcz-membership')}}">Membership of the Council</a></li>
                                    <li class="{{ Request::is('/ehpcz-committees') ? 'active' : null }}"><a href="{{url('/ehpcz-committees')}}">Committees</a></li>
                                </ul>
                            </li>
                            <li class="{{ Request::is('/contact-ehpcz') ? 'active' : null }}"><a href="{{url('/contact-ehpcz')}}">Contact Us</a></li>
                        </ul>
                    </nav> <!-- /#mega-menu-holder -->
                </div> <!-- /.menu-wrapper -->

                <div class="right-widget float-right">
                    <ul>
                        <li class="social-icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </li>
                        <li class="search-option">
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search" aria-hidden="true"></i></button>
                                <form action="#" class="dropdown-menu">
                                    <input type="text" Placeholder="Enter Your Search">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div> <!-- /.right-widget -->
            </div> <!-- /.bg-wrapper -->
        </div> <!-- /.container -->
    </div> <!-- /.theme-menu-wrapper -->
</header> <!-- /.header-one -->
