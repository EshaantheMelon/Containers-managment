@extends('layouts.app')

@section('title', trans('bill_lading.all'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_bills_lading') }}
        <small>{!! trans('bill_lading.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/bill-of-lading') }}">{{ trans('utils.menu.m_bills_lading') }}</a></li>
        <li class="active">{!! trans('bill_lading.all') !!}</li>
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
                            <td>{!! trans('bill_lading.number') !!}</td>
                            <td>{!! trans('bill_lading.shipper') !!}</td>
                            <td>{!! trans('bill_lading.consignee') !!}</td>
                            <td>{!! trans('bill_lading.place_of_loading') !!}</td>
                            <td>{!! trans('bill_lading.port_of_loading_pol') !!}</td>
                            <td>{!! trans('bill_lading.place_of_delivery_pod') !!}</td>
                            <!-- <td>{!! trans('bill_lading.vessel') !!}</td> -->
                            <td>{!! trans('bill_lading.travel') !!}</td>
                            <td>{!! trans('utils.actionsBtn') !!}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bill_ladings as $bill_lading)
                            <tr>
                                <td>{{ $bill_lading->number }}</td>
                                <td>{{ $bill_lading->shipper->name_shipper or '' }}</td>
                                <td>{{ $bill_lading->consignee->name_consignee or '' }}</td>
                                <td>{{ $bill_lading->place_of_loading or '' }}</td>
                                <td>{{ $bill_lading->port_of_loading_pol or '' }}</td>
                                <td>{{ $bill_lading->place_of_delivery_pod or '' }}</td>
                                <!--<td>
                                    <a href="{{ URL::to('admin/vessels/' . $bill_lading->vessel->id) }}">{{ $bill_lading->vessel->vessel or '' }}</a>
                                </td>
                                -->
                                <td>
                                    <a href="{{ URL::to('admin/travels/' . $bill_lading->travel->id) }}">{{ $bill_lading->travel->number or '' }}</a>
                                </td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <!-- delete the bill_lading (uses the destroy method DESTROY /bill_lading/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.bill-of-lading.destroy', $bill_lading->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- show the bill_lading (bill_lading the show method found at GET /bill_ladings/{id} -->
                                    <a class="btn btn-sm btn-success"
                                       href="{{ URL::to('admin/bill-of-lading/' . $bill_lading->id) }}">{!! trans('utils.showBtn') !!}</a>

                                    <!-- edit this bill_lading (bill_lading the edit method found at GET /bill_ladings/{id}/edit -->
                                    <a class="btn btn-sm btn-info"
                                       href="{{ URL::to('admin/bill-of-lading/' . $bill_lading->id . '/edit') }}">{!! trans('utils.editBtn') !!}</a>


                                    {!! Form::submit(trans('utils.deleteBtn'), ['class' => 'btn btn-sm btn-danger']) !!}

                                    <a class="btn btn-sm btn-warning"
                                       href="{{ URL::to('admin/bill-of-lading/' . $bill_lading->id . '/pdf') }}"><i class="fa fa-file-pdf-o"></i>
                                        PDF</a>

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