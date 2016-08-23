@extends('layouts.app')

@section('title', trans('depot.information'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_depots') }}
        <small>{!! trans('depot.information') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/depots') }}">{{ trans('utils.menu.m_depots') }}</a></li>
        <li class="active">{!! trans('depot.information') !!}</li>
    </ol>

@stop

@section('content')

        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('depot.information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('depot.name') }}</th>
                                <td>{{ $depot->name }}</td>

                                <th>{{ trans('depot.social_reason') }}</th>
                                <td>{{ $depot->social_reason }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('depot.country') }}</th>
                                <td>{{ $depot->country->name or '' }}</td>

                                <th>{{ trans('depot.city') }}</th>
                                <td>{{ $depot->city->name or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('depot.address') }}</th>
                                <td>{{ $depot->address }}</td>

                                <th>{{ trans('depot.phone') }}</th>
                                <td>{{ $depot->phone }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('depot.type_depot') }}</th>
                                <td>{{ $depot->type }}</td>

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
                        <h3 class="box-title">{{ trans('depot.contact_information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('depot.job') }}</th>
                                <td>{{ $depot->contact->job }}</td>

                                <th>{{ trans('depot.direct_phone') }}</th>
                                <td>{{ $depot->contact->direct_phone }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('depot.mobil_1') }}</th>
                                <td>{{ $depot->contact->mobil1 or '' }}</td>

                                <th>{{ trans('depot.mobil_2') }}</th>
                                <td>{{ $depot->contact->mobil2 or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('depot.email') }}</th>
                                <td>{{ $depot->contact->email }}</td>


                            </tr>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('depot.payment_information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('depot.bank_account') }}</th>
                                <td>{{ $depot->payment->bank_account_n }}</td>

                                <th>{{ trans('depot.bank') }}</th>
                                <td>{{ $depot->payment->bank }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('depot.swift') }}</th>
                                <td>{{ $depot->payment->swift or '' }}</td>

                                <th>{{ trans('depot.payment_conditions') }}</th>
                                <td>{{ $depot->payment->payment_conditions or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('depot.address_invoices') }}</th>
                                <td>{{ $depot->payment->address_invoices }}</td>

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
                        <!-- delete the depot (uses the destroy method DESTROY /depot/{id} -->
                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.depots.destroy', $depot->id], 'class'=>'inline-block btn-delete' ]) !!}

                                <!-- edit this depot (uses the edit method found at GET /depot/{id}/edit -->
                        <a class="btn btn-sm btn-info"
                           href="{{ URL::to('admin/depots/' . $depot->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                            {!! trans('utils.editBtn') !!}</a>


                        {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@stop