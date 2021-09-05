        <?php
          $category = array_map(function ($cat){ 
            return $cat['item_category'];
        }, $Category_shuffle);

        $unique = array_unique($category);
        sort($unique);
        shuffle($Category_shuffle);

        //request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['top_sale_submit'])){
    // call method add to cart
    $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
  }
}

        $in_cart = $Cart->getCartId($product->getData('cart'));
        
        ?>

        
        
        
        <!-- Special Price -->
        <section id="special-price">
            <div class="container">
              <h4 class="font-rubik font-size-20">Special Price</h4>
              <div id="filters" class="button-group text-right font-baloo font-size-16">
                <button class="btn is-checked" data-filter="*">All Brand</button>
                <?php
                    array_map(function ($category){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $category, $category);
                    }, $unique);
                ?>
              </div>

              <div class="grid">
                <?php array_map(function($item) use($in_cart){ ?>
                <div class="grid-item <?php echo $item['item_category'] ?? "Category"; ?>">
                 <div class="item py-2" style="width: 200px;">
                  <div class="product font-rale p-3">
                  <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image']??"assets/images/products/ded9.png";?>" alt="ded9.png" class="img-fluid"></a>
                    <div class="text-center">
                      <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                      <h6><?php echo $item['item_number'] ?? "Unknown";?></h6>
                      <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                      </div>
                      <div class="price py-2">
                        <span>₦<?php echo $item['item_price'] ?? 0; ?></span>
                      </div>
                      <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']??'1';?>">
                        <input type="hidden" name="user_id" value="<?php echo 1;?>">
                        <?php
                        if (in_array($item['item_id'], $in_cart ?? [])) {
                          echo '<button class="btn btn-success font-size-12" disabled><i class="fa fa-shopping-cart mr-2"></i>In the cart</button>';
                        }else{
                          echo '<button name="top_sale_submit" class="btn btn-warning font-size-12"><i class="fa fa-shopping-cart mr-2"></i>Add to cart</button>';
                        }
                        ?>
                        <!--<button type="submit" name="wishlist-submit" class="button button-product-white font-rubik font-size-12 color-secondary font-weight-bold">Save for Later</button>-->
                      </form>
                    </div>
                  </div>
                </div>
                </div>
                <?php }, $Category_shuffle)?>
              </div>
            </div>
          </section>
        <!-- !Special Price -->