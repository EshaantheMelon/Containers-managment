@extends('layouts.app')

@section('title', trans('quotation.create'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_quotations') }}
        <small>{!! trans('quotation.create') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/quotations') }}">{{ trans('utils.menu.m_quotations') }}</a></li>
        <li class="active">{!! trans('quotation.create') !!}</li>
    </ol>

@stop

@section('content')


        <!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{!! trans('travel.create') !!}</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">

        <!-- if there are creation errors, they will show here -->
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </p>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::open(array('url' => 'admin/quotations')) }}

        @include('admin.quotation._form')

        {{ Form::submit(trans('utils.createBtn'), array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div><!-- /.box-body -->
    <div class="box-footer">

    </div><!-- /.box-footer-->
</div><!-- /.box -->


@stop