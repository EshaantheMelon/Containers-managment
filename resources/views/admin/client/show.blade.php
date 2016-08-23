@extends('layouts.app')

@section('title', trans('client.information'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_partners') }}
        <small>{!! trans('client.information') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/clients') }}">{{ trans('utils.menu.m_partners') }}</a></li>
        <li class="active">{!! trans('client.information') !!}</li>
    </ol>
@stop

@section('content')

   <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('client.information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('client.name') }}</th>
                                <td>{{ $client->name }}</td>

                                <th>{{ trans('client.social_reason') }}</th>
                                <td>{{ $client->social_reason }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('client.country') }}</th>
                                <td>{{ $client->country->name or '' }}</td>

                                <th>{{ trans('client.city') }}</th>
                                <td>{{ $client->city->name or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('client.address') }}</th>
                                <td>{{ $client->address }}</td>

                                <th>{{ trans('client.email') }}</th>
                                <td>{{ $client->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('client.phone') }}</th>
                                <td>{{ $client->phone }}</td>

                                <th>{{ trans('client.fax') }}</th>
                                <td>{{ $client->fax  }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('client.type') }}</th>
                                <td>{{ $client->type_client }}</td>

                                <th>{{ trans('client.web_site') }}</th>
                                <td>{{ $client->web_site }}</td>
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
                        <h3 class="box-title">{{ trans('client.contact_information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('client.job') }}</th>
                                <td>{{ $client->contact->job }}</td>

                                <th>{{ trans('client.direct_phone') }}</th>
                                <td>{{ $client->contact->direct_phone }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('client.mobil_1') }}</th>
                                <td>{{ $client->contact->mobil1 or '' }}</td>

                                <th>{{ trans('client.mobil_2') }}</th>
                                <td>{{ $client->contact->mobil2 or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('client.email') }}</th>
                                <td>{{ $client->contact->email }}</td>


                            </tr>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('client.payment_information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('client.bank_account') }}</th>
                                <td>{{ $client->payment->bank_account_n }}</td>

                                <th>{{ trans('client.bank') }}</th>
                                <td>{{ $client->payment->bank }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('client.swift') }}</th>
                                <td>{{ $client->payment->swift or '' }}</td>

                                <th>{{ trans('client.payment_conditions') }}</th>
                                <td>{{ $client->payment->payment_conditions or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('client.address_invoices') }}</th>
                                <td>{{ $client->payment->address_invoices }}</td>

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
                        <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.clients.destroy', $client->id], 'class'=>'inline-block btn-delete' ]) !!}

                        <!-- edit this client (uses the edit method found at GET /client/{id}/edit -->
                        <a class="btn btn-sm btn-info"
                           href="{{ URL::to('admin/clients/' . $client->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                            {!! trans('utils.editBtn') !!}</a>


                        {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop