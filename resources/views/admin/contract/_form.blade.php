
<div class="form-group">
    {{ Form::label('reference', trans('contract.reference')) }}
    {{ Form::text('reference', null, ['class' => 'form-control', 'disabled' => 'true']) }}
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('client_id', trans('contract.client')) }}  <span class="required">*</span> <a href="{{ url('/admin/clients/create') }}" title='Add '><span class="glyphicon glyphicon-plus"></span></a>
        {{ Form::select('client_id', $clients, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('type', trans('contract.type')) }}  <span class="required">*</span>
        {{ Form::select('type', ['OWNED'=>'OWNED', 'RENT'=>'RENT', 'LEASE'=>'LEASE', 'SOC'=>'SOC'], null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('date_on', trans('contract.date_on')) }}  <span class="required">*</span>
        {{ Form::text('date_on', isset($contract) ? $contract->date_on->format('d-m-Y') : null, array('class' => 'form-control date-picker')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('date_off', trans('contract.date_off')) }}  <span class="required">*</span>
        {{ Form::text('date_off', isset($contract) ? $contract->date_off->format('d-m-Y') : null, array('class' => 'form-control date-picker')) }}
    </div>
</div>
