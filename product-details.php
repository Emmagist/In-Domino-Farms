<?php

    require_once(dirname(__FILE__) ."/libs/users.php");

    if ($_GET['pr']) {
        $pr = $_GET['pr'];
    }

    // if(Users::getSingleProduct($pr)):foreach(Users::getSingleProduct($pr) as $product): echo $product;exit;endforeach;endif;
    require "include/head.php";
    require "include/nav.php";

?>

     <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url(assets/img/2440x1578.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Shop Single</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Shop 
    ============================================= -->
    <div class="validtheme-shop-single-area default-padding">
        <?if($pr):?>
        <div class="container">
            <?php if(Users::getSingleProduct($pr)): foreach(Users::getSingleProduct($pr) as $product): ?>
                <div class="product-details">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="product-thumb">
                                <div id="timeline-carousel" class="carousel slide" data-bs-ride="carousel">

                                    <div class="carousel-inner item-box">
                                        <div class="carousel-item active product-item">
                                            <a href="#" class="item popup-gallery">
                                                <img src="<?=$product['product_image']?$product['product_image']:'';?>" alt="Thumb">
                                            </a>
                                            <span class="onsale theme">-16%</span>
                                        </div>
                                        <div class="carousel-item product-item">
                                            <a href="assets/img/products/2.png" class="item popup-gallery">
                                                <img src="assets/img/products/2.png" alt="Thumb">
                                            </a>
                                            <span class="onsale theme">-25%</span>
                                        </div>
                                        <div class="carousel-item product-item">
                                            <a href="assets/img/products/3.png" class="item popup-gallery">
                                                <img src="assets/img/products/3.png" alt="Thumb">
                                            </a>
                                            <span class="onsale theme">-33%</span>
                                        </div>
                                        <div class="carousel-item product-item">
                                            <a href="assets/img/products/4.png" class="item popup-gallery">
                                                <img src="assets/img/products/4.png" alt="Thumb">
                                            </a>
                                            <span class="onsale theme">-50%</span>
                                        </div>
                                    </div>

                                    <!-- Carousel Indicators -->
                                    <div class="carousel-indicators">
                                        <div class="product-gallery-carousel swiper">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="item active" data-bs-target="#timeline-carousel" data-bs-slide-to="0" aria-current="true">
                                                        <img src="assets/img/products/1.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="item" data-bs-target="#timeline-carousel" data-bs-slide-to="1">
                                                        <img src="assets/img/products/2.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="item" data-bs-target="#timeline-carousel" data-bs-slide-to="2">
                                                        <img src="assets/img/products/3.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="item" data-bs-target="#timeline-carousel" data-bs-slide-to="3">
                                                        <img src="assets/img/products/4.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <!-- End Carousel Content -->
                                
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="single-product-contents">
                                <div class="summary-top-box">
                                    <div class="product-tags">
                                        <a href="#">Crop</a>
                                        <a href="#">Organic</a>
                                    </div>
                                    <div class="review-count">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <span>(8 Review)</span>
                                    </div>
                                </div>
                                <h2 class="product-title">
                                <?=$product['product']?$product['product']:'';?>
                                <input type="hidden" value="<?=$product['category_id']?$product['category_id']:'';?>" id="product_category">
                                </h2>
                                <div class="price">
                                    <!-- <span><del>$8.00</del></span> -->
                                    <span>&#8358;<?=$product['price']?$product['price']:'';?></span>
                                </div>
                                <div class="product-stock validthemes-in-stock">
                                    <span>In Stock</span>
                                </div>
                                <p>
                                <?=$product['short_description']?$product['short_description']:'';?>
                                </p>
                                <div class="product-purchase-list">
                                    <input type="number" id="quantity" step="1" size="5" name="quantity" min="0" placeholder="0">
                                    <a class="btn secondary btn-theme btn-sm animation my-cart-btn" data-id="<?=$product['id']?>" data-name="<?=$product['product']?>" data-summary="<?=$product['short_description']?>" data-price="<?=$product['price']?>" data-quantity="1" data-image="<?=$product['product_image']?>">
                                        <i class="fas fa-shopping-cart"></i>
                                        Add to cart
                                    </a>
                                    <div class="shop-action">
                                        <ul>
                                            <li class="wishlist">
                                                <a href="#"><span>Add to wishlist</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-estimate-delivary">
                                    <i class="fas fa-box-open"></i>
                                    <strong> 2-day Delivery</strong>
                                    <span>Speedy and reliable parcel delivery!</span>
                                </div>
                                <div class="product-meta">
                                    <span class="sku">
                                        <strong>SKU:</strong> BE45VGRT
                                    </span>
                                    <span class="posted-in">
                                        <strong>Category:</strong>
                                        <a href="#">Food</a> ,
                                        <!-- <a href="#">Speaker</a>, 
                                        <a href="#">Headphone</a> -->
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Bottom Info  -->
                <div class="single-product-bottom-info">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tab Nav -->
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="description-tab-control" data-bs-toggle="tab" data-bs-target="#description-tab" type="button" role="tab" aria-controls="description-tab" aria-selected="true">
                                    Description
                                </button>

                                <button class="nav-link" id="information-tab-control" data-bs-toggle="tab" data-bs-target="#information-tab" type="button" role="tab" aria-controls="information-tab" aria-selected="false">
                                    Additional Information
                                </button>

                                <!-- <button class="nav-link" id="review-tab-control" data-bs-toggle="tab" data-bs-target="#review-tab" type="button" role="tab" aria-controls="review-tab" aria-selected="false">
                                    Review
                                </button> -->

                            </div>
                            <!-- End Tab Nav -->
                            <!-- Start Tab Content -->
                            <div class="tab-content tab-content-info" id="myTabContent">

                                <!-- Tab Single -->
                                <div class="tab-pane fade show active" id="description-tab" role="tabpanel" aria-labelledby="description-tab-control">
                                    <p>
                                    <?=$product['description']?$product['description']:'';?>
                                    </p>
                                    <!-- <ul> 
                                        <li>Status of organic vegetable production</li> 
                                        <li>Feasibility of organic practices</li> 
                                        <li>Sustainability of organic farming</li> 
                                        <li>Organic certification</li> 
                                        <li>Prospects and constraints of organic vegetable production</li> 
                                    </ul> -->
                                </div>
                                <!-- End Single -->

                                <!-- Tab Single -->
                                <div class="tab-pane fade" id="information-tab" role="tabpanel" aria-labelledby="information-tab-control">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td>Weight</td>
                                                <td><?=$product['weight']?$product['weight']:'';?></td>
                                            </tr>
                                            <tr>
                                                <td>Dimensions</td>
                                                <td>20 × 30 × 40 cm</td>
                                            </tr>
                                            <tr>
                                                <td>Colors</td>
                                                <td>Black, Blue, Green</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Tab Single -->

                                <!-- Tab Single -->
                                <div class="tab-pane fade" id="review-tab" role="tabpanel" aria-labelledby="review-tab-control">
                                    <h4>1 review for “Fresh Red Seedless”</h4>
                                    <div class="review-items">
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="assets/img/800x800.png" alt="Thumb">
                                            </div>
                                            <div class="info">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <div class="review-date">April 8, 2021</div>
                                                <div class="review-authro"><h5>Aleesha Brown
                                                </h5></div>
                                                <p>
                                                    Highly recommended. Will purchase more in future.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="thumb">
                                                <img src="assets/img/800x800.png" alt="Thumb">
                                            </div>
                                            <div class="info">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <div class="review-date">April 8, 2021</div>
                                                <div class="review-authro"><h5>Sarah Albert</h5></div>
                                                <p>
                                                    Great product quality!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-form">
                                        <h4>Add a review</h4>
                                        <div class="rating-select">
                                            <div class="stars">
                                                <span>
                                                    <a class="star-1" href="#"><i class="fas fa-star"></i></a>
                                                    <a class="star-2" href="#"><i class="fas fa-star"></i></a>
                                                    <a class="star-3" href="#"><i class="fas fa-star"></i></a>
                                                    <a class="star-4" href="#"><i class="fas fa-star"></i></a>
                                                    <a class="star-5" href="#"><i class="fas fa-star"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <form action="#" class="contact-form">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group comments">
                                                        <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                                        <span class="alert-error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                                        <span class="alert-error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button type="submit" name="submit" id="submit">
                                                        Post Review
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Alert Message -->
                                            <div class="col-md-12 alert-notification">
                                                <div id="message" class="alert-msg"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Tab Single -->

                            </div>
                            <!-- End Tab Content -->
                        </div>
                    </div>
                </div>
            <!-- End Product Bottom Info  -->
            <?php endforeach;endif;?>

            <!-- Related Product  -->
            <div class="related-products carousel-shadow">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Related Products</h3>
                        <div class="vt-products text-center related-product-carousel swiper ">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper relatedProduct">
                                <!-- Single product -->

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Related Product  -->
        </div>
        <?endif;?>
    </div>
    <!-- End Shop -->

<?php require "include/footer.php";?>

<script>
    $( document ).ready(function() {
        const cat = $('#product_category').val();
      $.ajax({
          url: 'libs/ajaxGet.php?get=211&cat='+cat,
          method: 'GET',
          dataType: 'json',
          data: 200,
          contentType: false,
          processData: false,
          // cache: false,
          success: (param) => { 
              if (param) {
                  $('.relatedProduct').html(param);
              }
          },
      });
      return false;
    });
</script>