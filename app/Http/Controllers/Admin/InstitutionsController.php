<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    //
    public function index()
    {
        $institutions = Institution::all();
        return view('admin.institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.institutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Institution::create(request()->validate([
            'name' => ['required'],
        ]));

        return back()->with('message','Institution added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        return view('admin.institutions.show', compact('institution'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {

        return view('admin.institutions.edit', compact('institution'));

    }

    /**
     * Update the specified resource in storage.
     *x
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Institution $institution)
    {
        //update the institution
        $institution->update(request()->validate([
            'name' => ['required'],
        ]));

        return redirect('/admin/institutions')->with('message', 'Institution updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        //
        $institution->delete();
        return redirect('/admin/institutions')->with('message', 'Institution deleted successfully.');

    }

}
