<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Requirement;
use App\Models\RequirementCategory;
use Illuminate\Http\Request;

class RequirementsController extends Controller
{
    //
    public function index(RequirementCategory $requirementCategory)
    {
        //

        return view('admin.requirements.index', compact('requirementCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RequirementCategory $requirementCategory)
    {
        //
        $requirement_categories = RequirementCategory::all();
        return view('admin.requirements.create', compact('requirement_categories','requirementCategory'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequirementCategory $requirementCategory)
    {
        //
        $requirements = request()->validate([
            'name' => ['required'],
            'is_compulsory' => ['nullable']
        ]);

        $requirementCategory->create_requirements($requirements);

        return back()->with('message',
            'Requirement added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Requirement $requirement)
    {
        //
        return view('admin.requirements.show', compact('requirement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Requirement $requirement)
    {
        //
        $requirement_categories = RequirementCategory::all();
        return view('admin.requirements.edit',
            compact('requirement', 'requirement_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requirement $requirement)
    {
        //
        $requirement->update(request()->validate([

            'requirement_category_id' => ['required'],
            'name' => ['required'],
            'is_compulsory' => ['nullable']

        ]));

        return redirect('/admin/requirements')->with('message', 'Professional qualification updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requirement $requirement)
    {
        //
        $requirement->delete();
        return redirect('/admin/requirements')->with('message', 'Professional qualification deleted successfully.');

    }
}
