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
                    <li>Cart</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->

        <main id="MainContent" class="content-for-layout">
            <div class="cart-page mt-100">
                <div class="container">
                    <div class="cart-page-wrapper">
                        <div class="row">
                          <?php if($this->cart->total_items() > 0){;?>
                            <div class="col-lg-7 col-md-12 col-12">
                                <table class="cart-table w-100">
                                    <thead>
                                      <tr>
                                        <th class="cart-caption heading_18">Product</th>
                                        <th class="cart-caption heading_18"></th>
                                        <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                                        <th class="cart-caption text-end heading_18">Price</th>
                                      </tr>
                                    </thead>
                        
                                    <tbody>
                                      <?php foreach($cartItems as $item){;?>
                                        <tr class="cart-item">
                                          <td class="cart-item-media">
                                            <div class="mini-img-wrapper">
                                                <img class="mini-img" src="<?php echo base_url().'public/uploads/products/thumb/'.$item['image'];?>" alt="img">
                                            </div>                                    
                                          </td>
                                          <td class="cart-item-details">
                                            <h2 class="product-title"><a href="<?php echo base_url('shop/product/'.$item['id']);?>"><?php echo $item['name'];?></a></h2>
                                            <p class="product-vendor">Size: <?php echo $item['size'];?></p>                                   
                                          </td>
                                          <td class="cart-item-quantity">
                                            <div class="quantity d-flex align-items-center justify-content-between">
                                                <button class="qty-btn dec-qty" onclick="updateQty(this,'<?php echo $item['rowid'];?>')" >-</button>
                                                <input class="qty-input" id="pro-price" type="number" name="qty"  value="<?php echo $item['qty'];?>" min="0">
                                                <button class="qty-btn inc-qty" onclick="updateQty(this, '<?php echo $item['rowid'];?>')">+</button>
                                            </div>
                                            <a href="<?php echo base_url('shop/removeItem/'.$item['rowid']);?>" class="product-remove mt-2" onclick="return confirm('Are you sure')">Remove</a>                           
                                          </td>
                                          <td class="cart-item-price text-end">
                                            <div class="product-price">&#8377;<?php echo $item['subtotal'];?></div>                           
                                          </td>                        
                                        </tr>
                                     <?php }
                                       ;?>
                                        
                                       
                                    </tbody>
                                  </table>
                                  <a href="<?php echo base_url('shop/');?>" class="btn btn-primary mt-3">< Continue Shopping</a>
                            </div>
                            <div class="col-lg-5 col-md-12 col-12">
                                <div class="cart-total-area">
                                    <h3 class="cart-total-title d-none d-lg-block mb-0">Cart Totals</h4>
                                    <div class="cart-total-box mt-4">
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
                                            <p class="subtotal-value">&#8377;<?php echo ($this->cart->total()-100);?></p>
                                        </div>
                                        
                                        <div class="d-flex justify-content-center mt-4">
                                            <a href="<?php echo base_url('shop/checkout/');?>" class="position-relative btn-primary text-uppercase">
                                                Procced to checkout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php }else{;?>
                           <div class="cart-empty-area text-center py-5">
                            <div class="cart-empty-icon pb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
                                    <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                    <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                </svg>
                            </div>
                            <p class="cart-empty">You have no items in your cart</p>
                        </div>
                        <?php  }
                           ;?>
                            
                        </div>
                    </div>
                </div>
            </div>            
        </main>
        
        <script>
          function updateQty(obj, rowid){

            var qtyInput = $(obj).parent().find('input');
  
           if ($(obj).hasClass('inc-qty')) {
              qtyInput.val(parseInt(qtyInput.val()) + 1);
            }
             else if (qtyInput.val() >= 1) {
              qtyInput.val(parseInt(qtyInput.val()) - 1);
         }
         let qty = qtyInput.val();
         $.get("<?php echo base_url('shop/updateQty/');?>",{refId:rowid, qty:qty}, function(resp){
              if(resp == 'ok'){
                location.reload();
              }
              else{
                alert('Cart update failed');
              }
            });
        }
        </script>