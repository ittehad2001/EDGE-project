@extends('frontend.master_dashboard')
@section('frontend')

@section('title')
 About Us::Ekobee 
@endsection

<br>

<div class="mb-4 pb-4"></div>
    <section class="about-us container">
      <div class="mw-930">
        <h2 class="page-title" style="margin-top: 100px;">ABOUT EKOBEE</h2>
      </div>
      <div class="about-us__content pb-5 mb-5">
        <p class="mb-5">
          <img loading="lazy" class="w-100 h-auto d-block" src="{{asset('frontend/assets/images/about/about-1.jpg')}}" width="1410" height="550" alt="">
        </p>
        <div class="mw-930">
          <h3 class="mb-4">OUR STORY</h3>
          <p class="fs-6 fw-medium mb-4">The idea for Ekobbe was born out of a simple yet powerful belief: fashion should be a reflection of who you are. In a world where mass-produced clothing dominates, we saw an opportunity to offer something different—custom-made T-shirts that allow individuals to express their unique personalities and creativity. What began as a small venture fueled by passion and innovation has grown into a brand that celebrates personal expression through every stitch and design. Today, Ekobbe stands as a testament to the power of individuality, offering a canvas for our customers to showcase their stories.</p>
          <p class="mb-4">Founded with a passion for creativity and self-expression, Ekobbe began as a small idea to bring personalized fashion to Bangladesh. We wanted to offer people a way to express their individuality through custom-made T-shirts that represent their unique styles, memories, and inspirations. What started as a humble initiative has grown into a thriving community, where we continue to celebrate diversity, art, and personal expression.</p>
          <div class="row mb-3">
            <div class="col-md-6">
              <h5 class="mb-3">Our Mission</h5>
              <p class="mb-3">Our mission is to inspire creativity and offer a seamless platform where anyone can design and purchase their own custom-made T-shirts. We strive to deliver excellent quality and ensure customer satisfaction through premium fabrics, advanced printing techniques, and quick, reliable delivery. Additionally, we are dedicated to supporting local artisans and businesses in Bangladesh by sourcing our materials and labor locally.</p>
            </div>
            <div class="col-md-6">
              <h5 class="mb-3">Our Vision</h5>
              <p class="mb-3">At Ekobbe, our aim is to make high-quality, custom-made T-shirts accessible to everyone in Bangladesh. We believe that fashion should not only be about wearing something stylish but about creating something meaningful that reflects your personality. We’re committed to helping our customers design apparel that speaks to their identity, whether for personal use, group events, or as memorable giftsp>
            </div>
          </div>
        </div>
        <div class="mw-930 d-lg-flex align-items-lg-center">
          <div class="image-wrapper col-lg-6">
            <img class="h-auto" loading="lazy" src="{{asset('frontend/assets/images/about/about-2.jpg')}}" width="450" height="500" alt="">
          </div>
          <div class="content-wrapper col-lg-6 px-lg-4">
            <h5 class="mb-3">The Company</h5>
            <p>Based in Bangladesh, Ekobbe is proud to be a homegrown brand offering unique, custom-made T-shirts tailored to your needs. With a strong emphasis on local craftsmanship, we ensure that every piece of clothing is made with care and attention to detail. Our easy-to-navigate website allows you to either choose from our curated designs or create your own from scratch. Follow us on Facebook at Ekobbe for the latest updates, promotions, and to see what’s new in our design world. We're more than just a T-shirt company; we are a platform for self-expression and creativity..</p>
          </div>
        </div>
      </div>
    </section>
    
    <section class="service-promotion horizontal container mw-930 pt-0 mb-md-4 pb-md-4 mb-xl-5">
      <div class="row">
        <div class="col-md-4 text-center mb-5 mb-md-0">
          <div class="service-promotion__icon mb-4">
            <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_shipping" /></svg>
          </div>
          <h3 class="service-promotion__title fs-6 text-uppercase">Fast And Free Delivery</h3>
          <p class="service-promotion__content text-secondary">Free delivery for all orders over $140</p>
        </div><!-- /.col-md-4 text-center-->

        <div class="col-md-4 text-center mb-5 mb-md-0">
          <div class="service-promotion__icon mb-4">
            <svg width="53" height="52" viewBox="0 0 53 52" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_headphone" /></svg>
          </div>
          <h3 class="service-promotion__title fs-6 text-uppercase">24/7 Customer Support</h3>
          <p class="service-promotion__content text-secondary">Friendly 24/7 customer support</p>
        </div><!-- /.col-md-4 text-center-->

        <div class="col-md-4 text-center mb-4 pb-1 mb-md-0">
          <div class="service-promotion__icon mb-4">
            <svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg"><use href="#icon_shield" /></svg>
          </div>
          <h3 class="service-promotion__title fs-6 text-uppercase">Money Back Guarantee</h3>
          <p class="service-promotion__content text-secondary">We return money within 30 days</p>
        </div><!-- /.col-md-4 text-center-->
      </div><!-- /.row -->
    </section>







@endsection