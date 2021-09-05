
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <h2 class="font-weight-bolder text-center">Login</h2>
                <form method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Email address</label>
                        <input type="email" id="form4Example2" name="email" class="form-control form-border-outline" required/>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example1">Password</label>
                        <input type="password" id="form4Example1" name="pass" class="form-control form-border-outline" required/>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">

                        <div class="col">
                            <!-- Simple link -->
                            <a href="checkout.php?forgot_pass" class="text-decoration-none color-primary">Forgot password?</a>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="login" class="btn btn-block color-light" style="background-color: #bd3a3a;">Login</button>
                </form>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6">
              <h2 class="font-weight-bolder text-center">Create your account</h2>
              <P class="text-center font-rale font-size-14">
                Create your customer account in just a few clicks!<br> 
                You can register either using your e-mail address 
              </P><br><br><br><br><br><br><br><br>
              <form>
                    <!-- create account -->
                    <button type="submit" class="btn color-light btn-block mb-4" style="background-color: #bd3a3a;">Click to create your account</button>
              </form>
            </div>
        </div>
    </div>
</section>

<?php
if(isset($_POST['login'])) {
    $c_email = $_POST['email'];
    $c_pass = $_POST['pass'];

    $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";

    $run_c = mysqli_query($con, $sel_c);

    $check_customer = mysqli_num_rows($run_c);

    if($check_customer==0) {
        echo "<script>alert('password or email is incorrect')</script>";
    }

    $ip = getIp();

    $sel_cart = "select * from cart where ip_add='$ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_customer>0 AND $check_cart==0) {
        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('You logged in successfully')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    }else {
        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('You logged in successfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
}


?>