<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Practitioner;
use App\Models\PractitionerEmployment;
use App\Models\Province;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function create(Practitioner $practitioner)
    {
        $provinces = Province::all()->sortBy('name');
        $cities = City::all()->sortBy('name');
        return view('admin.practitioner_employments.create', compact('practitioner', 'provinces','cities'));
    }

    public function edit(PractitionerEmployment $practitionerEmployment)
    {
        $practitioner = $practitionerEmployment->practitioner;
        $provinces = Province::all()->sortBy('name');
        $cities = City::all()->sortBy('name');
        return view('admin.practitioner_employments.edit', compact('practitioner', 'provinces','cities','practitionerEmployment'));
    }
    public function store(Practitioner $practitioner)
    {

        $employment = request()->validate([
            'name' => ['required'],
            'email' => ['nullable'],
            'primary_phone' => ['nullable'],
            'secondary_phone' => ['nullable'],
            'physical_address' => ['nullable'],
            'province_id' => ['nullable'],
            'city_id' => ['nullable'],
            'contact_person' => ['nullable'],
            'employment_position' => ['nullable'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable']
        ]);
        $practitioner->add_employment($employment);

        return redirect('/admin/practitioners/' . $practitioner->id)->with('message', 'Employer added successfully');


    }
}
