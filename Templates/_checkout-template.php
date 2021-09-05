
<section>
    <div class="container">
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
                      <button type="submit" name="payment-check" class="btn btn-block color-light w-75 mt-5" style="background-color: #bd3a3a;">Make Payment</button>
                    </center>
                    
            </form>
            </div>
    </div>
</section>