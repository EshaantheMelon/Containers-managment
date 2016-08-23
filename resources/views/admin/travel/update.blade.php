@extends('layouts.app')

@section('title', trans('travel.update'))

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

        <!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{!! trans('travel.update') !!}</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
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

        {{ Form::model($travel, ['route' => ['admin.travels.update', $travel->id], 'method' => 'PUT']) }}

        @include('admin.travel._form')

        {{ Form::submit(trans('utils.updateBtn'), array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div><!-- /.box-body -->
    <div class="box-footer">

    </div><!-- /.box-footer-->
</div><!-- /.box -->


@stop