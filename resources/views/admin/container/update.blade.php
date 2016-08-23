@extends('layouts.app')

@section('title', trans('container.update'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_containers') }}
        <small>{!! trans('container.update') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/containers') }}">{{ trans('utils.menu.m_containers') }}</a></li>
        <li class="active">{!! trans('container.update') !!}</li>
    </ol>

@stop

@section('content')

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{!! trans('container.update') !!}</h3>
        </div>
        <div class="box-body">

            <!-- if there are creation errors, they will show here -->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ Form::model($container, ['route' => ['admin.containers.update', $container->id], 'method' => 'PUT']) }}
            <h2>{!! trans('container.information') !!}</h2>

            @include('admin.container._form')

            {{ Form::submit( trans('utils.updateBtn'), array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}

        </div><!-- /.box-body -->
        <div class="box-footer">

        </div><!-- /.box-footer-->
    </div>
    <!-- /.box -->
@stop