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
        header("location: admin/dashboard.php");
    }
}

?>
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

                    <button type="submit" name="login" class="btn btn-block color-light" style="background-color: #bd3a3a;">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</section>