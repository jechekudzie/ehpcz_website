<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ApplicationCategory;
use Illuminate\Http\Request;

class ApplicationCategoriesController extends Controller
{
    //

    public function index()
    {
        $application_categories = ApplicationCategory::all();
        return view('admin.application_categories.index', compact('application_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.application_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        ApplicationCategory::create(request()->validate([
            'name' => ['required'],
            'create_url' => ['nullable'],
            'view_url' => ['nullable'],
            'payment_url' => ['nullable'],
            'outcome' => ['nullable'],
        ]));

        return back()->with('message','Application Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationCategory $applicationCategory)
    {
        return view('admin.application_categories.show', compact('applicationCategory'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationCategory $applicationCategory)
    {

        return view('admin.application_categories.edit', compact('applicationCategory'));

    }

    /**
     * Update the specified resource in storage.
     *x
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationCategory $applicationCategory)
    {
        //update the applicationCategory
        $applicationCategory->update(request()->validate([
            'name' => ['required'],
            'create_url' => ['nullable'],
            'view_url' => ['nullable'],
            'payment_url' => ['nullable'],
            'outcome' => ['nullable'],
        ]));

        return redirect('/admin/application_categories')->with('message', 'Application Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationCategory $applicationCategory)
    {
        //
        $applicationCategory->delete();
        return redirect('/admin/application_categories')->with('message', 'Application Category deleted successfully.');

    }


}
