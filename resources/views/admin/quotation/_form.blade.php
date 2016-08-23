<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('number', trans('quotation.number')) }} 
        {{ Form::text('number', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('position', trans('quotation.position')) }} <a href="{{ url('/admin/positions/create') }}" title='Add '><span class="glyphicon glyphicon-plus"></span></a>
        {{ Form::select('position_id', $positions, null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('validity', trans('quotation.validity')) }} 
        {{ Form::select('validity', ['start' => 'Start', 'end'=>'End'], null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('commodity', trans('quotation.commodity')) }} 
        {{ Form::text('commodity', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('imdg', trans('quotation.imdg')) }} 
        {{ Form::text('imdg', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('onu', trans('quotation.onu')) }} 
        {{ Form::text('onu', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('type_container', trans('quotation.type_container')) }} 
        {{ Form::text('type_container', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('date_relance', trans('quotation.date_relance')) }} 
        {{ Form::text('date_relance', null, array('class' => 'form-control date-picker')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('sea_freight', trans('quotation.sea_freight')) }} 
        {{ Form::text('sea_freight', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('baf', trans('quotation.baf')) }} 
        {{ Form::text('baf', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('is', trans('quotation.is')) }} 
        {{ Form::text('is', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('caf', trans('quotation.caf')) }} 
        {{ Form::text('caf', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('ses', trans('quotation.ses')) }} 
        {{ Form::text('ses', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('imo', trans('quotation.imo')) }} 
        {{ Form::text('imo', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('condition', trans('quotation.condition')) }} 
        {{ Form::text('condition', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-6">
        {{ Form::label('confirmed', trans('quotation.confirmed')) }} 
        <p class="form-control">
            {{ Form::radio('confirmed', 0) }} False -
            {{ Form::radio('confirmed', 1) }} True
        </p>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        {{ Form::label('n_booking', trans('quotation.n_booking')) }} 
        {{ Form::text('n_booking', null, array('class' => 'form-control')) }}
    </div>

</div>