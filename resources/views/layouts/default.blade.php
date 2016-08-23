<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title') - {{ trans('utils.app') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-cerulean.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/charisma-app.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('bower_components/fullcalendar/dist/fullcalendar.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('bower_components/fullcalendar/dist/fullcalendar.print.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('bower_components/chosen/chosen.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('bower_components/colorbox/example3/colorbox.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('bower_components/responsive-tables/responsive-tables.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.noty.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/noty_theme_default.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/elfinder.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/elfinder.theme.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.iphone.toggle.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/uploadify.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
</head>
<body>

<!-- topbar starts -->
<div class=" navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"  id="logo">{{ trans('utils.app') }}</a>

        <!-- user auth starts -->
        <div class="pull-right">
            @if (Auth::guest())
                <ul class="navbar-collapse nav navbar-nav top-menu">
                    <li><a href="{{ url('/login') }}"><i class="glyphicon glyphicon-globe"></i> login</a></li>
                </ul>
            @else
                @if (Auth::user()->isAdmin())
                    <ul class="navbar-collapse nav navbar-nav top-menu">
                        <li><a href="{{ url('/register') }}">New user</a></li>
                    </ul>
                @endif
                <div class="btn-group">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </div>
            @endif

        </div>
    </div>

</div>
<!-- topbar ends -->

<div class="ch-container">
    <div class="row">

        @if (!Auth::guest())
            @include('layouts.leftMenu')
        @endif

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <!-- content starts -->
        <div id="content" class="col-lg-10 col-sm-10">

            @yield('content')

        </div>
        <!--/#content.col-md-0-->

    </div><!--/fluid-row-->


    <hr>
    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy;
            <a href="https://github.com/elhaouari" target="_blank">EN & MA</a> 2016</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                    href="http://usman.it/free-responsive-admin-template">We</a></p>
    </footer>

</div><!--/.fluid-container-->

<!-- include script -->
<script type="text/javascript" src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/bootstrap-validator/dist/validator.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/moment/min/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/chosen/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/colorbox/jquery.colorbox-min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.noty.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/responsive-tables/responsive-tables.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.raty.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.iphone.toggle.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.autogrow-textarea.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.uploadify-3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.history.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/charisma.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>