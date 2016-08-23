<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contract;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::all();

        return view('admin.contract.index')->with('contracts', $contracts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contract.create')
            ->with('clients', Client::lists('name', 'id'));
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
            'date_on'          => 'required|date',
            'date_off'         => 'required|date',
        ]);

        $contract = Contract::create($request->all());
        $number = Contract::where('type', $contract->type)->count();
        $contract->reference = $contract->type . str_pad($number, 3, "0", STR_PAD_LEFT);
        $contract->save();

        $request->session()->flash('alert-success', trans('contract.alert-create.success'));
        return redirect()->route('admin.contracts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.contract.show')
            ->with('contract', Contract::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        return view('admin.contract.update')
            ->with('clients', Client::lists('name', 'id'))
            ->with('contract', $contract);
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
            'reference'        => 'unique:contracts,reference,'.$id,
            'date_on'          => 'required|date',
            'date_off'         => 'required|date',
        ]);

        $contract = contract::find($id);
        $contract->update($request->all());
        $request->session()->flash('alert-success', trans('contract.alert-update.success'));
        return redirect()->route('admin.contracts.index');
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
        Contract::find($id)->delete();
        $request->session()->flash('alert-success', trans('contract.alert-delete.success'));
        return redirect()->route('admin.contracts.index');
    }
}
