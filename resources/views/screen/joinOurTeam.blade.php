@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }} | Join Our Team
@endsection

@section('content')
<div class="breadcrumb-bar">
    <div class="about-header container">
      <ul>
        <li><a href="../pages/Categories.html">Categories</a></li>
        <img src="../assets/icons/arrow.svg" />
        <li>Join Our Team</li>
      </ul>
    </div>
  </div>

  <div class="hero-container hero-forms">
    <div class="container">
      <h1>Join Our Team</h1>
      <p>Join Our Team</p>
    </div>
  </div>

  <section class="form-container">
    <form>
      <div>
        <div class="form-title">
          <h2>Contact Information</h2>
        </div>
        <div class="form-inputs">
          <div class="input-container">
            <label for="name">Full Name</label>
            <input
              type="text"
              placeholder="Full Name"
              id="name"
              name="name"
            />
          </div>
          <div class="input-container">
            <label for="number">Phone number</label>
            <div class="select-box" id="select-box-1">
              <div class="selected-option">
                <div>
                  <span class="callcode"></span>
                </div>
                <input
                  type="tel"
                  name="tel"
                  id="tel"
                  class="tel"
                  placeholder="Phone Number"
                />
              </div>
              <div class="options" id="options-1">
                <input
                  type="text"
                  class="search-box"
                  placeholder="Search Country Name"
                />
                <ol></ol>
              </div>
            </div>
          </div>
          <div class="input-container">
            <label for="email">Email</label>
            <input
              type="email"
              placeholder="hello@creative-tim.com"
              id="email"
              name="email"
            />
          </div>
          <div class="input-container">
            <label for="cv">Upload Your CV (PDF/Word)</label>
            <input
              type="file"
              placeholder="Choose File"
              class="input-file"
              id="cv"
              name="cv"
            />
            <div class="upload-file">
              <img src="/assets/icons/arrow-down-white.svg" alt="" />
            </div>
          </div>
          <div class="input-container" style="position: relative">
            <label for="speciality">Speciality</label>
            <input
              type="text"
              placeholder="Speciality"
              id="speciality"
              name="speciality"
              readonly
            />
            <div class="drop-down">
              <img src="/assets/icons/arrow-down.svg" alt="" />
            </div>
            <ul class="drop-list">
              <li>speciality 1</li>
              <li>speciality 2</li>
              <li>speciality 3</li>
              <li>speciality 4</li>
              <li>speciality 5</li>
              <li>speciality 6</li>
              <li>speciality 7</li>
            </ul>
          </div>
          <div class="input-container">
            <label for="country">Country</label>
            <input
              type="text"
              placeholder="Country"
              id="country"
              name="country"
              class="country"
            />
          </div>
        </div>
      </div>
      <div class="form-actions">
        <button>Send</button>
        <div class="g-recaptcha" data-sitekey="your_site_key"></div>
      </div>
    </form>
  </section>
@endsection

@section('scripts')
<!--recaptcha library  -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function onSubmit(token) {
    document.getElementById("demo-form").submit();
  }
</script>
<script
  src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
  async
  defer
></script>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<script>
  const dropItem = document.querySelectorAll(".drop-down");
  const lists = document.querySelectorAll(".drop-list");
  const listItems = document.querySelectorAll(".drop-list li");
  dropItem.forEach((el, index) => {
    el.addEventListener("click", () => {
      lists[index].classList.toggle("show-list");
    });
  });
  listItems.forEach((li, index) => {
    li.addEventListener("click", () => {
      document.getElementById("speciality").value = li.innerHTML;
      lists.forEach((el, index) => {
        lists[index].classList.toggle("show-list");
      });
    });
  });
</script>
@endsection
