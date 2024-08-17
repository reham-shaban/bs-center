@extends('layouts.app')

@section('content')

@include('includes.search', ['searchRoute' => route('cities.index')])
@include('includes.venus-list')

@endsection
