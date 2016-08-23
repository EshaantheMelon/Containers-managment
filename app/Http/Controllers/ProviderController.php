<?php

namespace App\Http\Controllers;

use App\City;
use App\Contact;
use App\Country;
use App\Payment;
use App\Provider;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProviderController extends Controller
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
            $name    = $request->get('name');

            if (!empty($name) && !empty($country)) {
                $providers = Provider::where('country_code', $country)
                    ->where('name', 'LIKE', '%'. $name .'%')
                    ->get();
            }
            else if (!empty($name)) {
                $providers = Provider::where('name', 'LIKE', '%'. $name .'%')
                    ->get();
            }
            else {
                $providers = Provider::where('country_code', $country)->get();
            }
        }
        else {
            $providers = Provider::all();
        }

        return view('admin.provider.index')
            ->with('providers', $providers)
            ->with('countries', Country::lists('name', 'code'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provider.create')
            ->with('countries', Country::lists('name', 'code'))
            ->with('cities', City::lists('name', 'id'));
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
            'country_code'  => 'required',
            'email'         => 'required|email'
        ]);

        $provider = Provider::create($request->all());

        $contact = new Contact($request->contact);
        $contact->provider()->associate($provider);
        $contact->save();

        $payment = new Payment($request->payment);
        $payment->provider()->associate($provider);
        $payment->save();

        $request->session()->flash('alert-success', trans('provider.alert-create.success'));
        return redirect()->route('admin.providers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.provider.show')
            ->with('provider', Provider::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->contact;
        $provider->payment;
        return view('admin.provider.update')
            ->with('provider', $provider)
            ->with('countries', Country::lists('name', 'code'))
            ->with('cities', City::lists('name', 'id'));
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
        $provider = Provider::findOrFail($id);
        $provider->update($request->all());
        // update provider client
        $provider->contact()->update($request->contact);
        // update provider payment
        $provider->payment()->update($request->payment);

        $request->session()->flash('alert-success', trans('provider.alert-update.success'));
        return redirect()->route('admin.providers.index');
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
        Provider::find($id)->delete();
        $request->session()->flash('alert-success', trans('provider.alert-delete.success'));
        return redirect()->route('admin.providers.index');
    }

}
