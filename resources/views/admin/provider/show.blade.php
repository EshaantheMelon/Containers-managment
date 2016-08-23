@extends('layouts.app')

@section('title', trans('provider.information'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_partners') }}
        <small>{!! trans('provider.information') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/providers') }}">{{ trans('utils.menu.m_partners') }}</a></li>
        <li class="active">{!! trans('provider.information') !!}</li>
    </ol>

@stop

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('provider.information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('provider.name') }}</th>
                                <td>{{ $provider->name }}</td>

                                <th>{{ trans('provider.social_reason') }}</th>
                                <td>{{ $provider->social_reason }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('provider.country') }}</th>
                                <td>{{ $provider->country->name or '' }}</td>

                                <th>{{ trans('provider.city') }}</th>
                                <td>{{ $provider->city->name or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('provider.address') }}</th>
                                <td>{{ $provider->address }}</td>

                                <th>{{ trans('provider.email') }}</th>
                                <td>{{ $provider->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('provider.phone') }}</th>
                                <td>{{ $provider->phone }}</td>

                                <th>{{ trans('provider.fax') }}</th>
                                <td>{{ $provider->fax  }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('provider.type') }}</th>
                                <td>{{ $provider->type_provider }}</td>

                                <th>{{ trans('provider.web_site') }}</th>
                                <td>{{ $provider->web_site }}</td>
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
                        <h3 class="box-title">{{ trans('provider.contact_information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('provider.job') }}</th>
                                <td>{{ $provider->contact->job }}</td>

                                <th>{{ trans('provider.direct_phone') }}</th>
                                <td>{{ $provider->contact->direct_phone }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('provider.mobil_1') }}</th>
                                <td>{{ $provider->contact->mobil1 or '' }}</td>

                                <th>{{ trans('provider.mobil_2') }}</th>
                                <td>{{ $provider->contact->mobil2 or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('provider.email') }}</th>
                                <td>{{ $provider->contact->email }}</td>


                            </tr>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('provider.payment_information') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ trans('provider.bank_account') }}</th>
                                <td>{{ $provider->payment->bank_account_n }}</td>

                                <th>{{ trans('provider.bank') }}</th>
                                <td>{{ $provider->payment->bank }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('provider.swift') }}</th>
                                <td>{{ $provider->payment->swift or '' }}</td>

                                <th>{{ trans('provider.payment_conditions') }}</th>
                                <td>{{ $provider->payment->payment_conditions or '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ trans('provider.address_invoices') }}</th>
                                <td>{{ $provider->payment->address_invoices }}</td>

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
                        <!-- delete the provider (uses the destroy method DESTROY /provider/{id} -->
                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.providers.destroy', $provider->id], 'class'=>'inline-block btn-delete' ]) !!}

                                <!-- edit this provider (uses the edit method found at GET /provider/{id}/edit -->
                        <a class="btn btn-sm btn-info"
                           href="{{ URL::to('admin/providers/' . $provider->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                            {!! trans('utils.editBtn') !!}</a>


                        {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@stop