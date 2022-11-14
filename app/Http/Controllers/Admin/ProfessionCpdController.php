<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Profession;
use App\Models\ProfessionCpd;
use App\Models\ProfessionFee;
use App\Models\RegisterCategory;
use Illuminate\Http\Request;

class ProfessionCpdController extends Controller
{
    //
    public function index(Profession $profession)
    {
        //
        return view('admin.profession_cpds.index', compact('profession'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profession $profession)
    {
        //
        $register_categories = RegisterCategory::all();
        return view('admin.profession_cpds.create', compact('profession', 'register_categories'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Profession $profession)
    {
        //update cpds for each profession for a register category on submission
        $register_category = request()->all();

        $profession_cpd['register_category_id'] = $register_category['register_category_id'];
        $profession_cpd['profession_id'] = $profession->id;
        $profession_cpd['standard_points'] = $register_category['standard_points'];
        if ($existing_fees = ProfessionCpd::where('profession_id', $profession->id)->where('register_category_id',
            $register_category['register_category_id'])
            ->first()) {
            $existing_fees->update([
                'standard_points' => $register_category['standard_points'],
            ]);

            return back()->with('message', $existing_fees->register_category->name . ' CPDs updated successfully');
        } else {
            $profession_cpd = ProfessionCpd::create($profession_cpd);
            return back()->with('message', $profession_cpd->register_category->name . ' CPDs added successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProfessionCpd $professionCpd)
    {
        return view('admin.profession_cpds.show', compact('professionCpd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfessionCpd $professionCpd)
    {
        //
        $professions = Profession::all();
        $register_categories = RegisterCategory::all();
        return view('admin.profession_cpds.edit',
            compact('professionCpd', 'register_categories', 'professions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionCpd $professionCpd)
    {
        //
        $professionCpd->update(request()->validate([
            'standard_points' => 'required',
        ]));
        return redirect('/admin/profession_cpds/' . $professionCpd->profession_id . '/index')->with('message', 'CPD updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfessionCpd $professionCpd)
    {
        //
        $professionCpd->delete();
        return redirect('/admin/profession_cpds')->with('message', 'CPDs deleted successfully.');

    }
}
