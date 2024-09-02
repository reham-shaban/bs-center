@extends('layouts.app')

@section('title')
{{ config('app.name', 'BSC') }} | Request In House
@endsection

@section('content')

    <div class="breadcrumb-bar">
        <div class="about-header container">
        <ul>
            <li><a href="./categories.html">Categories</a></li>
            <img src="{{ asset('assets/icons/arrow.svg') }}" />
            <li>courses</li>
            <img src="{{ asset('assets/icons/arrow.svg') }}" />
            <li>Healthcare Management</li>
            <img src="{{ asset('assets/icons/arrow.svg') }}" />
            <li>Risk Management for Medical Devices</li>
            <img src="{{ asset('assets/icons/arrow.svg') }}" />
            <li>Request In House</li>
        </ul>
        </div>
    </div>

  <div class="hero-container hero-forms">
    <div class="container">
      <h1>Request In House</h1>
      <p>Risk Management for Medical Devices</p>
    </div>
  </div>

  <section class="form-container">
    <form>
      <div>
        <div class="form-title">
          <h2>Course Details</h2>
        </div>
        <div class="form-inputs">
          <div class="input-container" style="position: relative">
            <label for="course">Course</label>
            <input
              type="text"
              placeholder="Risk Management for Medical Devices"
              id="course"
              name="course"
              readonly
            />
          </div>
          <div class="input-container">
            <label for="location">Location</label>
            <input
              type="text"
              placeholder="Dubai"
              id="location"
              name="location"
            />
          </div>
          <div class="input-container">
            <label for="days">Number of days</label>
            <input type="number" placeholder="5" id="days" />
          </div>
          <div class="input-container">
            <label for="pract">Number of participants</label>
            <input type="number" placeholder="3" id="pract" name="pract" />
          </div>
        </div>
        <div class="textarea">
          <label for="message">Do you have any other requirements ?</label>
          <textarea
            placeholder="Describe your problem in at least 250 characters"
            id="message"
            name="message"
          ></textarea>
        </div>
      </div>

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
            <label for="full-name">Email</label>
            <input type="text" placeholder="hello@creative-tim.com" />
          </div>
          <div class="input-container">
            <label for="full-name">Subject</label>
            <input type="text" placeholder="123456789" />
          </div>
          <div class="input-container">
            <label for="full-name">Company </label>
            <input type="text" placeholder="Company" />
          </div>
          <div class="input-container">
            <label for="full-name">City</label>
            <input type="text" placeholder="Dubai" />
          </div>
        </div>
        <div class="textarea">
          <label for="full-name">How can we help you?</label>
          <textarea
            placeholder="Describe your problem in at least 250 characters"
          ></textarea>
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
          document.getElementById("course").value = li.innerHTML;
          lists.forEach((el, index) => {
            lists[index].classList.toggle("show-list");
          });
        });
      });
    </script>
@endsection
