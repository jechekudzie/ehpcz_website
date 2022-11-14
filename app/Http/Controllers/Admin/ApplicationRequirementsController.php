<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Application;
use App\Models\ApplicationRequirement;
use App\Models\Profession;

use Illuminate\Http\Request;

class ApplicationRequirementsController extends Controller
{
    //
    public function index(Application $application)
    {
        //

        $application_requirements = $application->application_requirements;
        return view('admin.application_requirements.index', compact('application_requirements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Application $application)
    {
        //
        return view('admin.application_requirements.create', compact('application'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Application $application)
    {
        //
        $requirement = request()->validate([
            'name' => ['required']
        ]);
        $application->add_application_requirement($requirement);

        return redirect('/admin/application_requirements/create')->with('message', 'Requirement added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
        return view('admin.application_requirements.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationRequirement $applicationRequirement)
    {
        //

        return view('admin.application_requirements.edit',
            compact('applicationRequirement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationRequirement $applicationRequirement)
    {
        //
        $applicationRequirement->update(request()->validate([
            'name' => ['required']
        ]));

        return redirect('/admin/application_requirements')->with('message', 'Application requirement updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationRequirement $applicationRequirement)
    {
        //
        $applicationRequirement->delete();
        return redirect('/admin/application_requirements')->with('message', 'Deleted successfully.');

    }
}
