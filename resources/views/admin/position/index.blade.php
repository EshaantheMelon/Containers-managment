@extends('layouts.app')

@section('head')

    <h1>
        {{ trans('utils.menu.m_positions') }}
        <small>{!! trans('position.all') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/positions') }}">{{ trans('utils.menu.m_positions') }}</a></li>
        <li class="active">{!! trans('position.all') !!}</li>
    </ol>

@stop

@section('title', trans('position.all'))

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

    <!-- filter form -->
    {{ Form::open(['url' => 'admin/positions/filter', 'class' =>'form-inline pull-right filter-form']) }}

    <div class="form-group">
        {{ Form::select('at', trans('position.positions'), old('country_code'), ['class' => 'form-control country']) }}
    </div>
    {{ Form::submit(trans('utils.filterBtn'), array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
            <!-- end filter form-->


    <div class="row">
        <div class="col-xs-12">

            <div class="box">

                <div class="box-body">

                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>cs</td>
                            <td>{!! trans('position.positions.at-expertise') !!}</td>
                            <td>{!! trans('position.positions.at-depot') !!}</td>
                            <td>{!! trans('position.positions.at-shipper') !!}</td>
                            <td>{!! trans('position.positions.at-pol') !!}</td>
                            <td>{!! trans('position.positions.at-pod') !!}</td>
                            <td>{!! trans('position.positions.at-consignee') !!}</td>
                            <td>{!! trans('position.positions.at-board') !!}</td>

                            <td>{{ trans('utils.actionsBtn') }}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($positions as $position)
                            <tr>
                                <td>
                                    @foreach($position->containers as $container)
                                        <a href='{{ route('admin.containers.show', $container->id)  }}'>{{ $container->prefix }}</a><br />
                                    @endforeach
                                </td>
                                <td>{{ isset($position->atExpertise->last()->date) ?
                                    $position->atExpertise->last()->date->format('m/d/y') : ''}}</td>
                                <td>{{ isset($position->atDepot->last()->date_in) ?
                                    $position->atDepot->last()->date_in->format('m/d/y') : ''}}</td>
                                <td>{{ $position->atShipper->last()->name_shipper or ''}}</td>
                                <td>{{ isset($position->atPol->last()->date_in) ?
                                    $position->atPol->last()->date_in->format('m/d/y') : ''}}</td>
                                <td>{{ isset($position->atPod->last()->date_unloading) ?
                                    $position->atPod->last()->date_unloading->format('m/d/y') : ''}}</td>
                                <td>{{ $position->atConsignee->last()->name_consignee or ''}}
                                </td>
                                <td>{{ isset($position->atBoard->last()->date_loading) ?
                                    $position->atBoard->last()->date_loading->format('m/d/y') : ''}}</td>

                                <!-- we will also add show, edit, and delete buttons -->
                                <td>
                                    <!-- delete the client (uses the destroy method DESTROY /client/{id} -->
                                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.positions.destroy', $position->id], 'class'=>'inline-block btn-delete' ]) !!}

                                    <!-- show the travel (travel the show method found at GET /travels/{id} -->

                                    <a class="btn btn-sm btn-success"
                                       href="{{ URL::to('admin/positions/' . $position->id) }}"><i class="glyphicon glyphicon-zoom-in icon-white"></i> {!! trans('utils.showBtn') !!}</a>

                                    <!-- edit this travel (travel the edit method found at GET /travels/{id}/edit -->
                                    @if(!$position->end)
                                    <a class="btn btn-sm btn-info" href="{{ URL::to('admin/positions/' . $position->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                                        {!! trans('utils.editBtn') !!}</a>
                                    @elseif ($position->bl != null)
                                        <a class="btn btn-sm btn-primary" href="{{ URL::to('admin/bill-of-lading/' . $position->bl->id ) }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                                            BL</a>
                                    @endif

                                    <!-- delete the travel (uses the destroy method DESTROY /travel/{id} -->

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