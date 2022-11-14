<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\Practitioner;
use App\Models\PractitionerEmployment;
use Illuminate\Http\Request;
use Kapouet\Notyf\Facades\Notyf;

class PractitionerEmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Practitioner $practitioner)
    {
        //
        return view('practitioners.employment.index', compact('practitioner'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Practitioner $practitioner)
    {
        //
        return view('practitioners.employment.create', compact('practitioner'));

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
        $practitioner->add_employment(request()->validate([
            'company' => ['required'],
            'company_email' => ['nullable'],
            'company_phone' => ['nullable'],
            'company_address' => ['nullable'],
            'contact_person' => ['nullable'],
            'employment_position' => ['nullable'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable']
        ]));

        Notyf::success('Practitioner employment added successfully.');
        return redirect('practitioners/employment/' . $practitioner->id . '/index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(PractitionerEmployment $practitionerEmployment)
    {
        //
        $practitioner = $practitionerEmployment->practitioner;
        return view('practitioners.employment.show', compact('practitionerEmployment', 'practitioner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PractitionerEmployment $practitionerEmployment)
    {
        //
        $practitioner = $practitionerEmployment->practitioner;
        return view('practitioners.employment.edit', compact('practitionerEmployment', 'practitioner'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PractitionerEmployment $practitionerEmployment)
    {
        //
        $practitionerEmployment->update(request()->validate([
            'company' => ['required'],
            'company_email' => ['nullable'],
            'company_phone' => ['nullable'],
            'company_address' => ['nullable'],
            'contact_person' => ['nullable'],
            'employment_position' => ['nullable'],
            'start_date' => ['nullable'],
            'end_date' => ['nullable']
        ]));

        Notyf::success('Practitioner updated successfully.');
        return redirect('practitioners/employment/' . $practitionerEmployment->practitioner->id . '/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PractitionerEmployment $practitionerEmployment)
    {
        //
        $practitioner = $practitionerEmployment->practitioner;
        $practitionerEmployment->delete();

        return redirect('practitioners/employment/' . $practitioner->id . '/index');

    }
}
