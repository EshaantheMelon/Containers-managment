<?php

namespace App\Http\Controllers;

use App\Surestaries;
use Illuminate\Http\Request;

use App\Http\Requests;

class SurestariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.surestaries.index')
            ->with('surestaries', Surestaries::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.surestaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surestaries = Surestaries::findOrFail($id);
        return view('admin.surestaries.update')
            ->with('surestaries', $surestaries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $surestaries = Surestaries::findOrFail($id);
        $surestaries->update([
            'free_time'  => $request->free_time,
            'tariff'     => $request->tariff
        ]);

        $request->session()->flash('alert-success', trans('surestaries.alert-update.success'));
        return redirect()->route('admin.surestaries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        Surestaries::find($id)->delete();

        $request->session()->flash('alert-success', trans('surestaries.alert-delete.success'));
        return redirect()->route('admin.surestaries.index');
    }
}
