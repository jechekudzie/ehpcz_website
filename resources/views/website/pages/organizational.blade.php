<?php
/**
 * Created by PhpStorm for ehpcz
 * User: VinceGee
 * Date: 8/4/2022
 * Time: 1:07 PM
 */ ?>
@extends('website.layouts.main')

@section('template_title')
    Organizational Structure
@endsection

@section('content')
    <div class="theme-inner-banner section-spacing">
        <div class="overlay">
            <div class="container">
                <h2>Organizational Structure</h2>
            </div> <!-- /.container -->
        </div> <!-- /.overlay -->
    </div> <!-- /.theme-inner-banner -->

    <div class="service-details section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-12">
                    <img src="{{asset('/organizational_structure.png')}}" alt="ehpcz" style="alignment: center; text-align: center;">
                </div>
                <div class="col-xl-12 col-lg-12 col-12">
                    <div class="our-team section-spacing">
                        <div class="container">
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
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
