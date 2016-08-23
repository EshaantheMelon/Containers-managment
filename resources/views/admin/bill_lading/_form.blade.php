<div class="row">
<div class="form-group col-lg-6">
    {{ Form::label('number', trans('bill_lading.number')) }}
    {{ Form::text('number', null, array('class' => 'form-control')) }}
</div>

<div class="form-group col-lg-6">
    {{ Form::label('notify', trans('bill_lading.notify')) }}
    {{ Form::text('notify', null, array('class' => 'form-control')) }}
</div>
</div>
<div class="row">
<div class="form-group col-lg-6">
    {{ Form::label('place_of_loading', trans('bill_lading.place_of_loading')) }}
    {{ Form::text('place_of_loading', null, array('class' => 'form-control')) }}
</div>

<div class="form-group col-lg-6">
    {{ Form::label('port_of_loading_pol', trans('bill_lading.port_of_loading_pol')) }}
    {{ Form::text('port_of_loading_pol', null, array('class' => 'form-control')) }}
</div>
</div>
<div class="row">
<div class="form-group col-lg-6">
    {{ Form::label('place_of_delivery', trans('bill_lading.place_of_delivery')) }}
    {{ Form::text('place_of_delivery', null, array('class' => 'form-control')) }}
</div>

<div class="form-group col-lg-6">
    {{ Form::label('place_of_delivery_pod', trans('bill_lading.place_of_delivery_pod')) }}
    {{ Form::text('place_of_delivery_pod', null, array('class' => 'form-control')) }}
</div>
</div>
<div class="row">
<div class="form-group col-lg-6">
    {{ Form::label('number_original_bls', trans('bill_lading.number_original_bls')) }}
    {{ Form::text('number_original_bls', null, array('class' => 'form-control')) }}
</div>

<div class="form-group col-lg-6">
    {{ Form::label('number_packages', trans('bill_lading.number_packages')) }}
    {{ Form::text('number_packages', null, array('class' => 'form-control')) }}
</div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('payment_freight', trans('bill_lading.payment_freight')) }}
        {{ Form::select('payment_freight', ['Prepaid'=>'Prepaid', 'Collect'=>'Collect'], null, array('class' => 'form-control')) }}
    </div>
</div>



