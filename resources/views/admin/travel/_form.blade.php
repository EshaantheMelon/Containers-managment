
<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('number', trans('travel.number')) }} <span class="required">*</span>
        {{ Form::text('number', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('vessel', trans('travel.vessel')) }} <a href="{{ url('/admin/vessels/create') }}" title='Add '><span class="glyphicon glyphicon-plus"></span></a>
        {{ Form::select('vessel_id', $vessels, null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('date_enter', trans('travel.date_enter')) }}  <span class="required">*</span>
        {{ Form::text('date_enter', isset($travel) ? $travel->date_enter->format('d-m-Y') : null, array('class' => 'form-control date-picker')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('port_id', trans('travel.port_id')) }}
        {{ Form::select('port_id', $ports, null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('date_out', trans('travel.date_out')) }} <span class="required">*</span>
        {{ Form::text('date_out', isset($travel) ? $travel->date_out->format('d-m-Y') : null, array('class' => 'form-control date-picker')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('bunkers', trans('travel.bunkers')) }}
        {{ Form::text('bunkers', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('start_travel_date', trans('travel.start_travel_date')) }}  <span class="required">*</span>
        {{ Form::text('start_travel_date', isset($travel) ? $travel->start_travel_date->format('d-m-Y') : null, array('class' => 'form-control date-picker')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('start_travel_quantity', trans('travel.start_travel_quantity')) }}
        {{ Form::text('start_travel_quantity', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('end_travel_date', trans('travel.end_travel_date')) }}  <span class="required">*</span>
        {{ Form::text('end_travel_date', isset($travel) ? $travel->end_travel_date->format('d-m-Y') : null, array('class' => 'form-control date-picker')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('end_travel_quantity', trans('travel.end_travel_quantity')) }}
        {{ Form::text('end_travel_quantity', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('bunkers_delivery_quantity', trans('travel.bunkers_delivery_quantity')) }}
        {{ Form::text('bunkers_delivery_quantity', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('bunkers_delivery_date', trans('travel.bunkers_delivery_date')) }}  <span class="required">*</span>
        {{ Form::text('bunkers_delivery_date', isset($travel) ? $travel->bunkers_delivery_date->format('d-m-Y') : null, array('class' => 'form-control date-picker')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('date_hire_start', trans('travel.date_hire_start')) }}  <span class="required">*</span>
        {{ Form::text('date_hire_start', isset($travel) ? $travel->date_hire_start->format('d-m-Y') : null, array('class' => 'form-control date-picker')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('date_hire_end', trans('travel.date_hire_end')) }}  <span class="required">*</span>
        {{ Form::text('date_hire_end', isset($travel) ? $travel->date_hire_end->format('d-m-Y') : null, array('class' => 'form-control date-picker')) }}
    </div>
</div>