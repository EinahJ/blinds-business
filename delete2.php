<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "eca";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    $sql = "DELETE FROM notif WHERE id=$id";
    $con->query($sql);
}
header("location: ADnotiff.php");
?>