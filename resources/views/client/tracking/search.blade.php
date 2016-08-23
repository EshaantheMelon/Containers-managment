@extends('layouts.client')
@section('content')

    <div class="container contact">

        <div class="col-lg-8">
            <h3>{{ trans('utils.tracking') }}</h3>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul >
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form">

                <p>
                Enter contract number here, should have format XXXU001<br />
                Containers will be selected automatically when possible
                </p>

                {{ Form::open(['url' => url('tracking')]) }}

                <div class="form-group">
                    <label for="pwd">Contract:</label>
                    <input type="text" class="form-control" name='position'>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

                {{ Form::close() }}
            </div>

        </div>

        <div class="col-lg-4">
            <div class="right">
                <p style="text-align: justify">
		MNM shipping Line is a ship owner, who can offer many categories
of containers to his partners, Dry, Reefer, Open Top, Flat.
                </p>
                <p>
                <p> zone franche Ksar Majaz - Anjra, bur. 5&6 plateforme n° 5 - 90000 Tanger</p>
                <p>Tel: (00212) 691 802 324</p>
                <p>Email:  manal.guemmah@mnmshippingline.com</p>
                </p>
            </div>
        </div>
    </div>
@stop
