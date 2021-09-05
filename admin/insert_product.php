<?php

require("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Material Design for Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/admin.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
    crossorigin="anonymous"></script>
</head>db

<body>
  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
        <a href="dashboard.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Upload</span>
          </a>
          <a href="logout.php" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-lock fa-fw me-3"></i><span>Logout</span></a>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="#">
          <img src="../assets/images/me.png" height="25" alt="" loading="lazy" />
        </a>

      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">
    <section>
      <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="text-center">Inserting Products</h2>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            <table class="table">
              <thead>
                <tr>
                    <td><h2>Insert New Post Here</h2></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td class="font-weight-bold" style="font-size: 15px;">Product Title:</td>
                    <td><input type="text" name="product_title" size="60" style="border-radius: 20px;" required></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" style="font-size: 15px;">Product Category:</td>
                    <td>
                        <select name="product_cat" required>
                            <option>--Select a Category--</option>
                            <?php
                                $get_cats = "select * from categories";

                                $run_cats = mysqli_query($con, $get_cats);
                            
                                while ($row_cats=mysqli_fetch_array($run_cats)) {
                                    $cat_id = $row_cats['cat_id'];
                                    $cat_title = $row_cats['cat_title'];
                            
                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                            
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold" style="font-size: 15px;">Product Brand:</td>
                    <td>
                        <select name="product_brand" required>
                            <option>--Select a Brand--</option>
                            <?php
                                $get_brands = "select * from brands";

                                $run_brands = mysqli_query($con, $get_brands);

                                while ($row_brands=mysqli_fetch_array($run_brands)) {
                                    $brand_id = $row_brands['brand_id'];
                                    $brand_title = $row_brands['brand_title'];

                                    echo "<option>$brand_title</option>";
                                }
                            
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold" style="font-size: 15px;">Product Image:</td>
                    <td><input type="file" name="product_image" required></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" style="font-size: 15px;">Product Price:</td>
                    <td><input type="text" name="product_price" size="60" style="border-radius: 20px;" required></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" style="font-size: 15px;">Product Description:</td>
                    <td><textarea id ="mytextarea" name="product_desc" col="20" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td class="font-weight-bold" style="font-size: 15px;">Product Number:</td>
                    <td><input type="text" name="product_number" size="60" style="border-radius: 20px;" required></td>
                </tr>
                <tr>
                    <td><button class="btn btn-success btn-lg" name="insert_post">Insert Product Details</button></td>
                </tr>
              </tbody>
            </table>
            </form>
        </div>
      </div>        
    </section>



    </div>
  </main>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/admin.js"></script>
</body>
</html>
<?php
if (isset($_POST['insert_post'])) {

  // getting the text data from the fields
  $product_cat = $_POST['product_cat'];
  $product_title = $_POST['product_title'];
  $product_brand = $_POST['product_brand'];
  $product_price = $_POST['product_price'];
  $product_desc = $_POST['product_desc'];
  $product_number = $_POST['product_number'];

  // getting the image from field
  $product_image = $_FILES['product_image']['name'];
  $product_image_tmp = $_FILES['product_image']['tmp_name'];

  move_uploaded_file($product_image_tmp,"product_images/$product_image");

  $insert_product = "INSERT INTO `products` (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_number) VALUES ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_number')";


  $insert_pro = mysqli_query($con, $insert_product);


 if ($insert_pro) {
      echo "<script>alert('Product HaS been inserted!')</script>";
      echo "<script>window.open('insert_product.php', '_self')</script>";
  }
}





?>

