<?php
$product_shuffle = $product->getData();

?>
<section6 id="category">
        <div class="container py-5">
            <h2 class="font-baloo text-center font-weight-bolder">Shop By Category</h2>
            <!--owl carousel-->
            <div class="owl-carousel owl-theme">
                <?php foreach($product_shuffle as $item) {?>
                <div class="item py-2">
                    <div class="product font-rale p-2">
                        <a href="#"><img src="<?php echo $item['item_image']?? "assets/images/products/ded9.jpg";?>" alt="ts2.jpg" class="img-fluid"></a>
                        <div>
                            <h4 class="font-size-14 text-center">
                                <span class="font-weight-bolder mr-2"><?php echo $item['item_name']??"Unknown"; ?></span> 
                                <span class="font-size-12"><?php echo $item['item_number']??"Unknown"; ?></span>
                            </h4>
                            <div class="price text-center">
                                <span>₦<?php echo $item['item_price']??'0'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }// closing foreach function ?>
            </div>
            <!--!owl carousel-->
            <center class="mt-5">
                <button class="button button-dark font-rubik font-size-12">view all</button>
            </center>
        </div>
    </section>
