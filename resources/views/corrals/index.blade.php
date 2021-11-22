
@extends('layouts.app')

@section('content')
    <div class="w-100">
        <div class="row justify-content-center my-5 w-50">
            <select id="corrals_select" class="form-control ms-3 col-md-6" data-url="get_animals/">
                <option value="none">Select One</option>
                @foreach($corrals as $corral)
                    <option value="{{ $corral->id }}//{{ $corral->avg }}"> Corral : {{ $corral->id }}</option>
                @endforeach
            </select>

            <div class="col-md-6 me-0">
                <a href="{{  }}" class="btn btn-info">Print PDF</a>
            </div>
        </div>
        <div class="row mt-5">
            <p >Age Average : <span id="avg"></span></p>
            <div class=" w-100 table-responsive" id="corral_{{ $corral->id }}">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Age</th>
                            <th>Dangerous</th>
                            <th>Corral</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection