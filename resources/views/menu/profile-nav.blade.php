<?php
/**
 * Created by PhpStorm for ehpcz
 * User: VinceGee
 * Date: 8/2/2022
 * Time: 4:31 PM
 */ ?>

<div class="d-flex">
    <!-- Nav tabs -->
    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
        <li class="nav-item">
            <a class="nav-link fs-14 {{ Request::is('/practitioners') ? 'active' : null }}" href="{{url('/practitioners/'.$practitioner->id)}}" role="tab">
                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link fs-14 {{ Request::is('practitioners/employment/*') ? 'active' : null }}" href="{{url('/practitioners/employment/'.$practitioner->id.'/index')}}" role="tab">
                <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Employment</span>
            </a>
        </li>
        {{--<li class="nav-item">
            <a class="nav-link fs-14 {{ Request::is('practitioners/internship/*') ? 'active' : null }}" href="{{url('/practitioners/internship/'.$practitioner->id)}}" role="tab">
                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Internship</span>
            </a>
        </li>--}}
        <li class="nav-item">
            <a class="nav-link fs-14 {{ Request::is('practitioners/professions/*') ? 'active' : null }}" href="{{url('/practitioners/professions/'.$practitioner->id.'/index')}}" role="tab">
                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Professional qualifications</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link fs-14 {{ Request::is('practitioners/applications/*') ? 'active' : null }}" href="{{url('/practitioners/applications/'.$practitioner->id.'/index')}}" role="tab">
                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Applications</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link fs-14 {{ Request::is('practitioners/payments/*') ? 'active' : null }}" href="{{url('/practitioners/payments/'.$practitioner->id.'/index')}}" role="tab">
                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Payments</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link fs-14 {{ Request::is('practitioners/certificates/*') ? 'active' : null }}" href="{{url('/practitioners/certificates/'.$practitioner->id)}}" role="tab">
                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Certificates</span>
            </a>
        </li>

    </ul>

</div>


