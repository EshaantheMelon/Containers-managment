@extends('layouts.client')
@section('content')

    <div class="container tracking">
        <div class="col-lg-9">
            <h5>{{ trans('utils.tracking') }}</h5>
            <div class="track">
                <div>
                    <p>Containers</p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Prefix</th>
                            <th>Contract</th>
                            <th>Type</th>
                            <th>Tare</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($containers as $container)

                            <tr>
                                <td>{{ $container->prefix }}</td>
                                <td>{{ $container->contract->reference }}</td>
                                <td>{{ $container->type }}</td>
                                <td>{{ $container->tare }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <hr/>

                    <p>Positions: </p>
                    @foreach($tracking as $item)
                        @if(get_class($item) == 'App\AtDepot')
                            <h5>At Depot</h5>
                            <p>Date in: {{ $item->date_in }} - Status: {{ $item->status }}</p>
                        @elseif(get_class($item) == 'App\AtPOL')
                            <h5>At Pol</h5>
                            <p>Date in: {{ $item->date_in }} - Port: {{ $item->port_id }}</p>
                        @elseif(get_class($item) == 'App\AtPOD')
                            <h5>At Pod</h5>
                            <p>Date Unloading: {{ $item->date_unloading }} - Port: {{ $item->port_id }}</p>
                        @elseif(get_class($item) == 'App\AtShipper')
                            <h5>At Shipper</h5>
                            <p>Date out depot: {{ $item->date_out_depot }} - Name: {{ $item->name_shipper }}</p>
                        @elseif(get_class($item) == 'App\AtBoard')
                            <h5>At Board</h5>
                            <p>Date loading: {{ $item->date_loading }}</p>
                        @elseif(get_class($item) == 'App\AtConsignee')
                            <h5>At Consignee</h5>
                            <p>Date out port: {{ $item->date_out_port }} - Name: {{ $item->name_consignee }}</p>
                        @elseif(get_class($item) == 'App\AtReformed')
                            <h5>At Reformeds</h5>
                            <p>Date : {{ $item->date }}</p>
                        @elseif(get_class($item) == 'App\AtExpertise')
                            <h5>At Expertise</h5>
                            <p>Date : {{ $item->date }}</p>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>

        <div class="col-lg-3">
            <h5>Agents</h5>
            @foreach($agents as $item)
                <div class="users row">
                    
                    <button id="new_chat" class="new_chat" data-name="{{ $item->name }}" data-id="{{ $item->id }}" data-url="{{ url('message/' . $item->id) }}"><i class="fa fa-user" aria-hidden="true"> </i> {{ $item->name}}</button>
                </div>
            @endforeach
        </div>
    </div>
@stop
