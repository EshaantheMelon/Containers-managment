@extends('layouts.app')

@section('title', trans('quotation.information'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_quotations') }}
        <small>{!! trans('quotation.information') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/quotations') }}">{{ trans('utils.menu.m_quotations') }}</a></li>
        <li class="active">{!! trans('quotation.information') !!}</li>
    </ol>

@stop

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('quotation.information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('quotation.number') }}</th>
                                <td>{{ $quotation->number }}</td>

                                <th>{{ trans('quotation.position') }}</th>
                                <td>{{ $quotation->position }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('quotation.validity') }}</th>
                                <td>{{ $quotation->validity }}</td>

                                <th>{{ trans('quotation.commodity') }}</th>
                                <td>{{ $quotation->commodity }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('quotation.imdg') }}</th>
                                <td>{{ $quotation->imdg  }}</td>

                                <th>{{ trans('quotation.onu') }}</th>
                                <td>{{ $quotation->onu  }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('quotation.date_relance') }}</th>
                                <td>{{ $quotation->date_relance }}</td>

                                <th>{{ trans('quotation.baf') }}</th>
                                <td>{{ $quotation->baf }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('quotation.is') }}</th>
                                <td>{{ $quotation->is  }}</td>

                                <th>{{ trans('quotation.caf') }}</th>
                                <td>{{ $quotation->ses  }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('quotation.imo') }}</th>
                                <td>{{ $quotation->imo}}</td>

                                <th>{{ trans('quotation.condition') }}</th>
                                <td>{{ $quotation->condition }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('quotation.confirmed') }}</th>
                                <td>{{ $quotation->confirmed  }}</td>

                                <th>{{ trans('quotation.n_booking') }}</th>
                                <td>{{ $quotation->n_booking }}</td>
                            </tr>
                            <tr>

                                <th>{{ trans('quotation.sea_freight') }}</th>
                                <td>{{ $quotation->sea_freight }}</td>
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
                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.quotations.destroy', $quotation->id], 'class'=>'inline-block btn-delete' ]) !!}

                                <!-- edit this container (uses the edit method found at GET /container/{id}/edit -->
                        <a class="btn btn-sm btn-info"
                           href="{{ URL::to('admin/quotations/' . $quotation->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                            {!! trans('utils.editBtn') !!}</a>


                        {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop