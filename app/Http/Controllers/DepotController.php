<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Country;
use App\Depot;
use App\Payment;
use Illuminate\Http\Request;

use App\Http\Requests;

class DepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $country = $request->get('country_code');
            $depots = Depot::where('country_code', $country)->get();
        }
        else {
            $depots = Depot::all();
        }

        return view('admin.depot.index')
            ->with('countries', Country::lists('name', 'code'))
            ->with('depots', $depots);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.depot.create')
            ->with('countries', Country::lists('name', 'code'));
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
            'name'          => 'required',
            'country_code'  => 'required'
        ]);

        $depot = Depot::create($request->all());

        $contact = new Contact($request->contact);
        $contact->depot()->associate($depot);
        $contact->save();

        $payment = new Payment($request->payment);
        $payment->depot()->associate($depot);
        $payment->save();

        $request->session()->flash('alert-success', trans('depot.alert-create.success'));
        return redirect()->route('admin.depots.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.depot.show')
            ->with('depot', Depot::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $depot = Depot::findOrFail($id);
        $depot->contact;
        $depot->payment;
        return view('admin.depot.update')
            ->with('depot', $depot)
            ->with('countries', Country::lists('name', 'code'));
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
            'name'          => 'required',
            'country_code'  => 'required'
        ]);

        $depot = Depot::findOrFail($id);
        $depot->update($request->all());
        // update depot client
        $depot->contact()->update($request->contact);
        // update depot payment
        $depot->payment()->update($request->payment);

        $request->session()->flash('alert-success', trans('depot.alert-update.success'));
        return redirect()->route('admin.depots.index');
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
        Depot::find($id)->delete();
        $request->session()->flash('alert-success', trans('depot.alert-delete.success'));
        return redirect()->route('admin.depots.index');
    }
}
