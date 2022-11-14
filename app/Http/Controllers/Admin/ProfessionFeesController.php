<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\Profession;
use App\Models\ProfessionFee;
use App\Models\RegisterCategory;
use App\Models\Requirement;
use Illuminate\Http\Request;

class ProfessionFeesController extends Controller
{
    //
    public function index(Profession $profession)
    {
        //
        return view('admin.profession_fees.index', compact('profession'));
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
        return view('admin.profession_fees.create', compact('profession', 'register_categories'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Profession $profession)
    {
        //update fees for each profession for a register category on submission
        $register_category = request()->all();

        //dd($register_category['register_category_id']);
            $profession_fee['register_category_id'] = $register_category['register_category_id'];
            $profession_fee['profession_id'] = $profession->id;
            $profession_fee['registration'] = $register_category['registration'];
            $profession_fee['renewal'] = $register_category['renewal'];
            $profession_fee['application'] = $register_category['application'];
            if ($existing_fees = ProfessionFee::where('profession_id', $profession->id)->where('register_category_id',$register_category['register_category_id'])
                ->first()) {
                $existing_fees->update([
                    'registration' => $register_category['registration'],
                    'renewal' => $register_category['renewal'],
                ]);

                return back()->with('message', $existing_fees->register_category->name . ' fees updated successfully');
            } else {
                $profession_fees = ProfessionFee::create($profession_fee);
                return back()->with('message', $profession_fees->register_category->name . ' fees added successfully');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProfessionFee $professionFee)
    {
        //
        return view('admin.profession_fees.show', compact('professionFee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfessionFee $professionFee)
    {
        //
        $professions = Profession::all();
        $register_categories = RegisterCategory::all();
        return view('admin.profession_fees.edit',
            compact('professionFee', 'professions', 'register_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionFee $professionFee)
    {
        //
        $professionFee->update(request()->validate([
            'registration' => ['nullable'],
            'renewal' => ['nullable'],
            'application' => ['nullable'],
        ]));
        return redirect('/admin/profession_fees/'.$professionFee->profession_id.'/index')->with('message', 'Fees updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfessionFee $professionFee)
    {
        //
        $professionFee->delete();
        return redirect('/admin/profession_fees')->with('message', 'Requirements deleted successfully.');

    }
}
