<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BSC | About Us</title>
    <!-- Css File -->
    <link rel="icon" href="/assets/favIcon.svg" />
    <link rel="stylesheet" href="/style.css" />
    <link rel="stylesheet" href="./css/about.css" />
    <!-- Swiper js CDN -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
  </head>

  <body>
    <img class="whats-app" src="../assets/imgs/Group 8809.png" alt="" />

    @include('includes.nav')

    <div class="breadcrumb-bar">
      <div class="about-header container">
        <ul>
          <li><a href="/index.html">Home</a></li>
          <img src="../assets/icons/arrow.svg" />
          <li>about us</li>
        </ul>
      </div>
    </div>

    <div class="hero-container hero-about">
      <div class="container">
        <h1>About us</h1>
        <p>
          lorem ipsum dolor sit amet, consecteturlorem ipsum dolor sit amet,
          consectetur lorem ipsum dolor sit amet,
        </p>
      </div>
    </div>

    <section class="about-content">
      <div class="container">
        <div class="about-info">
          <div class="about-item">
            <h2>Incorporation</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod temposLorem ipsum dolor sitamet, consectetur adipiscing
              elit, sed do eiusmod eius consectetur adipiscing elit, sed do
              eiusmod temporLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="about-item">
            <h2>Objective</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod pos temLorem ipsum dolor sitamet, consectetur adipiscing
              elit, sed do eiusmod s dotemporLorem ipsum dolor sit amet,
              consectetur adipiscing elit, sed do elit, sed do eiusmod tempos
              Lorem amet,consectetur adipiscing elit, sed do s amet, Lorem ipsum
              dolor sit amet, consectetur adipiscing elit, sed do eiusmod amet,
            </p>
          </div>
          <div class="about-item">
            <h2>Our Services</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod temposLorem ipsum dolor sitamet, consectetur adipiscing
              elit, sed do eiusmod eius consectetur adipiscing elit, sed do
              eiusmod temporLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="about-item">
            <h2>Why Us ?</h2>
            <div class="about-why">
              <div>
                <div class="about-why-img">
                  <img src="/assets/imgs/about/icon1.svg" />
                </div>
                <p>
                  Certification<br />
                  of completion
                </p>
              </div>
              <div>
                <div class="about-why-img">
                  <img src="/assets/imgs/about/icon2.svg" />
                </div>
                <p>
                  Money Back<br />
                  Guarantee
                </p>
              </div>
              <div>
                <div class="about-why-img">
                  <img src="/assets/imgs/about/icon3.svg" />
                </div>
                <p>
                  32 Moduls<br />
                  Access on
                </p>
              </div>
              <div>
                <div class="about-why-img">
                  <img src="/assets/imgs/about/icon4.svg" />
                </div>
                <p>
                  Access on<br />
                  all devices
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="search-courses trusted">
      <div class="container">
        <h2>Trusted By</h2>
      </div>
      <div class="swiper mySwiper-about">
        <div class="swiper-wrapper wrap2">
          <div class="swiper-slide">
            <img src="/assets/imgs/logos/logo1.png" alt="" />
          </div>
          <div class="swiper-slide">
            <img src="/assets/imgs/logos/logo2.png" alt="" />
          </div>
          <div class="swiper-slide">
            <img src="/assets/imgs/logos/logo3.png" alt="" />
          </div>
          <div class="swiper-slide">
            <img src="/assets/imgs/logos/logo4.png" alt="" />
          </div>
          <div class="swiper-slide">
            <img src="/assets/imgs/logos/logo1.png" alt="" />
          </div>
        </div>
      </div>
    </section>

    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/main.js"></script>
    <script src="/navBar.js"></script>
    <script src="./js/swiper.js"></script>
  </body>
</html>
