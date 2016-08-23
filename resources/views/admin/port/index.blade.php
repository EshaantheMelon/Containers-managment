@extends('layouts.app')

@section('title', trans('vessel.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_ports') }}
        <small>{!! trans('port.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/ports') }}">{{ trans('utils.menu.m_ports') }}</a></li>
        <li class="active">{!! trans('port.all') !!}</li>
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
                            <td>id</td>
                            <td>port</td>
                            <td>country</td>
                            <td>city</td>

                            <td>{!! trans('utils.actionsBtn') !!}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ports as $port)
                            <tr>
                                <td>{{ $port->id }}</td>
                                <td>{{ $port->port }}</td>
                                <td>{{ $port->country->name }}</td>
                                <td>{{ $port->city->name }}</td>


                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.ports.destroy', $port->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- show the port (port the show method found at GET /ports/{id}
                                    <a class="btn btn-sm btn-success" href="{{ URL::to('admin/ports/' . $port->id) }}"><i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                        {!! trans('utils.showBtn') !!}</a>
									-->
                                    <!-- edit this port (port the edit method found at GET /ports/{id}/edit -->
                                    <a class="btn btn-sm btn-info" href="{{ URL::to('admin/ports/' . $port->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                                        {!! trans('utils.editBtn') !!}</a>

                                    <!-- delete the port (uses the destroy method DESTROY /port/{id} -->

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