<main id="MainContent" class="content-for-layout">
    <div class="login-page mt-100">
        <div class="container">
            <h2 class="section-heading">Order Status</h2>
            <?php if(!empty($order)){;?>
            <div class="mt-4">

                <div style="border:5px dashed green ; " class="d-flex align-items-center p-2">
                    <p class="p-0 m-0 fs-6 fw-bold text-success">Your Order has been Placed Successfully</p>

                </div>
                <div class="p-4 mt-4" style="background-color:#eee; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item border-0 bg-transparent"><strong>Name: </strong>
                                    <?php echo $order['custname'];?>
                                </li>
                                <li class="list-group-item border-0 bg-transparent"><strong> Email: </strong>
                                    <?php echo $order['custmail'];?>
                                </li>
                                <li class="list-group-item border-0 bg-transparent"><strong>Mobile Number: </strong>
                                    <?php echo $order['custphone'];?>
                                </li>
                                <li class="list-group-item border-0 bg-transparent"><strong>Address: </strong>
                                    <?php echo $order['custadd'].' '.$order['custcity'].' '.$order['custpin'];?>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item border-0 bg-transparent"><strong>Reference
                                        ID: </strong>
                                    <?php echo $order['id'] ;?>
                                </li>
                                <li class="list-group-item border-0 bg-transparent"><strong>Total: </strong>
                                &#8377;<?php echo $order['grand_total'] ;?><small> (after discount)</small>
                                </li>
                                <li class="list-group-item border-0 bg-transparent"><strong>Placed On: </strong>
                                    <?php echo $order['created'] ;?>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="mt-2 p-4">
                    <table class="cart-table w-100">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="cart-caption heading_18">Product</th>
                                <th class="cart-caption heading_18">Price</th>
                                <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                                <th class="cart-caption text-end heading_18">Sub Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php  if(!empty($order['items'])){  
                                   foreach($order['items'] as $item){;?>
                            <tr class="cart-item">
                                <td class="cart-item-media">
                                    <div class="mini-img-wrapper">
                                        <img class="mini-img"
                                            src="<?php echo base_url().'public/uploads/products/thumb/'.$item['image'];?>"
                                            alt="img">
                                    </div>
                                </td>
                                <td class="cart-item-details">
                                    <h2 class="product-title">
                                        <?php echo $item['title'] ;?>
                                    </h2>
                                    <p class="product-vendor">Size:
                                        <?php echo $item['size'];?>
                                    </p>
                                </td>
                                <td>
                                    <?php echo $item['price'] ;?>
                                </td>
                                <td class="cart-item-quantity">
                                    <?php echo $item['quantity'] ;?>
                                </td>
                                <td class="cart-item-price text-end">
                                    <div class="product-price">&#8377;
                                        <?php echo $item['subtotal'];?>
                                    </div>
                                </td>
                            </tr>
                            <?php }
                               } 
                                 ;?>


                        </tbody>
                    </table>

                </div>
            </div>
            <hr>

            <?php }else{;?>
                <div class="col-md-12">
                       <div class="alert alert-danger">Your order submission failed.</div>
                </div>
           <?php } 
            ;?>

        </div>
    </div>
</main>