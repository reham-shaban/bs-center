@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Us</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}">
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" class="form-control" value="{{ old('country') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
        </div>

        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" name="company" class="form-control" value="{{ old('company') }}">
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control">{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
