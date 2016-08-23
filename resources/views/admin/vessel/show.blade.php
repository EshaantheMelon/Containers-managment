@extends('layouts.app')

@section('title', trans('vessel.information'))

@section('head')

    <h1>
        {{ trans('utils.menu.m_vessels') }}
        <small>{!! trans('vessel.update') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> {{ trans('utils.home') }}</a></li>
        <li><a href="{{ url('/admin/vessels') }}">{{ trans('utils.menu.m_vessels') }}</a></li>
        <li class="active">{!! trans('vessel.update') !!}</li>
    </ol>

@stop

@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('vessel.information') }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>{{ trans('vessel.vessel') }}</th>
                            <td>{{ $vessel->vessel }}</td>

                            <th>{{ trans('vessel.type') }}</th>
                            <td>{{ $vessel->type }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.dwt_summer_draft') }}</th>
                            <td>{{ $vessel->dwt_summer_draft}}</td>

                            <th>{{ trans('vessel.built_country') }}</th>
                            <td>{{ $vessel->built_country }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.built_year') }}</th>
                            <td>{{ $vessel->built_year }}</td>

                            <th>{{ trans('vessel.flag') }}</th>
                            <td>{{ $vessel->flag }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.class') }}</th>
                            <td>{{ $vessel->class }}</td>

                            <th>{{ trans('vessel.owners') }}</th>
                            <td>{{ $vessel->owners }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.imo_number') }}</th>
                            <td>{{ $vessel->imo_number}}</td>

                            <th>{{ trans('vessel.length_overall') }}</th>
                            <td>{{ $vessel->length_overall }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.length_between') }}</th>
                            <td>{{ $vessel->length_between }}</td>

                            <th>{{ trans('vessel.breadth_moulded') }}</th>
                            <td>{{ $vessel->breadth_moulded}}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.depth_moulded') }}</th>
                            <td>{{ $vessel->depth_moulded}}</td>

                            <th>{{ trans('vessel.summer_draught') }}</th>
                            <td>{{ $vessel->summer_draught}}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.light_weight') }}</th>
                            <td>{{ $vessel->light_weight }}</td>

                            <th>{{ trans('vessel.draft_displacement') }}</th>
                            <td>{{ $vessel->draft_displacement }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.grt') }}</th>
                            <td>{{ $vessel->grt }}</td>

                            <th>{{ trans('vessel.nrt') }}</th>
                            <td>{{ $vessel->nrt }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.teu_capacity') }}</th>
                            <td>{{ $vessel->teu_capacity }}</td>

                            <th>{{ trans('vessel.feu_capacity') }}</th>
                            <td>{{ $vessel->feu_capacity}}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.reefers_capacity') }}</th>
                            <td>{{ $vessel->reefers_capacity }}</td>

                            <th>{{ trans('vessel.bunkers_capacity') }}</th>
                            <td>{{ $vessel->bunkers_capacity }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.type_engine') }}</th>
                            <td>{{ $vessel->type_engine }}</td>

                            <th>{{ trans('vessel.cargo_gear') }}</th>
                            <td>{{ $vessel->cargo_gear}}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.speed') }}</th>
                            <td>{{ $vessel->speed }}</td>

                            <th>{{ trans('vessel.consumption') }}</th>
                            <td>{{ $vessel->consumption }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.hfo') }}</th>
                            <td>{{ $vessel->hfo }}</td>

                            <th>{{ trans('vessel.lsfo') }}</th>
                            <td>{{ $vessel->lsfo}}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.mgo') }}</th>
                            <td>{{ $vessel->mgo }}</td>

                            <th>{{ trans('vessel.mdo') }}</th>
                            <td>{{ $vessel->mdo }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.capacity_trailer') }}</th>
                            <td>{{ $vessel->capacity_trailer }}</td>

                            <th>{{ trans('vessel.number_gear') }}</th>
                            <td>{{ $vessel->number_gear}}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('vessel.capacity_gear') }}</th>
                            <td>{{ $vessel->capacity_gear }}</td>

                            <th>{{ trans('vessel.last_travel') }}</th>
                            <td>{{ $vessel->last_travel}}</td>
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
                    <!-- delete the vessel (uses the destroy method DESTROY /vessel/{id} -->
                    {!! Form::open([ 'method' => 'DELETE', 'route' => ['admin.vessels.destroy', $vessel->id], 'class'=>'inline-block btn-delete' ]) !!}

                            <!-- edit this vessel (uses the edit method found at GET /vessel/{id}/edit -->
                    <a class="btn btn-sm btn-info"
                       href="{{ URL::to('admin/vessels/' . $vessel->id . '/edit') }}"><i class="glyphicon glyphicon-edit icon-white"></i>
                        {!! trans('utils.editBtn') !!}</a>


                    {{Form::button('<i class="glyphicon glyphicon-trash icon-white"></i> ' . trans('utils.deleteBtn'), ['type' => 'submit', 'class' => 'btn btn-sm btn-danger'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@stop