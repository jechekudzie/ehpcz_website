<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationCategory;
use App\Models\City;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Practitioner;
use App\Models\Profession;
use App\Models\Province;
use App\Models\Requirement;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Kapouet\Notyf\Facades\Notyf;

class PractitionersController extends Controller
{


    public function choose()
    {
        $student_fee = Application::where('name', 'Student')->get();
        $practitioner_fee = Application::where('name', 'Practitioner')->get();

        $personal_requirements = Requirement::whereIn('requirement_category_id', [1])->get();
        $qualification_requirements = Requirement::whereIn('requirement_category_id', [2])->get();
        $foreign_requirements = Requirement::whereIn('requirement_category_id', [3])->get();
        return view('practitioners.choose', compact('personal_requirements',
            'qualification_requirements', 'foreign_requirements', 'student_fee', 'practitioner_fee'));
    }

    public function choose_type($type)
    {
        if ($type == 1) {
            $amount_invoiced = Application::where('name', 'Student')->first()->fee;
            $application = Application::where('name', 'Student')->first();
        }

        if ($type == 2) {
            $amount_invoiced = Application::where('name', 'Practitioner')->first()->fee;
            $application = Application::where('name', 'Practitioner')->first();
        }

        $application_data['type'] = $type;
        $application_data['amount_invoiced'] = $amount_invoiced;
        $application_data['application'] = $application;

        Session::put('application_data', $application_data);

        //$data = Session::get('application_data');

        return redirect('/practitioners/create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practitioners = Practitioner::all();
        return view('practitioners.personal_info.index', compact('practitioners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titles = Title::all()->sortBy('name');
        $genders = Gender::all()->sortBy('name');
        $nationalities = Nationality::all()->sortBy('name');
        $cities = City::all()->sortBy('name');
        $provinces = Province::all()->sortBy('name');
        $professions = Profession::all()->sortBy('name');

        $type = Session::get('application_data')['type'];

        return view('practitioners.personal_info.create', compact('titles', 'genders',
            'nationalities', 'cities', 'provinces', 'type', 'professions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $practitioner = Practitioner::create(request()->validate([
            'title_id' => ['required'],
            'gender_id' => ['required'],
            'first_name' => ['required'],
            'middle_name' => ['nullable'],
            'last_name' => ['required'],
            'identification' => 'nullable|alpha_num', 'regex:/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/',
            'nationality_id' => ['required'],
            'dob' => ['required'],
        ]));


        if ($practitioner) {
            $practitioner->add_contact(request()->validate([
                'address' => ['required'],
                'country_id' => ['required'],
                'province_id' => ['required'],
                'city_id' => ['required'],
                'email' => ['required'],
                'mobile' => ['required'],
            ]));

        }

        //add practitioner requirements
        $identification_requirements = Requirement::where('requirement_category_id', 1)->get();

        foreach ($identification_requirements as $identification_requirement) {
            $requirement['requirement_id'] = $identification_requirement->id;
            $practitioner->add_practitioner_requirements($requirement);
        }

        $practitionerProfession = $practitioner->add_practitioner_profession(request()->validate([
            'profession_id' => ['required'],
        ],
            ['profession_id.required' => 'Profession is required']
        ));

        Notyf::success('Practitioner created successfully.');

        return redirect('practitioners/payments/' . $practitioner->id . '/application_invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Practitioner $practitioner)
    {
        $profession_count = 0;
        if ($practitioner->practitioner_professions) {

            $profession_count = $practitioner->practitioner_professions->count();
        }

        return view('practitioners.personal_info.show', compact('practitioner', 'profession_count'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Practitioner $practitioner)
    {
        $titles = Title::all()->sortBy('name');
        $genders = Gender::all()->sortBy('name');
        $nationalities = Nationality::all()->sortBy('name');
        return view('practitioners.personal_info.edit', compact('practitioner', 'titles', 'genders', 'nationalities'));
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
    public function destroy($id)
    {
        $practitioner = Practitioner::findOrFail($id);
        $practitioner->delete();
        return redirect('practitioners')->with('message', 'Practitioner deleted successfully.');
    }

    public function getPractitionerEmployment($id)
    {
        $practitioner = Practitioner::with('practitioner_contact', 'practitioner_employments')
            ->findOrFail($id);
        return view('practitioners.employment.show', compact('practitioner'));
    }

    public function getFormToUpdate($id)
    {
        $practitioner = Practitioner::with('practitioner_contact', 'practitioner_employments')
            ->findOrFail($id);
        $titles = Title::all()->sortBy('name');
        $genders = Gender::all()->sortBy('name');
        $nationalities = Nationality::all()->sortBy('name');
        $cities = City::all()->sortBy('name');
        $provinces = Province::all()->sortBy('name');

        return view('practitioners.personal_info.edit', compact('practitioner', 'titles', 'genders',
            'nationalities', 'cities', 'provinces'));

    }

    public function message_create()
    {
        return view('messages');
    }


    public function message_store()
    {
        $emails = [
            'jechekudzie@gmail.com',
            'nigel@leadingdigital.africa',
            'cloud@leadingdigital.africa',
            'billing@leadingdigital.africa',
            'walter@codekitexpress.com',
            'info@codekitexpress.com',
            'waltertafadzwasithole@gmail.com',
            'hello@leadingdigital.africa',
            'tafadzwatheg@gmail.com',
            'dudansito@gmail.com',

            'jechekudzie@gmail.com',
            'nigel@leadingdigital.africa',
            'cloud@leadingdigital.africa',
            'billing@leadingdigital.africa',
            'walter@codekitexpress.com',
            'info@codekitexpress.com',
            'waltertafadzwasithole@gmail.com',
            'hello@leadingdigital.africa',
            'tafadzwatheg@gmail.com',
            'dudansito@gmail.com',

        ];


        $variable = 'Data has been passed';
        foreach ($emails as $email) {
            try {
                /* Log::info('I have sent the email to ' . $email);*/
                Mail::to($email)->queue(new \App\Mail\RenewalReminder($variable));
            } catch (\Exception $exception) {
                Log::error($exception);
            }
        }

        return back()->with('message', 'email done');
    }

}
