<?php

include ("auth.php");

?>

<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
  <link rel="stylesheet" type="text/css" href="style.css">
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

    .logo img {
      height: 250px;
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
    
    .profile-section {
      max-width: 600px;
      margin: 50px;
      padding: 20px;
      text-align: left;
    }

    .profile-section h1 {
      font-family: 'Montserrat', sans-serif;
      margin-bottom: 40px;
    }

    .profile-info {
      margin-bottom: 20px;
    }

    .info-row {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .info-label {
      font-family: 'Montserrat', sans-serif;
      font-weight: bold;
      width: 130px;
    }

    .info-value {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      margin: 20px 0px 20px 25px;
    }

    .profile-buttons {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      margin-top: 35px;
    }

    .edit-profile-button {
      padding: 10px 63px;
      background-color: black;
      color: #fff;
      border: none;
      font-size: 14px;
      cursor: pointer;
      margin-bottom: 15px; 
    }

    .change-password-button {
      padding: 10px 40px;
      background-color: black;
      color: #fff;
      border: none;
      font-size: 14px;
      cursor: pointer;
      margin-bottom: 15px; 
    }

    .logout-button {
      padding: 10px 75px;
      background-color: black;
      color: #fff;
      border: none;
      font-size: 14px;
      cursor: pointer;
      margin-bottom: 15px; 
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

  <div class="profile-section">
    <h1>My Profile</h1>
    <div class="profile-info">
      <div class="info-row">
        <div class="info-label">Name</div>
        <div class="info-value"><?php echo $user_data['name']; ?></div>
      </div>
      <div class="info-row">
        <div class="info-label">Email</div>
        <div class="info-value"><?php echo $user_data['email']; ?></div>
      </div>
      <div class="info-row">
        <div class="info-label">Contact</div>
        <div class="info-value"><?php echo $user_data['contact']; ?></div>
      </div>
      <div class="info-row">
        <div class="info-label">Address</div>
        <div class="info-value"><?php echo $user_data['address']; ?></div>
      </div>
    </div>

    <div class="profile-buttons">
      <a href="editprofile.php">
        <button class="edit-profile-button">Edit Profile</button>
      </a>
      <a href="changepass.php">
        <button class="change-password-button">Change Password</button>
      </a>
      <a href="logout.php">
        <button class="logout-button">Logout</button>
      </a>
    </div>
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
</body>
</html>
