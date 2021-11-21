
@extends('layouts.app')

@section('content')
    <div class="row justify-content-center my-5 w-50">
        <select id="corrals_select" class="form-control">
            <option value="">Select One</option>
            @foreach($corrals as $corral)
                <option value="{{ $corral->id }}"> Corral : {{ $corral->id }}</option>
            @endforeach
        </select>
    </div>
@endsection