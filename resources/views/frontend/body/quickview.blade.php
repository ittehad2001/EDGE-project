<div class="modal fade" id="quickView" tabindex="-1">
    <div class="modal-dialog quick-view modal-dialog-centered">
      <div class="modal-content">
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModal"></a>
        <div class="product-single">
          <div class="product-single__media m-0">
            <div class="product-single__image position-relative w-100">
              <div class="swiper-container js-swiper-slider"
                data-settings='{
                  "slidesPerView": 1,
                  "slidesPerGroup": 1,
                  "effect": "none",
                  "loop": false,
                  "navigation": {
                    "nextEl": ".modal-dialog.quick-view .product-single__media .swiper-button-next",
                    "prevEl": ".modal-dialog.quick-view .product-single__media .swiper-button-prev"
                  }
                }'>
                <div class="swiper-wrapper">
                  <div class="swiper-slide product-single__image-item">
                    <img loading="lazy" id="pimage" src="" alt=" "> <!-- Ensure image source is set dynamically -->
                  </div>
                </div>
                <div class="swiper-button-prev">
                  <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_prev_sm" />
                  </svg>
                </div>
                <div class="swiper-button-next">
                  <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_next_sm" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="product-single__detail">
            <h1 class="product-single__name" id="pname"> </h1> <!-- Product name is dynamically inserted -->
            <div class="product-single__price">
              <span class="current-price" id="pprice">Tk. </span> <!-- Product price -->
              <span class="old-price" id="oldprice">Tk. </span> <!-- Old price if applicable -->
            </div>
           
            <form name="addtocart-form" method="post">
              <div class="product-single__swatches">
                <div class="product-swatch text-swatches">
                  <label>Sizes</label>
                  <div class="swatch-list" id="sizeArea">
                    <select class="form-control unicase-form-control" id="size" name="size">
                      <option value="">Select Size</option>
                      <!-- Sizes should be dynamically populated -->
                    </select>
                  </div>
                </div>
                <div class="product-swatch color-swatches">
                  <label>Color</label>
                  <div class="swatch-list" id="colorArea">
                    <select class="form-control unicase-form-control" id="color" name="color">
                      <option value="">Select Color</option>
                      <!-- Colors should be dynamically populated -->
                    </select>
                  </div>
                </div>
              </div>
              
            </form>
            <div class="product-single__addtolinks">
             
              
            </div>
            <div class="product-single__meta-info mb-0">
              <div class="meta-item" id="pbrand">
                <label>Brand:</label>
                <span>Brand Name</span> <!-- Brand should be dynamically inserted -->
              </div>
              <div class="meta-item" id="pcategory">
                <label>Categories:</label>
                <span>Category Name</span> <!-- Category should be dynamically inserted -->
              </div>
              <div class="meta-item" id="pcode">
                <label>Product Code:</label>
                <span>Product Code</span> <!-- Product Code should be dynamically inserted -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
