<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{

    public function getContact() {
        return view('client.contact');
    }

    public function postContact(Request $request) {
        $request->session()->flash('alert-success', 'Your message was successfully Sent ');
        return redirect()->back();


    }
}
