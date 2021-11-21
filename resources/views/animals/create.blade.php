@extends('layouts.app')

@section('content')
    @include('animals.form', ['method' => 'POST', 'action' => route('admin.animals.store')])
@endsection