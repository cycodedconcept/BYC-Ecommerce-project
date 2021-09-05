
<section class="mt-5">
        <div class="d-block d-md-block d-lg-block">
        <div class="container">
            <div class="jumbotron jumbo-bg-color">
            <h2 class="font-weight-bolder font-size-20">All Products</h2>
            <div id="myBtnContainer" class="text-right">
                <button class="btn" onclick="filterSelection('all')"><img src="assets/images/view-grid.png"></button>
                <button class="btn active" onclick="filterSelection('men')"><img src="assets/images/view-list.png"></button>
                <!--<button class="btn" onclick="filterSelection('women')">Women</button>
                <button class="btn" onclick="filterSelection('children')"> Children</button>-->
            </div>

            <div>
                <div class="row">
                <?php getPro(); ?>
                <?php getCatPro();?>
                <?php cart();?>

                </div>
            </div>

            <hr>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true" class="color-primary font-weight-bolder"><</span>
                    <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link color-primary font-weight-bolder" href="#">1</a></li>
                <li class="page-item"><a class="page-link color-primary font-weight-bolder" href="#">2</a></li>
                <li class="page-item"><a class="page-link color-primary font-weight-bolder" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true" class="color-primary font-weight-bolder">></span>
                    <span class="sr-only">Next</span>
                    </a>
                </li>
                </ul>
            </nav>
            </div>
        </div>
        </div>
</section>



