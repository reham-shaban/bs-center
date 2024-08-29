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

    <div class="hero-container hero-venus">
      <div class="container">
        <div>
          <h1>Explore Our Venue</h1>
          <p>lorem ipsum dolor sit amet, consectetur</p>
        </div>
        <form class="search-courses-form" style="margin-top: 32px">
          <div class="row1">
            <div>
              <input type="text" placeholder="Search for course" />
              <img src="/assets/icons/search.svg" alt="" />
            </div>
            <input type="text" placeholder="Categories" />
          </div>
          <div class="row2">
            <div class="custom-select-wrapper">
              <div class="custom-select">
                <div class="custom-select-trigger">
                  <span>Venus</span>
                  <img src="/assets/icons/arrow-down-2.svg" alt="Arrow Down" />
                </div>
                <div class="custom-options">
                  <span class="custom-option" data-value="venue1">Venue 1</span>
                  <span class="custom-option" data-value="venue2">Venue 2</span>
                  <span class="custom-option" data-value="venue3">Venue 3</span>
                </div>
              </div>
            </div>
            <div class="custom-select-wrapper">
              <div class="custom-select">
                <div class="custom-select-trigger">
                  <span>Month</span>
                  <img
                    src="../assets/icons/arrow-down-2.svg"
                    alt="Arrow Down"
                  />
                </div>
                <div class="custom-options">
                  <span class="custom-option" data-value="january"
                    >January</span
                  >
                  <span class="custom-option" data-value="february"
                    >February</span
                  >
                  <span class="custom-option" data-value="march">March</span>
                  <span class="custom-option" data-value="april">April</span>
                  <span class="custom-option" data-value="may">May</span>
                  <span class="custom-option" data-value="june">June</span>
                  <span class="custom-option" data-value="july">July</span>
                  <span class="custom-option" data-value="august">August</span>
                  <span class="custom-option" data-value="september"
                    >September</span
                  >
                  <span class="custom-option" data-value="october"
                    >October</span
                  >
                  <span class="custom-option" data-value="november"
                    >November</span
                  >
                  <span class="custom-option" data-value="december"
                    >December</span
                  >
                </div>
              </div>
            </div>
            <div class="custom-select-wrapper">
              <div class="custom-select">
                <div class="custom-select-trigger">
                  <span> Duration</span>
                  <img src="/assets/icons/arrow-down-2.svg" alt="Arrow Down" />
                </div>
                <div class="custom-options">
                  <span class="custom-option" data-value="1week">1 Week</span>
                  <span class="custom-option" data-value="1month">1 Month</span>
                  <span class="custom-option" data-value="3months"
                    >3 Months</span
                  >
                  <span class="custom-option" data-value="6months"
                    >6 Months</span
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="row3">
            <button>
              Search
              <img src="/assets/icons/arrow-right.svg" alt="" />
            </button>
            <button type="reset">
              Rest
              <img src="/assets/icons/reload.svg" alt="" />
            </button>
          </div>
        </form>
      </div>
    </div>

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
