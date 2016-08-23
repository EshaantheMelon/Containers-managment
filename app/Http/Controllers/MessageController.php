<?php

namespace App\Http\Controllers;

use App\Client;
use App\Messages;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    //
    public function getMessageUser(Request $request, $with = 0){
        Session::put('start_chat', true);
        session(['chat_uri' => $request->getUri()]);

        $messages = Messages::where('user_id', Auth::user()->id);
        if ($with != 0) {
            $messages->where('client_id', $with);
        }
        $messages = $messages->get();

        print($messages);
    }

    public function getMessageClient(Request $request, $with = 0){
        Session::put('chat_uri', $request->getUri());
        if ($with == 0) {
            Session::put('start_chat', false);
        }else {
            Session::put('start_chat', true);


            $query = Messages::where('user_id', $with)
            ->where('client_id', Auth::user()->client->id);
            $messages = $query->get();
            //$query->update(['seen' => 1]);
            print($messages);
        }
    }

    public function postMessage(Request $request){
        
        Messages::create([
            'client_id' => Auth::user()->client->id,
            'pic'       => Auth::user()->client->contact->pic,
            "user_id"   => $request->get('user_id'),
            "send"      => 1,
            "message"   => $request->get('message')
        ]);
        echo 'ok';
    }

    public function postMessageUser(Request $request) {
        Messages::create([
            'client_id' => $request->get('client_id'),
            "user_id"   => Auth::user()->id,
            "send"      => 0,
            "message"   => $request->get('message')
        ]);
        echo 'ok';
    }
    public function clear() {
        if(Auth::check() && Auth::user()->role->role == 'client'){
            Session::put('start_chat', false);
            Messages::where('client_id', Auth::user()->client->id)->delete();
        }
    }
}
