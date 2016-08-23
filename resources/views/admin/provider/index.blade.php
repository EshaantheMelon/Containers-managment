@extends('layouts.app')

@section('title',trans('provider.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_partners') }}
        <small>{!! trans('provider.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/providers') }}">{{ trans('utils.menu.m_partners') }}</a></li>
        <li><a href="{{ url('/admin/providers') }}">{{ trans('utils.menu.providers') }}</a></li>
        <li class="active">{!! trans('provider.all') !!}</li>
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

    <!-- filter form
    {{ Form::open(['url' => 'providers/filter', 'class' =>'form-inline pull-right filter-form']) }}

    <div class="form-group">
        {{ Form::text('name', old('name'), ['placeholder'=>trans('provider.name'), 'class' => 'form-control country']) }}
    </div>


    <div class="form-group">
        {{ Form::select('country_code', array_merge([''],$countries->toArray()), old('country_code'), ['class' => 'form-control country']) }}
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
                            <td>{!! trans('provider.name') !!}</td>
                            <td>{!! trans('provider.type') !!}</td>
                            <td>{!! trans('provider.city') !!}</td>
                            <td>{!! trans('provider.country') !!}</td>
                            <td>{!! trans('provider.contacts') !!}</td>
                            <td>{!! trans('provider.payments') !!}</td>
                            <td>{!! trans('utils.actionsBtn') !!}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($providers as $provider)
                            <tr>
                                <td>{{ $provider->name }}</td>
                                <td>{{ trans('provider.types.' . $provider->type_provider) }}</td>
                                <td>{{ $provider->city->name  or '' }}</td>
                                <td>{{ $provider->country->name or ''  }}</td>
                                <td>{{ $provider->contact->id  or '' }}</td>
                                <td>{{ $provider->payment->bank or '' }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.providers.destroy', $provider->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- show the provider (uses the show method found at GET /provider/{id} -->
                                    <a class="btn btn-sm btn-success" href="{{ URL::to('admin/providers/' . $provider->id) }}"><i class="glyphicon glyphicon-zoom-in icon-white"></i> {!! trans('utils.showBtn') !!}</a>

                                    <!-- edit this provider (uses the edit method found at GET /provider/{id}/edit -->
                                    <a class="btn btn-sm btn-info"
                                       href="{{ URL::to('admin/providers/' . $provider->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
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