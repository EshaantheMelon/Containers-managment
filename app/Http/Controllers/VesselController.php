<?php

namespace App\Http\Controllers;

use App\Travel;
use App\Vessel;
use Illuminate\Http\Request;

use App\Http\Requests;

class VesselController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->isMethod('post')) {
            $travel = $request->get('travel_id');

            if (!empty($travel)) {
                $vessels = [Travel::find($travel)->vessel];
            } else {
                $vessels = Vessel::all();
            }

        } else {
            $vessels = Vessel::all();
        }


        return view('admin.vessel.index')
            ->with('travels', Travel::lists('number', 'id'))
            ->with('vessels', $vessels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vessel.create');
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
            'vessel' => 'required|unique:vessels,vessel',
            'type'   => 'required'
        ]);
        Vessel::create($request->all());

        $request->session()->flash('alert-success', trans('vessel.alert-create.success'));
        return redirect()->route('admin.vessels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.vessel.show')
            ->with('vessel', Vessel::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vessel = Vessel::findOrFail($id);
        return view('admin.vessel.update')->with('vessel', $vessel);
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
        $this->validate($request, [
            'vessel' => 'required|unique:vessels,vessel,' . $id,
            'type'   => 'required'
        ]);

        $vessel = Vessel::find($id);
        $vessel->update($request->all());

        $request->session()->flash('alert-success', trans('vessel.alert-update.success'));
        return redirect()->route('admin.vessels.index');
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
        Vessel::find($id)->delete();
        $request->session()->flash('alert-success', trans('vessel.alert-delete.success'));
        return redirect()->route('admin.vessels.index');
    }

}
