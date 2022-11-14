<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Profession;
use App\Models\Qualification;
use Illuminate\Http\Request;

class QualificationsController extends Controller
{
    public function index()
    {
        //
        $qualifications = Qualification::all();
        return view('admin.qualifications.index', compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $professions = Profession::all();

        return view('admin.qualifications.create', compact('professions'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $qualification = Qualification::create(request()->validate([
            'profession_id' => ['required'],
            'name' => ['required']
        ]
            /*['profession_id.required' => 'Choose profession first']*/
        ));

        return redirect('/admin/qualifications/create')->with('message', $qualification->name
            . ' added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Qualification $qualification)
    {
        //
        return view('admin.qualifications.show', compact('qualification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Qualification $qualification)
    {
        //
        $professions = Profession::all();
        return view('admin.qualifications.edit',
            compact('qualification', 'professions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Qualification $qualification)
    {
        //
        $qualification->update(request()->validate([

            'profession_id' => ['required'],
            'name' => ['required']

        ]));

        return redirect('/admin/qualifications')->with('message', 'Professional qualification updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qualification $qualification)
    {
        //
        $qualification->delete();
        return redirect('/admin/qualifications')->with('message', 'Professional qualification deleted successfully.');

    }
}
