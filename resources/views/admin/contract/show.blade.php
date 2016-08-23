@extends('layouts.app')

@section('title', trans('contract.information'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_containers') }}
        <small>{!! trans('contract.information') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/contracts') }}">{{ trans('utils.menu.m_containers') }}</a></li>
        <li class="active">{!! trans('contract.information') !!}</li>
    </ol>

@stop

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('contract.information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('contract.reference') }}</th>
                                <td>{{ $contract->reference }}</td>

                                <th>{{ trans('contract.type') }}</th>
                                <td>{{ $contract->type }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('contract.date_on') }}</th>
                                <td>{{ $contract->date_on->format('m-d-Y') }}</td>

                                <th>{{ trans('contract.date_off') }}</th>
                                <td>{{ $contract->date_off->format('m-d-Y') }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('contract.client') }}</th>
                                <td><a href='{{ url('/admin/clients/' . $contract->client->id ) }}'>{{ $contract->client->name }}</a></td>

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
                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.contracts.destroy', $contract->id], 'class'=>'inline-block btn-delete' ]) !!}

                                <!-- edit this container (uses the edit method found at GET /container/{id}/edit -->
                        <a class="btn btn-sm btn-info"
                           href="{{ URL::to('admin/contracts/' . $contract->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                            {!! trans('utils.editBtn') !!}</a>


                        {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@stop