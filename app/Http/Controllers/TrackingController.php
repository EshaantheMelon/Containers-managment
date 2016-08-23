<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Position;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tracking(Request $request)
    {
        $client = Auth::user()->client;
        if ($client === null) {
            return redirect()->back()->withErrors(['You are not a client!']);
        }

        $contract = Contract::where('reference', $request->position)->first();

        // if the contract not exist or the user not owenr
        if ($contract === null) {
            return redirect()->back()->withErrors(['Contract not exist!']);
        }
        else if ($contract->client_id != $client->id){
            return redirect()->back()->withErrors(['You are not the owner of this contract']);
        }

        $positions = new Collection();
        foreach($contract->containers as $container) {
            $p = $container->lastPosition();
            if ($p !== null) {
                $positions->push($p);
            }
        }
        $positions = $positions->unique();
        if ($positions->isEmpty()) {
            return redirect()->back()->withErrors(['No position']);
        }
        $position = $positions->shift();
       $containers = $position->containers()->where('contract_id', $contract->id)->get();

        $atBoard          = $position->atBoard;
        $atPol            = $position->atPol;
        $atPod            = $position->atPod;
        $atConsignee      = $position->atConsignee;
        $atShipper        = $position->atShipper;
        $atDepot          = $position->atDepot;
        $atExpertise      = $position->atExpertise;
        $atLongStay       = $position->atLongStay;
        $atCustomsSeizure = $position->atCustomsSeizure;
        $atReformed       = $position->atReformed;

        $result = [];
        $max = count($atDepot) + count($atBoard) + count($atPol) + count($atPod) + count($atConsignee) + count($atReformed)
              + count($atShipper) + count($atExpertise) + count($atLongStay) + count($atCustomsSeizure);

        for ($i = 0; $i < $max ; $i++) {
            $at = '';
            if (isset($atBoard[0])) {
                $at = 'atBoard';
            }
            if (isset($atPol[0]) && ( empty($at) || (!empty(${$at}[0]) && ${$at}[0]['created_at'] > $atPol[0]['created_at']))) {
                $at = 'atPol';
            }
            if (isset($atPod[0]) && ( empty($at) || (!empty(${$at}[0]) && ${$at}[0]['created_at'] > $atPod[0]['created_at']))) {
                $at = 'atPod';
            }
            if (isset($atConsignee[0]) && ( empty($at) || (!empty(${$at}[0]) && ${$at}[0]['created_at'] > $atConsignee[0]['created_at']))) {
                $at = 'atConsignee';
            }
            if (isset($atShipper[0]) && ( empty($at) || (!empty(${$at}[0]) && ${$at}[0]['created_at'] > $atShipper[0]['created_at']))) {
                $at = 'atShipper';
            }
            if (isset($atDepot[0]) && ( empty($at) || (!empty(${$at}[0]) && ${$at}[0]['created_at'] > $atDepot[0]['created_at']))) {
                $at = 'atDepot';
            }
            if (isset($atExpertise[0]) && ( empty($at) || (!empty(${$at}[0]) && ${$at}[0]['created_at'] > $atExpertise[0]['created_at']))) {
                $at = 'atExpertise';
            }
            if (isset($atLongStay[0]) && ( empty($at) || (!empty(${$at}[0]) && ${$at}[0]['created_at'] > $atLongStay[0]['created_at']))) {
                $at = 'atLongStay';
            }
            if (isset($atCustomsSeizure[0]) && ( empty($at) || (!empty(${$at}[0]) && ${$at}[0]['created_at'] > $atCustomsSeizure[0]['created_at']))) {
                $at = 'atCustomsSeizure';
            }
            if (isset($atReformed[0]) && ( empty($at) || (!empty(${$at}[0]) && ${$at}[0]['created_at'] > $atReformed[0]['created_at']))) {
                $at = 'atReformed';
            }


            $result[] = ${$at}->shift();
        }

        $result = array_reverse($result);
        $agent = [];
        foreach ($result as $r){
            if(!in_array($r->user, $agent)){
                $agent[] = $r->user;
            }
        }

        return view('client.tracking.index')
            ->with('tracking', $result)
            ->with('containers', $containers)
            ->with('agents', $agent)
            ->with('position', $position);
    }

    public function search() {
        return view('client.tracking.search');
    }

    public function contracts(){
        $client = Auth::user()->client;
        $contracts = Contract::where('client_id', $client->id)->get();
        return view('client.tracking.contracts')
            ->with('contracts', $contracts);
    }
}
