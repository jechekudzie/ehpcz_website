<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\RegisterRequirement;
use App\Models\RegisterCategory;
use App\Models\Requirement;
use Illuminate\Http\Request;

class RegisterRequirementController extends Controller
{
    //

    public function index(RegisterCategory $registerCategory)
    {
        //
        return view('admin.register_requirements.index', compact('registerCategory'));
    }

    public function create(RegisterCategory $registerCategory)
    {
        $requirements = Requirement::whereNotIn('requirement_category_id', [1, 2])->get();
        return view('admin.register_requirements.create', compact('registerCategory', 'requirements'));
    }

    public function store(RegisterCategory $registerCategory)
    {
        //
        $requirements = request('requirement_id');

        if ($requirements) {
            foreach ($requirements as $requirement) {

                $register_requirement['register_category_id'] = $registerCategory->id;
                $register_requirement['requirement_id'] = $requirement;

                if ($registerCategory->register_requirements->where('requirement_id', $requirement)->first() == null) {
                    RegisterRequirement::create($register_requirement);
                }
            }
        }

        return back()->with('message', 'Requirements added successfully');

    }


    public function show(RegisterRequirement $registerRequirement)
    {
        //
        return view('admin.register_requirements.show', compact('registerRequirement'));
    }

    public function edit(RegisterRequirement $registerRequirement)
    {
        //
        $register_categories = RegisterCategory::all();
        $requirements = Requirement::all();
        return view('admin.register_requirements.edit',
            compact('registerRequirement', 'register_categories', 'requirements'));
    }

    public function update(RegisterRequirement $registerRequirement)
    {
        //
        $registerRequirement->update(request()->validate([

            'profession_id' => ['required'],
            'register_category_id' => ['nullable'],
            'requirement_id' => ['nullable'],
            'is_mandatory' => ['nullable']

        ]));

        return redirect('/admin/register_requirements')->with('message', 'Requirements updated successfully.');

    }

    public function destroy(RegisterRequirement $registerRequirement)
    {
        //
        $registerRequirement->delete();
        return redirect('/admin/register_requirements/'.$registerRequirement->register_category->id.'/index')->with('message', 'Requirement deleted successfully.');

    }



}
