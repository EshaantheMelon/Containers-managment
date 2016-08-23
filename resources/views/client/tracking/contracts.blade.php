@extends('layouts.client')

@section('content')

    <div class="container contact">

        <h3>{{ trans('utils.my_contracts') }}</h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form">

        <table class="table table-striped bootstrap-datatable datatable responsive display">
            <thead>
            <tr>
                <th>Reference</th>
                <th>Type</th>
                <th>Date on</th>
                <th>Date off</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contracts as $contract)
                <tr>
                    <td>{{ $contract->reference }}</td>
                    <td>{{ $contract->type }}</td>
                    <td>{{ $contract->date_on->format('d/m/Y') }}</td>
                    <td>{{ $contract->date_off->format('d/m/Y') }}</td>
                    <td>
                        {{ Form::open(['url' => url('tracking')]) }}
                        <input type="hidden" class="form-control" name='position' value="{{ $contract->reference }}">

                        <button type="submit" class="btn btn-primary">{{ trans('utils.tracking') }}</button>

                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

    </div>
@stop