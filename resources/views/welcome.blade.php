@extends('layouts.app')

@section('main')
    <h1> hello {{authUser()->name}}</h1> 
@endsection