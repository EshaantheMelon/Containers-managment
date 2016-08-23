<?php

namespace App\Http\Controllers;

use App\Port;
use App\Travel;
use App\Vessel;
use Illuminate\Http\Request;

use App\Http\Requests;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travels = Travel::all();
        return view('admin.travel.index')->with('travels', $travels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vessels = Vessel::lists('vessel', 'id');
        return view('admin.travel.create')
            ->with('ports', Port::lists('port', 'id'))
            ->with('vessels', $vessels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'number'           => 'required|unique:travels,number',
            'date_enter'       => 'required|date',
            'date_out'         => 'required|date',
            'start_travel_date'=> 'required|date',
            'end_travel_date'  => 'required|date',
            'bunkers_delivery_date' => 'required|date',
            'date_hire_start'  => 'required|date',
            'date_hire_end'    => 'required|date'
        ]);

        Travel::create($request->all());

        $request->session()->flash('alert-success', trans('travel.alert-create.success'));
        return redirect()->route('admin.travels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.travel.show')
            ->with('travel', Travel::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $travel = Travel::findOrFail($id);
        return view('admin.travel.update')
            ->with('travel', $travel)
            ->with('ports', Port::lists('port', 'id'))
            ->with('vessels', Vessel::lists('vessel', 'id'));
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
        $this->validate($request, [
            'number'           => 'required|unique:travels,number,' . $id,
            'date_enter'       => 'required|date',
            'date_out'         => 'required|date',
            'start_travel_date'=> 'required|date',
            'end_travel_date'  => 'required|date',
            'bunkers_delivery_date' => 'required|date',
            'date_hire_start'  => 'required|date',
            'date_hire_end'    => 'required|date'
        ]);

        $travel = Travel::find($id);
        $travel->update($request->all());

        $request->session()->flash('alert-success', trans('travel.alert-update.success'));
        return redirect()->route('admin.travels.index');
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
        Travel::find($id)->delete();
        $request->session()->flash('alert-success', trans('travel.alert-delete.success'));
        return redirect()->route('admin.travels.index');
    }
}
