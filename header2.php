<?php
include("functions/functions.php");
include("includes/config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About BYC</title>

  <!--Boostrap CDN-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!--OWL Carousel-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  <!--Font awesome icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!--Custom css-->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!--start#header section-->
  <header id="header">
      <!--Primary Navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-color">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
          <li class="nav-item">
                  <a class="nav-link font-size-14 text-light" href="index.php">Home</a>
          </li>
          <ul id="cats" class="list-unstyled navbar-nav">
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link text-light dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop Products</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php getCats();?>
                      <?php cart();?>
                    </div>
                  </li>
                </ul>
              <li class="nav-item">
                  <a class="nav-link font-size-14 text-light" href="#">Blog</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link font-size-14 text-light" href="#">FAQ</a>
              </li>
          </ul>

            <a class="navbar-brand m-auto" href="#"><img src="assets/images/LOGO2.png" alt="logo"></a>
            <form class="form-inline my-2 my-lg-0 d-none">
              <input class="form-control mr-sm-2" name="user_query" type="search" placeholder="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit"><img src="assets/images/search2.png" alt="search"></button>
            </form>

            <ul class="navbar-nav">

                <li class="nav-item">
                  <a href="about.php" class="nav-link font-size-14 text-light">About us</a>
                </li>
                <li class="nav-item">
                  <a href="contact.php" class="nav-link font-size-14 text-light">Contact</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link"><img src="assets/images/search2.png" alt="search"></a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link"><img src="assets/images/user2.png" alt="search"></a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link"><img src="assets/images/heart2.png" alt="search"></a>
                </li>
                <li class="nav-item">
                 <a href="cart.php" class="nav-link"><img src="assets/images/cart2.png" alt="cart2.png">
                 <span class="font-weight-boder font-size-14 color-light" style="border-radius: 50%; padding: 2px 10px; background-color: #f75555;"><?php total_items()?></span></a>
                </li>

            </ul>
          </div>
        </nav>
      <!--End primary Navigation-->
  </header>
  <!--closing#header section-->
  <main>