<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{

    public function index() {
        return view('auth.index')
            ->with('users', User::all());
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
        $user = User::findOrFail($id);
        return view('auth.update')
            ->with('user', $user)
            ->with('roles', Role::lists('role', 'id'));
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
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,id,'. $id,
            'password' => 'required|min:6|confirmed',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user->update($data);
       return redirect()->route('admin.users.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,id,'. $user->id,
            'password' => 'required|min:6|confirmed',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        unset($data['role_id']);
        $user->update($data);
        if ($request->hasFile('pic')) {
            $pic = $request->file('pic');

            $filename = time() . '.' . $pic->getClientOriginalExtension();

            Image::make($pic)->resize(300, 300)->save(public_path('upload/'.$filename));

            $user->client->contact->pic = $filename;
            $user->client->contact->update();
        }

        $request->session()->flash('alert-success', trans('auth.alert-update.success'));
        return redirect()->back();
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
        $user = User::find($id);
        if ($user->isAdministrator()) {
            $request->session()->flash('alert-danger', trans('auth.alert-delete.danger'));
            return redirect()->back();
        }
        $user->delete();
        $request->session()->flash('alert-success', trans('auth.alert-delete.success'));
        return redirect()->back();
    }

    public function getAccount() {
        return view('client.account')
            ->with('user', Auth::user());
    }

    public function setAccount(Request $request) {
        $client = Auth::user()->client;
        if ($request->form == 'client') {
            $client->update($request->client);
            $request->session()->flash('alert-success', trans('auth.alert-delete.success'));
            return redirect()->back();
        }

        return $this->profile($request);
    }
}
