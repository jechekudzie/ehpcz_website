<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\RegisterCategory;
use App\Models\RegisterCondition;
use App\Models\Requirement;
use Illuminate\Http\Request;

class RegisterConditionController extends Controller
{
    public function index(RegisterCategory $registerCategory)
    {
        //
        return view('admin.register_conditions.index', compact('registerCategory'));
    }

    public function create(RegisterCategory $registerCategory)
    {
        return view('admin.register_conditions.create', compact('registerCategory'));
    }

    public function store(RegisterCategory $registerCategory)
    {
        //
        $registerCategory->add_register_conditions(request()->validate([
            'condition' => 'required'
        ]));
        return back()->with('message', 'Condition added successfully');

    }

    public function show(RegisterCondition $registerCondition)
    {
        //
        return view('admin.register_conditions.show', compact('registerCondition'));
    }

    public function edit(RegisterCondition $registerCondition)
    {
        //
        $register_categories = RegisterCategory::all();
        $requirements = Requirement::all();
        return view('admin.register_conditions.edit',
            compact('registerCondition', 'register_categories', 'requirements'));
    }

    public function update(RegisterCondition $registerCondition)
    {
        //
        $registerCondition->update(request()->validate([

            'condition' => ['required'],

        ]));

        return redirect('/admin/register_conditions/'.$registerCondition->register_category->id.'/index')->with('message', 'Register condition updated successfully.');

    }

    public function destroy(RegisterCondition $registerCondition)
    {
        //
        $registerCondition->delete();
        return redirect('/admin/register_conditions/' . $registerCondition->register_category->id . '/index')->with('message', 'Register condition deleted successfully.');
    }


}
