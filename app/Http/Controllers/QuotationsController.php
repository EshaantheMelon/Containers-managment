<?php

namespace App\Http\Controllers;

use App\Position;
use App\Quotation;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuotationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quotation.index')
            ->with('quotations', Quotation::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quotation.create')
            ->with('positions', Position::lists('position', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Quotation::create($request->all());
        $request->session()->flash('alert-success', trans('quotation.alert-create.success'));
        return redirect()->route('admin.quotations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quotation = Quotation::findOrFail($id);
        return view('admin.quotation.show')
            ->with('quotation', $quotation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $quotation = Quotation::findOrFail($id);
        return view('admin.quotation.update')
            ->with('quotation', $quotation)
            ->with('positions', Position::lists('position', 'id'));
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
        $quotation = Quotation::findOrFail($id);
        $quotation->update($request->all());

        $request->session()->flash('alert-success', trans('quotation.alert-update.success'));
        return redirect()->route('admin.quotations.index');
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
        Quotation::find($id)->delete();
        $request->session()->flash('alert-success', trans('quotation.alert-delete.success'));
        return redirect()->route('admin.quotations.index');
    }
}
