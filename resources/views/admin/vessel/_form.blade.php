
<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('vessel', trans('vessel.vessel')) }} <span class="required">*</span>
        {{ Form::text('vessel', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('type', trans('vessel.type')) }} <span class="required">*</span>
        {{ Form::text('type', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('built_country', trans('vessel.built_country')) }}
        {{ Form::text('built_country', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('built_year', trans('vessel.built_year')) }}
        {{ Form::text('built_year', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('flag', trans('vessel.flag')) }}
        {{ Form::text('flag', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('class', trans('vessel.class')) }}
        {{ Form::text('class', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('owners', trans('vessel.owners')) }}
        {{ Form::text('owners', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('imo_number', trans('vessel.imo_number')) }}
        {{ Form::text('imo_number', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('length_overall', trans('vessel.length_overall')) }}
        {{ Form::text('length_overall', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('length_between', trans('vessel.length_between')) }}
        {{ Form::text('length_between', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('breadth_moulded', trans('vessel.breadth_moulded')) }}
        {{ Form::text('breadth_moulded', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('depth_moulded', trans('vessel.depth_moulded')) }}
        {{ Form::text('depth_moulded', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('summer_draught', trans('vessel.summer_draught')) }}
        {{ Form::text('summer_draught', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('dwt_summer_draft', trans('vessel.dwt_summer_draft')) }}
        {{ Form::text('dwt_summer_draft', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('light_weight', trans('vessel.light_weight')) }}
        {{ Form::text('light_weight', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('draft_displacement', trans('vessel.draft_displacement')) }}
        {{ Form::text('draft_displacement', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('grt', trans('vessel.grt')) }}
        {{ Form::text('grt', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('nrt', trans('vessel.nrt')) }}
        {{ Form::text('nrt', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('teu_capacity', trans('vessel.teu_capacity')) }}
        {{ Form::text('teu_capacity', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('feu_capacity', trans('vessel.feu_capacity')) }}
        {{ Form::text('feu_capacity', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('reefers_capacity', trans('vessel.reefers_capacity')) }}
        {{ Form::text('reefers_capacity', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('bunkers_capacity', trans('vessel.bunkers_capacity')) }}
        {{ Form::text('bunkers_capacity', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('type_engine', trans('vessel.type_engine')) }}
        {{ Form::text('type_engine', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('cargo_gear', trans('vessel.cargo_gear')) }}
        {{ Form::text('cargo_gear', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('speed', trans('vessel.speed')) }}
        {{ Form::text('speed', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('consumption', trans('vessel.consumption')) }}
        {{ Form::text('consumption', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('hfo', trans('vessel.hfo')) }}
        {{ Form::text('hfo', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('lsfo', trans('vessel.lsfo')) }}
        {{ Form::text('lsfo', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('mgo', trans('vessel.mgo')) }}
        {{ Form::text('mgo', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('mdo', trans('vessel.mdo')) }}
        {{ Form::text('mdo', null, array('class' => 'form-control')) }}
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-4">
        {{ Form::label('capacity_trailer', trans('vessel.capacity_trailer')) }}
        {{ Form::text('capacity_trailer', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('number_gear', trans('vessel.number_gear')) }}
        {{ Form::text('number_gear', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group col-lg-4">
        {{ Form::label('capacity_gear', trans('vessel.capacity_gear')) }}
        {{ Form::text('capacity_gear', null, array('class' => 'form-control')) }}
    </div>
</div>