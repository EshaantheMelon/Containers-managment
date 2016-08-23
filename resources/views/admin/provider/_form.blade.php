
<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('name', trans('provider.name')) }} <span class="required">*</span>
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('social_reason', trans('provider.social_reason')) }}
        {{ Form::text('social_reason', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('type_provider', trans('provider.type')) }} 
        {{ Form::select('type_provider', trans('provider.types'), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('address', trans('provider.address')) }}
        {{ Form::text('address', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('country', trans('provider.country')) }}
        {{ Form::select('country_code', $countries, null, array('class' => 'form-control country')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('city_id', trans('provider.city')) }}
        {{ Form::select('city_id', [], null, array('class' => 'form-control city')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('phone', trans('provider.phone')) }}
        {{ Form::text('phone', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('email', trans('provider.email')) }}
        {{ Form::text('email', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('fax', trans('provider.fax')) }}
        {{ Form::text('fax', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('web_site', trans('provider.web_site')) }}
        {{ Form::text('web_site', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('tax_id', trans('provider.tax')) }}
        {{ Form::text('tax_id', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <fieldset>
            <h2>{!! trans('provider.contact_information') !!}</h2>
            <div class="form-group">
                {{ Form::label('job', trans('provider.job')) }}
                {{ Form::text('contact[job]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('direct_phone', trans('provider.direct_phone')) }}
                {{ Form::text('contact[direct_phone]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('mobil1', trans('provider.mobil_1')) }}
                {{ Form::text('contact[mobil1]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('mobil2', trans('provider.mobil_2')) }}
                {{ Form::text('contact[mobil2]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', trans('provider.email')) }}
                {{ Form::email('contact[email]', null, array('class' => 'form-control')) }}
            </div>
        </fieldset>
    </div>

    <div class="col-lg-6">
        <fieldset>
            <h2>{!! trans('provider.payment_information') !!}</h2>
            <div class="form-group">
                {{ Form::label('bank_account_n', trans('provider.bank_account')) }}
                {{ Form::text('payment[bank_account_n]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('bank', trans('provider.bank')) }}
                {{ Form::text('payment[bank]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('swift', trans('provider.swift')) }}
                {{ Form::text('payment[swift]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('payment_conditions', trans('provider.payment_conditions')) }}
                {{ Form::text('payment[payment_conditions]', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('address_invoices', trans('provider.address_invoices')) }}
                {{ Form::text('payment[address_invoices]', null, array('class' => 'form-control')) }}
            </div>
        </fieldset>
    </div>
</div>
