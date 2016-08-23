@extends('layouts.app')

@section('title', trans('position.information'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_positions') }}
        <small>{!! trans('position.information') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/positions') }}">{{ trans('utils.menu.m_positions') }}</a></li>
        <li class="active">{!! trans('position.information') !!}</li>
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
                            @foreach($position->containers as $container)
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
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.positions.at-expertise') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{!! trans('position.date') !!}</th>
                                <th>{!! trans('position.name') !!}</th>
                                <th>{!! trans('position.company') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($position->atExpertise as $exp)
                                <tr>
                                    <td>{{ $exp->id }}</td>
                                    <td>{{ $exp->date }}</td>
                                    <td>{{ $exp->person  }}</td>
                                    <td>{{ $exp->company }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.positions.at-depot') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{!! trans('position.date_in') !!}</th>
                                <th>{!! trans('position.depot') !!}</th>
                                <th>{!! trans('position.status') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($position->atDepot as $depot)
                                <tr>
                                    <td>{{ $depot->id }}</td>
                                    <td>{{ $depot->date_in }}</td>
                                    <td><a href="{{ route('admin.depots.show', $depot->depot_id) }}">{{ $depot->depot->name or '' }}</a>
                                    </td>
                                    <td>{{ $depot->status }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.positions.at-pol') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{!! trans('position.date_in') !!}</th>
                                <th>{!! trans('position.code_port') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($position->atPol as $pol)
                                <tr>
                                    <td>{{ $pol->id }}</td>
                                    <td>{{ $pol->date_in }}</td>
                                    <td><a href="{{ url('admin/ports/' . $pol->port->id .'/edit') }}">{{ $pol->port->port or '' }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.positions.at-pod') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{!! trans('position.date_unloading') !!}</th>
                                <th>{!! trans('position.code_port') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($position->atPod as $pod)
                                <tr>
                                    <td>{{ $pod->id }}</td>
                                    <td>{{ $pod->date_unloading }}</td>
                                    <td><a href="#">{{ $pod->port->port or '' }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.positions.at-shipper') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{!! trans('position.date_out_depot') !!}</th>
                                <th>{!! trans('position.booking') !!}</th>
                                <th>{!! trans('position.vessel') !!}</th>
                                <th>{!! trans('position.travel') !!}</th>
                                <th>{!! trans('position.name_shipper') !!}</th>
                                <th>{!! trans('position.cin_driver') !!}</th>
                                <th>{!! trans('position.id_truck') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($position->atShipper as $shipper)
                                <tr>
                                    <td>{{ $shipper->date_out_depot }}</td>
                                    <td>{{ $shipper->booking }}</td>
                                    <td>
                                        <a href="{{ route('admin.vessels.show', $shipper->vessel_id) }}">{{ $shipper->vessel->vessel or '' }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.travels.show', $shipper->travel_id) }}">{{ $shipper->travel->number or '' }}</a>
                                    </td>
                                    <td>{{ $shipper->name_shipper }}</td>
                                    <td>{{ $shipper->cin_driver }}</td>
                                    <td>{{ $shipper->id_truck }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.positions.at-board') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{!! trans('position.date_loading') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($position->atBoard as $board)
                                <tr>
                                    <td>{{ $board->id }}</td>
                                    <td>{{ $board->date_loading }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.positions.at-consignee') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{!! trans('position.date_out_port') !!}</th>
                                <th>{!! trans('position.name_consignee') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($position->atConsignee as $consignee)
                                <tr>
                                    <td>{{ $consignee->id }}</td>
                                    <td>{{ $consignee->date_out_port }}</td>
                                    <td>{{ $consignee->name_consignee }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            @if($position->atReformed->count() > 0)
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.positions.at-reformed') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{!! trans('position.date') !!}</th>
                                <th>{!! trans('position.location') !!}</th>
                                <th>{!! trans('position.cost') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($position->atReformed as $ref)
                                <tr>
                                    <td>{{ $ref->id }}</td>
                                    <td>{{ $ref->date->format('Y-m-d') }}</td>
                                    <td>{{ $ref->location }}</td>
                                    <td>{{ $ref->cost }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            @endif

            @if($position->atCustomsSeizure->count() > 0)
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.positions.at-customsSeizure') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{!! trans('position.date') !!}</th>
                                <th>{!! trans('position.cause') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($position->atCustomsSeizure as $customs)
                                <tr>
                                    <td>{{ $customs->id }}</td>
                                    <td>{{ $customs->date->format('Y-m-d') }}</td>
                                    <td>{{ $customs->cause }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            @endif

            @if ($position->atLongStay->count() > 0)
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('position.positions.at-longStay') }}</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{!! trans('position.cause') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($position->atLongStay as $longStay)
                                <tr>
                                    <td>{{ $longStay->id }}</td>
                                    <td>{{ $longStay->cause }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            @endif

        </div>
    </section>


@endsection
