<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page not found! - {{ trans('utils.app') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('plugins/datepicker/datepicker3.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css') }}">

    <!-- Custom style -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="">
<div class="wrappe">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapp">


        <section class="content">
            <div class="error-page">
                <h2 class="headline text-yellow"> 404</h2>
                <div class="error-content">
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <a href="{{ url('/') }}">return to dashboard</a>
                    </p>
                </div><!-- /.error-content -->
            </div><!-- /.error-page -->
        </section>
    </div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ URL::asset('plugins/select2/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ URL::asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ URL::asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ URL::asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ URL::asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ URL::asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ URL::asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ URL::asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ URL::asset('plugins/iCheck/icheck.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('plugins/fastclick/fastclick.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/app.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
<!-- page script -->

<script>
    $(function () {
        $("#data-table").DataTable();

        // date picker
        $('.date-picker').datepicker({
            format: 'dd-mm-yyyy',
            @if (isset($position))
            startDate: new Date({{ explode("-", $position->last_date)[0] }},
                    {{ explode("-", $position->last_date)[1]-1 }},
                    {{ explode("-", $position->last_date)[2] }}),
            @endif
            autoclose: true
        });
        //Initialize Select2 Elements
        $("select").select2();
    });


</script>
</body>
</html>