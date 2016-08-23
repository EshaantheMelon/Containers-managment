@extends('layouts.app')

@section('title', trans('bill_lading.create'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_bills_lading') }}
        <small>{!! trans('bill_lading.create') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/bill-of-lading') }}">{{ trans('utils.menu.m_bills_lading') }}</a></li>
        <li class="active">{!! trans('bill_lading.create') !!}</li>
    </ol>
@stop

@section('content')
        <!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{!! trans('bill_lading.create') !!}</h3>
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

        {{ Form::model($bill_lading, ['url' => 'admin/bill-of-lading']) }}
        {{ Form::hidden('id', $bill_lading->id) }}
        @include('admin.bill_lading._form')

        {{ Form::submit(trans('utils.createBtn'), array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div><!-- /.box-body -->
    <div class="box-footer">

    </div><!-- /.box-footer-->
</div>
<!-- /.box -->



@endsection