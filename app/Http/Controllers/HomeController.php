<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function postChangeLanguage()
    {
        $rules = [
            'language' => 'in:en,fr' //list of supported languages of your application.
        ];

        $language = Input::get('lang'); //lang is name of form select field.

        $validator = Validator::make(compact($language),$rules);

        if($validator->passes())
        {
            Session::put('language',$language);
            App::setLocale($language);
        }
        else
        {/**/ }
        
        return redirect()->back();
    }
}
