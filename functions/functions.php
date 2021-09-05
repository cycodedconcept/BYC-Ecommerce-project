<?php
$con = mysqli_connect("localhost", "root", "", "ecommerce");

if(mysqli_connect_errno()) {
    echo "The Connection was not established: " .mysqli_connect_error();
}

// Getting the user ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}


//Cart function
function cart() {
    if(isset($_GET['add_cart'])) {

        global $con;
        $ip = getIp();
        $pro_id = $_GET['add_cart'];

        $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";

        $run_check = mysqli_query($con, $check_pro);

        if(mysqli_num_rows($run_check)>0) {
            echo "";
        }

        else {
            $insert_pro = "insert into cart (p_id, ip_add) values ('$pro_id', '$ip')";

            $run_pro = mysqli_query($con, $insert_pro);

            echo "<script>window.open('all_products.php','_self')</script>";
        }
    }
}

// Getting the total cart items
function total_items() {
    if(isset($_GET['add_cart'])) {
        global $con;

        $ip = getIp();

        $get_items = "select * from cart where ip_add='$ip'";

        $run_items = mysqli_query($con, $get_items);

        $count_items = mysqli_num_rows($run_items);
    }

    else {

        global $con;
        $ip = getIp();

        $get_items = "select * from cart where ip_add='$ip'";

        $run_items = mysqli_query($con, $get_items);

        $count_items = mysqli_num_rows($run_items);
    }


    echo $count_items;
}

// getting categories
function getCats() {
    global $con;

    $get_cats = "select * from categories";

    $run_cats = mysqli_query($con, $get_cats);

    while ($row_cats=mysqli_fetch_array($run_cats)) {
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];

        echo "<a href='all_products.php?cat=$cat_id' style='text-decoration:none; padding: 20px; color: #000;'>$cat_title.<br><br></a>";
    }
}

function getBrands() {
    global $con;

    $get_brands = "select * from brands";

    $run_brands = mysqli_query($con, $get_brands);

    while ($row_brands=mysqli_fetch_array($run_brands)) {
        $brand_id = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];

        echo "<a href='all_products.php?brand=$brand_id'>$brand_title.<br><br></a>";
    }
}

function getPro() {

    if (!isset($_GET['cat'])) {
        if (!isset($_GET['brand'])) {

    global $con;

    $get_pro = "select * from products order by RAND() LIMIT 0,6";

    $run_pro = mysqli_query($con, $get_pro);

    while($row_pro=mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];
        $pro_number = $row_pro['product_number'];
        $pro_desc = $row_pro['product_desc'];

        echo "
              <div class='col-sm-12 col-md-6 col-lg-4 mt-3'>
              <div class='jumbo-bg-color m-0 p-3'>
              <img src='admin/product_images/$pro_image' style='width: 100%; height: 200px; object-fit: cover;'/>
              <h5 class='font-size-20'><span class='font-weight-bolder font-rubik'>$pro_title</span><br> <span class='font-size-20'>$pro_number</span></h5>
              <p class='font-size-14'>
                 $pro_desc
              </p>
              <div class='rating text-warning font-size-12'>
              <span><i class='fas fa-star'></i></span>
              <span><i class='fas fa-star'></i></span>
              <span><i class='fas fa-star'></i></span>
              <span><i class='fas fa-star'></i></span>
              <span><i class='far fa-star'></i></span>
              <span class='font-size-16 ml-2 font-rale color-primary font-weight-bolder'>4.05</span>
              </div>
              <div class='price font-weight-bolder'>
                <p><span>₦</span>$pro_price</p>
               </div>
              <a href='product.php?pro_id=$pro_id'><button class='button button-product-white font-rubik font-size-12 color-secondary font-weight-bold'>Details</button></a>
              <a href='cart.php?add_cart=$pro_id'><button class='button button-product-red font-rubik font-size-12 color-light font-weight-bold'><i class='fas fa-shopping-cart mr-2'></i>Add To Cart</button></a>
              </div>
              </div>
        
        ";
    }
   }
  }
}

