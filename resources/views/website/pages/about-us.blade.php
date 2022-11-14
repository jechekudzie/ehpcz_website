<?php
/**
 * Created by PhpStorm for ehpcz
 * User: VinceGee
 * Date: 8/4/2022
 * Time: 12:30 PM
 */ ?>

@extends('website.layouts.main')

@section('template_title')
    About EHPCZ
@endsection

@section('content')
    <!--
			=============================================
				Theme Inner Banner
			==============================================
			-->
    <div class="theme-inner-banner section-spacing">
        <div class="overlay">
            <div class="container">
                <h2>ABOUT EHPCZ</h2>
            </div> <!-- /.container -->
        </div> <!-- /.overlay -->
    </div> <!-- /.theme-inner-banner -->


    <!--
    =============================================
        CallOut Banner
    ==============================================
    -->
    <div class="callout-banner no-bg">
        <div class="container clearfix">
            <h3 class="title">Environmental Health <br> Practitioners Council </h3>
            <p>EHPCZ (Environmental Health Practitioners Council) is a Statutory Body which was constituted in terms of the Health Professions Act (Chapter 27: 19) to control the operation of environmental health practitioners through: Education and Training, Registration and Practising Control and Disciplinary
            </p>
        </div>
    </div> <!-- /.callout-banner -->



    <!--
    =============================================
        About Company Stye Two
    ==============================================
    -->
    <div class="about-compnay-two no-bg section-spacing">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 text order-lg-last">
                        <div class="theme-title-one">
                            <h2>Vision</h2>
                        </div> <!-- /.theme-title-one -->
                        <p>To become "A recognized Environmental Health Regulatory Authority in the region and beyond"</p>
                    </div> <!-- /.col- -->
                    <div class="col-lg-6 col-12 text order-lg-last">
                        <div class="theme-title-one">
                            <h2>Mission</h2>
                        </div> <!-- /.theme-title-one -->
                        <p>The Environmental Health Practitioners Council of Zimbabwe seeks to uphold and promote high standards of environmental health care delivery systems in Zimbabwe through, regulation, supervision, co-ordination, controlling, monitoring of all matters affecting environmental health in an ethical, efficient and professional manner. </p>
                    </div> <!-- /.col- -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.overlay -->
    </div> <!-- /.about-compnay-two -->


    <!--
    =====================================================
        Why We Best
    =====================================================
    -->
    <div class="why-we-best">
        <div class="overlay">
            <div class="container">
                <div class="theme-title-one">
                    <h2>WE TRAIN THE BEST</h2>
                    <p>Environmental Health Practitioners are classified into four (4) classes namely:</p>
                </div> <!-- /.theme-title-one -->

                <div class="wrapper row no-gutters">
                    <div class="col-lg-6 col-12 order-lg-last"><div class="img-box"></div></div>
                    <div class="col-lg-6 col-12 order-lg-first">
                        <ul class="best-list-item">
                            <li>
                                <i class="icon flaticon-puzzle"></i>
                                <h6><a href="#">Environmental Health Officers</a></h6>
                                <p>The Love Boat soon will be making another run plore strange tools enter new worlds.</p>
                            </li>
                            <li>
                                <i class="icon flaticon-presentation"></i>
                                <h6><a href="#">Environment Health Technicians</a></h6>
                                <p>The Love Boat soon will be making another run plore strange tools enter new worlds.</p>
                            </li>
                            <li>
                                <i class="icon flaticon-people"></i>
                                <h6><a href="#">Meat inspectors & Examiners</a></h6>
                                <p>The Love Boat soon will be making another run plore strange tools enter new worlds.</p>
                            </li>
                        </ul>
                    </div> <!-- /.col- -->
                </div> <!-- /.wrapper -->
            </div> <!-- /.container -->
        </div> <!-- /.overlay -->
    </div> <!-- /.why-we-best -->


    <!--
    =====================================================
        Theme Counter
    =====================================================
    -->
    <div class="theme-counter-two section-spacing">
        <div class="container">
            <div class="clearfix">
                <div class="cunter-wrapper">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="single-counter-box">
                                <div class="number"><span class="timer" data-from="0" data-to="30" data-speed="1200" data-refresh-interval="5">0</span>+</div>
                                <p>Years of Excellence</p>
                            </div> <!-- /.single-counter-box -->
                        </div>  <!-- /.col- -->
                        <div class="col-md-3 col-6">
                            <div class="single-counter-box">
                                <div class="number"><span class="timer" data-from="0" data-to="100" data-speed="1200" data-refresh-interval="5">0</span>%</div>
                                <p>Client Satisfaction</p>
                            </div> <!-- /.single-counter-box -->
                        </div>  <!-- /.col- -->
                        <div class="col-md-3 col-6">
                            <div class="single-counter-box">
                                <div class="number"><span class="timer" data-from="0" data-to="53" data-speed="1200" data-refresh-interval="5">0</span>k</div>
                                <p>Practitioners Trained</p>
                            </div> <!-- /.single-counter-box -->
                        </div>  <!-- /.col- -->
                        <div class="col-md-3 col-6">
                            <div class="single-counter-box">
                                <div class="number"><span class="timer" data-from="0" data-to="24" data-speed="1200" data-refresh-interval="5">0</span></div>
                                <p>Consultants</p>
                            </div> <!-- /.single-counter-box -->
                        </div>  <!-- /.col- -->
                    </div> <!-- /.row -->
                </div> <!-- /.cunter-wrapper -->
            </div> <!-- /.clearfix -->
        </div> <!-- /.container -->
    </div> <!-- /.theme-counter -->

    <!--
    =====================================================
        Partner Slider
    =====================================================
    -->
    <div class="partner-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-12">
                    <h6>OUR <br>PARTNERS</h6>
                </div>
                <div class="col-md-9 col-sm-8 col-12">
                    <div class="col-md-9 col-sm-8 col-12">
                        <div class="partner-slider">
                            <div class="item"><img src="{{asset('web_assets/images/logo/pcz.png')}}" alt=""></div>
                            <div class="item"><img src="{{asset('web_assets/images/logo/ncz.png')}}" alt=""></div>
                            <div class="item"><img src="{{asset('web_assets/images/logo/mlcscz.png')}}" alt=""></div>
                            <div class="item"><img src="{{asset('web_assets/images/logo/mdpcz.png')}}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.partner-section -->

@endsection
