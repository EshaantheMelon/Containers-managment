<?php

namespace App\Http\Controllers;

use App\Country;
use App\Port;
use Illuminate\Http\Request;

use App\Http\Requests;

class PortController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		return view('admin.port.index')
		       ->with('ports', Port::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('admin.port.create')
            ->with('country_code', Country::lists('name', 'code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'port'          => 'required',
            'country_code'  => 'required',
            'city_id'       => 'required'
        ]);
        Port::create($request->all());
        $request->session()->flash('alert-success', trans('port.alert-create.success'));
        return redirect()->route('admin.ports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Port::findOrFail($id);
        return view('admin.port.update')
            ->with('port', $client)
            ->with('country_code', Country::lists('name', 'code'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $port = Port::findOrFail($id);
        // update client information
        $port->update($request->all());

        $request->session()->flash('alert-success', trans('port.alert-update.success'));
        return redirect()->route('admin.ports.index');
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
        Port::find($id)->delete();

        $request->session()->flash('alert-success', trans('port.alert-delete.success'));
        return redirect()->route('admin.ports.index');
    }
}
