<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\PractitionerApplication;
use App\Models\PractitionerProfession;
use App\Models\PractitionerProfessionQualification;
use App\Models\ProfessionFee;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Kapouet\Notyf\Facades\Notyf;

class PractitionerProfessionQualificationController extends Controller
{
    //
    public function store(PractitionerProfession $practitionerProfession)
    {
        $qualification = [];
        $qualification_category_id = request()->validate([
            'qualification_category_id' => 'required'
        ]);

        //get profession
        $profession = $practitionerProfession->profession;
        if ($qualification_category_id['qualification_category_id'] == 1) {
            $qualification = request()->validate([
                'qualification_category_id' => 'required',
                'qualification_id' => 'required',
                'accredited_institution_id' => 'required',
                'commencement_date' => 'required',
                'completion_date' => 'required',
            ]);
        }
        if ($qualification_category_id['qualification_category_id'] == 2) {
            $qualification = request()->validate([
                'qualification_category_id' => 'required',
                'qualification_id' => 'required',
                'accredited_institution_id' => 'required',
                'commencement_date' => 'required',
                'completion_date' => 'required',
            ]);
        }
        $qualification['practitioner_profession_id'] = $practitionerProfession->id;
        $practitioner_profession_qualification = PractitionerProfessionQualification::create($qualification);

        //check if user has another existing qualification
        if ($practitionerProfession->practitioner_profession_qualifications->count() >= 1) {
            $practitioner_profession_qualification->update([
                'is_primary' => 1
            ]);

        }

        $qualification_category_id = (int)$qualification_category_id['qualification_category_id'];
        if ($qualification_category_id == 1) {
            $qualification_requirements = Requirement::whereIn('requirement_category_id', [2])->get();
        } else {
            $qualification_requirements = Requirement::whereIn('requirement_category_id', [2, 3])->get();
        }

        if ($qualification_requirements) {
            foreach ($qualification_requirements as $qualification_requirement) {
                $requirement['requirement_id'] = $qualification_requirement->id;
                $practitioner_profession_qualification->add_qualification_requirements($requirement);
            }
        }

        Notyf::success('Qualification added successfully.');
        return back();


    }
}
