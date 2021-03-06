<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MNM African Shipping Line</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="{{ URL::asset('dist/css/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Loading Flat UI -->
    <link href="{{ URL::asset('dist/css/flat-ui.min.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

    <link href="{{ URL::asset('css/client.css') }}" rel="stylesheet">


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('dist/js/vendor/html5shiv.js') }}"></script>
    <script src="{{ URL::asset('dist/js/vendor/respond.min.js') }}"></script>
    <![endif]-->

</head>
<body>

<div class="wrap">
    <header>
        <!--
        <div class="header">
            <div><img src="img/logo.png"/></div>
        </div>
        -->
        <!-- /.container -->

        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                    <span class="sr-only">Toggle navigation</span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
                <div class="container">

                    <ul class="nav navbar-nav menu">
                        <li class="{{Request::path() == '/' ? 'active' : ''}}"><a href="{{ url('/') }}">{{ trans('utils.home') }}</a></li>

                        <li class="{{str_contains(Request::path(), 'tracking') ? 'active' : ''}}"><a
                                    href="{{ url('tracking') }}">{{ trans('utils.tracking') }}</a></li>
                        <li class="{{Request::path() == 'contact' ? 'active' : ''}}"><a href="{{ url('contact') }}">{{ trans('utils.contact') }}</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}"> {{ trans('utils.login') }}</a></li>
                        @else
                            <li class="li {{str_contains(Request::path(), 'account') ? 'active' : ''}}">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false" style="position: relative; padding-left: 50px;">
                                    @if(Auth::user()->client)
                                        <img src="{{ URL::asset('upload') }}/{{Auth::user()->client->contact->pic}}"
                                             style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%"/>
                                    @endif

                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if(!Auth::user()->isAdmin())
                                        <li><a href="{{ url('/account') }}"><i class="fa fa-btn fa-user"></i>
                                                {{ trans('utils.account') }}</a></li>
                                    @endif
                                    <li><a href="{{ url('/tracking/mycontracts') }}"><i class="fa fa-btn fa-user"></i>
                                            {{ trans('utils.my_contracts') }}</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('utils.logout') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        {{ Form::open(['url' => 'lang', 'class'=>'lang']) }}
                        {{Form::select('lang', ['en'=>'en', 'fr'=>'fr'], session('language'),['onchange'=>'submit()'])}}
                        {{ Form::close()}}
                    </ul>


                </div>
            </div><!-- /.navbar-collapse -->
        </nav><!-- /navbar -->
    </header>

    <div class="main">

        @yield('content')

        <div class="hidden">
            <div id="base_receive" class="row msg_container base_receive">
                <div class="col-md-2 col-xs-2 avatar">
                    <img src="{{ URL::asset('img/logo1.png') }}" class=" img-responsive ">
                </div>
                <div class="col-md-10 col-xs-10">
                    <div class="messages msg_receive">
                        <p>that mongodb thing looks good, huh?
                            tiny master db, and huge document store</p>
                        <time datetime="2009-11-13T20:00" class='date'>Timothy • 51 min</time>
                    </div>
                </div>
            </div>
            <div id="base_sent" class="row msg_container base_sent">
                <div class="col-md-10 col-xs-10">
                    <div class="messages msg_sent">
                        <p>that mongodb thing looks good, huh?
                            tiny master db, and huge document store</p>
                        <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                    </div>
                </div>
                <div class="col-md-2 col-xs-2 avatar">
		@if(Auth::check() && Auth::user()->isClient())
                    <img src="{{ URL::asset('upload') }}/{{Auth::user()->client->contact->pic}}" class=" img-responsive ">
                 @endif
		
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row chat-window  col-xs-5 col-offset-md-5 col-md-4" id="chat_window_1"
                 style="margin-left:10px;">
                <div class="col-xs-12 col-md-12">
                    <div class="panel panel-default">
                        {{ Form::open(['url' => '/message', 'id' => 'form_chat']) }}
                        <input type="hidden" name="user_id" id="user_id" value="0" id="chat_user_id"/>
                        <input type="hidden" name="send" id="send" value="1"/>

                        <div class="panel-heading top-bar">
                            <div class="col-md-8 col-xs-8">
                                <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Miguel
                                </h3>
                            </div>
                            <div class="col-md-4 col-xs-4" style="text-align: right;">
                                <a href="#"><span id="minim_chat_window"
                                                  class="glyphicon glyphicon-minus icon_minim"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-remove icon_close"
                                                  data-id="chat_window_1"></span></a>
                            </div>
                        </div>

                        <div class="panel-body msg_container_base" id="msg_container_base">


                        </div>

                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" name="message" id="message" type="text"
                                       class="form-control input-sm chat_input"
                                       placeholder="Write your message here..."/>

                                <span class="input-group-btn">
                                    <button class="btn btn-success" id="btn-chat">Send</button>
                                </span>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="top col-md-12">
        <div class="row">
            <div class="col-md-4">
                {{ trans('public.aboutUs') }}
                <p>
                    {{ trans('public.about') }}
                </p>
            </div>
            <div class="col-md-4">
                {{ trans('public.s_networks') }}
                <p class="s_network">
                    <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                    <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
                    <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                    <a href="#"><i class="fa fa-linkedin fa-2x"></i></a>
                </p>

            </div>
            <div class="col-md-4">
                {{ trans('public.ourService') }}
                <p>
                    {{ trans('public.service') }}
                </p>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
    <div class="bottom">
        Mnm African Shipping Line.
        zone franche Ksar Majaz - Anjra, bur. 5&6 plateforme n° 5 - 90000  Tanger
    </div>
</footer>

<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
<script src="{{ URL::asset('dist/js/vendor/jquery.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ URL::asset('dist/js/vendor/video.js') }}"></script>
<script src="{{ URL::asset('dist/js/flat-ui.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.cookie.js') }}"></script>


<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/chosen/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/colorbox/jquery.colorbox-min.js') }}"></script>

<script type="text/javascript"
        src="{{ URL::asset('bower_components/responsive-tables/responsive-tables.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('js/jquery.raty.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.iphone.toggle.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.autogrow-textarea.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.uploadify-3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.history.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/charisma.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>

<script>
    $("#chat_window_1").hide();


    var url = '{{ Session::get('chat_uri') }}';
    $(".new_chat").click(function(){
        url = $(this).data('url');
    });

    if (url != ''){
        setInterval(function(){

            getMessages(url);
        }, 3000);
    }


</script>
</body>
</html>
