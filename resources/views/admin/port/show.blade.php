@extends('layouts.app')

@section('title', trans('container.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_ports') }}
        <small>{!! trans('port.information') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/ports') }}">{{ trans('utils.menu.m_ports') }}</a></li>
        <li class="active">{!! trans('port.information') !!}</li>
    </ol>

@stop

@section('content')


@stop