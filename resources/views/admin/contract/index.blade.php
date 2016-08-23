@extends('layouts.app')

@section('title', trans('contract.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_contracts') }}
        <small>{!! trans('contract.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/contracts') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/contracts') }}">{{ trans('utils.menu.m_contracts') }}</a></li>
        <li class="active">{!! trans('contract.all') !!}</li>
    </ol>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="box">

                <div class="box-body">

                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{!! trans('contract.reference') !!}</th>
                            <th>{!! trans('contract.client') !!}</th>
                            <th>{!! trans('contract.type') !!}</th>
                            <th>{!! trans('contract.date_on') !!}</th>
                            <th>{!! trans('contract.date_off') !!}</th>
                            <th>{!! trans('utils.actionsBtn') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contracts as $contract)
                            <tr>
                                <td>{{ $contract->reference }}</td>
                                <td>{{ $contract->client->name }}</td>
                                <td>{{ $contract->type }}</td>
                                <td>{{ $contract->date_on->format('d-m-Y') }}</td>
                                <td>{{ $contract->date_off->format('d-m-Y') }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.contracts.destroy', $contract->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- show the container (uses the show method found at GET /container/{id} -->
                                    <a class="btn btn-sm btn-success" href="{{ URL::to('admin/contracts/' . $contract->id) }}">
                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i> {!! trans('utils.showBtn') !!}</a>

                                    <!-- edit this container (uses the edit method found at GET /container/{id}/edit -->
                                    <a class="btn btn-sm btn-info"
                                       href="{{ URL::to('admin/contracts/' . $contract->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
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