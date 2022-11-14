<div class="container-fluid">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Practitioner Professional Qualification</h5>
                    {{$commencement_date}}
                    @if($errors->any())
                        @include('errors')
                    @endif
                    <div class="card-body">
                        <form wire:submit.prevent="save()" enctype="multipart/form-data" method="post"
                              novalidate="">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom04">Profession</label>
                                    <select wire:model="profession_id" name="profession_id" class="form-select"
                                    >
                                            <option value="{{$profession->id}}">{{$profession->name}}</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a profession.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom04">Qualification Category</label>
                                    <select wire:model="qualification_category_id" name="qualification_category_id"
                                            class="form-select"
                                    >
                                        <option value="">Choose...</option>
                                        @foreach($qualification_categories as $qualification_category)
                                            <option
                                                value="{{$qualification_category->id}}">{{$qualification_category->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a qualification category.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom04">Register {{$register_category_id}}</label>
                                    <select wire:model="register_category_id" name="register_category_id"
                                            class="form-select"
                                    >
                                        <option value="">Choose...</option>
                                        @foreach($register_categories as $register)
                                            <option value="{{$register->id}}">{{$register->name}}
                                                ({{$register->description}})</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a register.</div>
                                </div>

                                @if($qualification_category_id == 1)
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom04">Professional
                                            qualification</label>
                                        <select wire:model="professional_qualification_id"
                                                name="professional_qualification_id" class="form-select">
                                            <option value="">Choose...</option>
                                            @foreach($professional_qualifications as $qualification)
                                                <option
                                                    value="{{$qualification->id}}">{{$qualification->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a professional qualification.</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom04">Accredited
                                            institution </label>
                                        <select wire:model="accredited_institution_id" name="accredited_institution_id"
                                                class="form-select"
                                        >
                                            <option value="">Choose...</option>
                                            @foreach($accredited_institutions as $accredited_institution)
                                                <option
                                                    value="{{$accredited_institution->id}}">{{$accredited_institution->institution->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select accredited institution.</div>
                                    </div>
                                @endif
                                @if($qualification_category_id == 2)
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom01">Foreign Qualification
                                        </label>
                                        <input wire:model="qualification" name="qualification" class="form-control"
                                               id="validationCustom01"
                                               type="text"
                                               value="">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom02">Institution name</label>
                                        <input wire:model="institution" name="institution" class="form-control"
                                               id="validationCustom02"
                                               type="text"
                                               value="">
                                        <div class="valid-feedback">Optional, Looks good!</div>
                                    </div>
                                @endif

                                <div class="col-md-6">
                                    {{$commencement_date}}
                                    <label class="form-label" for="validationCustom01">Commencement date</label>
                                    <input wire:model.debounce.300ms="commencement_date" name="commencement_date" type="text"
                                           class="form-control digits"
                                           aria-label="Dirt Of Birth" id="commencement_date"
                                           onchange="this.dispatchEvent(new InputEvent('input'))"
                                    >
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                                <div class="col-md-6">
                                    {{$completion_date}}
                                    <label class="form-label" for="validationCustom01">Completion date</label>
                                    <input wire:model.debounce.300ms="completion_date" name="completion_date" type="text"
                                           class="form-control digits"
                                           aria-label="Dirt Of Birth" id="completion_date"
                                           onchange="this.dispatchEvent(new InputEvent('input'))"
                                    >
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>

                            <div class="mb-3"></div>
                            <div class="row g-3">
                                @if(!$profession_requirements->isEmpty())
                                    <div class="col-xl-9 xl-40 box-col-9">
                                        <div class="job-sidebar"><a class="btn btn-primary job-toggle"
                                                                    href="javascript:void(0)">Requirements</a>
                                            <div class="job-left-aside custom-scrollbar">
                                                <div class="default-according style-1 faq-accordion job-accordion"
                                                     id="accordionoc">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="mb-0 p-0">
                                                                        <p class="btn btn-link ps-0"
                                                                           data-bs-toggle="collapse"
                                                                           data-bs-target="#collapseicon4"
                                                                           aria-expanded="true"
                                                                           aria-controls="collapseicon4">
                                                                            Requirements</p>
                                                                    </h5>
                                                                </div>
                                                                <div class="collapse show" id="collapseicon4"
                                                                     data-bs-parent="#accordion"
                                                                     aria-labelledby="collapseicon4">
                                                                    <div class="card-body animate-chk">
                                                                        @foreach($profession_requirements as $profession_requirement)
                                                                            <label class="d-block" for="chk-ani21">
                                                                                <input class="checkbox_animated"
                                                                                       id="chk-ani21" checked disabled
                                                                                       type="checkbox">
                                                                                {{$profession_requirement->requirement->name}}
                                                                            </label>
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($profession_fee != null)
                                    <div class="col-xl-3 xl-40 box-col-3">
                                        <div class="job-sidebar">
                                            <a class="btn btn-primary job-toggle"
                                               href="javascript:void(0)">Fees
                                            </a>
                                            <div class="job-left-aside custom-scrollbar">
                                                <div class="default-according style-1 faq-accordion job-accordion"
                                                     id="accordionoc">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="mb-0 p-0">
                                                                        <p class="btn btn-link ps-0"
                                                                           data-bs-toggle="collapse"
                                                                           data-bs-target="#collapseicon5"
                                                                           aria-expanded="true"
                                                                           aria-controls="collapseicon4">
                                                                            Fees</p>
                                                                    </h5>
                                                                </div>
                                                                <div class="collapse show" id="collapseicon5"
                                                                     data-bs-parent="#accordion"
                                                                     aria-labelledby="collapseicon4">
                                                                    <div class="card-body animate-chk">
                                                                        <label class="d-block" for="chk-ani21">
                                                                            <input class="checkbox_animated"
                                                                                   id="chk-ani21" checked disabled
                                                                                   type="checkbox">
                                                                            {{$profession_fee->registration}}
                                                                        </label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3"></div>
                            <p>
                                Please take note of the requirements and Registration fee, if this is okay with you,
                                please click the button below to proceed.
                            </p>
                            <button class="btn btn-primary" type="submit">Click here to proceed</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


<!-- Plugins JS Ends-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('commencement_date'),
        position:'top left',
        format: 'D/M/YYYY',
        toString(date, format) {
            // you should do formatting based on the passed format,
            // but we will just return 'D/M/YYYY' for simplicity
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            return `${year}-${month}-${day}`;
        },
        parse(dateString, format) {
            // dateString is the result of `toString` method
            const parts = dateString.split('/');
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10) - 1;
            const year = parseInt(parts[2], 10);
            return new Date(year, month, day);
        }
    });
    var picker1 = new Pikaday({
        field: document.getElementById('completion_date'),
        position:'top left',
        format: 'D/M/YYYY',
        toString(date, format) {
            // you should do formatting based on the passed format,
            // but we will just return 'D/M/YYYY' for simplicity
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            return `${year}-${month}-${day}`;
        },
        parse(dateString, format) {
            // dateString is the result of `toString` method
            const parts = dateString.split('/');
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10) - 1;
            const year = parseInt(parts[2], 10);
            return new Date(year, month, day);
        }
    });
</script>
{{--<script type="text/javascript">
    // jquery Date picker
    function myDatePicker() {
        $('#commencement_date').datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "1950:+nn",
            autoClose: true
        });
        $('#commencement_date').datepicker('show');

    }

    function myDatePicker1() {

        $('#completion_date').datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "1950:+nn",
            autoClose: true
        });
        $('#completion_date').datepicker('show');

    }


</script>--}}
