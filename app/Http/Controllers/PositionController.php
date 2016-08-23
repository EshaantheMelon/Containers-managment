<?php

namespace App\Http\Controllers;

use App\AtBoard;
use App\AtConsignee;
use App\AtCustomsSeizure;
use App\AtDepot;
use App\AtExpertise;
use App\AtLongStay;
use App\AtPOD;
use App\AtPOL;
use App\AtReformed;
use App\AtShipper;
use App\Container;
use App\Depot;
use App\Port;
use App\Position;
use App\Provider;
use App\Surestaries;
use App\Travel;
use App\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();

        return view('admin.position.index')
            ->with('positions', $positions);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function filter(Request $request)
    {
        $at = $request->get('at');
        $object = ucfirst(substr($at, 3));
        if ($object == 'Pol' || $object == 'Pod') {
            $object = strtoupper($object);
        }
        $at = 'App\At' . $object;

        return view('admin.position.filter')
            ->with('positions', $at::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.position.create')
            ->with('depots', Depot::lists('name', 'id'))
            ->with('vessels', Vessel::lists('vessel', 'id'))
            ->with('travels', Travel::lists('number', 'id'))
            ->with('ports', Port::lists('port', 'id'))
            ->with('providers', Provider::lists('name', 'id'))
            ->with('containers', Container::all());
    }

    /**
     * Store a newly created resource in storage.
     * @param Requests\PositionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\PositionRequest $request)
    {
        /*
        switch ($request->position) {

            case 'at-depot' :
                $this->validate($request, [
                    'depot.date_in' => 'required',
                ]);
                break;
            case 'at-shipper' :
                $this->validate($request, [
                    'shipper.date_out_depot' => 'required',
                    'shipper.booking' => 'required',
                    'shipper.travel_id' => 'required',
                    'shipper.name_shipper' => 'required'
                ]);
                break;
            case 'at-pol' :
                $this->validate($request, [
                    'pol.date_in' => 'required'
                ]);
                break;
            case 'at-pod' :
                $this->validate($request, [
                    'pod.date_unloading' => 'required'
                ]);
                break;
            case 'at-board' :
                $this->validate($request, [
                    'board.date_loading' => 'required',
                ]);
                break;
            case 'at-consignee' :
                $this->validate($request, [
                    'consignee.date_out_port' => 'required',
                    'consignee.name_consignee' => 'required',
                ]);
                break;

        }
        */

        $this->validate($request, [
            'expertise.date' => 'required',
            'expertise.person' => 'required',
            'expertise.company' => 'required'
        ]);

        $position = Position::create(['position' => str_random(10)]);
        $position->containers()->attach($request->containers);
        $position->circle = $position->id;

        /*
        switch ($request->position) {

            case 'at-depot' :
                $depot = $request->depot;
                if ($depot['status'] == 'TOTAL LOSS') {
                    $this->validate($request, [
                        'depot.loss.date' => 'required',
                    ]);
                    $depot = array_merge($depot, $depot['loss']);
                } else {
                    $depot = array_merge($depot, $depot['reparation']);
                }
                unset($depot['reparation']);
                unset($depot['loss']);

                $entity = new AtDepot($depot);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atDepot';
                $position->last_date = $entity->date_in;
                break;
            case 'at-shipper' :
                $entity = new AtShipper($request->shipper);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atShipper';
                $position->last_date = $entity->date_out_depot;
                break;
            case 'at-pol' :
                $entity = new AtPOL($request->pol);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atPol';
                $position->last_date = $entity->date_in;
                break;
            case 'at-pod' :
                $entity = new AtPOD($request->pod);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atPod';
                $position->last_date = $entity->date_unloading;
                break;
            case 'at-board' :
                $entity = new AtBoard($request->board);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->end = 1;
                $position->at = 'atBoard';
                $position->last_date = $entity->date_loading;
                break;
            case 'at-consignee' :
                $entity = new AtConsignee($request->consignee);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atConsignee';
                $position->last_date = $entity->date_out_port;
                break;
            case 'at-reformed' :
                $entity = new AtReformed($request->reformed);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atReformed';;
                break;
            case 'at-expertise' :
                $entity = new AtExpertise($request->expertise);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atExpertise';
                break;
            case 'at-customsSeizures' :
                $entity = new AtCustomsSeizure($request->customsSeizures);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atCustomsSeizures';;
                break;
            case 'at-longStay' :
                $entity = new AtLongStay($request->longStay);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atLongStay';;
                break;

        }
        */

        $entity = new AtExpertise($request->expertise);
        $entity->position()->associate($position);
        $entity->user()->associate(Auth::user());
        $entity->save();
        $position->at = 'atExpertise';

        $position->id_at = $entity->id;
        $position->last_position = Carbon::now();
        $position->last_date = $entity->date;
        $position->save();

        /*
        if ($request->position == 'at-board') {
            return redirect()
                ->route('admin.bill-of-lading.create')
                ->with('position', $position);
        }
        */
        $request->session()->flash('alert-success', trans('position.alert-create.success'));
        return redirect()->route('admin.positions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.position.show')
            ->with('position', Position::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $position = Position::find($id);

        if ($position->end) {
            $request->session()->flash('alert-danger', trans('position.alert-update.danger'));
        }

        $posssible = [];
        switch($position->at){
            case 'atExpertise':
                $posssible['at-depot'] = trans('position.positions.at-depot');
                $posssible['at-reformed'] = trans('position.positions.at-reformed');
                break;
            case 'atReformed':
                $posssible['at-depot'] = trans('position.positions.at-depot');
                break;
            case 'atDepot':
                $posssible['at-shipper'] = trans('position.positions.at-shipper');
                break;
            case 'atShipper':
                $posssible['at-pol'] = trans('position.positions.at-pol');
                break;
            case 'atPol':
                $posssible['at-board'] = trans('position.positions.at-board');
                break;
            case 'atBoard':
                $posssible['at-pod'] = trans('position.positions.at-pod');
                break;
            case 'atPod':
                $posssible['at-consignee']       = trans('position.positions.at-consignee');
                $posssible['at-customsSeizures'] = trans('position.positions.at-customsSeizure');
                $posssible['at-longStay']        = trans('position.positions.at-longStay');
                break;
            case 'atLongStay':
                $posssible['at-consignee']       = trans('position.positions.at-consignee');
                break;

        }
        return view('admin.position.update')
            ->with('position', Position::find($id))
            ->with('depots', Depot::lists('name', 'id'))
            ->with('vessels', Vessel::lists('vessel', 'id'))
            ->with('travels', Travel::lists('number', 'id'))
            ->with('ports', Port::lists('port', 'id'))
            ->with('providers', Provider::lists('name', 'id'))
            ->with('possibles', $posssible)
            ->with('containers', $position->containers);
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
        $position = Position::find($id);

        if ($position->end) {
            $request->session()->flash('alert-danger', trans('position.alert-update.danger'));
            return redirect()->back();
        }

        $this->surestaries($request, $position);

        switch ($request->position) {

            case 'at-depot' :
                $this->validate($request, [
                    'depot.date_in' => 'required',
                ]);
                $depot = $request->depot;
                if ($depot['status'] == 'TOTAL LOSS') {
                    $this->validate($request, [
                        'depot.loss.date' => 'required',
                    ]);
                    $depot = array_merge($depot, $depot['loss']);
                } else {
                    $depot = array_merge($depot, $depot['reparation']);
                }
                unset($depot['reparation']);
                unset($depot['loss']);

                $entity = new AtDepot($depot);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atDepot';
                $position->last_date = $entity->date_in;
                break;
            case 'at-shipper' :
                $this->validate($request, [
                    'shipper.date_out_depot' => 'required',
                    'shipper.booking' => 'required',
                    'shipper.travel_id' => 'required',
                    'shipper.name_shipper' => 'required'
                ]);
                $entity = new AtShipper($request->shipper);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atShipper';
                $position->last_date = $entity->date_out_depot;
                break;
            case 'at-pol' :
                $this->validate($request, [
                    'pol.date_in' => 'required'
                ]);
                $entity = new AtPOL($request->pol);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atPol';
                $position->last_date = $entity->date_in;
                break;
            case 'at-pod' :
                $this->validate($request, [
                    'pod.date_unloading' => 'required'
                ]);
                $entity = new AtPOD($request->pod);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atPod';
                $position->last_date = $entity->date_unloading;
                break;
            case 'at-board' :
                $this->validate($request, [
                    'board.date_loading' => 'required',
                ]);
                $entity = new AtBoard($request->board);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atBoard';
                $position->last_date = $entity->date_loading;
                break;
            case 'at-consignee' :
                $this->validate($request, [
                    'consignee.date_out_port' => 'required',
                    'consignee.name_consignee' => 'required',
                ]);
                $entity = new AtConsignee($request->consignee);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at  = 'atConsignee';
                $position->end = 1;
                $position->last_date = $entity->date_out_port;
                $position->bl->consignee_id = $entity->id;
                $position->bl->update();
                break;
            case 'at-reformed' :
                $entity = new AtReformed($request->reformed);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atReformed';
                $position->last_date = $entity->date;
                break;
            case 'at-expertise' :
                $entity = new AtExpertise($request->expertise);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atExpertise';
                $position->last_date = $entity->date;
                break;
            case 'at-customsSeizures' :
                $entity = new AtCustomsSeizure($request->customsSeizures);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atCustomsSeizures';
                $position->last_date = $entity->date;
                $position->end = 1;
                break;
            case 'at-longStay' :
                $entity = new AtLongStay($request->longStay);
                $entity->position()->associate($position);
                $entity->user()->associate(Auth::user());
                $entity->save();
                $position->at = 'atLongStay';
                break;

        }

        $position->id_at = $entity->id;
        $position->last_position = Carbon::now();
        $position->save();


        // generated BL at theend of cycle
        if ($request->position == 'at-board') {
            return redirect()
                ->route('admin.bill-of-lading.create')
                ->with('position', $position);
        }

        $request->session()->flash('alert-success', trans('position.alert-update.success'));
        return redirect()->route('admin.positions.index');
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
        Position::find($id)->delete();

        $request->session()->flash('alert-success', trans('position.alert-delete.success'));
        return redirect()->route('admin.positions.index');
    }


    private function surestaries(Request $request, Position $position)
    {
        $d8 = new Carbon();
        $d8->subDay(8);

        $d14 = new Carbon();
        $d14->subDay(14);

        $d20 = new Carbon();
        $d20->subDay(20);

        switch($position->at){
            case 'atPol':

                if ($position->atPol->last()->date_in->lt( $d20 ))
                {
                    Surestaries::create([
                        'port_id'     => $position->atPol->last()->port_id,
                        'position_id' => $position->id,
                        'tariff'      => 30,
                        'at'          => 'atPod',
                        'at_id'       => $position->atPol->last()->id
                    ]);
                    $request->session()->flash('alert-info', trans('surestaries.alert-create.success'));
                }
                else if ($position->atPol->last()->date_in->lt( $d14 )) {

                    Surestaries::create([
                        'port_id'     => $position->atPol->last()->port_id,
                        'position_id' => $position->id,
                        'tariff'      => 22,
                        'at'          => 'atPod',
                        'at_id'       => $position->atPol->last()->id
                    ]);
                    $request->session()->flash('alert-info', trans('surestaries.alert-create.success'));
                }

                break;
            case 'atPod':

                if ($position->atPod->last()->date_unloading->lt( $d20 ))
                {
                    Surestaries::create([
                        'port_id'     => $position->atPod->last()->port_id,
                        'position_id' => $position->id,
                        'tariff'      => 30,
                        'at'          => 'atPod',
                        'at_id'       => $position->atPod->last()->id
                    ]);
                    $request->session()->flash('alert-info', trans('surestaries.alert-create.success'));
                }
                else if ($position->atPod->last()->date_unloading->lt( $d14 )) {

                    Surestaries::create([
                        'port_id'     => $position->atPod->last()->port_id,
                        'position_id' => $position->id,
                        'tariff'      => 22,
                        'at'          => 'atPod',
                        'at_id'       => $position->atPod->last()->id
                    ]);

                    $request->session()->flash('alert-info', trans('surestaries.alert-create.success'));
                }

                break;
            case 'atDepot':

                if ($position->atDepot->last()->date_in->lt( $d20 ))
                {
                    Surestaries::create([
                        'position_id' => $position->id,
                        'tariff'      => 30,
                        'at'          => 'atDepot',
                        'at_id'       => $position->atDepot->last()->id
                    ]);
                    $request->session()->flash('alert-info', trans('surestaries.alert-create.success'));
                }
                else if ($position->atDepot->last()->date_in->lt( $d14 )) {
                    Surestaries::create([
                        'position_id' => $position->id,
                        'tariff'      => 22,
                        'at'          => 'atDepot',
                        'at_id'       => $position->atDepot->last()->id
                    ]);

                    $request->session()->flash('alert-info', trans('surestaries.alert-create.success'));
                }

                break;
        }
    }
}
