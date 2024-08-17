<div class="container">
    <h1>Categories</h1>
    @if($categories->isNotEmpty())
        <ul>
            @foreach($categories as $category)
                <li>
                    <strong>{{ $category->title }}</strong>
                    <br>
                    {{ $category->description }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No categories found.</p>
    @endif
</div>
