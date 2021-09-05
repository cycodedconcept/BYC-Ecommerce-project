
<section class="mt-5">
        <div class="d-block d-md-block d-lg-block">
        <div class="container">
            <div class="jumbotron jumbo-bg-color">
            <h2 class="font-weight-bolder font-size-20">All Products</h2>
            <div id="myBtnContainer" class="text-right">
                <button class="btn" onclick="filterSelection('all')"><img src="assets/images/view-grid.png"></button>
                <button class="btn active" onclick="filterSelection('men')"><img src="assets/images/view-list.png"></button>
                <!--<button class="btn" onclick="filterSelection('women')">Women</button>
                <button class="btn" onclick="filterSelection('children')"> Children</button>-->
            </div>

            <div>
                <div class="row" id="product_box">
                    <?php
                    if(isset($_GET['search'])) {
                        $search_query = $_GET['user_query'];
                        
                        $get_pro = "select * from products where product_title like '%$search_query%'";

                        $run_pro = mysqli_query($con, $get_pro);
                    
                        while($row_pro=mysqli_fetch_array($run_pro)) {
                            $pro_id = $row_pro['product_id'];
                            $pro_cat = $row_pro['product_cat'];
                            $pro_brand = $row_pro['product_brand'];
                            $pro_title = $row_pro['product_title'];
                            $pro_price = $row_pro['product_price'];
                            $pro_image = $row_pro['product_image'];
                    
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
                    ?>
                </div>
            </div>

            <hr>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true" class="color-primary font-weight-bolder"><</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link color-primary font-weight-bolder" href="#">1</a></li>
                <li class="page-item"><a class="page-link color-primary font-weight-bolder" href="#">2</a></li>
                <li class="page-item"><a class="page-link color-primary font-weight-bolder" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true" class="color-primary font-weight-bolder">></span>
                    <span class="sr-only">Next</span>
                    </a>
                </li>
                </ul>
            </nav>
            </div>
        </div>
        </div>
    </section>