@extends('frontend.master_dashboard')
@section('frontend')

@section('title')
 Faq::Ekobee 
@endsection
<br>


<div class="mb-5 pb-4"></div>
    <section class="container mw-930 lh-30">
      <h2 class="section-title text-uppercase fw-bold mb-5">FREQUENTLY ASKED QUESTIONS</h2>     
      <div id="faq_accordion" class="faq-accordion accordion mb-5">
        <div class="accordion-item">
          <h5 class="accordion-header" id="faq-accordion-heading-1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-1" aria-expanded="true" aria-controls="faq-accordion-collapse-1">
              How can I place an order?
              <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
            </button>
          </h5>
          <div id="faq-accordion-collapse-1" class="accordion-collapse collapse show" aria-labelledby="faq-accordion-heading-1" data-bs-parent="#faq_accordion">
            <div class="accordion-body">
              <p>To place an order, simply browse through our available T-shirt designs or use our custom design tool to create your own. Once you’ve chosen or created your design, select your preferred size, color, and quantity, then add the item to your cart. Follow the checkout process by providing your shipping details and selecting a payment method to complete the purchase. </p>
            </div>
          </div>
        </div><!-- /.accordion-item -->
        <div class="accordion-item">
          <h5 class="accordion-header" id="faq-accordion-heading-2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-2" aria-expanded="false" aria-controls="faq-accordion-collapse-2">
              What is the process for customizing a T-shirt?
              <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
            </button>
          </h5>
          <div id="faq-accordion-collapse-2" class="accordion-collapse collapse" aria-labelledby="faq-accordion-heading-2" data-bs-parent="#faq_accordion">
            <div class="accordion-body">
              <p>Customizing your T-shirt is easy! Visit our design page and use the available tools to upload your artwork, add text, or choose from our library of designs. You can adjust the size, position, and color of the design to fit your preferences. Once you’re happy with the final look, add the T-shirt to your cart and proceed with the checkout </p>
            </div>
          </div>
        </div><!-- /.accordion-item -->
        <div class="accordion-item">
          <h5 class="accordion-header" id="faq-accordion-heading-3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-3" aria-expanded="false" aria-controls="faq-accordion-collapse-3">
              What payment methods do you accept?
              <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
            </button>
          </h5>
          <div id="faq-accordion-collapse-3" class="accordion-collapse collapse" aria-labelledby="faq-accordion-heading-3" data-bs-parent="#faq_accordion">
            <div class="accordion-body">
              <p>Delivery times depend on your location and the type of order. Typically, it takes 3-5 business days for standard orders within Bangladesh. Custom orders may take slightly longer due to the production process. You will receive an estimated delivery date at checkout. </p>
            </div>
          </div>
        </div><!-- /.accordion-item -->
      </div>
           
      <div id="faq_accordion_2" class="faq-accordion accordion mb-5">
        <div class="accordion-item">
          <h5 class="accordion-header" id="faq-accordion-heading-2-1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-2-1" aria-expanded="true" aria-controls="faq-accordion-collapse-2-1">
              Do you offer nationwide delivery?
              <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
            </button>
          </h5>
          <div id="faq-accordion-collapse-2-1" class="accordion-collapse collapse show" aria-labelledby="faq-accordion-heading-2-1" data-bs-parent="#faq_accordion_2">
            <div class="accordion-body">
              <p>Yes, we offer delivery to all regions across Bangladesh. No matter where you are located, we strive to get your custom-made T-shirts delivered to your doorstep.</p>
            </div>
          </div>
        </div><!-- /.accordion-item -->
        <div class="accordion-item">
          <h5 class="accordion-header" id="faq-accordion-heading-2-2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-2-2" aria-expanded="false" aria-controls="faq-accordion-collapse-2-2">
              Can I track my order?
              <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
            </button>
          </h5>
          <div id="faq-accordion-collapse-2-2" class="accordion-collapse collapse" aria-labelledby="faq-accordion-heading-2-2" data-bs-parent="#faq_accordion_2">
            <div class="accordion-body">
              <p>Yes, once your order is shipped, you will receive a tracking number via email or SMS. You can use this tracking number to check the status of your delivery through our delivery partner’s website or app.</p>
            </div>
          </div>
        </div><!-- /.accordion-item -->
        <div class="accordion-item">
          <h5 class="accordion-header" id="faq-accordion-heading-2-3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-accordion-collapse-2-3" aria-expanded="false" aria-controls="faq-accordion-collapse-2-3">
              What is your return or exchange policy?
              <svg class="accordion-button__icon" viewBox="0 0 14 14"><g aria-hidden="true" stroke="none" fill-rule="evenodd"><path class="svg-path-vertical" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path><path class="svg-path-horizontal" d="M14,6 L14,8 L0,8 L0,6 L14,6"></path></g></svg>
            </button>
          </h5>
          <div id="faq-accordion-collapse-2-3" class="accordion-collapse collapse" aria-labelledby="faq-accordion-heading-2-3" data-bs-parent="#faq_accordion_2">
            <div class="accordion-body">
              <p>We take pride in the quality of our products. However, if you receive a damaged or incorrect item, you can request a return or exchange within 7 days of delivery. Please note that custom-made T-shirts with personalized designs are non-refundable unless there is a manufacturing defect or error. </p>
            </div>
          </div>
        </div><!-- /.accordion-item -->
      </div>
      
    </section>


    @endsection