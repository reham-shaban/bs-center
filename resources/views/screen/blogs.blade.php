@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Blogs</h1>
    @if($blogs->isNotEmpty())
        <ul>
            @foreach($blogs as $blog)
                <li>
                    <strong>{{ $blog->title }}</strong>
                    <br>
                    {{ $blog->number_of_views }}
                    <br>
                    {{ $blog->description }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No blogs found.</p>
    @endif
</div>


@endsection
