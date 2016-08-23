<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - {{ trans('utils.app') }}</title>
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
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/admin') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>C</b>M</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Containers</b>Management</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div id='nav' class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span id="chat_nomber" class="label label-success"> </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu" id="ul_msg">
                                    <input type="hidden" id="url_chat" value="{{ url('msg/'. Auth::user()->id) }}" />
                                    <div  class="hidden">
                                        <li data-id="" id="new_chat" data-name="client"><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">

                                            </div>
                                            <h4>
                                                Client
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ URL::asset('img/logo1.png') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ ucfirst(Auth::user()->name) }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ URL::asset('img/logo1.png') }}" class="img-circle" alt="User Image">
                                <p>
                                    {{ ucfirst(Auth::user()->name) }}
                                    <small>{{ Auth::user()->role->role }}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('admin/profile') }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">{{ trans('auth.logout') }}</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>

                {{ Form::open(['url' => 'lang', 'class'=>'lang']) }}
                {{Form::select('lang', ['en'=>'en', 'fr'=>'fr'], session('language'),['onchange'=>'submit()'])}}
                {{ Form::close()}}
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ URL::asset('img/logo1.png') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ ucfirst(Auth::user()->name) }}</p>
                    <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
                </div>
            </div>


            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>

                <li class="treeview {{Request::path() == 'admin' ? 'active' : ''}}">
                    <a href="{{ url('/admin') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>{!! trans('utils.menu.dashboard') !!}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>

                <li class="treeview {{str_contains(Request::path(), 'admin/clients') || str_contains(Request::path(), 'admin/providers') ? 'active' : ''}}">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>{{ trans('utils.menu.m_partners') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{str_contains(Request::path(), 'clients') ? 'active' : ''}}"><a href="{{ url('/admin/clients') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.clients') }}</a>
                            <ul class="treeview-menu">
                                <li class="{{Request::path() == 'admin/clients' ? 'active' : ''}}"><a href="{{ url('/admin/clients') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_clients') }}</a></li>
                                <li class="{{Request::path() == 'admin/clients/create' ? 'active' : ''}}"><a href="{{ url('/admin/clients/create') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_client') }}</a></li>
                            </ul>
                        </li>
                        <li class="treeview {{str_contains(Request::path(), 'providers') ? 'active' : ''}}"><a href="{{ url('/admin/providers') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.providers') }}</a>
                            <ul class="treeview-menu">
                                <li class="{{Request::path() == 'admin/providers' ? 'active' : ''}}"><a href="{{ url('/admin/providers') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_providers') }}</a></li>
                                <li class="{{Request::path() == 'admin/providers/create' ? 'active' : ''}}"><a href="{{ url('/admin/providers/create') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_provider') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{str_contains(Request::path(), 'depots') || str_contains(Request::path(), 'ports') || str_contains(Request::path(), 'vessels') || str_contains(Request::path(), 'travels') ? 'active' : ''}}">
                    <a href="#">
                        <i class="fa fa-ship"></i>
                        <span>{{ trans('utils.menu.m_entities') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{str_contains(Request::path(), 'depots') ? 'active' : ''}}"><a href="{{ url('/admin/depots') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.depots') }}</a>
                            <ul class="treeview-menu">
                                <li class="{{Request::path() == 'admin/depots' ? 'active' : ''}}"><a href="{{ url('/admin/depots') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_depots') }}</a></li>
                                <li class="{{Request::path() == 'admin/depots/create' ? 'active' : ''}}"><a href="{{ url('/admin/depots/create') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_depot') }}</a></li>
                            </ul>
                        </li>
                        <li class="treeview {{str_contains(Request::path(), 'ports') ? 'active' : ''}}"><a href="{{ url('/admin/ports') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.ports') }}</a>
                            <ul class="treeview-menu">
                                <li class="{{Request::path() == 'admin/ports' ? 'active' : ''}}"><a href="{{ url('/admin/ports') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_ports') }}</a></li>
                                <li class="{{Request::path() == 'admin/ports/create' ? 'active' : ''}}"><a href="{{ url('/admin/ports/create') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_port') }}</a></li>
                            </ul>
                        </li>
                        <li class="treeview {{str_contains(Request::path(), 'vessels') ? 'active' : ''}}"><a href="{{ url('/admin/vessels') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.vessels') }}</a>
                            <ul class="treeview-menu">
                                <li class="{{Request::path() == 'admin/vessels' ? 'active' : ''}}"><a href="{{ url('/admin/vessels') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_vessels') }}</a></li>
                                <li class="{{Request::path() == 'admin/vessels/create' ? 'active' : ''}}"><a href="{{ url('/admin/vessels/create') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_vessel') }}</a></li>
                            </ul>
                        </li>
                        <li class="treeview {{str_contains(Request::path(), 'travels') ? 'active' : ''}}"><a href="{{ url('/admin/travels') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.travels') }}</a>
                            <ul class="treeview-menu">
                                <li class="{{Request::path() == 'admin/travels' ? 'active' : ''}}"><a href="{{ url('/admin/travels') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_travels') }}</a></li>
                                <li class="{{Request::path() == 'admin/travels/create' ? 'active' : ''}}"><a href="{{ url('/admin/travels/create') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_travel') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{str_contains(Request::path(), 'admin/containers') || str_contains(Request::path(), 'admin/contracts') ? 'active' : ''}}">
                    <a href="#">
                        <i class="fa fa-truck"></i>
                        <span>{{ trans('utils.menu.m_containers') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{str_contains(Request::path(), 'containers') ? 'active' : ''}}"><a href="{{ url('/admin/containers') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.containers') }}</a>
                            <ul class="treeview-menu">
                                <li class="{{Request::path() == 'admin/containers' ? 'active' : ''}}"><a href="{{ url('/admin/containers') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_containers') }}</a></li>
                                <li class="{{Request::path() == 'admin/containers/create' ? 'active' : ''}}"><a href="{{ url('/admin/containers/create') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_container') }}</a></li>
                            </ul>
                        </li>
                        <li class="treeview {{str_contains(Request::path(), 'contracts') ? 'active' : ''}}"><a href="{{ url('/admin/contracts') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.contracts') }}</a>
                            <ul class="treeview-menu">
                                <li class="{{Request::path() == 'admin/contracts' ? 'active' : ''}}"><a href="{{ url('/admin/contracts') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_contracts') }}</a></li>
                                <li class="{{Request::path() == 'admin/contracts/create' ? 'active' : ''}}"><a href="{{ url('/admin/contracts/create') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_contract') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{str_contains(Request::path(), 'admin/positions')  ? 'active' : ''}}">
                    <a href="#">
                        <i class="fa fa-truck"></i>
                        <span>{{ trans('utils.menu.m_positions') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{Request::path() == 'admin/positions' ? 'active' : ''}}"><a href="{{ url('/admin/positions') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_positions') }}</a></li>
                        <li class="{{Request::path() == 'admin/positions/create' ? 'active' : ''}}"><a href="{{ url('/admin/positions/create') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_position') }}</a></li>
                    </ul>
                </li>

                <li class="treeview {{str_contains(Request::path(), 'admin/bill-of-lading') || str_contains(Request::path(), 'admin/result') ? 'active' : ''}}">
                    <a href="#">
                        <i class="fa fa-file-o"></i>
                        <span>{{ trans('utils.menu.bill_lading') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{Request::path() == 'admin/bill-of-lading' ? 'active' : ''}}"><a href="{{ url('/admin/bill-of-lading') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_bill_ladings') }}</a></li>
                        <!-- <li class="{{Request::path() == 'admin/result' ? 'active' : ''}}"><a href="{{ url('admin/result') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.result') }}</a></li>-->
                    </ul>
                </li>

                <li class="treeview {{str_contains(Request::path(), 'admin/surestaries') || str_contains(Request::path(), 'admin/quotations') ? 'active' : ''}}">
                    <a href="#">
                        <i class="fa fa-truck"></i>
                        <span>{{ trans('utils.menu.m_surestaries') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{str_contains(Request::path(), 'surestaries') ? 'active' : ''}}"><a href="{{ url('/admin/surestaries') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.surestaries') }}</a>
                            <ul class="treeview-menu">
                                <li class="{{Request::path() == 'admin/surestaries' ? 'active' : ''}}"><a href="{{ url('/admin/surestaries') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_surestaries') }}</a></li>
                            </ul>
                        </li>
                        <li class="treeview {{str_contains(Request::path(), 'quotations') ? 'active' : ''}}"><a href="{{ url('admin/quotations') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.quotations') }}</a>
                            <ul class="treeview-menu">
                                <li class="{{Request::path() == 'admin/quotations' ? 'active' : ''}}"><a href="{{ url('admin/quotations') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_quotations') }}</a></li>
                                <li class="{{Request::path() == 'admin/quotations/create' ? 'active' : ''}}"><a href="{{ url('admin/quotations/create') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_quotations') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                @if ( Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isAdministrator()))
                <li class="treeview {{str_contains(Request::path(), 'admin/users')  ? 'active' : ''}}">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>{{ trans('utils.menu.m_users') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{Request::path() == 'admin/users' ? 'active' : ''}}"><a href="{{ url('/admin/users') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.all_users') }}</a></li>
                        <li><a href="{{ url('admin/register') }}"><i class="fa fa-circle-o"></i> {{ trans('utils.menu.create_user') }}</a></li>
                    </ul>
                </li>
                @endif

            </ul>

        </section>

        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            @yield('head')

        </section>

        <!-- Main content -->
        <section class="main content">

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
                    <div class="col-md-2 col-xs-2 avatar" id="img_avatar">

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row chat-window  col-xs-5 col-offset-md-5 col-md-4" id="chat_window_1" style="margin-left:10px;">
                    <div class="col-xs-12 col-md-12">
                        <div class="panel panel-default">
                            {{ Form::open(['url' => '/messageUser', 'id' => 'form_chat']) }}
                            <input type="hidden" name="client_id" value="" id="user_id" />

                            <div class="panel-heading top-bar">
                                <div class="col-md-8 col-xs-8">
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Miguel</h3>
                                </div>
                                <div class="col-md-4 col-xs-4" style="text-align: right;">
                                    <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                                    <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                                </div>
                            </div>

                            <div class="panel-body msg_container_base" id="msg_container_base">


                            </div>

                            <div class="panel-footer">
                                <div class="input-group">
                                    <input id="btn-input" name="message" id="message" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />

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
        </section>

    </div><!-- /.content-wrapper -->


    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 3.2
        </div>
        <strong>Copyright &copy; 2016 <a href="http://www.stm.ma/">STM Group</a>.</strong> {{  trans('utils.copyright') }}
    </footer>



    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

    <div class="modal" id="confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">{{ trans('utils.deleteConfirmation') }}</h4>
                </div>
                <div class="modal-body">
                    <p>{{ trans('utils.deleteMessage') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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


<!-- page script -->
<script>
    $(function () {
        $("#data-table").DataTable({

            @if(session('language') == 'fr')
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/French.json"
            }
            @endif

        });

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


        $('.btn-delete [type=submit]').on('click', function(e){
            e.preventDefault();
            var form=$(this).parent('form');
            $('#confirm').modal({ backdrop: 'static', keyboard: false })
                    .on('click', '#delete-btn', function(){
                        form.submit();
                    });
        });

        var url = '{{ url('msg') }}';
        $.ajax({
            url : url,
            method: 'GET',
            dataType : 'json'
        }).done(function(data) {

            var users = [];
            $.each(data, function(i, item) {
                var clone = $('#new_chat').clone();

                if (users.indexOf(item.client_id) < 0) {
                    clone.find('p').text(item.message);
                    clone.data('id', item.client_id);
                    clone.data('url', url + '/'+ item.client_id);
                    clone.find('.pull-left').html('<img src="{{ URL::asset('upload') }}/'+ item.pic +'" />');
                    users.push(item.client_id);
                    $('#ul_msg').append(clone);
                }
            });
            $('#chat_nomber').text(users.length);
        });
    });

    // set image of client
    $(document).on('click', '#new_chat', function (e) {
        $('#img_avatar').html($(this).find('.pull-left').html());
    });

    setInterval(function(){
        @if(Session::has('chat_uri'))
        var url = '{{ Session::get('chat_uri') }}';
        @endif
            getMessages(url);
    }, 3000);

    $("#chat_window_1").hide();
</script>

<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>
