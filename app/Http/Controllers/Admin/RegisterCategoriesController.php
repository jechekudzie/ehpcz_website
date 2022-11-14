<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\RegisterCategory;
use Illuminate\Http\Request;

class RegisterCategoriesController extends Controller
{
    public function index()
    {
        $register_categories = RegisterCategory::all();
        return view('admin.register_categories.index', compact('register_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.register_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        RegisterCategory::create(request()->validate([
            'name' => ['required'],
            'pc_description' => ['nullable'],
            'rc_description' => ['nullable'],
        ]));

        return back()->with('message','Register Category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterCategory $registerCategory)
    {
        return view('admin.register_categories.show', compact('registerCategory'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterCategory $registerCategory)
    {

        return view('admin.register_categories.edit', compact('registerCategory'));

    }

    /**
     * Update the specified resource in storage.
     *x
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterCategory $registerCategory)
    {
        //update the institution
        $registerCategory->update(request()->validate([
            'name' => ['required'],
            'pc_description' => ['nullable'],
            'rc_description' => ['nullable'],
        ]));

        return redirect('/admin/register_categories')->with('message', 'Register Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterCategory $registerCategory)
    {
        //
        $registerCategory->delete();
        return redirect('/admin/register_categories')->with('message', 'Register Category deleted successfully.');

    }

}
