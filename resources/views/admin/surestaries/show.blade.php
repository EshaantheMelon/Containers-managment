@extends('layouts.app')

@section('title', trans('container.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_quotations') }}
        <small>{!! trans('surestaries.information') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/m_surestaries') }}">{{ trans('utils.menu.m_surestaries') }}</a></li>
        <li class="active">{!! trans('surestaries.information') !!}</li>
    </ol>

@stop

@section('content')


@stop