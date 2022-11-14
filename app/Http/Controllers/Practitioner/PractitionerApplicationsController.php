<?php

namespace App\Http\Controllers\Practitioner;

use App\Http\Controllers\Controller;
use App\Models\Practitioner;
use App\Models\PractitionerApplication;
use App\Models\PractitionerProfessionQualification;
use Illuminate\Http\Request;

class PractitionerApplicationsController extends Controller
{
    //

    public function index(Practitioner $practitioner)
    {
        return view('practitioners.applications.index', compact('practitioner'));

    }

    //registration view
    public function show(PractitionerApplication $practitionerApplication)
    {
        $practitioner = $practitionerApplication->practitioner;

        if ($practitionerApplication->application->id == 1) {
            $practitioner_profession_qualification = PractitionerProfessionQualification::find($practitionerApplication->reference);
        }
        return view('practitioners.applications.show', compact('practitioner', 'practitionerApplication','practitioner_profession_qualification'));

    }

    //renewal view
    public function renewal(PractitionerApplication $practitionerApplication)
    {
        $practitioner = $practitionerApplication->practitioner;

        if ($practitionerApplication->application->id == 2) {
            $practitioner_profession_qualification = PractitionerProfessionQualification::find($practitionerApplication->reference);
        }
        return view('practitioners.applications.renewal', compact('practitioner', 'practitionerApplication','practitioner_profession_qualification'));

    }
}