function getCatPro() {

    if (isset($_GET['cat'])) {

        $cat_id = $_GET['cat'];

        global $con;

        $get_cat_pro = "select * from products where product_cat='$cat_id'";

        $run_cat_pro = mysqli_query($con, $get_cat_pro);

        $count_cats = mysqli_num_rows($run_cat_pro);

        if($count_cats==0) {
            echo "<h2 style='color: #bd3a3a;'>No products where found in this category</h2>";
        }

            while($row_cat_pro=mysqli_fetch_array($run_cat_pro)) {
                $pro_id = $row_cat_pro['product_id'];
                $pro_cat = $row_cat_pro['product_cat'];
                $pro_brand = $row_cat_pro['product_brand'];
                $pro_title = $row_cat_pro['product_title'];
                $pro_price = $row_cat_pro['product_price'];
                $pro_image = $row_cat_pro['product_image'];
                $pro_number = $row_cat_pro['product_number'];
                $pro_desc = $row_cat_pro['product_desc'];

                echo "
                <div class='col-sm-12 col-md-6 col-lg-4 mt-3'>
                <div class='jumbo-bg-color m-0 p-3'>
                <img src='admin/product_images/$pro_image' style='width: 100%; height: 200px; object-fit: cover;'/>
                <h5 class='font-size-20'><span class='font-weight-bolder font-rubik'>$pro_title</span><br> <span class='font-size-20'>$pro_number</span></h5>
                <p class='font-size-14'>
                   $pro_desc
                </p>
                <div class='rating text-warning font-size-12'>
                <span><i class='fas fa-star'></i></span>
                <span><i class='fas fa-star'></i></span>
                <span><i class='fas fa-star'></i></span>
                <span><i class='fas fa-star'></i></span>
                <span><i class='far fa-star'></i></span>
                <span class='font-size-16 ml-2 font-rale color-primary font-weight-bolder'>4.05</span>
                </div>
                <div class='price font-weight-bolder'>
                  <p><span>₦</span>$pro_price</p>
                 </div>
                <a href='product.php?pro_id=$pro_id'><button class='button button-product-white font-rubik font-size-12 color-secondary font-weight-bold'>Details</button></a>
                <a href='cart.php?add_cart=$pro_id'><button class='button button-product-red font-rubik font-size-12 color-light font-weight-bold'><i class='fas fa-shopping-cart mr-2'></i>Add To Cart</button></a>
                </div>
                </div>
                
                
                
                ";
            }
    }
}


/*function getBrandPro() {

    if (isset($_GET['cat'])) {

        $brand_id = $_GET['brand'];

        global $con;

        $get_brand_pro = "select * from products where product_brand='$brand_id'";

        $run_brand_pro = mysqli_query($con, $get_brand_pro);

        $count_brands = mysqli_num_rows($run_brand_pro);

        if($count_brands==0) {
            echo "<h2 style='color: #bd3a3a;'>No products associated with this brand</h2>";
        }

            while($row_brand_pro=mysqli_fetch_array($run_brand_pro)) {
                $pro_id = $row_brand_pro['product_id'];
                $pro_cat = $row_brand_pro['product_cat'];
                $pro_brand = $row_brand_pro['product_brand'];
                $pro_title = $row_brand_pro['product_title'];
                $pro_price = $row_brand_pro['product_price'];
                $pro_image = $row_brand_pro['product_image'];

                echo "
                    <div style='margin-right: 20px;'>

                    <img src='admin/product_images/$pro_image' width='180' height='180' />
                    <h5 style='font-weight: bolder'>$pro_title</h5>
                    <p style='font-weight: bolder;'><span>₦</span>$pro_price</p>
                    <a href='product.php?pro_id=$pro_id'><button style='width: 120px; height: 40px; background-color: #fff; color: #bd3a3a; border: 1px solid #bd3a3a; border-radius: 10px; margin-bottom: 15px; padding-left: 5px; padding-right: 5px;'>Details</button></a>
                    <a href='index.php?pro_id=$pro_id'><button style='width: 120px; height: 40px; background-color: #bd3a3a; color: #fff; border: none; border-radius: 10px; margin-bottom: 15px; padding-left: 5px; padding-right: 5px;'><i class='fas fa-shopping-cart mr-2'></i>Add To Cart</button></a>
                    </div>
                
                
                
                ";
            }
    }
}*/
?>