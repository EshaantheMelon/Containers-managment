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
    <script type="text/javascript" src="{{ URL::asset('bower_components/jquery/jquery.min.js') }}"></script>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
</head>
<body>


@yield('content')


</div><!--/.fluid-container-->

<!-- include script -->
<script type="text/javascript" src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/moment/min/moment.min.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/chosen/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/colorbox/jquery.colorbox-min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.noty.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('bower_components/responsive-tables/responsive-tables.js') }}"></script>
<script type="text/javascript"
        src="{{ URL::asset('bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js') }}"></script>
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