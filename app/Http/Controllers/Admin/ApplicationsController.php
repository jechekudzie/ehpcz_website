<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Application;
use App\Models\ApplicationCategory;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    //
    public function index(ApplicationCategory $applicationCategory)
    {

        return view('admin.applications.index', compact('applicationCategory'));
    }

    public function create(ApplicationCategory $applicationCategory)
    {
        //
        return view('admin.applications.create',compact('applicationCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationCategory $applicationCategory)
    {
        $application = request()->validate([
            'name' => ['required'],
            'fee' => ['nullable'],
            'create_url' => ['nullable'],
            'view_url' => ['nullable'],
            'payment_url' => ['nullable'],
            'outcome' => ['nullable'],
        ]);

        $applicationCategory->create_application($application);


        return back()->with('message', 'Application added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {

        return view('admin.applications.edit', compact('application'));

    }

    /**
     * Update the specified resource in storage.
     *x
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Application $application)
    {
        //update the application
        $application->update(request()->validate([
            'name' => ['required'],
            'fee' => ['nullable'],
            'create_url' => ['nullable'],
            'view_url' => ['nullable'],
            'payment_url' => ['nullable'],
            'outcome' => ['nullable'],
        ]));

        return redirect('/admin/applications/'.$application->application_category->id.'/index')->with('message', 'Application updated successfully.');

    }
    public function destroy(Application $application)
    {
        //
        $application->delete();
        return redirect('/admin/applications')->with('message', 'Application deleted successfully.');

    }

}
