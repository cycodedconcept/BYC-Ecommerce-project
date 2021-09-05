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
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/admin.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
    crossorigin="anonymous"></script>
</head>

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
          <a href="insert_product.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
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
                <h2 class="text-center">Customer Details</h2>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>ip</th>
                  <th>name</th>
                  <th>email</th>
                  <th>country</th>
                  <th>city</th>
                  <th>contact</th>
                  <th>address</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $records = mysqli_query($con, "select * from customers");
                while($data = mysqli_fetch_array($records))
                {
                ?>
                <tr>
                   <td><?php echo $data['customer_ip'];?></td>
                   <td><?php echo $data['customer_name'];?></td>
                   <td><?php echo $data['customer_email'];?></td>
                   <td><?php echo $data['customer_country'];?></td>
                   <td><?php echo $data['customer_city'];?></td>
                   <td><?php echo $data['customer_contact'];?></td>
                   <td><?php echo $data['customer_address'];?></td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
        </div>
      </div>        
    </section>

    <section>
      <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="text-center">Cart Details</h2>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>p_id</th>
                  <th>ip_add</th>
                  <th>Qty</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $records = mysqli_query($con, "select * from cart");
                while($data = mysqli_fetch_array($records))
                {
                ?>
                <tr>
                   <td><?php echo $data['p_id'];?></td>
                   <td><?php echo $data['ip_add'];?></td>
                   <td><?php echo $data['qty'];?></td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
        </div>
      </div>        
    </section>



    </div>
  </main>
  <!--Main layout-->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="js/admin.js"></script>

</body>

</html>