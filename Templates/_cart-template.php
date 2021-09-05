<?php
error_reporting(0);

?>


<section id="cart">
    <div class="container rounded shadow p-3 mt-5">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="w-100 p-5">
                <?php
                $total = 0;

                global $con;
                
                $ip = getIp();
                $sel_price = "select * from cart where ip_add='$ip'";
                
                $run_price = mysqli_query($con, $sel_price);
                
                while($p_price=mysqli_fetch_array($run_price)) {
                
                    $pro_id = $p_price['p_id'];
                
                    $pro_price = "select * from products where product_id='$pro_id'";
                
                    $run_pro_price = mysqli_query($con,$pro_price);
                
                    while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                        $product_price = array($pp_price['product_price']);
                
                        $product_title = $pp_price['product_title'];
                
                        $product_image = $pp_price['product_image'];
                
                        $product_desc = $pp_price['product_desc'];
                
                        $product_number = $pp_price['product_number'];
                
                        $single_price = $pp_price['product_price'];
                
                        $values = array_sum($product_price);
                
                        $total += $values;
                
                
                
                
                ?>

                <tr>
                    <td>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-3">
                            <img src="admin/product_images/<?php echo $product_image;?>" class="img-fluid">;
                            </div>
                            <div class="col-lg-3">
                                <h2><?php echo $product_title;?><h2>
                                <h3><?php echo $product_number;?></h3>
                                <p><?php echo $product_desc?></p>
                                <button name="delete" style='width: 120px; height: 50px; 
                                background-color: #bd3a3a; color: #fff; border: none; border-radius: 10px; 
                                margin-bottom: 15px; padding-left: 5px; 
                                padding-right: 5px;'><i class='fas fa-trash mr-2' value="<?php echo $pro_id;?>"></i>Delete
                                </button>
                            </div>
                            <div class="col-lg-3">
                                <h3 class="ml-2">Quantity</h3>
                                <form action="" method="post">
                                    <input type="text" size="15" name="qty">
                                    <button name="myqty" class="btn-success btn-sm" style="width: 60px; height: 30px;">enter quantity</button>
                                </form>
                                <?php
                                if(isset($_POST['myqty'])) {
                                    $qty = $_POST['qty'];
                                
                                    $update_qty = "update cart set qty='$qty'";
                                    $run_qty = mysqli_query($con, $update_qty);
                                
                                    $_SESSION['qty'] = $qty;
                                
                                    $total = $total*$qty;
                                }
                                
                                ?>
                            </div>
                            <div class="col-lg-3">
                                <h3>Unit Price</h3>
                                <p class="font-size-20 font-weight-bolder"><?php echo "₦" .$single_price;?></p>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } }?>
                <tr>
                    <td>
                    <div class="row">
                        <div class="offset-3 col-lg-6">
                            <h1>Cart Totals:</h1>
                            <h2>Subtotal</h2>
                        </div>
                        <div class="col-lg-3">
                            <h2><?php echo "₦". $total;?></h2>
                            <h2><?php echo "₦". $total;?></h2>

                        </div>
                    </div>
                    </td>
                </tr>
            </table>
            <div class="row">
                <div class="offset-4 col-lg-4">
                    <button style='width: 120px; height: 50px; 
                    background-color: #fff; color: #bd3a3a; border: 1px solid #bd3a3a; border-radius: 10px; 
                    margin-bottom: 15px; padding-left: 5px; 
                    padding-right: 5px;' class="w-50"><a href="all_products.php" style="text-decoration: none; color: #bd3a3a;">Continue shopping
                    </a></button>
                    
                </div>
                <div class="col-lg-4">
                <button class="btn btn-danger w-50"><a href="register.php" style="text-decoration: none; color: #fff;">Checkout
                </a></button>
                </div>
            </div>
        </form>
        <?php

        $ip = getIp();

        if(isset($_POST['delete'])) {
                $delete_product = "delete from cart where p_id='$pro_id' AND ip_add='$ip'";

                $run_delete = mysqli_query($con, $delete_product);
        }
        
        ?>
    </div>
</section>
