<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Practitioner;
use App\Models\PractitionerProfession;
use App\Models\PractitionerProfessionRegister;
use App\Models\Profession;
use App\Models\Province;
use App\Models\QualificationCategory;
use App\Models\RegisterCategory;
use App\Models\Title;
use Illuminate\Http\Request;
use Kapouet\Notyf\Facades\Notyf;

class PractitionerProfessionRegisterController extends Controller
{
    public function index(PractitionerProfession $practitionerProfession)
    {
        return view('practitioners.profession_register_categories.index', compact('practitionerProfession'));
    }

    public function create(PractitionerProfession $practitionerProfession)
    {
        $register_categories = RegisterCategory::all();
        $practitioner = $practitionerProfession->practitioner;
        return view('practitioners.profession_register_categories.create', compact('practitionerProfession', 'register_categories', 'practitioner'));
    }

    public function store(PractitionerProfession $practitionerProfession)
    {
        $register_category = request()->validate([
            'register_category_id' => 'required'
        ]);

        $check_if_register_already_exist = PractitionerProfessionRegister::where('practitioner_profession_id', $practitionerProfession->id)
            ->where('register_category_id', $register_category['register_category_id'])->first();

        if ($check_if_register_already_exist == null) {
            $existing_of_registers = $practitionerProfession->practitioner_profession_registers->count();
            if ($existing_of_registers == 0) {
                $is_active = 1;
                $practitionerProfession->update([
                    'register_category_id' => $register_category['register_category_id']
                ]);
            } else {
                $is_active = 0;
            }
            $practitionerProfession->add_practitioner_profession_register([
                'register_category_id' => $register_category['register_category_id'],
                'is_active' => $is_active,
            ]);
            Notyf::success('Register added successfully.');
            return redirect('/practitioners/professions/' . $practitionerProfession->id . '/show');
        } else {

            Notyf::success('This register already exists on this profession, choose another one.');
            return back();
        }
    }

    public function show(PractitionerProfessionRegister $practitionerProfessionRegister)
    {
        $practitioner = $practitionerProfessionRegister->practitioner_profession->practitioner;
        return view('practitioners.profession_register_categories.show', compact('practitionerProfessionRegister', 'practitioner'));

    }

    public function edit(PractitionerProfessionRegister $practitionerProfessionRegister)
    {
        $practitioner = $practitionerProfessionRegister->practitioner_profession->practitioner;
        return view('practitioners.profession_register_categories.edit', compact('practitioner', 'practitionerProfessionRegister'));
    }

    public function update(PractitionerProfessionRegister $practitionerProfessionRegister)
    {
        $practitionerProfessionRegister->update(request()->validate([
            'register_category_id' => ['required'],
        ]));

        Notyf::success('Practitioner updated successfully.');
        return redirect('/practitioners/professions/' . $practitionerProfessionRegister->practitioner_profession->id);
    }


    public function destroy(PractitionerProfessionRegister $practitionerProfessionRegister)
    {
        $practitioner = $practitionerProfessionRegister->practitioner_profession->practitioner;
        $practitionerProfessionRegister->delete();
        return redirect('practitioners')->with('message', 'Practitioner deleted successfully.');
    }

}
