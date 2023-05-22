<?php
/**
 * Created by PhpStorm for ehpcz
 * User: VinceGee
 * Date: 8/4/2022
 * Time: 11:38 AM
 */ ?>

@extends('website.layouts.main')

@section('template_title')
    Home
@endsection

@section('content')

<!--
    =============================================
        Theme Main Banner
    ==============================================
    -->
<div id="theme-main-banner" class="banner-one">
    <div data-src="{{asset('web_assets/images/slide1.png')}}">
        <div class="camera_caption">
            <div class="container">
                <p class="wow fadeInUp animated"></p>
                <h1 class="wow fadeInUp animated" data-wow-delay="0.2s"></h1>
            </div> <!-- /.container -->
        </div> <!-- /.camera_caption -->
    </div>
    <div data-src="{{asset('web_assets/images/slide2.png')}}">
        <div class="camera_caption">
            <div class="container">
                <p class="wow fadeInUp animated"></p>
                <h1 class="wow fadeInUp animated" data-wow-delay="0.2s"></h1>
            </div> <!-- /.container -->
        </div> <!-- /.camera_caption -->
    </div>
    <div data-src="{{asset('web_assets/images/slide3.png')}}">
        <div class="camera_caption">
            <div class="container">
                <p class="wow fadeInUp animated"></p>
                <h1 class="wow fadeInUp animated" data-wow-delay="0.2s"></h1>
            </div> <!-- /.container -->
        </div> <!-- /.camera_caption -->
    </div>
</div> <!-- /#theme-main-banner -->


<!--
=============================================
    Top Feature
==============================================
-->
{{--
<div class="top-feature section-spacing">
    <div class="top-features-slide">
        <div class="item">
            <div class="main-content" style="background:#fafafa;">
                <img src="{{asset('web_assets/images/icon/1.png')}}" alt="">
                <h4><a href="#">Consumer Insights</a></h4>
                <p>The east side to a deluxe apartment in move on up to the east side</p>
            </div> <!-- /.main-content -->
        </div> <!-- /.item -->
        <div class="item">
            <div class="main-content" style="background:#f6f6f6;">
                <img src="web_assets/images/icon/2.png" alt="">
                <h4><a href="#">Emerging Ideas</a></h4>
                <p>The east side to a deluxe apartment in move on up to the east side</p>
            </div> <!-- /.main-content -->
        </div> <!-- /.item -->
        <div class="item">
            <div class="main-content" style="background:#efefef;">
                <img src="web_assets/images/icon/3.png" alt="">
                <h4><a href="#">Thought Leadership</a></h4>
                <p>The east side to a deluxe apartment in move on up to the east side</p>
            </div> <!-- /.main-content -->
        </div> <!-- /.item -->
        <div class="item">
            <div class="main-content" style="background:#e9e9e9;">
                <img src="web_assets/images/icon/4.png" alt="">
                <h4><a href="#">Marketing Goals</a></h4>
                <p>The east side to a deluxe apartment in move on up to the east side</p>
            </div> <!-- /.main-content -->
        </div> <!-- /.item -->
    </div> <!-- /.top-features-slide -->
</div> <!-- /.top-feature -->
--}}


<!--
=============================================
    About Company
==============================================
-->
<div class="about-compnay section-spacing mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12"><img src="{{asset('web_assets/images/soil_hands.png')}}" alt=""></div>
            <div class="col-lg-6 col-12">
                <div class="text">
                    <div class="theme-title-one">
                        <h2>About EHPCZ</h2>
                        <p>EHPCZ is a Statutory Body which was constituted in terms of the Health Professions Act (Chapter 27: 19) to control the operation of environmental health practitioners through: Education and Training, Registration and Practising Control and Disciplinary</p>
                    </div> <!-- /.theme-title-one -->

                    <div class="wrapper mission-goal clearfix">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="single-block">
                                    <h5><a href="#">Vision</a></h5>
                                    <p>To become "A recognized Environmental Health Regulatory Authority in the region and beyond".</p>
                                </div> <!-- /.single-block -->
                            </div> <!-- /.col- -->
                            <div class="col-lg-6 col-12">
                                <div class="single-block">
                                    <h5><a href="#">Mission</a></h5>
                                    <p>The Environmental Health Practitioners Council of Zimbabwe seeks to uphold and promote high standards of environmental health care delivery systems in Zimbabwe through, regulation, supervision, co-ordination, controlling, monitoring of all matters affecting environmental health in an ethical, efficient and professional manner. </p>
                                </div> <!-- /.single-block -->
                            </div> <!-- /.col- -->
                        </div> <!-- /.row -->
                    </div> <!-- /.wrapper -->

                </div> <!-- /.text -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.about-compnay -->


