@extends('layouts.app')

@section('title', trans('position.create'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_positions') }}
        <small>{!! trans('position.create') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/positions') }}">{{ trans('utils.menu.m_positions') }}</a></li>
        <li class="active">{!! trans('position.create') !!}</li>
    </ol>

@stop

@section('content')

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



    <div class="row">
        {{ Form::open(['url' => 'admin/positions']) }}

        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">{!! trans('position.create') !!}</h3>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        {{ Form::label('container_id', trans('position.containers')) }}

                        <select class="form-control select2" multiple="multiple" name="containers[]"
                                data-placeholder="Select a State" style="width: 100%;">
                            @foreach($containers as $container)
                                <option value="{{ $container->id }}">{{ $container->prefix . ' - ' . $container->contract->reference}}</option>
                            @endforeach
                        </select>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        {{ Form::label('position', trans('position.position')) }}
                        {{ Form::text('position', trans('position.positions.at-expertise'), ['class' => 'form-control', 'disabled'=>"disabled"]) }}
                    </div>


                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col (left) -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{!! trans('position.information') !!} : {{ trans('position.positions.at-expertise') }}</h3>
                </div>

                <div class="box-body">

                    <div class="form-group">
                        {{ Form::label('date', trans('position.date')) }}
                        {{ Form::text('expertise[date]', null, ['class' => 'form-control date-picker']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('person', trans('position.name')) }}
                        {{ Form::text('expertise[person]', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('company', trans('position.company')) }}
                        {{ Form::text('expertise[company]', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div><!-- /.box -->

        </div><!-- /.col (right) -->


        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="box box-premiry">
                <div class="box-header">
                    <h3 class="box-title">{!! trans('position.create') !!}</h3>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        {{ Form::submit(trans('utils.createBtn'), ['class' => 'btn btn-primary']) }}
                    </div><!-- /.form-group -->

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col (left) -->

        {{ Form::close() }}
    </div><!-- /.row -->

@endsection