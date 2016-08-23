@extends('layouts.app')

@section('title', trans('container.information'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_containers') }}
        <small>{!! trans('container.information') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/containers') }}">{{ trans('utils.menu.m_containers') }}</a></li>
        <li class="active">{!! trans('container.information') !!}</li>
    </ol>

@stop

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('container.information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('container.prefix') }}</th>
                                <td>{{ $container->prefix }}</td>

                                <th>{{ trans('container.type') }}</th>
                                <td>{{ $container->type }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('container.provider') }}</th>
                                <td><a href='{{ url('/admin/providers/'.$container->provider->id) }}'>{{ $container->provider->name }}</a></td>

                                <th>{{ trans('container.contract') }}</th>
                                <td><a href='{{ url('/admin/contracts/'.$container->contract->id) }}'>{{ $container->contract->reference }}</a></td>
                            </tr>
                            <tr>
                                <th>{{ trans('container.day_cost') }}</th>
                                <td>{{ $container->day_cost }}</td>

                                <th>{{ trans('container.capacity') }}</th>
                                <td>{{ $container->capacity }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('container.tare') }}</th>
                                <td>{{ $container->tare }}</td>

                                <th>{{ trans('container.value') }}</th>
                                <td>{{ $container->value }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('container.last_survey') }}</th>
                                <td>{{ $container->last_survey}}</td>

                                <th>{{ trans('container.date_pick_up') }}</th>
                                <td>{{ $container->date_pick_up }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('container.cout_pick_up') }}</th>
                                <td>{{ $container->cout_pick_up }}</td>

                                <th>{{ trans('container.lieu_pick_up') }}</th>
                                <td>{{ $container->lieu_pick_up}}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('container.full') }}</th>
                                <td>{{ $container->full}}</td>

                            </tr>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('utils.actionsBtn') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- delete the container (uses the destroy method DESTROY /container/{id} -->
                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.containers.destroy', $container->id], 'class'=>'inline-block btn-delete' ]) !!}

                                <!-- edit this container (uses the edit method found at GET /container/{id}/edit -->
                        <a class="btn btn-sm btn-info"
                           href="{{ URL::to('admin/containers/' . $container->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                            {!! trans('utils.editBtn') !!}</a>


                        {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop