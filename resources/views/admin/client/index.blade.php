@extends('layouts.app')

@section('title', trans('client.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_partners') }}
        <small>{!! trans('client.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/clients') }}">{{ trans('utils.menu.m_partners') }}</a></li>
        <li><a href="{{ url('/admin/clients') }}">{{ trans('utils.menu.clients') }}</a></li>
        <li class="active">{!! trans('client.all') !!}</li>
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

    <div class="row">
        <div class="col-xs-12">

            <div class="box">

                <div class="box-body">

                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>{!! trans('client.name') !!}</td>
                            <td>{!! trans('client.type') !!}</td>
                            <td>{!! trans('client.city') !!}</td>
                            <td>{!! trans('client.country') !!}</td>
                            <td>{!! trans('client.contacts') !!}</td>
                            <td>{!! trans('client.payments') !!}</td>
                            <td>{!! trans('utils.actionsBtn') !!}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ trans('client.types.' . $client->type_client) }}</td>
                                <td>{{ $client->city->name or '' }}</td>
                                <td>{{ $client->country->name or '' }}</td>
                                <td>{{ $client->contact->job or ''}}</td>
                                <td>{{ $client->payment->bank or ''}}</td>
                                <td>
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.clients.destroy', $client->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- show the container (uses the show method found at GET /container/{id} -->
                                    <a class="btn btn-sm btn-success" href="{{ URL::to('admin/clients/' . $client->id) }}">
                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i> {!! trans('utils.showBtn') !!}</a>

                                    <!-- edit this container (uses the edit method found at GET /container/{id}/edit -->
                                    <a class="btn btn-sm btn-info"
                                       href="{{ URL::to('admin/clients/' . $client->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
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