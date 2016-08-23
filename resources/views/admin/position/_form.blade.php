<div class="form-group">
    {{ Form::label('position', trans('position.position')) }}
    {{ Form::select('position', trans('position.positions'), null, ['class' => 'position form-control']) }}
</div>


<div class="at-depot">
    <h2>{{ trans('position.positions.at-depot') }}</h2>

    <div class="form-group">
        {{ Form::label('date_in', trans('position.date_in')) }}
        {{ Form::text('depot[date_in]', null, ['class' => 'form-control date-picker']) }}
    </div>

    <div class="form-group">
        {{ Form::label('depot', trans('position.depot')) }} <a href="{{ url('/admin/depots/create') }}" title='Add '><span class="glyphicon glyphicon-plus"></span></a>
        {{ Form::select('depot[depot_id]', $depots, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', trans('position.status')) }}
        {{ Form::select('depot[status]', trans('position.all-status'), null, ['class' => 'form-control status-depot']) }}
    </div>

    <div class="depot-loss">
        <div class="form-group">
            {{ Form::label('date_in', trans('position.date')) }}
            {{ Form::text('depot[loss][loss_date]', null, ['class' => 'form-control date-picker']) }}
        </div>

        <div class="form-group">
            {{ Form::label('status', trans('position.cause')) }}
            {{ Form::text('depot[loss][loss_cause]', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="depot-reparation">
        <div class="form-group">
            {{ Form::label('date_in', trans('position.date')) }}
            {{ Form::text('depot[reparation][reparation_date]', null, ['class' => 'form-control date-picker']) }}
        </div>

        <div class="form-group">
            {{ Form::label('reparation_provider', trans('position.reparation_provider')) }}
            {{ Form::select('depot[reparation][reparation_provider]', $providers, null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('reparation_cost', trans('position.reparation_cost')) }}
            {{ Form::text('depot[reparation][reparation_cost]', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('reparation_reference_invoice', trans('position.reparation_reference_invoice')) }}
            {{ Form::text('depot[reparation][reparation_reference_invoice]', null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>

<div class="at-shipper">
    <h2>{{ trans('position.positions.at-shipper') }}</h2>

    <div class="form-group">
        {{ Form::label('date_out_port', trans('position.date_out_port')) }}
        {{ Form::text('shipper[date_out_depot]', null, ['class' => 'form-control date-picker']) }}
    </div>

    <div class="form-group">
        {{ Form::label('status', trans('position.booking')) }}
        {{ Form::text('shipper[booking]', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('depot', trans('position.travel')) }} <a href="{{ url('/admin/travels/create') }}" title='Add '><span class="glyphicon glyphicon-plus"></span></a>
        {{ Form::select('shipper[travel_id]', $travels, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('name_shipper', trans('position.name_shipper')) }}
        {{ Form::text('shipper[name_shipper]', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('cin_driver', trans('position.cin_driver')) }}
        {{ Form::text('shipper[cin_driver]', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('id_truck', trans('position.id_truck')) }}
        {{ Form::text('shipper[id_truck]', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="at-pol">
    <h2>{{ trans('position.positions.at-pol') }}</h2>

    <div class="form-group">
        {{ Form::label('date_in', trans('position.date_in')) }}
        {{ Form::text('pol[date_in]', null, ['class' => 'form-control date-picker']) }}
    </div>

    <div class="form-group">
        {{ Form::label('code_port', trans('position.code_port')) }} <a href="{{ url('/admin/ports/create') }}" title='Add '><span class="glyphicon glyphicon-plus"></span></a>
        {{ Form::select('pol[port_id]', $ports, null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="at-pod">
    <h2>{{ trans('position.positions.at-pod') }}</h2>

    <div class="form-group">
        {{ Form::label('date_unloading', trans('position.date_unloading')) }}
        {{ Form::text('pod[date_unloading]', null, ['class' => 'form-control date-picker']) }}
    </div>

    <div class="form-group">
        {{ Form::label('code_port', trans('position.code_port')) }} <a href="{{ url('/admin/ports/create') }}" title='Add '><span class="glyphicon glyphicon-plus"></span></a>
        {{ Form::select('pod[port_id]', $ports, null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="at-board">
    <h2>{{ trans('position.positions.at-board') }}</h2>

    <div class="form-group">
        {{ Form::label('date_loading', trans('position.date_loading')) }}
        {{ Form::text('board[date_loading]', null, ['class' => 'form-control date-picker']) }}
    </div>

</div>

<div class="at-consignee">
    <h2>{{ trans('position.positions.at-consignee') }}</h2>

    <div class="form-group">
        {{ Form::label('date_out_port', trans('position.date_out_port')) }}
        {{ Form::text('consignee[date_out_port]', null, ['class' => 'form-control date-picker']) }}
    </div>

    <div class="form-group">
        {{ Form::label('name_consignee', trans('position.name_consignee')) }}
        {{ Form::text('consignee[name_consignee]', null, ['class' => 'form-control']) }}
    </div>

</div>

<div class="at-reformed">
    <h2>{{ trans('position.positions.at-reformed') }}</h2>

    <div class="form-group">
        {{ Form::label('date', trans('position.date')) }}
        {{ Form::text('reformed[date]', null, ['class' => 'form-control date-picker']) }}
    </div>

    <div class="form-group">
        {{ Form::label('location', trans('position.location')) }}
        {{ Form::text('reformed[location]', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('cost', trans('position.cost')) }}
        {{ Form::text('reformed[cost]', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="at-expertise">
    <h2>{{ trans('position.positions.at-expertise') }}</h2>

    <div class="form-group">
        {{ Form::label('date', trans('position.date')) }}
        {{ Form::text('expertise[date]', null, ['class' => 'form-control date-picker']) }}
    </div>

    <div class="form-group">
        {{ Form::label('person', trans('position.name')) }}
        {{ Form::text('expertise[person]', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('company', trans('position.company')) }}
        {{ Form::text('expertise[company]', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="at-customsSeizure">
    <h2>{{ trans('position.positions.at-customsSeizure') }}</h2>

    <div class="form-group">
        {{ Form::label('date', trans('position.date')) }}
        {{ Form::text('customsSeizures[date]', null, ['class' => 'form-control date-picker']) }}
    </div>

    <div class="form-group">
        {{ Form::label('cause', trans('position.cause')) }}
        {{ Form::text('customsSeizures[cause]', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="at-longStay">
    <h2>{{ trans('position.positions.at-longStay') }}</h2>

    <div class="form-group">
        {{ Form::label('cause', trans('position.cause')) }}
        {{ Form::text('longStay[cause]', null, ['class' => 'form-control']) }}
    </div>
</div>


