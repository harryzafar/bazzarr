<!-- breadcrumb start -->
<div class="breadcrumb">
            <div class="container">
                <ul class="list-unstyled d-flex align-items-center m-0">
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li>
                        <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.4">
                                <path
                                    d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                                    fill="#000" />
                            </g>
                        </svg>
                    </li>
                    <li><a href="<?php echo base_url('shop/cart/') ?>">Cart</a></li>
                    <li>
                        <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.4">
                                <path
                                    d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                                    fill="#000" />
                            </g>
                        </svg>
                    </li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->

        <main id="MainContent" class="content-for-layout">
            <div class="checkout-page mt-100">
                <div class="container">
                    <div class="checkout-page-wrapper">
                                <div class="section-header mb-3">
                                    <h2 class="section-heading">Check out</h2>
                                </div>
                        <div class="row">
                            <div class="col-xl-9 col-lg-8 col-md-12 col-12 order-lg-1 order-2">
                                
                                <div class="shipping-address-area">
                                    <h2 class="shipping-address-heading pb-1">Shipping address</h2>
                                    <div class="shipping-address-form-wrapper">
                                        <form action="<?php echo base_url('shop/checkout/');?>" method="post" class="shipping-address-form common-form">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Name*</label>
                                                        <input type="text" name="name">
                                                    </fieldset>
                                                    <span class="text-danger"><?php echo form_error('name');?></span>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Email address*</label>
                                                        <input type="email" name="email">
                                                    </fieldset>
                                                    <span class="text-danger"><?php echo form_error('email');?></span>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Phone number*</label>
                                                        <input type="text" name="phone">
                                                    </fieldset>
                                                    <span class="text-danger"><?php echo form_error('phone');?></span>
                                                </div>

                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">City*</label>
                                                        <input type="text" name="city">
                                                    </fieldset>
                                                    <span class="text-danger"><?php echo form_error('city');?></span>
                                                </div>

                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Pincode*</label>
                                                        <input type="text" name="pincode">
                                                    </fieldset>
                                                    <span class="text-danger"><?php echo form_error('pincode');?></span>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Local Address*</label>
                                                        <input type="text" name="address">
                                                    </fieldset>
                                                    <span class="text-danger"><?php echo form_error('address');?></span>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12 mt-4">
                                                   <label>Payment Method*</label>
                                                   <label for="prepaid" style="width:auto; height:auto; display:inline-block;">UPI</label>
                                                   <input type="radio" id="prepaid" name="payment_method" value="prepaid" required style="display:inline-block; width:auto; height:auto; margin-left:5px">
                                                   <label for="postpaid" style="width:auto; height:auto; display:inline-block; margin-left:20px">COD</label>
                                                   <input type="radio" id="postpaid" name="payment_method" value="postpaid" required style="width:auto; height:auto; display:inline-block; margin-left:5px">
                                                   
                                                </div>
                                                <small>*Only COD method is available</small>
                                                
                                            </div>

                                            <div class="shipping-address-area billing-area">
                                               <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                               <a href="<?php echo base_url('shop/cart/');?>" class="checkout-page-btn minicart-btn btn-secondary">BACK TO CART</a>
                                               <button type="submit" class="checkout-page-btn minicart-btn btn-primary">PROCEED TO SHIPPING</button>
                                               </div>
                                            </div>
                         
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-12 col-12 order-lg-2 order-1">
                                <div class="cart-total-area checkout-summary-area">
                                    <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Order summary</h4>
                                    <?php foreach($cartItems as $item){;?>
                                        <div class="minicart-item d-flex">
                                        <div class="mini-img-wrapper">
                                            <img class="mini-img" src="<?php echo base_url().'public/uploads/products/thumb/'.$item['image'];?>" alt="img">
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="<?php echo base_url('shop/product/').$item['id'];?>"><?php echo $item['name'];?></a></h2>
                                            <p class="product-vendor">Size: <?php echo $item['size'];?></p>
                                            <p class="product-vendor"><?php echo  '&#8377;'.$item['price'].'x'.$item['qty'];?></p>
                                        </div>
                                    </div>
                                    <?php }
                                    ;?>
                                   
                                    <div class="cart-total-box mt-4 bg-transparent p-0">
                                        <div class="subtotal-item subtotal-box">
                                            <h4 class="subtotal-title">Subtotals:</h4>
                                            <p class="subtotal-value">&#8377;<?php echo $this->cart->total();?></p>
                                        </div>
                                        <div class="subtotal-item shipping-box">
                                            <h4 class="subtotal-title">Shipping:</h4>
                                            <p class="subtotal-value">Free</p>
                                        </div>
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Discount:</h4>
                                            <p class="subtotal-value">&#8377;100.00</p>
                                        </div>
                                        <hr />
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Total:</h4>
                                            <p class="subtotal-value">&#8377;<?php echo ($this->cart->total() - 100) ;?></p>
                                        </div>
                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </main>