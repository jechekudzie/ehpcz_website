<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\AccreditedInstitution;
use App\Models\Institution;
use App\Models\Qualification;
use Illuminate\Http\Request;

class AccreditedInstitutionsController extends Controller
{
    //
    public function index(Institution $institution)
    {
        $accredited_institutions = $institution->accredited_institutions;

        return view('admin.accredited_institutions.index', compact('accredited_institutions', 'institution'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Institution $institution)
    {
        //
        $qualifications = Qualification::all()->sortBy('name');
        return view('admin.accredited_institutions.create', compact('qualifications', 'institution'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Institution $institution)
    {
        $qualifications = request('qualification_id');

        foreach ($qualifications as $qualification) {
            $accreditation['qualification_id'] = $qualification;
            $accreditation['institution_id'] = $institution->id;

            if (AccreditedInstitution::where('institution_id', $institution->id)->where
                ('qualification_id', $qualification)->first() != null) {
                return back()->with('message', 'Qualification has already been assigned to this institution.');
            }
            AccreditedInstitution::create($accreditation);
        }

        return back()->with('message', 'Accredited Institution assigned successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(AccreditedInstitution $accreditedInstitution)
    {
        return view('admin.accredited_institutions.show', compact('accreditedInstitution'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AccreditedInstitution $accreditedInstitution)
    {
        $qualifications = Qualification::all()->sortBy('name');
        $institutions = Institution::all()->sortBy('name');

        return view('admin.accredited_institutions.edit', compact('accreditedInstitution', 'qualifications', 'institutions'));

    }

    /**
     * Update the specified resource in storage.
     *x
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccreditedInstitution $accreditedInstitution)
    {
        //update the institution
        $accreditedInstitution->update(request()->validate([
            'institution_id' => ['required'],
            'qualification_id' => ['required'],
        ]));


        return redirect('/admin/accredited_institutions')->with('message', 'Accredited Institution updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccreditedInstitution $accreditedInstitution)
    {
        //
        $accreditedInstitution->delete();
        return redirect('/admin/accredited_institutions')->with('message', 'Accreditation deleted successfully.');

    }

}
