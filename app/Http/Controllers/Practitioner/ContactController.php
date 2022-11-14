<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Nationality;
use App\Models\PractitionerContact;
use App\Models\Province;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nationalities  = Nationality::all();
        $provinces  = Province::all();
        $cities  = City::all();
        return view('admin.practitioner_contacts.create',compact('nationalities','provinces',
            'cities'));
    }

    public function store()
    {
        PractitionerContact::create(request()->validate([
            'practitioner_id' => ['required'],
            'physical_address' => ['nullable'],
            'nationality_id' => ['nullable'],
            'province_id' => ['nullable'],
            'city_id' => ['nullable'],
            'email' => ['nullable'],
            'primary_phone' => ['nullable'],
            'secondary_phone' => ['nullable'],
        ]));

        return back()->with('message','PractitionerContact added successfully.');
    }

    public function show(PractitionerContact $practitionerContact)
    {
        return view('admin.practitioner_contacts.show', compact('practitionerContact'));

    }

    public function edit(PractitionerContact $practitionerContact)
    {

        $nationalities  = Nationality::all();
        $provinces  = Province::all();
        $cities  = City::all();
        return view('admin.practitioner_contacts.edit',compact('nationalities','provinces',
            'cities','practitionerContact'));
    }

    public function update(PractitionerContact $practitionerContact)
    {
        //update the institution
        $practitionerContact->update(request()->validate([
            'practitioner_id' => ['required'],
            'physical_address' => ['nullable'],
            'nationality_id' => ['nullable'],
            'province_id' => ['nullable'],
            'city_id' => ['nullable'],
            'email' => ['nullable'],
            'primary_phone' => ['nullable'],
            'secondary_phone' => ['nullable'],
        ]));

        return redirect('/admin/practitioner_contacts')->with('message', 'Practitioner Contacts updated successfully.');

    }

    public function destroy(PractitionerContact $practitionerContact)
    {
        //
        $practitionerContact->delete();
        return redirect('/admin/practitioner_contacts')->with('message', 'Practitioner Contacts deleted successfully.');

    }
}
