<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Practitioner Professional Qualification</h5>
                    <div class="card-body">
                        <form method="post" action="{{url('/admin/practitioners')}}" class="needs-validation"
                              novalidate="">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom04">Profession</label>
                                    <select wire:model="profession_id" name="professional_id" class="form-select"
                                            id="validationCustom04"
                                            required="">
                                        <option value="">Choose...</option>
                                        @foreach($professions as $profession)
                                            <option value="{{$profession->id}}">{{$profession->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a profession.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom04">Qualification Category</label>
                                    <select wire:model="qualification_category_id" name="qualification_category_id"
                                            class="form-select"
                                            id="validationCustom04"
                                            required="">
                                        <option value="">Choose...</option>
                                        @foreach($qualification_categories as $qualification_category)
                                            <option
                                                value="{{$qualification_category->id}}">{{$qualification_category->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a qualification category.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom04">Register</label>
                                    <select wire:model="register_category_id" name="register_category_id"
                                            class="form-select"
                                            id="validationCustom04"
                                            required="">
                                        <option value="">Choose...</option>
                                        @foreach($register_categories as $register)
                                            <option value="{{$register->id}}">{{$register->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a register.</div>
                                </div>
                            </div>

                            @if($qualification_category_id == 1)
                                <div class="mb-3"></div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom04">Professional
                                            qualification</label>
                                        <select wire:model="professional_qualification_id"
                                                name="professional_qualification_id" class="form-select"
                                                id="validationCustom04"
                                                required="">
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
                                                id="validationCustom04"
                                                required="">
                                            <option value="">Choose...</option>
                                            @foreach($accredited_institutions as $accredited_institution)
                                                <option
                                                    value="{{$accredited_institution->id}}">{{$accredited_institution->institution->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select accredited institution.</div>
                                    </div>
                                </div>
                            @endif

                            @if($qualification_category_id == 2)
                                <div class="mb-3"></div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustom01">Foreign Qualification
                                            {{$qualification}}
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
                                </div>
                            @endif






                            <div class="mb-3"></div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">Commencement date</label>
                                    <input wire:model="commencement_date" name="commencement_date"
                                           class="datepicker-here form-control digits"
                                           type="text"
                                           data-language="en" data-position="top left" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">Completion date</label>
                                    <input wire:model="completion_date" name="completion_date"
                                           class="datepicker-here form-control digits"
                                           type="text"
                                           data-language="en" data-position="top left" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>

                            <div class="mb-3"></div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
