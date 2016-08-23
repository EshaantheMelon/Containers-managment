@extends('layouts.client')

@section('content')

    <div class="container contact">


<!-- if there are creation errors, they will show here -->
        <div class="flash-message">

            @foreach (['danger', 'warning', 'success', 'info'] as $msg)

                @if(Session::has('alert-' . $msg))
                    <br />
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </p>
                @endif
            @endforeach
        </div> <!-- end .flash-message -->


        <div class="col-lg-8">
            <h3>Contact</h3>



            <div class="form">
                {{ Form::open(['url' => url('contact')]) }}

                <div class="form-group">
                    <label for="pwd">{{ trans('profile.name') }}:</label>
                    <input type="text" class="form-control" name='name'>
                </div>

                <div class="form-group">
                    <label for="email">{{ trans('profile.email') }}:</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label for="pwd">{{ trans('profile.message') }}:</label>
                    <textarea class="form-control" name="message"> </textarea>
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
                <p> zone franche Ksar Majaz - Anjra, bur. 5&6 plateforme n° 5 - 90000 Tanger </p>
                <p>Tel: (00212) 691 802 324</p>
                <p>Email:  manal.guemmah@mnmshippingline.com</p>
                </p>
            </div>
        </div>
    </div>

@stop