<!--
=============================================
    Feature Banner
==============================================
-->
<div class="feature-banner section-spacing">
    <div class="opacity">
        <div class="container">
            <h2>We regulate, control and supervise all matters affecting the training of persons in, and the manner of the exercise of, the profession or calling of any environmental health practitioner.</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.feature-banner -->


<!--
=============================================
    Service Style One
==============================================
-->
<div class="service-style-one section-spacing">
    <div class="container">
        <div class="theme-title-one">
            <h2>EHPCZ Committees</h2>
            <p>Section 67 (e) of the Act, provides for Council to establish other Committees such as the Audit and Risk Management Committee and the Business and Finance Committee that it considers necessary or desirable, and may vest in any Committee so established such of the Council's functions as the Council thinks fit.</p>
        </div> <!-- /.theme-title-one -->
        <div class="wrapper">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="single-service">
                        <div class="text">
                            <h5><a href="#">Executive Committee</a></h5>
                            <p>The functions of the Executive Committee are to exercise Council functions between Council meetings.</p>
                        </div> <!-- /.text -->
                    </div> <!-- /.single-service -->
                </div> <!-- /.col- -->
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="single-service">
                        <div class="text">
                            <h5><a href="#">Practicing Control Committee</a></h5>
                            <p>The purpose of the Practicing Control Committee is to come up with measures to control the practice of Environmental Health Practitioners.</p>
                        </div> <!-- /.text -->
                    </div> <!-- /.single-service -->
                </div> <!-- /.col- -->
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="single-service">
                        <div class="text">
                            <h5><a href="#">Disciplinary Committee</a></h5>
                            <p>Investigates and examines allegations of professional misconduct leveled against its registered members or any act which puts the profession and Council into disrepute</p>
                        </div> <!-- /.text -->
                    </div> <!-- /.single-service -->
                </div> <!-- /.col- -->
                <div class="col-xl-6 col-md-6 col-12">
                    <div class="single-service">
                        <div class="text">
                            <h5><a href="#">Education Committee</a></h5>
                            <p>Supervises the education and training of such classes of health practitioners as the council may specify</p>
                        </div> <!-- /.text -->
                    </div> <!-- /.single-service -->
                </div> <!-- /.col- -->
            </div> <!-- /.row -->
        </div> <!-- /.wrapper -->
        <div class="contact-text">
            <h4>You can also send us an email and we’ll get in touch shortly, or Call us</h4>
            <h5><a href="mailto:info@ehpcz.co.zw">info@ehpcz.co.zw</a>  (or)  <a href="tel://+2634782260">+263 4 782260</a></h5>
        </div>
    </div> <!-- /.container -->
</div> <!-- /.service-style-one -->


<!--
=====================================================
    Testimonial Slider
=====================================================
-->
{{--
<div class="testimonial-section section-spacing">
    <div class="overlay">
        <div class="container">
            <div class="wrapper">
                <div class="bg">
                    <div class="testimonial-slider">
                        <div class="item">
                            <p>“ A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the government they survive as soldiers of fortune to a deluxe apartment in the sky moving on up to the east side a family. ”</p>
                            <div class="name">
                                <h6>Shawn Michael</h6>
                                <span>Founder, Mnc Inc.</span>
                            </div> <!-- /.name -->
                        </div> <!-- /.item -->
                        <div class="item">
                            <p>“ A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the government they survive as soldiers of fortune to a deluxe apartment in the sky moving on up to the east side a family. ”</p>
                            <div class="name">
                                <h6>Rashed Ka.</h6>
                                <span>Founder, Mnc Inc.</span>
                            </div> <!-- /.name -->
                        </div> <!-- /.item -->
                        <div class="item">
                            <p>“ A tale of a fateful trip that started from this tropic port aboard this tiny ship today still wanted by the government they survive as soldiers of fortune to a deluxe apartment in the sky moving on up to the east side a family. ”</p>
                            <div class="name">
                                <h6>Mahfuz Riad</h6>
                                <span>Founder, Mnc Inc.</span>
                            </div> <!-- /.name -->
                        </div> <!-- /.item -->
                    </div> <!-- /.testimonial-slider -->
                </div> <!-- /.bg -->
            </div> <!-- /.wrapper -->
        </div> <!-- /.container -->
    </div> <!-- /.overlay -->
</div>
--}}
<!-- /.testimonial-section -->


