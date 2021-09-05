<?php
$con = mysqli_connect("localhost", "root", "", "ecommerce");
if ($con) {
    echo "connected";
}else {
    echo "not connected";
}

?>