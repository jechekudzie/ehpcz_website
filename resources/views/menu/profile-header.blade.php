<div class="profile-foreground position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg">
        <img src="{{asset('administrator/assets/images/profile-bg.jpg')}}" alt="" class="profile-wid-img" />
    </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
    <div class="row g-4">
        <div class="col-auto">
            <div class="avatar-lg">
                <img src="{{asset('administrator/assets/images/users/profile.jpg')}}" alt="user-img" class="img-thumbnail rounded-circle" />
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="p-2">
                <h3 class="text-white mb-1">{{$practitioner->first_name.' '.$practitioner->middle_name.' '.$practitioner->last_name}}</h3>
                <p class="text-white-75"></p>
                <div class="hstack text-white-50 gap-1">
                    <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>@if($practitioner->practitioner_contact){{$practitioner->practitioner_contact->address}}@endif</div>
                    <div>
                        <i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>test
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-12 col-lg-auto order-last order-lg-0">
            <div class="row text text-white-50 text-center">

            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
