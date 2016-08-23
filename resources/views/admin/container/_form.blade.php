<div class="form-group">
    {{ Form::label('prefix', trans('container.prefix')) }}
    {{ Form::text('prefix', null, ['class' => 'form-control', 'disabled' => 'true']) }}
</div>


<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('provider_id', trans('container.provider')) }} <a href="{{ url('/admin/providers/create') }}" title='Add '><span class="glyphicon glyphicon-plus"></span></a>
        {{ Form::select('provider_id', $providers, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('contract_id', trans('container.contract')) }} <a href="{{ url('/admin/contracts/create') }}" title='Add '><span class="glyphicon glyphicon-plus"></span></a>
        {{ Form::select('contract_id', $contracts, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('type', trans('container.type')) }}
        {{ Form::select('type', $types, null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="row">
    <div class="form-group  col-lg-4">
        {{ Form::label('day_cost', trans('container.day_cost')) }}
        {{ Form::text('day_cost', null, array('placeholder'=>'USD', 'class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('capacity', trans('container.capacity')) }}
        {{ Form::text('capacity', null, array('placeholder'=>'Kg', 'class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('tare', trans('container.tare')) }}
        {{ Form::text('tare', null, array('placeholder'=>'Kg', 'class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('value', trans('container.value')) }}
        {{ Form::text('value', null, array('placeholder'=>'USD', 'class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('last_survey', trans('container.last_survey')) }}
        {{ Form::text('last_survey', isset($container) ? $container->last_survey->format('d-m-Y') : null, ['class' => 'form-control date-picker']) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('date_pick_up', trans('container.date_pick_up')) }}
        {{ Form::text('date_pick_up', isset($container) ? $container->date_pick_up->format('d-m-Y') : null, ['class' => 'form-control date-picker']) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('full', trans('container.full')) }}
        <p class="form-control">
            {{ Form::radio('full', 0) }} E -
            {{ Form::radio('full', 1) }} F
        </p>

    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('cout_pick_up', trans('container.cout_pick_up')) }}
        {{ Form::text('cout_pick_up', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group  col-lg-4">
        {{ Form::label('lieu_pick_up', trans('container.lieu_pick_up')) }}
        {{ Form::text('lieu_pick_up', null, array('class' => 'form-control')) }}
    </div>
</div>
