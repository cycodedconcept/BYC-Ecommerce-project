<section>
    <div class="container m-auto">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <h2 class="font-weight-bolder text-center mt-5">Customers Details</h2>
                <form method="post" enctype="multipart/form-data" style="margin-top: 12%;" class="w-75">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Customer Name:</label>
                        <input type="text"  name="c_name" class="form-control form-border-outline rounded" required/>
                    </div>
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Customer Email:</label>
                        <input type="email"  name="c_email" class="form-control form-border-outline rounded" required/>
                    </div>
                    <!-- company input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Customer Password:</label>
                        <input type="password"  name="c_pass" class="form-control form-border-outline rounded" required/>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Customer Image:</label>
                        <input type="file"  name="c_image" class="form-control" required/>
                    </div>
                    <!-- company input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Customer Country:</label>
                        <input type="text"  name="c_country" class="form-control form-border-outline rounded" required/>
                    </div>
                    <!-- Email input -->
                    <!-- company input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Customer_city:</label>
                        <input type="text"  name="c_city" class="form-control form-border-outline rounded" required/>
                    </div>
                    <!-- Email input -->
                    <!-- company input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Customer Contact:</label>
                        <input type="text"  name="c_contact" class="form-control form-border-outline rounded" required/>
                    </div>
                    <!-- Email input -->
                    <!-- company input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Customer Address:</label>
                        <input type="text"  name="c_address" class="form-control form-border-outline rounded" required/>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="register" class="btn btn-block color-light" style="background-color: #bd3a3a;">Submit</button>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
            <h2 class="font-weight-bolder text-center mt-5">Checkout</h2>
            <form method="post" style="margin-top: 20%; background-color: #fcd2d2;"class="p-5">
                <!-- Default radio -->
                    <div class="form-check">
                       <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" style="width: 20px; height: 20px;" checked/>
                       <label class="form-check-label font-size-16 ml-3" for="flexRadioDefault1"> Direct Bank Transfer </label>
                       <p class="font-size-14 font-rale font-weight-bold jumbo-bg-color2 p-3 mt-3">
                            Make your payment directly into our bank account. 
                            Please use your Order ID as the payment reference. 
                            Your order will not be shipped until the funds have cleared in our account.
                       </p>

                       <div class="row mb-4">
                            <div class="col">
                            <div class="form-outline">
                            <input class="form-check-input" disabled type="radio" name="flexRadioDefault" id="flexRadioDefault1" style="width: 20px; height: 20px;"/>
                            <label class="form-check-label font-size-16 ml-3" for="flexRadioDefault1"> Secured Online Payment </label>
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-outline">
                                <a href="paystack.php"><div class="in-box" style="width: 200px; height: 50px; background: url(assets/images/paystack.jpg) no-repeat center /cover; border-radius: 20px;"></div></a>
                            </div>
                            </div>
                        </div>
                        <p class="font-size-14 font-rale font-weight-bold jumbo-bg-color2 p-3 mt-3">
                            Your personal data will be used to process your order, support your experience throughout 
                            this website, and for other purposes described in our privacy policy.
                        </p>
                    </div>
                    <center>
                      <button type="submit" name="payment-check" class="btn btn-block color-light w-75 mt-5" style="background-color: #bd3a3a;"><a href="payment_details.php">Make Payment</a></button>
                    </center>
                    
            </form>
            </div>
        </div>
    </div>
</section>

<?php
if(isset($_POST['register'])) {
    $ip = getIp();

    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

    $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) 
    values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

    $run_c = mysqli_query($con, $insert_c);

    $sel_cart = "select * from cart where ip_add='$ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_cart==0) {

        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('Account has been created successfully')</script>";
        echo "<script>window.open('payment_details.php','_self')</script>";
    }else {
        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('Account has been created successfully')</script>";
        echo "<script>window.open('payment_details.php','_self')</script>";
    }



}

?>