<?php

namespace App\Http\Controllers;

use App\BillLading;
use App\City;
use App\Country;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;

class BillLadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('admin.bill_lading.index')
            ->with('bill_ladings', BillLading::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $position = Session::get('position');
        $position->atPol;
        $position->atShipper;
        $position->atBoard;
        $position->atDepot;
        $bill = new BillLading();
        $bill->number                = rand(0, 1000);

        $bill->notify                = 'notify';
        $bill->place_of_loading      = 'place';
        $bill->port_of_loading_pol   = $position->atPol()->first()->port_id;
        $bill->place_of_delivery     = '';
        $bill->number_original_bls   = '';
        $bill->number_packages       = '';
        $bill->shipper_id            = $position->atShipper->first()->id;
        $bill->position_id           = $position->id;
        $bill->travel_id             = $position->atShipper->first()->travel_id;
        $bill->vessel_id             = $position->atShipper->first()->travel->vessel_id;
        $bill->save();

        return view('admin.bill_lading.create')
            ->with('bill_lading', $bill);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bill = BillLading::find($request->id);
        $bill->update($request->all());

        $request->session()->flash('alert-success', trans('bill_lading.alert-create.success'));
        return redirect()->route('admin.bill-of-lading.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.bill_lading.show')
            ->with('bill_lading', BillLading::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill_lading = BillLading::findOrFail($id);
        return view('admin.bill_lading.update')
            ->with('bill_lading', $bill_lading);
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
        // find bill_lading
        $bill_lading = BillLading::findOrFail($id);
        $bill_lading->update($request->all());

        $request->session()->flash('alert-success', trans('bill_lading.alert-update.success'));
        return redirect()->route('admin.bill-of-lading.index');
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
        BillLading::find($id)->delete();

        $request->session()->flash('alert-success', trans('bill_lading.alert-delete.success'));
        return redirect()->route('admin.bill-of-lading.index');
    }


    public function pdf(Request $request, $id)
    {
       // dd(BillLading::find($id)->position->surestaries);
        $pdf = PDF::loadView('admin.pdf.invoice', 
            ['bill' => BillLading::find($id)]);
        return $pdf->stream();
    }
}
