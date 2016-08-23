@extends('layouts.app')

@section('title', trans('surestaries.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_surestaries') }}
        <small>{!! trans('surestaries.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/surestaries') }}">{{ trans('utils.menu.m_surestaries') }}</a></li>
        <li class="active">{!! trans('surestaries.all') !!}</li>
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
                            <td>{!! trans('surestaries.id') !!}</td>
                            <td>{!! trans('surestaries.port') !!}</td>
                            <td>{!! trans('surestaries.position') !!}</td>
                            <td>{!! trans('surestaries.free_time') !!}</td>
                            <td>{!! trans('surestaries.tariff') !!}</td>
                            <td>{!! trans('utils.actionsBtn') !!}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($surestaries as $surestarie)
                            <tr>
                                <td>{{ $surestarie->id }}</td>
                                <td>
                                    @if (isset($surestarie->port->id))
                                        <a href="{{ URL('admin/ports/'. $surestarie->port->id . '/edit') }}">
                                            {{ $surestarie->port->port}}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if (isset($surestarie->position->id))
                                        <a href="{{ URL('admin/positions/'. $surestarie->position->id ) }}">
                                            {{ $surestarie->position->position}}
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $surestarie->free_time }}</td>
                                <td>{{ $surestarie->tariff }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.surestaries.destroy', $surestarie->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- show the provider (uses the show method found at GET /provider/{id} -->
                                    <!--
                                        <a class="btn btn-sm btn-success" href="{{ URL::to('admin/surestaries/' . $surestarie->id) }}"><i class="glyphicon glyphicon-zoom-in icon-white"></i> {!! trans('utils.showBtn') !!}</a>
                                        -->
                                    <!-- edit this provider (uses the edit method found at GET /provider/{id}/edit -->
                                    <a class="btn btn-sm btn-info"
                                       href="{{ URL::to('admin/surestaries/' . $surestarie->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                                        {!! trans('utils.editBtn') !!}</a>


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