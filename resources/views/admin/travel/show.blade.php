@extends('layouts.app')

@section('title', trans('travel.information'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_travels') }}
        <small>{!! trans('travel.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/travels') }}">{{ trans('utils.menu.m_travels') }}</a></li>
        <li class="active">{!! trans('travel.all') !!}</li>
    </ol>

@stop

@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('travel.information') }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>{{ trans('travel.number') }}</th>
                            <td>{{ $travel->number }}</td>

                            <th>{{ trans('travel.vessel') }}</th>
                            <td><a href='{{ url('/admin/vessels/' . $travel->vessel->id ) }}'>{{ $travel->vessel->vessel }}</a></td>
                        </tr>
                        <tr>
                            <th>{{ trans('travel.date_enter') }}</th>
                            <td>{{ $travel->date_enter->format('d-m-Y') }}</td>

                            <th>{{ trans('travel.port_id') }}</th>
                            <td>{{ $travel->port->port }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('travel.date_out') }}</th>
                            <td>{{ $travel->date_out->format('d-m-Y') }}</td>

                            <th>{{ trans('travel.bunkers') }}</th>
                            <td>{{ $travel->bunkers }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('travel.start_travel_date') }}</th>
                            <td>{{ $travel->start_travel_date->format('d-m-Y') }}</td>

                            <th>{{ trans('travel.start_travel_quantity') }}</th>
                            <td>{{ $travel->start_travel_quantity }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('travel.end_travel_date') }}</th>
                            <td>{{ $travel->end_travel_date->format('d-m-Y') }}</td>

                            <th>{{ trans('travel.end_travel_quantity') }}</th>
                            <td>{{ $travel->end_travel_quantity }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('travel.bunkers_delivery_quantity') }}</th>
                            <td>{{ $travel->bunkers_delivery_quantity }}</td>

                            <th>{{ trans('travel.bunkers_delivery_date') }}</th>
                            <td>{{ $travel->bunkers_delivery_date->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('travel.date_hire_start') }}</th>
                            <td>{{ $travel->date_hire_start->format('d-m-Y') }}</td>

                            <th>{{ trans('travel.date_hire_end') }}</th>
                            <td>{{ $travel->date_hire_end->format('d-m-Y') }}</td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('utils.actionsBtn') }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!-- delete the travel (uses the destroy method DESTROY /travel/{id} -->
                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.travels.destroy', $travel->id], 'class'=>'inline-block btn-delete' ]) !!}

                            <!-- edit this travel (uses the edit method found at GET /travel/{id}/edit -->
                    <a class="btn btn-sm btn-info"
                       href="{{ URL::to('admin/travels/' . $travel->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                        {!! trans('utils.editBtn') !!}</a>


                    {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@stop