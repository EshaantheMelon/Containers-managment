@extends('layouts.app')

@section('title', trans('vessel.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_vessels') }}
        <small>{!! trans('vessel.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/vessels') }}">{{ trans('utils.menu.m_vessels') }}</a></li>
        <li class="active">{!! trans('vessel.all') !!}</li>
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

    <!-- filter form -->
    {{ Form::open(['url' => 'admin/vessels/filter', 'class' =>'form-inline pull-right filter-form']) }}

    <div class="form-group">
        {{ Form::select('travel_id', array_merge([''] , $travels->toArray()), old('travel_id'), ['class' => 'form-control country']) }}
    </div>
    {{ Form::submit(trans('utils.filterBtn'), array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
    <!-- end filter form-->

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-body">

                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>{{ trans('vessel.vessel') }}</td>
                            <td>{{ trans('vessel.type') }}</td>
                            <td>{{ trans('vessel.class') }}</td>
                            <td>{{ trans('vessel.owners') }}</td>
                            <td>{{ trans('vessel.imo_number') }}</td>
                            <td>{{ trans('vessel.last_travel') }}</td>
                            <td>{{ trans('utils.actionsBtn') }}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vessels as $vessel)
                            <tr>
                                <td>{{ $vessel->vessel }}</td>
                                <td>{{ $vessel->type }}</td>
                                <td>{{ $vessel->class }}</td>
                                <td>{{ $vessel->owners }}</td>
                                <td>{{ $vessel->imo_number }}</td>
                                <td>{{ $vessel->travels->first()->number or '' }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.vessels.destroy', $vessel->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- show the client (client the show method found at GET /clients/{id} -->
                                    <a class="btn btn-sm btn-success" href="{{ URL::to('admin/vessels/' . $vessel->id) }}"><i class="glyphicon glyphicon-zoom-in icon-white"></i> {!! trans('utils.showBtn') !!}</a>

                                    <!-- edit this client (client the edit method found at GET /clients/{id}/edit -->
                                    <a class="btn btn-sm btn-info"
                                       href="{{ URL::to('admin/vessels/' . $vessel->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
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