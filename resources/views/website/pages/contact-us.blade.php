<?php
/**
 * Created by PhpStorm for ehpcz
 * User: VinceGee
 * Date: 8/4/2022
 * Time: 1:12 PM
 */ ?>

@extends('website.layouts.main')

@section('template_title')
    Contact EHPCZ
@endsection

@section('content')
{{--    <!-- Google Map -->--}}
{{--    <div class="google-map-two section-spacing"><div class="map-canvas"></div></div>--}}


    <!--
    =============================================
        Conatct us Section
    ==============================================
    -->
<br><br><br><br><br>
<div class="why-we-best">
    <div class="overlay">
        <div class="container">
            <div class="theme-title-one">
                <h2>GET IN TOUCH</h2>
                <p>Feel free to get in touch with us. We will be sure to respond to you.</p>
            </div> <!-- /.theme-title-one -->

            <div class="wrapper row no-gutters">
                <div style="padding: 20px 20px 20px 20px;" class="col-lg-7 col-12 bg-white m-10 p-20">
                    <div class="form-wrapper">
                        <form class="theme-form-one form-validation" autocomplete="off" action="{{url('/mail-contact')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 col-12"><input type="text" placeholder="Full Name *" name="name" required></div>
                                <div class="col-sm-6 col-12"><input type="text" placeholder="Phone *" name="phone" required></div>
                                <div class="col-sm-6 col-12"><input type="email" placeholder="Email *" name="email" required></div>
                                <div class="col-sm-6 col-12"><input type="text" placeholder="Website" name="web"></div>
                                <div class="col-12"><textarea placeholder="Message *" name="message" required></textarea></div>
                            </div> <!-- /.row -->
                            <button class="theme-button-one">SEND MESSAGE</button>
                        </form>
                    </div> <!-- /.form-wrapper -->
                </div> <!-- /.col- -->
                <div class="col-lg-5 col-12">
                    <ul class="best-list-item">
                        <li>
                            <i class="icon flaticon-placeholder"></i>
                            <h6><a href="#">Address</a></h6>
                            <p>14 Buckingham Rd, Eastlea, Harare </p>
                        </li>
                        <li>
                            <i class="icon flaticon-multimedia"></i>
                            <h6><a href="mailto:info@ehpcz.co.zw">Mail Us Here</a></h6>
                        </li>
                        <br>
                        <li>
                            <i class="icon flaticon-phone-call"></i>
                            <h6><a href="tel://+2634782260">Call Us Now</a></h6>
                            <p>+263 4 782260</p>
                        </li>
                    </ul>
                </div>
            </div> <!-- /.wrapper -->
        </div> <!-- /.container -->
    </div> <!-- /.overlay -->
</div>
@endsection

@section('footer_scripts')
    <!-- Google map js -->
@endsection
