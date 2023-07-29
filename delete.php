<?php

if (isset($_GET["product_no"])) {
    $product_no = $_GET["product_no"];

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "eca";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    $sql = "DELETE FROM products WHERE product_no=$product_no";
    $con->query($sql);
}
header("location: ADproduct.php");
?>
