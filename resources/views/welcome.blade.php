@extends('layouts.app')

@section('main')
    <h1> hello {{authUser()->id}}</h1> 
@endsection