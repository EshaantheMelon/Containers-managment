@extends('layouts.app')

@section('title',trans('depot.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_depots') }}
        <small>{!! trans('depot.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/depots') }}">{{ trans('utils.menu.m_depots') }}</a></li>
        <li class="active">{!! trans('depot.all') !!}</li>
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
                            <td>{!! trans('depot.name') !!}</td>
                            <td>{!! trans('depot.email') !!}</td>
                            <td>{!! trans('depot.city') !!}</td>
                            <td>{!! trans('depot.country') !!}</td>
                            <td>{!! trans('depot.contacts') !!}</td>
                            <td>{!! trans('depot.payments') !!}</td>
                            <td>{!! trans('utils.actionsBtn') !!}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($depots as $depot)
                            <tr>
                                <td>{{ $depot->name }}</td>
                                <td>{{ $depot->email }}</td>
                                <td>{{ $depot->city->name or '' }}</td>
                                <td>{{ $depot->country->name or '' }}</td>
                                <td>{{ $depot->contact->id or '' }}</td>
                                <td>{{ $depot->payment->bank or '' }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <!-- delete the depot (uses the destroy method DESTROY /depot/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.depots.destroy', $depot->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- show the depot (uses the show method found at GET /depot/{id} -->
                                    <a class="btn btn-sm btn-success" href="{{ URL::to('admin/depots/' . $depot->id) }}"><i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                        {!! trans('utils.showBtn') !!}</a>

                                    <!-- edit this depot (uses the edit method found at GET /depot/{id}/edit -->
                                    <a class="btn btn-sm btn-info" href="{{ URL::to('admin/depots/' . $depot->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                                        {!! trans('utils.editBtn') !!}</a>


                                    {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
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