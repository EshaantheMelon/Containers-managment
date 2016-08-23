<!-- left menu starts -->
<div class="col-sm-2 col-lg-2">
    <div class="sidebar-nav">
        <div class="nav-canvas">

            <ul class="nav nav-pills nav-stacked main-menu">
                <li class="nav-header">Main</li>
                <li><a class="ajax-link" href="{{ URL::to('admin') }}"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a></li>

                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.clients') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/clients') }}">{!! trans('utils.menu.all_clients') !!}</a></li>
                        <li><a href="{{ URL::to('admin/clients/create') }}">{!! trans('utils.menu.create_client') !!}</a>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.providers') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/providers') }}">{!! trans('utils.menu.all_providers') !!}</a></li>
                        <li><a href="{{ URL::to('admin/providers/create') }}">{!! trans('utils.menu.create_provider') !!}</a>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.depots') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/depots') }}">{!! trans('utils.menu.all_depots') !!}</a></li>
                        <li><a href="{{ URL::to('admin/depots/create') }}">{!! trans('utils.menu.create_depot') !!}</a>
                    </ul>
                </li>
				<li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.ports') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/ports') }}">{!! trans('utils.menu.all_ports') !!}</a></li>
                        <li><a href="{{ URL::to('admin/ports/create') }}">{!! trans('utils.menu.create_port') !!}</a>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.vessels') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/vessels') }}">{!! trans('utils.menu.all_vessels') !!}</a></li>
                        <li><a href="{{ URL::to('admin/vessels/create') }}">{!! trans('utils.menu.create_vessel') !!}</a>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.travels') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/travels') }}">{!! trans('utils.menu.all_travels') !!}</a></li>
                        <li><a href="{{ URL::to('admin/travels/create') }}">{!! trans('utils.menu.create_travel') !!}</a>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.contracts') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/contracts') }}">{!! trans('utils.menu.all_contracts') !!}</a></li>
                        <li><a href="{{ URL::to('admin/contracts/create') }}">{!! trans('utils.menu.create_contract') !!}</a>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.containers') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/containers') }}">{!! trans('utils.menu.all_containers') !!}</a></li>
                        <li><a href="{{ URL::to('admin/containers/create') }}">{!! trans('utils.menu.create_container') !!}</a>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.positions') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/positions') }}">{!! trans('utils.menu.all_positions') !!}</a></li>
                        <li><a href="{{ URL::to('admin/positions/create') }}">{!! trans('utils.menu.create_position') !!}</a>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.bill_lading') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/bill-of-lading') }}">{!! trans('utils.menu.all_bill_ladings') !!}</a></li>
                        <li><a href="{{ URL::to('admin/result') }}">Result</a></li>
                    </ul>
                </li>
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.surestaries') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/surestaries') }}">{!! trans('utils.menu.all_surestaries') !!}</a></li>
                        <!--
                        <li><a href="{{ URL::to('admin/surestaries/create') }}">{!! trans('utils.menu.create_surestaries') !!}</a>
                        -->
                    </ul>
                </li>

                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span> {!! trans('utils.menu.quotation') !!}</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ URL::to('admin/quotations') }}">{!! trans('utils.menu.all_quotations') !!}</a></li>
                        <li><a href="{{ URL::to('admin/quotations/create') }}">{!! trans('utils.menu.create_quotations') !!}</a>
                    </ul>
                </li>
            </ul>
            <label id="for-is-ajax" for="is-ajax"> </label>

        </div>
    </div>
</div>
<!-- left menu ends -->