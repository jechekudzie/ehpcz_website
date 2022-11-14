<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\QualificationCategory;
use Illuminate\Http\Request;

class QualificationCategoriesController extends Controller
{
    //
    public function index()
    {
        $qualification_categories = QualificationCategory::all();
        return view('admin.qualification_categories.index', compact('qualification_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.qualification_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        QualificationCategory::create(request()->validate([
            'name' => ['required'],
            'description' => ['nullable'],

        ]));

        return back()->with('message','Qualification Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(QualificationCategory $qualificationCategory)
    {
        return view('admin.qualification_categories.show', compact('qualificationCategory'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(QualificationCategory $qualificationCategory)
    {

        return view('admin.qualification_categories.edit', compact('qualificationCategory'));

    }

    /**
     * Update the specified resource in storage.
     *x
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(QualificationCategory $qualificationCategory)
    {
        //update the institution
        $qualificationCategory->update(request()->validate([
            'name' => ['required'],
            'description' => ['nullable'],
        ]));

        return redirect('/admin/qualification_categories')->with('message', 'Qualification Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(QualificationCategory $qualificationCategory)
    {
        //
        $qualificationCategory->delete();
        return redirect('/admin/qualification_categories')->with('message', 'Qualification Category deleted successfully.');

    }
}
