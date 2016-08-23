@extends('layouts.app')

@section('title', trans('position.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_positions') }}
        <small>{!! trans('position.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> </a></li>
        <li><a href="{{ url('/admin/positions') }}">{{ trans('utils.menu.m_positions') }}</a></li>
        <li class="active">{!! trans('position.all') !!}</li>
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
    {{ Form::open(['url' => 'admin/positions/filter', 'class' =>'form-inline pull-right filter-form']) }}

    <div class="form-group">
        {{ Form::select('at', trans('position.positions'), old('country_code'), ['class' => 'form-control country']) }}
    </div>
    {{ Form::submit(trans('utils.filterBtn'), array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
    <!-- end filter form-->

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
                            <td>N°Container</td>
                            <td>N°Travel</td>
                            <td>Type</td>
                            <td>POL</td>
                            <td>POD</td>
                            <td>Port</td>
                            <td>Depot</td>
                            <td>Country</td>
                            <td>Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($positions as $p)
                            @foreach($p->position->containers as $container)
                                <tr>
                                    <td>{{ $container->prefix }}</td>
                                    <td>{{ $p->position->atShipper()->first()->travel->number or '' }}</td>
                                    <td>{{ $container->type }}</td>
                                    <td>{{ $p->position->atPol()->first()->date_in or '' }}</td>
                                    <td>{{ $p->position->atPod()->first()->date_in or ''  }}</td>

                                    <td>{{ 1 }}</td>
                                    <td>{{ 1 }}</td>
                                    <td>1</td>
                                    <!-- we will also add show, edit, and delete buttons -->
                                    <td>
                                        <!-- show the travel (travel the show method found at GET /travels/{id} -->
                                        <a class="btn btn-sm btn-success"
                                           href="{{ URL::to('admin/positions/' . $p->position->id) }}">{!! trans('utils.showBtn') !!}</a>

                                        <!-- edit this travel (travel the edit method found at GET /travels/{id}/edit -->
                                        <a class="btn btn-sm btn-info"
                                           href="{{ URL::to('admin/positions/' . $p->position->id . '/edit') }}">{!! trans('utils.editBtn') !!}</a>

                                        <!-- delete the travel (uses the destroy method DESTROY /travel/{id} -->
                                        <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.positions.destroy', $p->position->id], 'class'=>'inline-block btn-delete' ]) !!}
                                        {!! Form::submit(trans('utils.deleteBtn'), ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection