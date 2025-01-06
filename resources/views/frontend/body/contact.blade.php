@extends('frontend.master_dashboard')
@section('frontend')

@section('title')
   Contact Us::Ekobee 
@endsection

<div class="mb-4 pb-4"></div>
<section class="contact-us container">
  <div class="mw-930">
    <h2 class="page-title" style="margin-top: 100px;">CONTACT US</h2>
  </div>
</section>

<section class="google-map mb-5">
  <h2 class="d-none">Contact US</h2>
</section>

<section class="contact-us container">
  <div class="mw-930">
    <div class="contact-us__form">
      <form name="contact-us-form" class="needs-validation" novalidate method="POST" action="{{ route('store.contact') }}">
        @csrf
        <h3 class="mb-5">Get In Touch</h3>

        <!-- Name Field -->
        <div class="form-floating my-4">
          <input type="text" name="name" class="form-control" id="contact_us_name" placeholder="Name *" required>
          <label for="contact_us_name">Name *</label>
        </div>

        <!-- Email Field -->
        <div class="form-floating my-4">
          <input type="email" name="email" class="form-control" id="contact_us_email" placeholder="Email address *" required>
          <label for="contact_us_email">Email address *</label>
        </div>

        <!-- Message Field -->
        <div class="my-4">
          <textarea name="message" class="form-control form-control_gray" placeholder="Your Message" cols="30" rows="8" required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="my-4">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>

      </form>
    </div>
  </div>
</section>
@endsection
