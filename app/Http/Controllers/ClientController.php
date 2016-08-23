<?php

namespace App\Http\Controllers;

use App\City;
use App\Client;
use App\Contact;
use App\Country;
use App\Payment;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClientController extends Controller
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
                $clients = Client::where('country_code', $country)
                    ->where('name', 'LIKE', '%'. $name .'%')
                    ->get();
            }
            else if (!empty($name)) {
                $clients = Client::where('name', 'LIKE', '%'. $name .'%')
                    ->get();
            }
            else {
                $clients = Client::where('country_code', $country)->get();
            }
        }
        else {
            $clients = Client::all();
        }

        return view('admin.client.index')
            ->with('countries', Country::lists('name', 'code'))
            ->with('clients', $clients);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.client.create')
            ->with('countries', Country::lists('name', 'code'))
            ->with('cities', City::lists('name', 'id'));
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
            'name'          => 'required',
            'country_code'  => 'required',
            'email'         => 'required|email'
        ]);

        $user             = $request->user;
        $user['email']    = $request->email;
        $user['password'] = bcrypt($user['password']);
        $user['role_id']  = 1;


        $client = Client::create($request->all());
        $client->user()->associate(User::create($user));
        $client->save();

        $contact = new Contact($request->contact);
        $contact->client()->associate($client);
        $contact->save();

        $payment = new Payment($request->payment);
        $payment->client()->associate($client);
        $payment->save();

        $request->session()->flash('alert-success', trans('client.alert-create.success'));
        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('admin.client.show')
            ->with('client', Client::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client = Client::findOrFail($id);
        $client->contact;
        $client->payment;
        $client->user;
        return view('admin.client.update')
            ->with('client', $client)
            ->with('countries', Country::lists('name', 'code'));
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
        // find client
        $client = Client::findOrFail($id);
        // update client information
        $client->update($request->all());
        // update contact client
        $client->contact()->update($request->contact);
        // update client payment
        $client->payment()->update($request->payment);
        $user = $request->user;
        if (!empty($user['password'])) {
            $user['password'] = bcrypt($user['password']);
        }
        else {
            unset($user['password']);
        }
        $client->user()->update($user);

        $request->session()->flash('alert-success', trans('client.alert-update.success'));
        return redirect()->route('admin.clients.index');
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
        Client::find($id)->delete();

        $request->session()->flash('alert-success', trans('client.alert-delete.success'));
        return redirect()->route('admin.clients.index');
    }

}
