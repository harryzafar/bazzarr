<main id="MainContent" class="content-for-layout">
            <!-- slideshow start -->
            <div class="slideshow-section position-relative">
                <div class="slideshow-active activate-slider" data-slick='{
                "slidesToShow": 1, 
                "slidesToScroll": 1, 
                "dots": true,
                "arrows": true,
                "responsive": [
                    {
                    "breakpoint": 768,
                    "settings": {
                        "arrows": false
                    }
                    }
                ]
            }'>
                    <div class="slide-item slide-item-bag position-relative">
                        <img class="slide-img" src="<?php echo base_url();?>public/front/assets/banner/s-1.jpg" alt="slide-1">

                        <div class="content-absolute content-slide">
                            <div class="container height-inherit d-flex align-items-center">
                                <div class="content-box slide-content py-4">
                                    <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Denim Jacket
                                    </h2>
                                    <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Look for your inspiration here
                                    </p>
                                    <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                        href="<?php echo base_url('shop/') ?>"
                                        data-animation="animate__animated animate__fadeInUp">SHOP
                                        NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item slide-item-bag position-relative">
                        <img class="slide-img " src="<?php echo base_url();?>public/front/assets/banner/s-2.jpg" alt="slide-2">

                        <div class="content-absolute content-slide">
                            <div class="container height-inherit d-flex align-items-center">
                                <div class="content-box slide-content py-4">
                                    <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Fashion
                                    </h2>
                                    <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Look for your inspiration here
                                    </p>
                                    <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                        href="<?php echo base_url('shop/');?>"
                                        data-animation="animate__animated animate__fadeInUp">SHOP
                                        NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item slide-item-bag position-relative">
                        <img class="slide-img" src="<?php echo base_url();?>public/front/assets/banner/s-3.jpg" alt="slide-3">
                        <div class="content-absolute content-slide">
                            <div class="container height-inherit d-flex align-items-center">
                                <div class="content-box slide-content py-4">
                                    <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Clothings
                                    </h2>
                                    <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                        data-animation="animate__animated animate__fadeInUp">
                                        Look for your inspiration here
                                    </p>
                                    <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                        href="<?php echo base_url('shop/') ?>"
                                        data-animation="animate__animated animate__fadeInUp">SHOP
                                        NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="activate-arrows"></div>
                <div class="activate-dots dot-tools"></div>
            </div>
            <!-- slideshow end -->

            <!-- trusted badge start -->
            <div class="trusted-section mt-100 overflow-hidden">
                <div class="trusted-section-inner">
                    <div class="container">
                        <div class="row justify-content-center trusted-row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="trusted-badge bg-trust-1 rounded">
                                    <div class="trusted-icon">
                                        <img class="icon-trusted" src="<?php echo base_url();?>public/front/assets/icon/bus.png" alt="icon-1">
                                    </div>
                                    <div class="trusted-content">
                                        <h2 class="heading_18 trusted-heading">Free Shipping & Return</h2>
                                        <p class="text_16 trusted-subheading trusted-subheading-2">On all order over
                                        &#8377;99.00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="trusted-badge bg-trust-2 rounded">
                                    <div class="trusted-icon">
                                        <img class="icon-trusted" src="<?php echo base_url();?>public/front/assets/icon/support.png" alt="icon-2">
                                    </div>
                                    <div class="trusted-content">
                                        <h2 class="heading_18 trusted-heading">Customer Support 24/7</h2>
                                        <p class="text_16 trusted-subheading trusted-subheading-2">Instant access to
                                            support</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="trusted-badge bg-trust-3 rounded">
                                    <div class="trusted-icon">
                                        <img class="icon-trusted" src="<?php echo base_url();?>public/front/assets/icon/card.png" alt="icon-3">
                                    </div>
                                    <div class="trusted-content">
                                        <h2 class="heading_18 trusted-heading">100% Secure Payment</h2>
                                        <p class="text_16 trusted-subheading trusted-subheading-2">We ensure secure
                                            payment!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- trusted badge end -->

            <!-- featured collection start -->
            <div class="featured-collection-section mt-100 home-section overflow-hidden">
                <div class="container">
                    <div class="section-header text-center">
                        <p class="section-subheading">WHAT'S NEW</p>
                        <h2 class="section-heading">The Latest Drop</h2>
                    </div>

                    <div class="product-container position-relative">
                        <div class="common-slider" data-slick='{
                        "slidesToShow": 4, 
                        "slidesToScroll": 1,
                        "dots": false,
                        "arrows": true,
                        "responsive": [
                          {
                            "breakpoint": 1281,
                            "settings": {
                              "slidesToShow": 3
                            }
                          },
                          {
                            "breakpoint": 768,
                            "settings": {
                              "slidesToShow": 2
                            }
                          }
                        ]
                    }'>     <?php 
                                foreach($products as $pro){;?>
                                <div class="new-item" data-aos="fade-up" data-aos-duration="700">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <a href="<?php echo base_url('shop/product/').$pro['id'];?>">
                                            <img class="primary-img" src="<?php echo base_url().'public/uploads/products/front/'.$pro['image'];?>" alt="product-img">
                                        </a>

                                        <div class="product-badge">
                                            <span class="badge-label badge-new rounded">New</span>
                                        </div>

                                        <div class="product-card-action product-card-action-2 justify-content-center">
                                            <a href="javascript:void(0)" class="action-card action-quickview" onclick="view(<?php echo $pro['id'];?>)"
                                                data-bs-toggle="">
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 0C15.5117 0 20 4.48828 20 10C20 12.3945 19.1602 14.5898 17.75 16.3125L25.7188 24.2812L24.2812 25.7188L16.3125 17.75C14.5898 19.1602 12.3945 20 10 20C4.48828 20 0 15.5117 0 10C0 4.48828 4.48828 0 10 0ZM10 2C5.57031 2 2 5.57031 2 10C2 14.4297 5.57031 18 10 18C14.4297 18 18 14.4297 18 10C18 5.57031 14.4297 2 10 2ZM11 6V9H14V11H11V14H9V11H6V9H9V6H11Z"
                                                        fill="#00234D" />
                                                </svg>
                                            </a>

                                            <a href="<?php echo base_url('shop/addCart/').$pro['id'];?>" class="action-card action-addtocart">
                                                <svg class="icon icon-cart" width="24" height="26" viewBox="0 0 24 26"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12 0.000183105C9.25391 0.000183105 7 2.25409 7 5.00018V6.00018H2.0625L2 6.93768L1 24.9377L0.9375 26.0002H23.0625L23 24.9377L22 6.93768L21.9375 6.00018H17V5.00018C17 2.25409 14.7461 0.000183105 12 0.000183105ZM12 2.00018C13.6562 2.00018 15 3.34393 15 5.00018V6.00018H9V5.00018C9 3.34393 10.3438 2.00018 12 2.00018ZM3.9375 8.00018H7V11.0002H9V8.00018H15V11.0002H17V8.00018H20.0625L20.9375 24.0002H3.0625L3.9375 8.00018Z"
                                                        fill="#00234D" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-details">
                                        <p class="mt-3 mb-0"><?php echo $pro['brand'];?></p>
                                        <h3 class="product-card-title mt-0">
                                            <a href="<?php echo base_url('shop/product/').$pro['id'];?>"><?php echo $pro['title']; ?></a>
                                        </h3>
                                        <div class="product-card-price">
                                            <span class="card-price-regular">&#8377;<?php echo $pro['price'];?></span>
                                            <span class="card-price-compare text-decoration-line-through">&#8377;1759</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <?php }
                           
                           ;?>
                           
                        </div>
                        <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
                    </div>
                </div>
            </div>
            <!-- featured collection end -->

            <!-- banner start -->
            <div class="banner-section mt-100 overflow-hidden">
                <div class="banner-section-inner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12" data-aos="fade-right" data-aos-duration="1200">
                                <a class="banner-item position-relative rounded" href="<?php echo base_url('shop/') ?>">
                                    <img class="banner-img" src="<?php echo base_url();?>public/front/assets/offer/offer-1.jpg" alt="banner-1">
                                    <div class="content-absolute content-slide">
                                        <div class="container height-inherit d-flex align-items-center">
                                            <div class="content-box banner-content p-4">
                                                <p class="heading_18 mb-3 text-white">Winter</p>
                                                <h2 class="heading_34 text-white">30% off for <br>Jacket</h2>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12" data-aos="fade-left" data-aos-duration="1200">
                                <a class="banner-item position-relative rounded" href="<?php echo base_url('shop/') ?>">
                                    <img class="banner-img" src="<?php echo base_url();?>public/front/assets/offer/offer-2.jpg" alt="banner-2">
                                    <div class="content-absolute content-slide">
                                        <div class="container height-inherit d-flex align-items-center">
                                            <div class="content-box banner-content p-4">
                                                <p class="heading_18 mb-3 text-white">Fashion</p>
                                                <h2 class="heading_34 text-white">25% off for <br>Clothings</h2>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner end -->

            <!-- collection start -->
            <div class="featured-collection mt-100 overflow-hidden">
                <div class="collection-tab-inner">
                    <div class="container">
                        <div class="section-header text-center">
                            <h2 class="section-heading">Popular Products</h2>
                        </div>
                        <div class="row">
                            <?php foreach($populars as $popular){;?>
                                <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <a href="<?php echo base_url('shop/product/').$popular['id'];?>">
                                            <img class="primary-img" src="<?php echo base_url().'public/uploads/products/front/'.$popular['image'];?>" alt="product-img">
                                        </a>

                                        <div class="product-badge">
                                            <span class="badge-label badge-new rounded">Featured</span>
                                        </div>

                                        <div class="product-card-action product-card-action-2 justify-content-center">
                                            <a href="javascript:void(0)" class="action-card action-quickview" onclick="view(<?php echo $popular['id'];?>)"
                                                data-bs-toggle="">
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 0C15.5117 0 20 4.48828 20 10C20 12.3945 19.1602 14.5898 17.75 16.3125L25.7188 24.2812L24.2812 25.7188L16.3125 17.75C14.5898 19.1602 12.3945 20 10 20C4.48828 20 0 15.5117 0 10C0 4.48828 4.48828 0 10 0ZM10 2C5.57031 2 2 5.57031 2 10C2 14.4297 5.57031 18 10 18C14.4297 18 18 14.4297 18 10C18 5.57031 14.4297 2 10 2ZM11 6V9H14V11H11V14H9V11H6V9H9V6H11Z"
                                                        fill="#00234D" />
                                                </svg>
                                            </a>

                                            <a href="<?php echo base_url('shop/addCart/').$popular['id'];?>" class="action-card action-addtocart">
                                                <svg class="icon icon-cart" width="24" height="26" viewBox="0 0 24 26"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12 0.000183105C9.25391 0.000183105 7 2.25409 7 5.00018V6.00018H2.0625L2 6.93768L1 24.9377L0.9375 26.0002H23.0625L23 24.9377L22 6.93768L21.9375 6.00018H17V5.00018C17 2.25409 14.7461 0.000183105 12 0.000183105ZM12 2.00018C13.6562 2.00018 15 3.34393 15 5.00018V6.00018H9V5.00018C9 3.34393 10.3438 2.00018 12 2.00018ZM3.9375 8.00018H7V11.0002H9V8.00018H15V11.0002H17V8.00018H20.0625L20.9375 24.0002H3.0625L3.9375 8.00018Z"
                                                        fill="#00234D" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-details">
                                      <p class="mt-3 mb-0"><?php echo $popular['brand'];?></p>
                                        <h3 class="product-card-title mt-0">
                                            <a href="<?php echo base_url('shop/product/').$popular['id'];?>"><?php echo $popular['title']; ?></a>
                                        </h3>
                                        <div class="product-card-price">
                                            <span class="card-price-regular">&#8377; <?php echo $popular['price']; ?></span>
                                            <span class="card-price-compare text-decoration-line-through">&#8377;1759</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }
                            ;?>
                            

                        </div>
                        <div class="view-all text-center" data-aos="fade-up" data-aos-duration="700">
                            <a class="btn-primary" href="<?php echo base_url('shop') ;?>">VIEW ALL</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- collection end -->




        </main>