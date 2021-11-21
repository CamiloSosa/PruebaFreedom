@extends('layouts.app')

@section('content')
    @include('corrals.form', ['method' => 'POST', 'action' => route('admin.corrals.update')])
@endsection