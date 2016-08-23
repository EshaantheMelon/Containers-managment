@extends('layouts.client')

@section('content')

    <br/>

    <div class="container">
        <!-- if there are creation errors, they will show here -->
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)

                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </p>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->
    </div>

    <div class="container contact">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! trans('profile.update_login') !!}</div>
                    <div class="panel-body">
                        {{ Form::open(['url' => '/account', 'files' => true, 'class'=>"form-horizontal"]) }}
                        <input type="hidden" name="form" value="login"/>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('profile.name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('profile.email') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('profile.pic') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="pic" >

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('profile.password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('profile.c_password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> {!! trans('auth.update') !!}
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! trans('profile.update_information') !!}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{url('/account')}}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="form" value="client"/>
                            <div class="form-group ">
                                <label class="col-md-4 control-label">{!! trans('profile.s_reason') !!}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="client[social_reason]"
                                           value="{{ $user->client->social_reason }}">

                                    @if ($errors->has('client.social_reason'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('client.social_reason') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">{!! trans('profile.address') !!}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="client[address]"
                                           value="{{ $user->client->address }}">

                                    @if ($errors->has('client.address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('client.address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">{!! trans('profile.phone') !!}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="client[phone]"
                                           value="{{ $user->client->phone }}">

                                    @if ($errors->has('client.phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('client.phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">{!! trans('profile.fax') !!}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="client[fax]"
                                           value="{{ $user->client->fax }}">

                                    @if ($errors->has('client.fax'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('client.fax') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">{!! trans('profile.web_site') !!}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="client[web_site]"
                                           value="{{ $user->client->web_site }}">

                                    @if ($errors->has('client.web_site'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('client.web_site') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label">{!! trans('profile.tax_id') !!}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="client[tax_id]"
                                           value="{{ $user->client->tax_id }}">

                                    @if ($errors->has('client.tax_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('client.tax_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> {!! trans('auth.update') !!}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop