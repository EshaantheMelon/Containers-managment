
<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('name', 'Username') }} <span class="required">*</span>
        {{ Form::text('user[name]', null, array('class' => 'form-control', 'required')) }}
    </div>
    <div class="form-group col-lg-6">
        {{ Form::label('name', 'Password') }} <span class="required">*</span>
        {{ Form::text('user[password]', '', array('class' => 'form-control', 'required')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('name', trans('client.name')) }} <span class="required">*</span>
        {{ Form::text('name', null, array('class' => 'form-control', 'required')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('social_reason', trans('client.social_reason')) }}
        {{ Form::text('social_reason', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('country', trans('client.country')) }}
        {{ Form::select('country_code', $countries, null, ['class' => 'form-control country']) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('city_id', trans('client.city')) }}
        {{ Form::select('city_id', [], null, array('class' => 'form-control city')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('address', trans('client.address')) }}
        {{ Form::text('address', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('phone', trans('client.phone')) }}
        {{ Form::text('phone', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('email', trans('client.email')) }}
        {{ Form::text('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('fax', trans('client.fax')) }}
        {{ Form::text('fax', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('type_client', trans('client.type')) }}
        {{ Form::select('type_client', trans('client.types'), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('web_site', trans('client.web_site')) }}
        {{ Form::text('web_site', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('tax_id', trans('client.tax')) }}
        {{ Form::text('tax_id', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <fieldset>
            <h2>{!! trans('client.contact_information') !!}</h2>
            <div class="form-group">
                {{ Form::label('job', trans('client.job')) }}
                {{ Form::text('contact[job]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('direct_phone', trans('client.direct_phone')) }}
                {{ Form::text('contact[direct_phone]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('mobil1', trans('client.mobil_1')) }}
                {{ Form::text('contact[mobil1]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('mobil2', trans('client.mobil_2')) }}
                {{ Form::text('contact[mobil2]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', trans('client.email')) }}
                {{ Form::email('contact[email]', null, array('class' => 'form-control')) }}
            </div>
        </fieldset>
    </div>

    <div class="col-lg-6">
        <fieldset>
            <h2>{!! trans('client.payment_information') !!}</h2>
            <div class="form-group">
                {{ Form::label('bank_account_n', trans('client.bank_account')) }}
                {{ Form::text('payment[bank_account_n]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('bank', trans('client.bank')) }}
                {{ Form::text('payment[bank]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('swift', trans('client.swift')) }}
                {{ Form::text('payment[swift]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('payment_conditions', trans('client.payment_conditions')) }}
                {{ Form::text('payment[payment_conditions]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('address_invoices', trans('client.address_invoices')) }}
                {{ Form::text('payment[address_invoices]', null, array('class' => 'form-control')) }}
            </div>
        </fieldset>
    </div>
</div>
