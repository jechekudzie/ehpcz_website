<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\Profession;
use App\Models\ProfessionRequirement;
use App\Models\RegisterCategory;
use App\Models\Requirement;
use Illuminate\Http\Request;

class ProfessionRequirementsController extends Controller
{
    //

    public function index(Profession $profession)
    {
        //
        return view('admin.profession_requirements.index', compact('profession'));
    }

    public function create(Profession $profession)
    {
        //
        $register_categories = RegisterCategory::all();
        $requirements = Requirement::whereNotIn('requirement_category_id',[1])->get();
        return view('admin.profession_requirements.create', compact('profession', 'register_categories', 'requirements'));


    }

    public function store(Profession $profession)
    {
        //
        $register_category_id = request('register_category_id');
        $requirements = request('requirement_id');
        if ($requirements) {
            foreach ($requirements as $requirement) {
                $profession_requirement['profession_id'] = $profession->id;
                $profession_requirement['register_category_id'] = $register_category_id;
                $profession_requirement['requirement_id'] = $requirement;

                ProfessionRequirement::create($profession_requirement);
            }
        }

        return back()->with('message', 'Requirements added successfully');

    }


    public function show(ProfessionRequirement $professionRequirement)
    {
        //
        return view('admin.profession_requirements.show', compact('professionRequirement'));
    }

    public function edit(ProfessionRequirement $professionRequirement)
    {
        //
        $professions = Profession::all();
        $register_categories = RegisterCategory::all();
        $requirements = Requirement::all();
        return view('admin.profession_requirements.edit',
            compact('professionRequirement', 'professions', 'register_categories', 'requirements'));
    }

    public function update(ProfessionRequirement $professionRequirement)
    {
        //
        $professionRequirement->update(request()->validate([

            'profession_id' => ['required'],
            'register_category_id' => ['nullable'],
            'requirement_id' => ['nullable'],
            'is_mandatory' => ['nullable']

        ]));

        return redirect('/admin/profession_requirements')->with('message', 'Requirements updated successfully.');

    }

    public function destroy(ProfessionRequirement $professionRequirement)
    {
        //
        $professionRequirement->delete();
        return redirect('/admin/profession_requirements')->with('message', 'Requirements deleted successfully.');

    }
}
