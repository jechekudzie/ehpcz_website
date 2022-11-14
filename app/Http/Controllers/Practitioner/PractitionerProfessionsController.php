<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Practitioner;
use App\Models\PractitionerProfession;
use App\Models\Profession;
use App\Models\Province;
use App\Models\QualificationCategory;
use App\Models\RegisterCategory;
use App\Models\Title;
use Illuminate\Http\Request;
use Kapouet\Notyf\Facades\Notyf;

class PractitionerProfessionsController extends Controller
{
    public function index(Practitioner $practitioner)
    {
        return view('practitioners.professions.index', compact('practitioner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Practitioner $practitioner)
    {
        $professions = Profession::all();
        return view('practitioners.professions.create', compact('practitioner', 'professions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Practitioner $practitioner)
    {
        $practitionerProfession = $practitioner->add_practitioner_profession(request()->validate([
            'profession_id' => ['required'],
        ],
            ['profession_id' => 'Profession is required']
        ));

        Notyf::success('Practitioner profession added successfully.');

        return redirect('/practitioners/professions/' . $practitionerProfession->id . '/show');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(PractitionerProfession $practitionerProfession)
    {
        $practitioner = $practitionerProfession->practitioner;
        $qualification_categories = QualificationCategory::all();
        $register_categories = RegisterCategory::all();

        $active_register = $practitionerProfession->practitioner_profession_registers->where('is_active', 1)->first();
        return view('practitioners.professions.show', compact('practitionerProfession', 'qualification_categories', 'practitioner', 'register_categories', 'active_register'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $practitioner = Practitioner::with('practitioner_contact', 'practitioner_employments', 'practitioner_professions')
            ->findOrFail($id);
        return view('practitioners.professions.edit', compact('practitioner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Practitioner $practitioner)
    {
        $practitioner->update(request()->validate([
            'title_id' => ['required'],
            'gender_id' => ['required'],
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'identification' => ['required'],
            'nationality_id' => ['required'],
            'dob' => ['required'],
        ]));

        Notyf::success('Practitioner updated successfully.');
        return redirect('/practitioners/' . $practitioner->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $practitioner = Practitioner::findOrFail($id);
        $practitioner->delete();
        return redirect('practitioners')->with('message', 'Practitioner deleted successfully.');
    }

    public
    function getPractitionerEmployment($id)
    {
        $practitioner = Practitioner::with('practitioner_contact', 'practitioner_employments')
            ->findOrFail($id);
        return view('practitioners.employment.show', compact('practitioner'));
    }

    public
    function getFormToUpdate($id)
    {
        $practitioner = Practitioner::with('practitioner_contact', 'practitioner_employments')
            ->findOrFail($id);
        $titles = Title::all()->sortBy('name');
        $genders = Gender::all()->sortBy('name');
        $nationalities = Nationality::all()->sortBy('name');
        $cities = City::all()->sortBy('name');
        $provinces = Province::all()->sortBy('name');

        return view('practitioners.professions.edit', compact('practitioner', 'titles', 'genders',
            'nationalities', 'cities', 'provinces'));

    }
}
