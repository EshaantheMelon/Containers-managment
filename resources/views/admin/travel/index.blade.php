@extends('layouts.app')

@section('title', trans('travel.all'))

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

    <div class="row">
        <div class="col-xs-12">

            <div class="box">

                <div class="box-body">

                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>{!! trans('travel.number') !!}</td>
                            <td>{!! trans('travel.vessel') !!}</td>
                            <td>{!! trans('travel.bunkers') !!}</td>
                            <td>{!! trans('travel.port_id') !!}</td>
                            <td>{!! trans('travel.date_enter') !!}</td>
                            <td>{!! trans('travel.date_out') !!}</td>
                            <td>{!! trans('utils.actionsBtn') !!}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($travels as $travel)
                            <tr>
                                <td>{{ $travel->number }}</td>
                                <td>{{ $travel->vessel->vessel or '' }}</td>
                                <td>{{ $travel->bunkers }}</td>
                                <td>{{ $travel->port_id }}</td>
                                <td>{{ $travel->date_enter->format('d-m-Y') }}</td>
                                <td>{{ $travel->date_out->format('d-m-Y') }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.travels.destroy', $travel->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- show the travel (travel the show method found at GET /travels/{id} -->
                                    <a class="btn btn-sm btn-success" href="{{ URL::to('admin/travels/' . $travel->id) }}"><i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                        {!! trans('utils.showBtn') !!}</a>

                                    <!-- edit this travel (travel the edit method found at GET /travels/{id}/edit -->
                                    <a class="btn btn-sm btn-info" href="{{ URL::to('admin/travels/' . $travel->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                                        {!! trans('utils.editBtn') !!}</a>

                                    <!-- delete the travel (uses the destroy method DESTROY /travel/{id} -->

                                    {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection