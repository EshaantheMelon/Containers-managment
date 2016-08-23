@extends('layouts.app')

@section('title', trans('auth.list'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_users') }}
        <small>{!! trans('auth.list') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/admin/positions') }}">{{ trans('utils.menu.m_users') }}</a></li>
        <li class="active">{!! trans('auth.list') !!}</li>
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
                <div class="box-header">
                    <h3 class="box-title"> </h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>{{ trans('auth.name') }}</th>
                            <th>{{ trans('auth.email') }}</th>
                            <th>{{ trans('auth.role') }}</th>
                            <td>{{ trans('utils.actionsBtn') }}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if(!$user->isAdministrator())
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}} {{ $user->id == Auth::user()->id ? '(you)' : '' }}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->role}}</td>
                                <td>
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.users.destroy', $user->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- edit this client (client the edit method found at GET /clients/{id}/edit -->
                                    <a class="btn btn-sm btn-info"
                                       href="{{ URL::to('admin/users/' . $user->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                                        {!! trans('utils.editBtn') !!}</a>


                                    {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection