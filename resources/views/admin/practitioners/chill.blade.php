<form method="post" action="{{url('/admin/practitioners')}}" class="needs-validation"
      novalidate="">
    @csrf
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label" for="validationCustom04">Title</label>
            <select name="title_id" class="form-select"
                    id="validationCustom04"
                    required="">
                <option value="">Choose...</option>
                @foreach($titles as $title)
                    <option value="{{$title->id}}">{{$title->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please select a title.</div>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="validationCustom04">Gender</label>
            <select name="gender_id"
                    class="form-select"
                    id="validationCustom04"
                    required="">
                <option value="">Choose...</option>
                @foreach($genders as $gender)
                    <option
                        value="{{$gender->id}}">{{$gender->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please select a gender.</div>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="validationCustom01">Identification</label>
            <input name="identification"
                   class="form-control digits"
                   type="text" required="">
            <div class="valid-feedback">Looks good!</div>
        </div>
    </div>

    <div class="mb-3"></div>
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label" for="validationCustom01">First name</label>
            <input name="first_name"
                   class="datepicker-here form-control digits"
                   type="text"
                   required="">
            <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="col-md-4">
            <label class="form-label" for="validationCustom01">Middle name</label>
            <input name="middle_name"
                   class="datepicker-here form-control digits"
                   type="text"
            >
            <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="col-md-4">
            <label class="form-label" for="validationCustom01">Last name</label>
            <input name="last_name"
                   class="datepicker-here form-control digits"
                   type="text"
                   required="">
            <div class="valid-feedback">Looks good!</div>
        </div>

    </div>
    <div class="mb-3"></div>
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label" for="validationCustom04">Nationality</label>
            <select name="nationality_id" class="form-select"
                    id="validationCustom04"
                    required="">
                <option value="">Choose...</option>
                @foreach($nationalities as $nationality)
                    <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please select nationality.</div>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="validationCustom01">Date Of Birth</label>
            <input name="dob"
                   class="datepicker-here form-control digits"
                   type="text"
                   data-language="en" data-position="top left" required="">
            <div class="valid-feedback">Looks good!</div>
        </div>
    </div>

    <div class="mb-3"></div>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
