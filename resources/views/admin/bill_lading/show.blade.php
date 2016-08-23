@extends('layouts.app')

@section('title', trans('bill_lading.information'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_bills_lading') }}
        <small>{!! trans('bill_lading.information') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/bill-of-lading') }}">{{ trans('utils.menu.m_bills_lading') }}</a></li>
        <li class="active">{!! trans('bill_lading.information') !!}</li>
    </ol>

@stop

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.containers') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>{{ trans('position.containers') }}</th>
                                <th>{{ trans('container.type') }}</th>
                                <th>{{ trans('container.contract') }}</th>
                            </tr>
                            @foreach($bill_lading->position->containers as $container)
                                <tr>
                                    <td>{{ $container->id }}</td>
                                    <td><a href="{{ route('admin.containers.show', $container->id) }}">{{ $container->prefix }}</a></td>
                                    <td>{{ $container->type }}</td>
                                    <td><a href="{{ route('admin.contracts.show', $container->contract->id) }}">{{ $container->contract->reference }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('bill_lading.information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('bill_lading.number') }}</th>
                                <td>{{ $bill_lading->number or '' }}</td>

                                <th>{{ trans('bill_lading.shipper') }}</th>
                                <td>{{ $bill_lading->shipper->name_shipper or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('bill_lading.consignee') }}</th>
                                <td>{{ $bill_lading->consignee->name_consignee or '' }}</td>

                                <th>{{ trans('bill_lading.notify') }}</th>
                                <td>{{ $bill_lading->notify or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('bill_lading.place_of_loading') }}</th>
                                <td>{{ $bill_lading->place_of_loading or ''  }}</td>

                                <th>{{ trans('bill_lading.port_of_loading_pol') }}</th>
                                <td>{{ $bill_lading->port_of_loading_pol or ''  }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('bill_lading.place_of_delivery_pod') }}</th>
                                <td>{{ $bill_lading->place_of_delivery_pod or '' }}</td>

                                <th>{{ trans('bill_lading.place_of_delivery') }}</th>
                                <td>{{ $bill_lading->place_of_delivery or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('bill_lading.number_original_bls') }}</th>
                                <td>{{ $bill_lading->number_original_bls  or '' }}</td>

                                <th>{{ trans('bill_lading.number_packages') }}</th>
                                <td>{{ $bill_lading->number_packages  or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('bill_lading.vessel') }}</th>
                                <td>{{ $bill_lading->vessel->vessel or '' }}</td>

                                <th>{{ trans('bill_lading.travel') }}</th>
                                <td>{{ $bill_lading->travel->number or '' }}</td>
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
                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.bill-of-lading.destroy', $bill_lading->id], 'class'=>'inline-block btn-delete' ]) !!}

                        <!-- edit this container (uses the edit method found at GET /container/{id}/edit -->
                        <a class="btn btn-sm btn-success"
                           href="{{ URL::to('admin/bill-of-lading/' . $bill_lading->id . '/pdf') }}"><i class="fa fa-file-pdf-o"></i>
                            PDF</a>

                        <!-- edit this container (uses the edit method found at GET /container/{id}/edit -->
                        <a class="btn btn-sm btn-info"
                           href="{{ URL::to('admin/bill-of-lading/' . $bill_lading->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                            {!! trans('utils.editBtn') !!}</a>


                        {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop