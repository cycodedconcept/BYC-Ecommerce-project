<?php
if (isset($_GET['pro_id'])) {

    $product_id = $_GET['pro_id'];
    $get_pro = "select * from products where product_id='$product_id'";

$run_pro = mysqli_query($con, $get_pro);

while($row_pro=mysqli_fetch_array($run_pro)) {
    $pro_id = $row_pro['product_id'];
    $pro_title = $row_pro['product_title'];
    $pro_price = $row_pro['product_price'];
    $pro_image = $row_pro['product_image'];
    $pro_desc = $row_pro['product_desc'];
    $pro_number = $row_pro['product_number'];

}

}


?>

<section id="product" class="py-3">
        <div class="container rounded shadow p-3 mb-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <?php
                    echo "<img src='admin/product_images/$pro_image' width='100%' height='100%' />";
                    ?>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <h2 class="font-weight-bolder"><?php echo"$pro_title"?><br><?php echo "$pro_number"?></h2>
                    <p><?php echo"$pro_desc"?></p>
                    <div class="rating text-warning font-size-12 mb-2">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                        <span class="font-size-20 ml-2 font-rale color-primary font-weight-bolder">4.05</span>
                    </div>

                    <hr>

                    <div class="price font-weight-bolder font-size-25">
                        <span>₦<?php echo "$pro_price"?></span>
                    </div>

                    <div id="policy">
                        <div class="d-flex">
                            <div class="return">
                                <div>
                                    <p class="font-weight-bolder">Quantity</p>
                                </div>
                                <!--<button type="button" class="button-size font-weight-bolder mr-2">S</button>
                                <button type="button" class="button-size font-weight-bolder mr-2">M</button>
                                <button type="button" class="button-size font-weight-bolder mr-2">L</button>
                                <button type="button" class="button-size font-weight-bolder mr-2">XS</button>-->

                                <form action="" method="post">
                                    <input type="number" size="15" name="qty" value="1">
                                </form>
                                <?php
                                if(isset($_POST['myqty'])) {
                                    $qty = $_POST['qty'];
                                
                                    $update_qty = "update cart set qty='$qty'";
                                    $run_qty = mysqli_query($con, $update_qty);
                                
                                    /*$_SESSION['qty'] = $qty;
                                
                                    $total = $total*$qty;*/
                                }
                                
                                ?>
                            </div>
                            <div class="return ml-3">
                                <div>
                                    <p class="font-weight-bolder">Available Colors</p>
                                </div>
                                <button class="color-blue"></button>
                                <button class="color-pink"></button>
                                <button class="color-gold"></button>
                                <button class="color-black"></button>

                            </div>
                        </div>
                    </div>

                    <!--<div id="policy">
                        <div class="qty d-flex">
                            <div class="return mt-3">
                                <button class="qty-up border qty-icon-color"><i class="fa fa-plus fa-sm pl-2 pr-2 color-light"></i></button>
                                <input type="text" class="qty_input border px-2 w-25" disabled value="1" placeholder="1">
                                <button class="qty-down border qty-icon-color"><i class="fa fa-minus pl-2 pr-2 color-light"></i></button>
                                <button class="button button-product-white font-rubik font-size-12 color-secondary font-weight-bold ml-3"><i class="fa fa-heart fa-sm mr-2"></i>Wishlist</button>
                            </div>
                        </div>
                    </div>-->
                    <?php
                    echo"<a href='index.php?add_cart=$pro_id'><button class='button button-product-red font-rubik font-size-12 color-light font-weight-bold w-25 mt-2'><i class='fa fa-shopping-cart mr-2'></i>Add to cart</button></a>";
                    ?>
                    
                    <a href="all_products.php"><button name="top_sale_submit" class="button button-product-red bg-color font-rubik font-size-12 color-light font-weight-bold w-25 mt-2">Continue Shopping</button></a>
                </div>
            </div>
        </div>
</section>

<!--   !product  -->

