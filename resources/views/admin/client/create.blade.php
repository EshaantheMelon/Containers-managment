@extends('layouts.app')

@section('title', trans('client.create'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_partners') }}
        <small>{!! trans('client.create') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/clients') }}">{{ trans('utils.menu.m_partners') }}</a></li>
        <li><a href="{{ url('/admin/clients') }}">{{ trans('utils.menu.clients') }}</a></li>
        <li class="active">{!! trans('client.create') !!}</li>
    </ol>

@stop

@section('content')

<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">{!! trans('client.create') !!}</h3>
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

        {{ Form::open(['url' => 'admin/clients',  'id'=>'validator']) }}

        @include('admin.client._form')

        {{ Form::submit(trans('utils.createBtn'), ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}

    </div><!-- /.box-body -->
    <div class="box-footer">

    </div><!-- /.box-footer-->
</div>
<!-- /.box -->



@endsection