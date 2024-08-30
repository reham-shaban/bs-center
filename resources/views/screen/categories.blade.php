<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSC | Categories</title>
    <link rel="icon" href="/assets/favIcon.svg" />
    <!-- Css File -->
    <link rel="stylesheet" href="/style.css" />
    <link rel="stylesheet" href="./css/categories.css" />
  </head>

  <body>

    @include('includes.nav')

    <div class="breadcrumb-bar">
      <div class="about-header container">
        <ul>
          <li><a class="main-li" href="/index.html">Categories</a></li>
          <img src="/assets/icons/arrow.svg" />
        </ul>
      </div>
    </div>

    {{-- Search --}}
    <div class="hero-container hero-categories">
      <div class="container">
        <div>
          <h1>All Categories</h1>
          <p>Lorem ipsum dolor sit amet, consectetur</p>
        </div>
        @include('includes.search-form', ['searchRoute' => route('categories.index')])
      </div>
    </div>

    {{-- Search Results --}}
    @include('includes.search-results', ['timings' => $timings])

    {{-- Categores list --}}
    <section class="categories-section">
        <div class="container">
            <div class="categories-cards" id="category-data" data-categories='@json($categories)'></div>
        </div>
    </section>

    @include('includes.footer')

    <script src="/main.js"></script>
    <script src="/navBar.js"></script>
    <script src="./js/categories.js"></script>
  </body>
</html>
