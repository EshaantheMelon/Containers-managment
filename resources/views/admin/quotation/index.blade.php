@extends('layouts.app')

@section('head')

    <h1>
        {{ trans('utils.menu.m_quotations') }}
        <small>{!! trans('quotation.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/quotations') }}">{{ trans('utils.menu.m_quotations') }}</a></li>
        <li class="active">{!! trans('quotation.all') !!}</li>
    </ol>

@stop

@section('title', trans('quotation.all'))

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
                            <td>{!! trans('quotation.number') !!}</td>
                            <td>{!! trans('quotation.validity') !!}</td>
                            <td>{!! trans('quotation.commodity') !!}</td>
                            <td>{!! trans('quotation.imdg') !!}</td>
                            <td>{!! trans('quotation.onu') !!}</td>
                            <td>{!! trans('quotation.baf') !!}</td>
                            <td>{!! trans('quotation.is') !!}</td>
                            <td>{!! trans('quotation.caf') !!}</td>
                            <td>{!! trans('quotation.confirmed') !!}</td>
                            <td>{!! trans('utils.actionsBtn') !!}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quotations as $quotation)
                            <tr>
                                <td>{{ $quotation->number }}</td>
                                <td>{{ $quotation->validity }}</td>
                                <td>{{ $quotation->commodity }}</td>
                                <td>{{ $quotation->imdg }}</td>
                                <td>{{ $quotation->onu }}</td>
                                <td>{{ $quotation->baf }}</td>
                                <td>{{ $quotation->is }}</td>
                                <td>{{ $quotation->caf }}</td>
                                <td>{{ $quotation->confirmed }}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.quotations.destroy', $quotation->id], 'class'=>'inline-block btn-delete' ]) !!}
                                    <!-- show the quotation (quotation the show method found at GET /quotations/{id} -->
                                    <a class="btn btn-sm btn-success" href="{{ URL::to('admin/quotations/' . $quotation->id) }}"><i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                        {!! trans('utils.showBtn') !!}</a>

                                    <!-- edit this quotation (quotation the edit method found at GET /quotations/{id}/edit -->
                                    <a class="btn btn-sm btn-info" href="{{ URL::to('admin/quotations/' . $quotation->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                                        {!! trans('utils.editBtn') !!}</a>

                                    <!-- delete the quotation (uses the destroy method DESTROY /quotation/{id} -->
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->

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