@extends('layouts.app')

@section('title', trans('container.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_containers') }}
        <small>{!! trans('container.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/containers') }}">{{ trans('utils.menu.m_containers') }}</a></li>
        <li class="active">{!! trans('container.all') !!}</li>
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
        <div class="col-xs-12">

            <div class="box">

                <div class="box-body">

                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{!! trans('container.prefix') !!}</th>
                            <th>{!! trans('container.type') !!}</th>
                            <th>{!! trans('container.capacity') !!}</th>
                            <th>{!! trans('container.tare') !!}</th>
                            <th>{!! trans('container.value') !!}</th>
                            <th>{!! trans('container.contract') !!}</th>
                            <th>{!! trans('container.provider') !!}</th>
                            <th>{!! trans('utils.actionsBtn') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($containers as $container)
                            <tr>
                                <td>{{ $container->prefix }}</td>
                                <td>{{ $container->type }}</td>
                                <td>{{ $container->capacity }}</td>
                                <td>{{ $container->tare }}</td>
                                <td>{{ $container->value }}</td>
                                <td>{{ $container->contract->reference}}</td>
                                <td>{{ $container->provider->name }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>

                                    <!-- show the container (uses the show method found at GET /container/{id} -->
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.containers.destroy', $container->id], 'class'=>'inline-block form-inline btn-delete' ]) !!}

                                    <a class="btn btn-sm btn-success"
                                       href="{{ URL::to('admin/containers/' . $container->id) }}">
                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i> {!! trans('utils.showBtn') !!}
                                    </a>

                                    <!-- edit this container (uses the edit method found at GET /container/{id}/edit -->
                                    <a class="btn btn-sm btn-info"
                                       href="{{ URL::to('admin/containers/' . $container->id . '/edit') }}"><i
                                                class="glyphicon glyphicon-edit icon-white"></i>
                                        {!! trans('utils.editBtn') !!}</a>



                                    {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-small btn-danger'])}}

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