@extends('layouts.app')

@section('title', trans('container.create'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_containers') }}
        <small>{!! trans('container.create') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/containers') }}">{{ trans('utils.menu.m_containers') }}</a></li>
        <li class="active">{!! trans('container.create') !!}</li>
    </ol>

@stop

@section('content')

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{!! trans('container.create') !!}</h3>
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

        {{ Form::open(['url' => 'admin/containers']) }}

        @include('admin.container._form')

        {{ Form::submit( trans('utils.createBtn'), array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div><!-- /.box-body -->
    <div class="box-footer">

    </div><!-- /.box-footer-->
</div>
<!-- /.box -->

@stop