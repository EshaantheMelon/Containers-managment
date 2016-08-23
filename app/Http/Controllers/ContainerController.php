<?php

namespace App\Http\Controllers;

use App\BillLading;
use App\Container;
use App\Contract;
use App\Provider;
use App\TypeContainer;
use App\Http\Requests\ContainerRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $containers = Container::all();

        return view('admin.container.index')->with('containers', $containers);
    }

    public function result() {
        return view('admin.container.result')
            ->with('entities', BillLading::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.container.create')
            ->with('providers', Provider::lists('name', 'id'))
            ->with('types', TypeContainer::lists('code', 'code'))
            ->with('contracts', Contract::lists('reference', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContainerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContainerRequest $request)
    {
        $container = Container::create($request->all());
        if (!$request->has('prefix')) {
            $number = Container::where('type', $container->type)->count();
            $container->prefix = $container->type . str_pad($number, 3, "0", STR_PAD_LEFT);
            $container->save();
        }
        $request->session()->flash('alert-success', trans('container.alert-create.success'));
        return redirect()->route('admin.containers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.container.show')
               ->with('container', Container::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $container = Container::findOrFail($id);
        return view('admin.container.update')
            ->with('container', $container)
            ->with('types', TypeContainer::lists('code', 'code'))
            ->with('providers', Provider::lists('name', 'id'))
            ->with('contracts', Contract::lists('reference', 'id'));
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
        $this->validate($request, [
            'prefix'        => 'unique:containers,prefix,'.$id,
            'last_survey'   => 'required|date',
            'date_pick_up'  => 'required|date',
        ]);
        $container = Container::findOrFail($id);
        $container->update($request->all());
        $request->session()->flash('alert-success', trans('container.alert-update.success'));
        return redirect()->route('admin.containers.index');
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
        Container::find($id)->delete();
        $request->session()->flash('alert-success', trans('container.alert-delete.success'));
        return redirect()->route('admin.containers.index');
    }
}
