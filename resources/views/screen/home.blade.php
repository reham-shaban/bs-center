@extends('layouts.app')

@section('content')

@include('includes.search', ['searchRoute' => route('home.index')])
@include('includes.isbanner')
@include('includes.upcoming')

@endsection
