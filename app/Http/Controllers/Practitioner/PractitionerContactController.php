<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Nationality;
use App\Models\Practitioner;
use App\Models\PractitionerContact;
use App\Models\Province;
use Illuminate\Http\Request;
use Kapouet\Notyf\Facades\Notyf;

class PractitionerContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Practitioner $practitioner)
    {
        //
        return view('practitioners.contact.index', compact('practitioner'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Practitioner $practitioner)
    {
        //
        $nationalities = Nationality::all()->sortBy('name');
        $cities = City::all()->sortBy('name');
        $provinces = Province::all()->sortBy('name');
        return view('practitioners.contact.create', compact('practitioner', 'nationalities', 'cities', 'provinces'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Practitioner $practitioner)
    {
        //
        $practitioner->add_contact(request()->validate([
            'address' => ['nullable'],
            'province_id' => ['nullable'],
            'city_id' => ['nullable'],
            'email' => ['nullable'],
            'mobile' => ['nullable'],
        ]));

        Notyf::success('Practitioner contact added successfully.');
        return redirect('practitioners/contact/' . $practitioner->id . '/index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(PractitionerContact $practitionerContact)
    {
        //
        $practitioner = $practitionerContact->practitioner;
        return view('practitioners.contact.show', compact('practitionerContact', 'practitioner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PractitionerContact $practitionerContact)
    {
        //
        $practitioner = $practitionerContact->practitioner;
        $nationalities = Nationality::all()->sortBy('name');
        $cities = City::all()->sortBy('name');
        $provinces = Province::all()->sortBy('name');
        return view('practitioners.contact.edit', compact('practitioner', 'nationalities', 'cities', 'provinces','practitionerContact'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PractitionerContact $practitionerContact)
    {
        //
        $practitionerContact->update(request()->validate([
            'address' => ['nullable'],
            'country_id' => ['nullable'],
            'province_id' => ['nullable'],
            'city_id' => ['nullable'],
            'email' => ['nullable'],
            'mobile' => ['nullable'],
        ]));

        Notyf::success('Practitioner updated successfully.');
        return redirect('practitioners/' . $practitionerContact->practitioner->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PractitionerContact $practitionerContact)
    {
        //
        $practitioner = $practitionerContact->practitioner;
        $practitionerContact->delete();

        return redirect('practitioners/contact/' . $practitioner->id . '/index');

    }
}
