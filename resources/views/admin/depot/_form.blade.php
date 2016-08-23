
<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('name', trans('depot.name')) }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('social_reason', trans('depot.social_reason')) }}
        {{ Form::text('social_reason', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('type', trans('depot.type_depot')) }}
        {{ Form::select('type', array('IN PORT' => 'IN PORT', 'OUT PORT' => 'OUT PORT', 'OTHERS' => 'OTHERS'), null, array('class' => 'form-control')) }}
    </div>
	
	<div class="form-group col-lg-6">
        {{ Form::label('address', trans('depot.address')) }}
        {{ Form::text('address', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('country', trans('depot.country')) }}
        {{ Form::select('country_code', $countries, null, array('class' => 'form-control country')) }}
    </div>
	
    <div class="form-group col-lg-6">
        {{ Form::label('city_id', trans('depot.city')) }}
        {{ Form::select('city_id', [], null, array('class' => 'form-control city')) }}
    </div>
</div>

<div class="row">
    <div class="form-group  col-lg-6">
        {{ Form::label('phone', trans('depot.phone')) }}
        {{ Form::text('phone', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-lg-6">
        {{ Form::label('tax_id', trans('depot.tax')) }}
        {{ Form::text('tax_id', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <h2>{!! trans('depot.contact_information') !!}</h2>
        <div class="form-group">
            {{ Form::label('job', trans('depot.job')) }}
            {{ Form::text('contact[job]', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('direct_phone', trans('depot.direct_phone')) }}
            {{ Form::text('contact[direct_phone]', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('mobil1', trans('depot.mobil_1')) }}
            {{ Form::text('contact[mobil1]', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('mobil2', trans('depot.mobil_2')) }}
            {{ Form::text('contact[mobil2]', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', trans('depot.email')) }}
            {{ Form::email('contact[email]', null, array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="col-lg-6">
        <h2>{!! trans('depot.payment_information') !!}</h2>
        <div class="form-group">
            {{ Form::label('bank_account_n', trans('depot.bank_account')) }}
            {{ Form::text('payment[bank_account_n]', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('bank', trans('depot.bank')) }}
            {{ Form::text('payment[bank]', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('swift', trans('depot.swift')) }}
            {{ Form::text('payment[swift]', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('payment_conditions', trans('depot.payment_conditions')) }}
            {{ Form::text('payment[payment_conditions]', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('address_invoices', trans('depot.address_invoices')) }}
            {{ Form::text('payment[address_invoices]', null, array('class' => 'form-control')) }}
        </div>
    </div>
</div>