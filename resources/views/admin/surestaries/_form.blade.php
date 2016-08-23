
<div class="form-group">
    {{ Form::label('free_time', trans('surestaries.free_time')) }}
    {{ Form::text('free_time', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('tariff', trans('surestaries.tariff')) }}
    {{ Form::text('tariff', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('position', trans('surestaries.position')) }}
    {{ Form::text('position_id', null, array('class' => 'form-control', 'disabled')) }}
</div>

<div class="form-group">
    {{ Form::label('port', trans('surestaries.port')) }}
    {{ Form::text('port_id', isset($surestaries->port) ? $surestaries->port->port : '', array('class' => 'form-control', 'disabled')) }}
</div>

