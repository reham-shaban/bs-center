<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSC | Venus</title>
    <link rel="icon" href="/assets/favIcon.svg" />
    <!-- Css File -->
    <link rel="stylesheet" href="./css/venus.css" />
    <link rel="stylesheet" href="/style.css" />
  </head>

  <body>

    @include('includes.nav')

    <div class="breadcrumb-bar">
      <div class="about-header container">
        <ul>
          <li><a href="./venus.html">Venus</a></li>
          <img src="../assets/icons/arrow.svg" />
          <li>lorem ipsum dolor sit amet, consectetur</li>
        </ul>
      </div>
    </div>

    {{-- Search Section --}}
    <div class="hero-container hero-venus">
      <div class="container">
        <div>
          <h1>Explore Our Venue</h1>
          <p>lorem ipsum dolor sit amet, consectetur</p>
        </div>
        @include('includes.search-form', ['searchRoute' => route('cities.index')])
      </div>
    </div>

    {{-- Search Results --}}
    @include('includes.search-results', ['timings' => $timings])

    {{-- Venus List --}}
    <section>
        <div class="container">
        <div class="venus-cards-container">
            @foreach($cities as $city)
            <a class="venus-card" href="">
                <img src="{{ $city->getFirstMediaUrl('images') }}" alt="{{ $city->image_alt }}" class="card-img" />
                <div>
                <span href="">
                    <img src="/assets/icons/arrow.svg" alt="" />
                </span>
                <h3>{{ $city->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>
        </div>
    </section>

    @include('includes.footer')

    <script src="/main.js"></script>
    <script src="/navBar.js"></script>

  </body>
</html>
