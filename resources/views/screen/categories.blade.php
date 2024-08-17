@extends('layouts.app')

@section('content')

@include('includes.search', ['searchRoute' => route('categories.index')])
@include('includes.categories-list')

@endsection
