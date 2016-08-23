
<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('port', trans('port.port')) }}
        {{ Form::text('port', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('country', trans('port.country')) }}
        {{ Form::select('country_code', $country_code, !isset($port) ? null :  ['country_code' => $port->country_code], array('class' => 'form-control country')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('city_id', trans('port.city')) }}
        {{ Form::select('city_id', [], null, array('class' => 'form-control city')) }}
    </div>
</div>