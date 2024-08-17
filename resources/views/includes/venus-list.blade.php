<div class="container">
    <h1>Venus</h1>
    @if($cities->isNotEmpty())
        <ul>
            @foreach($cities as $city)
                <li>
                    <strong>{{ $city->title }}</strong>
                </li>
            @endforeach
        </ul>
    @else
        <p>No Venus found.</p>
    @endif
</div>
