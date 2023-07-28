<?php
include ("auth.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get the user_id from the session
    $user_id = $_SESSION['user_id'];

    $old_password = $_POST['password'];
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];

    // Validate the passwords
    if ($new_password !== $confirm_password) {
        echo "New password and confirm password do not match.";
    } else 
    {
        // Check if the old password matches the one in the database
        $check_query = "SELECT password FROM user WHERE user_id = ?";
        $check_stmt = mysqli_prepare($con, $check_query);
        mysqli_stmt_bind_param($check_stmt, "i", $user_id);
        mysqli_stmt_execute($check_stmt);
        mysqli_stmt_bind_result($check_stmt, $stored_password);

        // Store the result set in memory
        mysqli_stmt_store_result($check_stmt);

        // Fetch the result
        mysqli_stmt_fetch($check_stmt);

        if (password_verify($old_password, $stored_password)) {
            // Old password matches, update the new password in the database
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_password_query = "UPDATE user SET password = ? WHERE user_id = ?";
            $update_password_stmt = mysqli_prepare($con, $update_password_query);
            mysqli_stmt_bind_param($update_password_stmt, "si", $hashed_password, $user_id);
            mysqli_stmt_execute($update_password_stmt);

            header("Location: profile.php");
            die;
        } else {
            echo "Old password is incorrect.";
        }
    }
}
?>




<html>
<head>
  <title>Change Password</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">
  <style>
    * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        transition: all 0.3s ease;
      }

    header {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      height: 60px;
      display: flex;
      align-items: center;
      padding: 0px 20px 20px 0px;
      margin-top: 25px;
      border-bottom: 0.5px solid #c2c2c2; /* Add a thin line at the bottom */
    }

    .head-logo img { /*header business logo*/
            height: 60px;
            margin-left: 20px;
            margin-right: 10px;
    }

    nav ul {
      list-style-type: none;
      display: flex;
    }

    nav ul li {
      margin-right: 15px;
    }

    nav ul li a {
      text-decoration: none;
      color: #333;
    }

    nav ul li a:hover {
      text-decoration: underline;
    }

    .cart-icon {
      font-size: 20px;
      color: black;
      opacity: 70%;
      margin-top: 0.5%;
      margin-left: auto;
    }

    .user-icon {
      font-size: 20px;
      color: black;
      opacity: 70%;
      margin-top: 0.5%;
      margin-left: 15px;
    }

    .container {
      font-family: 'Montserrat', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 90px;
      margin-bottom: 90px;
      height: 50vh;
      position: relative;
    }

    .container h2 {
      font-size: 30px;
      margin-bottom: 15px;
    }

    form input[type="password"] {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      display: block;
      margin: 15px 0;
      padding: 15px 20px;
      width: 350px;
      border: 1px solid #333;
    }

    .create-button {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      display: block;
      margin: 20px auto;
      padding: 10px 30px;
      background-color: black;
      color: white;
      border: none;
      font-size: 12px;
      cursor: pointer;
    }

    .cancel-button {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      display: block;
      margin: 20px auto;
      padding: 10px 23px;
      background-color: white;
      color: black;
      border-style: solid, 1px;
      font-size: 12px;
      cursor: pointer;
    }

    .button-div {
      display: flex;
      flex-wrap: wrap;
    }

    .social-icons {
      position: absolute;
      bottom: -40px;
      right: 30px;
    }

    .social-icons i {
      font-size: 24px;
      color: black;
      margin: 5px;
    }

    footer {
      color: black;
      padding: 50px;
      padding-top: 20px;
      margin-left: 1px;
      border-top: 0.5px solid #c2c2c2; /* Add a thin line at the top */
    }

    .footer-column {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      width: 33.33%;
      float: left;
    }

    .footer-column h3 {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .footer-column ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .footer-column li {
      margin-bottom: 8px;
    }

    .footer-column a {
      color: #333;
      text-decoration: none;
    }

    .footer-column a:hover {
      text-decoration: underline;
    }

  </style>
</head>

<body>
  <header>
    <a href="index.php" class="logo">
      <img src="img/logo.png" alt="Logo">
    </a>

    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="contactus.php">Contacts</a></li>
        <li><a href="quote.php">Request a Quote</a></li>
      </ul>
    </nav>

    <a href="cart.php" class="cart-icon">
      <i class="fa fa-shopping-cart"></i>
    </a>

    <a href="MyProfile.php" class="user-icon">
      <i class="fa fa-user"></i>
    </a>
  </header>

  <div class="container">
    <h2>Change Password</h2>
    <form method = "POST">
      <input type="password" id="password" name="password" placeholder="Old Password" >
      <input type="password" id="new-password" name="new-password" placeholder="New Password" required>
      <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm New Password" required>
      <div class="button-div">
        <button type="submit" class="create-button">Save</button>
        <button type="button" class="cancel-button" onclick="window.location.href='profile.php';">Cancel</button>
      </div>

      <div class="social-icons">
        <i class="fab fa-twitter"></i>
        <i class="fab fa-facebook"></i>
        <i class="fab fa-instagram"></i>
      </div>
    </form>
  </div>

  <footer>
    <div class="footer-column">
      <h3>Customer Items</h3>
      <ul>
        <li><a href="FAQ.php">FAQs</a></li>
        <li><a href="refund.php">Return/Refund Policy</a></li>
        <li><a href="sizechart.php">Size Chart</a></li>
        <li><a href="terms.php">Terms of Service</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h3>Work with Us</h3>
      <ul>
        <li>Are you a business/brand that wants to work<br>with us?</li>
        <li><a href="partnership.php">B2B & Brand Contact Form</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h3>Contact Support</h3>
      <ul>
        <li>Hours: Mon-Sat 1PM - 9PM PST</li>
        <li><a href="contactus.php">Contact Us</a></li>
      </ul>
    </div>
  </footer>
  <script src="script.js"></script>
</body>

</html>