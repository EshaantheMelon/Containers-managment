<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/update', function () {
    $contracts = \App\Container::all();
    $i = 1;
    foreach ($contracts as $contract) {
        $i = \App\Container::where('type', $contract->type)->where('id', '<', $contract->id)->count() + 1;
        $contract->prefix = $contract->type . str_pad($i, 3, "0", STR_PAD_LEFT);;
        $contract->update();
    }
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {

    Route::post('lang', 'HomeController@postChangeLanguage');

    Route::get('/', function () {
        return view('client.welcome');
    });

    // get cities in by code of country : request ajaxs
    Route::get('/cities/{code}', function ($code) {
        $country = \App\Country::where('code', $code)->get();
        if (isset($country))
            $cities = $country->first()->cities;
        return response()->json($cities);
    });

    // Authentication Routes...
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    $this->get('contact', 'ContactController@getContact');
    $this->post('contact', 'ContactController@postContact');

    $this->get('message/{with?}', 'MessageController@getMessageClient');
    $this->get('msg/{with?}', 'MessageController@getMessageUser');
    $this->post('message', 'MessageController@postMessage');
    $this->post('messageUser', 'MessageController@postMessageUser');
});

/**
 * Route of client
 */
Route::group(['middleware' => ['web', 'client']], function () {

    $this->get('account', 'UserController@getAccount');
    $this->post('account', 'UserController@setAccount');

    Route::get('tracking', 'TrackingController@search');
    Route::get('tracking/mycontracts', 'TrackingController@contracts');
    Route::post('tracking', 'TrackingController@tracking');
});


/**
 * route with prefix admin for admin panel
 */
Route::group(['middleware' => ['web', 'auth', 'admin|agent'], 'prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::resource('clients', 'ClientController');
    Route::resource('providers', 'ProviderController');
    Route::resource('depots', 'DepotController');

    Route::post('vessels/filter', 'VesselController@index');
    Route::resource('vessels', 'VesselController');

    Route::get('result', 'ContainerController@result');
    Route::resource('containers', 'ContainerController');

    Route::resource('travels', 'TravelController');
    Route::resource('contracts', 'ContractController');
    Route::resource('ports', 'PortController');
    Route::post('positions/filter', 'PositionController@filter');
    Route::resource('positions', 'PositionController');

    Route::resource('bill-of-lading', 'BillLadingController');
    Route::get('bill-of-lading/{id}/pdf', 'BillLadingController@pdf');
    Route::resource('surestaries', 'SurestariesController');
    Route::resource('quotations', 'QuotationsController');


    // edit profile
    Route::get('profile', function () {
        return view('auth.profile')
            ->with('user', Auth::user())
            ->with('roles', \App\Role::lists('role', 'id'));
    });
    Route::post('profile', 'UserController@profile');
});

Route::group(['middleware' => ['web', 'auth', 'admin'], 'prefix' => 'admin'], function () {

    // Registration Routes...
    $this->get('users', ['as' => 'admin.users.index', 'uses' => 'UserController@index']);
    $this->get('register', 'Auth\AuthController@showRegistrationForm');
    $this->post('register', 'Auth\AuthController@register');

    $this->get('users/{id}/edit', 'UserController@edit');
    $this->post('users/{id}', ['as' => 'admin.users.update', 'uses' => 'UserController@update']);

    Route::delete('/users/{id}', ['as' => 'admin.users.destroy', 'uses' => 'UserController@destroy']);
});

