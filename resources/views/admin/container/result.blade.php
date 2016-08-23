@extends('layouts.app')

@section('head')

    <h1>
        {{ trans('utils.menu.m_containers') }}
        <small>{!! trans('container.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/admin/containers') }}">{{ trans('utils.menu.m_containers') }}</a></li>
        <li class="active">{!! trans('container.all') !!}</li>
    </ol>

@stop

@section('title', trans('container.all'))

@section('content')

    <!-- will be used to show any messages -->
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>N° Container</td>
                            <td>N° Voyage</td>
                            <td>Type</td>
                            <td>N° BL</td>
                            <td>IMO</td>
                            <td>Shipper</td>
                            <td>Consignee</td>
                            <td>POL</td>
                            <td>Date in POL</td>
                            <td>Date of loading</td>
                            <td>Date of unloading</td>
                            <td>POD</td>
                            <td>OUT Port</td>
                            <td>Place delivery</td>
                            <td>In depot</td>
                            <td>Day of detention</td>
                            <td>Free time</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($entities as $entity)
                            <tr>
                                <td>{{ count($entity->position->containers) }}</td>
                                <td>{{ $entity->travel->number }}</td>
                                <td>{{ $entity->position->containers()->first()->type }}</td>
                                <td>{{ $entity->number }}</td>
                                <td>{{ $entity->vessel->imo_number }}</td>
                                <td>{{ $entity->shipper->name_shipper }}</td>
                                <td>{{ $entity->consignee->name_consignee }}</td>
                                <td>{{ $entity->position->atPol()->first()->port->port  }}</td>
                                <td>{{ $entity->position->atPol()->first()->date_in }}</td>
                                <td>{{ $entity->position->atBoard()->first()->date_loading }}</td>
                                <td>{{ $entity->position->atPod()->first()->date_unloading }}</td>
                                <td>{{ $entity->position->atPod()->first()->port->port  }}</td>
                                <td>{{ $entity->consignee->date_out_port->format('d-m-Y') }}</td>
                                <td>{{ $entity->place_of_delivery }}</td>
                                <td>{{ $entity->contract }}</td>
                                <td>{{ $entity->provider  }}</td>
                                <td>{{ $entity->provider  }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection