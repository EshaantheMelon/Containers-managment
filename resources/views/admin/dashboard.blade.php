@extends('layouts.app')

@section('head')

    <h1>
        {!! trans('utils.menu.dashboard') !!}
        <small>{!! trans('utils.menu.dashboard') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{!! trans('utils.menu.dashboard') !!}</li>
    </ol>

@stop

@section('title', trans('container.all'))

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

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ \App\Container::count() }}</h3>
                            <p>{{ trans('utils.menu.containers') }}</p>
                        </div>
                        <div class="icon">
                            <a href="{{ url('admin/containers/create') }}"><i class="fa fa-truck"></i><sup>+</sup> </a>
                        </div>
                        <a href="{{ url('admin/containers') }}" class="small-box-footer">{{ trans('utils.moreBtn') }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ \App\Contract::count() }}</h3>
                            <p>{{ trans('utils.menu.contracts') }}</p>
                        </div>
                        <div class="icon">
                            <a href='{{ url('admin/contracts/create') }}'><i class="ion ion-android-document"></i><sup>+</sup></a>
                        </div>
                        <a href="{{ url('admin/contracts') }}" class="small-box-footer">{{ trans('utils.moreBtn') }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ \App\Client::count() }}</h3>
                            <p>{{ trans('utils.menu.clients') }}</p>
                        </div>
                        <div class="icon">
                            <a href='{{ url('admin/clients/create') }}'><i class="ion ion-person"></i><sup>+</sup></a>
                        </div>
                        <a href="{{ url('admin/clients') }}" class="small-box-footer">{{ trans('utils.moreBtn') }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ \App\Provider::count() }}</h3>
                            <p>{{ trans('utils.menu.providers') }}</p>
                        </div>
                        <div class="icon">
                            <a href='{{ url('admin/providers/create') }}'><i class="ion ion-person"></i><sup>+</sup></a>
                        </div>
                        <a href="{{ url('admin/providers') }}" class="small-box-footer">{{ trans('utils.moreBtn') }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ \App\Port::count() }}</h3>
                            <p>{{ trans('utils.menu.ports') }}</p>
                        </div>
                        <div class="icon">
                            <a href='{{ url('admin/ports/create') }}'><i class="ion ion-stats-bars"></i><sup>+</sup></a>
                        </div>
                        <a href="{{ url('admin/ports') }}" class="small-box-footer">{{ trans('utils.moreBtn') }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ \App\Depot::count() }}</h3>
                            <p>{{ trans('utils.menu.depots') }}</p>
                        </div>
                        <div class="icon">
                            <a href='{{ url('admin/depots/create') }}'><i class="ion ion-stats-bars"></i><sup>+</sup></a>
                        </div>
                        <a href="{{ url('admin/depots') }}" class="small-box-footer">{{ trans('utils.moreBtn') }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ \App\Vessel::count() }}</h3>
                            <p>{{ trans('utils.menu.vessels') }}</p>
                        </div>
                        <div class="icon">
                            <a href='{{ url('admin/vessels/create') }}'><i class="fa fa-ship"></i><sup>+</sup></a>
                        </div>
                        <a href="{{ url('admin/vessels') }}" class="small-box-footer">{{ trans('utils.moreBtn') }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ \App\Travel::count() }}</h3>
                            <p>{{ trans('utils.menu.travels') }}</p>
                        </div>
                        <div class="icon">
                            <a href='{{ url('admin/travels/create') }}'><i class="ion ion-plane"></i><sup>+</sup></a>
                        </div>
                        <a href="{{ url('admin/travels') }}" class="small-box-footer">{{ trans('utils.moreBtn') }} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->


        </section><!-- /.content -->

@endsection