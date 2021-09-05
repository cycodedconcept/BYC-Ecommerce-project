<?php
ob_start();
$con = mysqli_connect("localhost", "root", "", "ecommerce");


if(isset($_POST['login'])) {
    $c_user = $_POST['username'];
    $c_pass = $_POST['password'];

    $sel_c = "select * from admin where username='$c_user' AND password='$c_pass'";

    $run_c = mysqli_query($con, $sel_c);

    $check_customer = mysqli_num_rows($run_c);

    if($check_customer==0) {
        header("location: dashboard.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>

  <!--Boostrap CDN-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!--OWL Carousel-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--Font awesome icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!--Custom css-->
  <link rel="stylesheet" href="style.css">


</head>
<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 offset-lg-3 col-lg-6">
                <h2 class="font-weight-bolder text-center">Admin Login</h2>
                <form method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Username</label>
                        <input type="text" id="form4Example2" name="username" class="form-control form-border-outline" />
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example1">Password</label>
                        <input type="password" name="password" id="form4Example1" class="form-control form-border-outline" />
                    </div>

                    <button type="submit" name="login" class="btn btn-block " style="background-color: #bd3a3a; color: #fff;">Login</button>
                    <button type="submit" class="btn btn-block color-light" style="background-color: #bd3a3a; color: #fff;"><a href="../index.php">home</a></button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>