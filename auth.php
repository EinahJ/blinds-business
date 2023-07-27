<?php

session_start();

include ("connection.php");
include ("function.php");

// Check if the user is logged in and get user data and profile link
$check_login_result = check_login($con);

$profile_link = $check_login_result['profile_link'];
$user_data = $check_login_result['user_data'];

?>