<!--
=====================================================
    Our Team
=====================================================
-->
<div class="our-team section-spacing">
    <div class="container">
        <div class="theme-title-one">
            <h2>Our TEAM</h2>
            <p>The team behind the scenes</p>
        </div> <!-- /.theme-title-one -->
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <img src="{{asset('team_pics/IMG_1639.jpg')}}" alt="">
                            <div class="overlay">
                                 <!-- /.hover-content -->
                            </div> <!-- /.overlay -->
                        </div> <!-- /.image-box -->
                        <div class="text">
                            <h6>Kenneth E. Chihururu</h6>
                            <span>Registrar</span>
                        </div> <!-- /.text -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <img src="{{asset('team_pics/IMG_1638.jpg')}}" alt="">
                            <div class="overlay">
                                 <!-- /.hover-content -->
                            </div> <!-- /.overlay -->
                        </div> <!-- /.image-box -->
                        <div class="text">
                            <h6>Simbarashe Mupesa</h6>
                            <span>Administrative Officer</span>
                        </div> <!-- /.text -->
                    </div> <!-- /.team-member -->
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <img src="{{asset('team_pics/IMG_1625.jpg')}}" alt="">
                            <div class="overlay">
                                 <!-- /.hover-content -->
                            </div> <!-- /.overlay -->
                        </div> <!-- /.image-box -->
                        <div class="text">
                            <h6>Innocent Marekera</h6>
                            <span>Accountant</span>
                        </div> <!-- /.text -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <img src="{{asset('team_pics/IMG_1620.jpg')}}" alt="">
                            <div class="overlay">
                                 <!-- /.hover-content -->
                            </div> <!-- /.overlay -->
                        </div> <!-- /.image-box -->
                        <div class="text">
                            <h6>Prosper Chigaro</h6>
                            <span>Procument officer</span>
                        </div> <!-- /.text -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <img src="{{asset('team_pics/IMG_1611.jpg')}}" alt="">
                            <div class="overlay">
                                 <!-- /.hover-content -->
                            </div> <!-- /.overlay -->
                        </div> <!-- /.image-box -->
                        <div class="text">
                            <h6>Dylan Mandudzo</h6>
                            <span>Accounts Clerk</span>
                        </div> <!-- /.text -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <img src="{{asset('team_pics/IMG_1629.jpg')}}" alt="">
                            <div class="overlay">
                                 <!-- /.hover-content -->
                            </div> <!-- /.overlay -->
                        </div> <!-- /.image-box -->
                        <div class="text">
                            <h6>Craig Chifamba</h6>
                            <span>Accounts Clerk</span>
                        </div> <!-- /.text -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
            </div> <!-- /.row -->
        </div> <!-- /.wrapper -->
    </div> <!-- /.container -->
</div> <!-- /.our-team -->


<!--
=====================================================
    Theme Counter
=====================================================
-->
<div class="theme-counter section-spacing">
    <div class="container">
        <div class="bg">
            <h6>EHPCZ in Numbers</h6>
            <h2>Some fun facts about us</h2>

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
        </div> <!-- /.bg -->
    </div> <!-- /.container -->
</div> <!-- /.theme-counter -->

<!--
=====================================================
    Partner Slider
=====================================================
-->
<div class="partner-section bg-color">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-12">
                <h6>OUR <br>PARTNERS</h6>
            </div>
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
</div> <!-- /.partner-section -->

@endsection


