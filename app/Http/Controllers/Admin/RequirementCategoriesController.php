<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\RequirementCategory;
use Illuminate\Http\Request;

class RequirementCategoriesController extends Controller
{
    //
    public function index()
    {
        $requirement_categories = RequirementCategory::all();
        return view('admin.requirement_categories.index', compact('requirement_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.requirement_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        RequirementCategory::create(request()->validate([
            'name' => ['required'],
        ]));

        return back()->with('message','Requirement Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(RequirementCategory $requirementCategory)
    {
        return view('admin.requirement_categories.show', compact('requirementCategory'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RequirementCategory $requirementCategory)
    {

        return view('admin.requirement_categories.edit', compact('requirementCategory'));

    }

    /**
     * Update the specified resource in storage.
     *x
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequirementCategory $requirementCategory)
    {
        //update the requirementCategory
        $requirementCategory->update(request()->validate([
            'name' => ['required'],
        ]));


        return redirect('/admin/requirement_categories')->with('message', 'Requirement Category updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequirementCategory $requirementCategory)
    {
        //
        $requirementCategory->delete();
        return redirect('/admin/requirement_categories')->with('message', 'Requirement Category deleted successfully.');

    }

}
