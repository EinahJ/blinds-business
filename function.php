<?php

function check_login($con)
{
    $user_data = array(); // Initialize an empty array to store the user data

    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM user WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
        }
    }

    // Determine the profile link based on the login status
    $profile_link = isset($_SESSION['user_id']) ? "profile.php" : "login.php";

    $profile_link1 = isset($_SESSION['user_id']) ? "support.php" : "login.php";

    $profile_link2 = isset($_SESSION['user_id']) ? "schedule.php" : "login.php";

    // Return both the user data and profile link as separate values
    return array('user_data' => $user_data, 'profile_link' => $profile_link, 'profile_link1' => $profile_link1, 'profile_link2' => $profile_link2);
}


//validations
function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function isValidName($name)
{
    return preg_match('/^[a-zA-Z.\s]+$/', $name) === 1;
}

function isValidContact($contact)
{
    return preg_match('/^[0-9+() -]+$/', $contact) === 1;
}

/*
function isValidAddress($address)
{
    return true;//no validations required here. Can be extended later as per requirements of project/client
}


function isValidPassword($password)
{
    return strlen($password) >= 8;
}
*/
//number generator
function random_num($length)
{
    $text = "";

    for($i = 0; $i < $length; $i++)
    {
        $text .= rand(0,9);
    }

    return $text;
}