<!DOCTYPE html>
<html>
<head>
    <title>ECA | Measurement</title>
    <link rel="icon" type="image/x-icon" href="img/favcon.png">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Crushed" />
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
            height: 60px;
            display: flex;
            align-items: center;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        footer {
        background-color: #333;
        color: #fff;
        padding: 20px 20px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .contacts {
        flex: 1;
        max-width: 20%;
        margin-left: 50px;
        margin-right: 300px;
    }

    .contactsHead {
        display: flex;
        align-items: center;
        padding-bottom: 10px;
        border-bottom: 1px solid white;
    }

    .footer-logo img {
        width: 55px;
        height: 55px;
        margin-right: 10px;
    }

    .contactdesc h5 {
        font-size: 25px;
    }

    .contactdesc p {
        font-size: 15px;
    }

    .contacts h6 {
        font-size: 13px;
        margin: 10px 0;
    }

    .contactInfo {
        margin-top: 10px;
        border-top: 1px solid white;
        padding-top: 10px; /* Add padding to the top */
    }

    .contactInfo i {
        margin-right: 5px;
        margin-bottom: 10px;
    }

    .contactInfo span {
        font-size: 12px;
    }

    .newsletter {
        flex: 1;
        max-width: 16%;
        text-align: left;
        margin-right: 320px;
    }

    .newsletter .news-head{
        display: flex;
    }

    .newsletter p {
        font-size: 25px;
        margin-right: 10px;

    }

    .newsletter i{
        font-size: 20px;
        margin-top: 7px;
        margin-right: 10px;
    }

    .gallery {
        flex: 1;
        max-width: 10%;
    }

    .gallery p{
        font-size: 25px;
        margin-bottom: 10px;
        border-bottom: 1px solid white;
        padding-bottom: 10px;
    }
    .gallery a:hover{
        color: #FFDB58;
    }

    .gallery a{
        font-size: 15px;
        margin-bottom: 5px;
    }

        .popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
}

.popup-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 30px 45px 30px 30px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.popup h2 {
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}

.popup label {
    display: block;
    margin-bottom: 5px;
}

.popup input[type="text"],
.popup input[type="number"],
.popup input[type="date"],
.popup select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

.popup input[type="submit"],
.popup button {
    padding: 12px 20px;
    background-color: #af733f;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.popup button {
    background-color: #af733f;
    margin-top: 10px;
}

        .head-logo img { /*header business logo*/
            height: 60px;
            margin-left: 20px;
            margin-right: 10px;
        }

        .bus-name { /*ECA BLINDS*/
            margin-right: 100px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        nav ul {
            list-style-type: none;
            display: flex;
        }

        nav ul li { /*nav buttons (e.g home, products)*/
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 20px;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .cart-icon {
            font-size: 35px;
            color: black;
            margin-left: auto;
            margin-right: 25px;
        }

        .menu-icon {
            font-size: 35px;
            color: black;
            margin-left: auto;
            margin-right: 35px;
        }

        #menuContainer {
            position: absolute;
            top: 80px;
            right: 45px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1;
        }

        .menuHeader { /*logo and close button*/
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .menuLogo {
            width: 30px;
            height: 30px;
        }

        #closeMenuBtn {
            background: none;
            border: none;
            cursor: pointer;
            color: #af733f;
        }

        .menuList {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menuList li {
            padding: 15px 25px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .menuList li:last-child {
            border-bottom: none;
        }

        .menuList li i {
            margin-right: 12px;
        }

        .menuList li:hover {
            background-color: #f2f2f2;
        }

        a {
            color: inherit;
            display: inline-block;
        }

        .illustration-title {
            text-align: center;
            margin-bottom: 20px;
            position: relative; /* Required for pseudo-elements */
            font-size: 30px;
            margin-top: 40px;
        }

        .product-name{
            margin-left: 40px;
            font-size: 40px;
        }
        
        /* Style for the products title text */
        .illustration-title h2 {
            display: inline-block;
            background-color: #fff; /* Set the background color to match the page background */
            padding: 0 10px;
            position: relative; /* Required for pseudo-elements */
        }
        
        /* Style for the left line */
        .illustration-title h2::before {
            content: "";
            position: absolute;
            left: -500px;
            top: 50%;
            transform: translateY(-50%);
            width: 500px; /* Adjust the line width as needed */
            height: 2px;
            background-color: #000; /* Set the line color */
        }
        
        /* Style for the right line */
        .illustration-title h2::after {
            content: "";
            position: absolute;
            right: -500px;
            top: 50%;
            transform: translateY(-50%);
            width: 500px; /* Adjust the line width as needed */
            height: 2px;
            background-color: #000; /* Set the line color */
        }

        .banner{
            background-image: url("img/pic3.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 0%;
            height: 30%;
            padding: 100px 60px;
            text-align: center;
            color: white;
        }

        .banner h1{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 35px;
            margin-bottom: 20px;
        }

        .il-img{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
  width: 100%;
  max-width: 1200px;
  margin: 50px auto;
}

.row {
  display: flex;
}

.box {
  flex: 1;
  padding: 20px;
  text-align: center;
  color: #fff;
  margin-right: 40px;
  margin-bottom: 20px;
}

.step {
  font-size: 24px;
  margin: 0;
  padding: 0;
}

.description {
  font-size: 16px;
  margin: 10px 0;
}


        


        
        
    </style>
</head>
<header>
    <a href="" class="head-logo"><img src="img/ecalogo.png" alt=""></a>
    <h1 class="bus-name">ECA BLINDS</h1>
    <a href="" id="menuBtn" class="menu-icon"><i class="fas fa-bars"></i></a>
    <div id="menuContainer">
        <div class="menuHeader">
            <img class="menuLogo" src="img/Logo.png" alt="Business Logo">
            <button id="closeMenuBtn">Close</button>
        </div>
        <ul class="menuList">
            <li>
                <a href="home.php"><i class="fas fa-home"></i>Home</a>
            </li>
            <li>
                <a href="products.php"><i class="fas fa-box"></i>Products</a>
            </li>
            <li>
                <a href="<?php echo $profile_link; ?>"><i class="fas fa-user"></i>Account</a>
            </li>
            <li>
                <a href="<?php echo $profile_link2; ?>"><i class="fas fa-calendar"></i>Schedule</a>
            </li>
            <li>
                <a href="estimate.php"><i class="fas fa-dollar-sign"></i>Price Estimation</a>
            </li>
            <li>
                <a href="measure.php"><i class="fas fa-ruler"></i>Measurement</a>
            </li>
            <li>
                <a href="<?php echo $profile_link1; ?>"><i class="fas fa-phone"></i>Contact Us</a>
            </li>
        </ul>
    </div>
</header>
<body>

<div id="popupForm" class="popup">
    <div class="popup-content">
        <h2>Schedule Visit</h2>
        <form method="POST" action="schedule.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" required>

            <label for="num_windows">Number of Windows:</label>
            <input type="number" id="num_windows" name="num_windows" min="1" required>

            <label for="date">Date of Visit:</label>
            <input type="date" id="date" name="date" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <input type="submit" value="Schedule Visit">
            <button type="button" id="closePopupBtn">Close</button>
        </form>
    </div>
</div>


<div class="banner">
    <h1>MEASUREMENT GUIDE</h1>
</div>

<div class="illustration-title">
        <h2>Illustration</h2>
</div>

<div class="il-img">
<img src="img/pic10.png" alt="">
</div>

<div class="illustration-title">
        <h2>Step by Step Process</h2>
</div>

<div class="container">
    <div class="row">
      <div class="box" style="background-color: #C6AD7E;">
        <p class="step">Step 1</p>
        <p class="description">You will need a measuring tape marked in "inches", a pen, and a notepad or paper to write down the measurements.</p>
      </div>
      <div class="box" style="background-color: #998156;">
        <p class="step">Step 2</p>
        <p class="description">Start by measuring the width of the window from the inside of the window frame (left side) to the inside of the frame on the opposite side (right side).

Take three measurements: one at the top, one in the middle, and one at the bottom.</p>
      </div>
      <div class="box" style="background-color: #A0824C;">
        <p class="step">Step 3</p>
        <p class="description">Measure the height of the window from the inside of the window frame (top) to the inside of the frame at the bottom.

Take three measurements: one at the top, one in the middle, and one at the bottom</p>
      </div>
    </div>
    <div class="row">
      <div class="box" style="background-color: #B2935B;">
        <p class="step">Step 4</p>
        <p class="description"> Decide whether you want the blinds mounted inside the window frame (inside mount) or outside the frame on the wall (outside mount)</p>
      </div>
      <div class="box" style="background-color: #CBA560;">
        <p class="step">Step 5</p>
        <p class="description">Double-check all your measurements to ensure they are accurate. Mistakes in measurements can lead to ill-fitting blinds.</p>
      </div>
      <div class="box" style="background-color: #725F3D;">
        <p class="step">Step 6</p>
        <p class="description">Once you have your accurate measurements in inches and any additional details, proceed to place your order through the website.</p>
      </div>
    </div>
  </div>



</body>

<footer>
    <div class="contacts">

        <div class="contactsHead">
            <div class="footer-logo">
                <img src="img/Logo.png" alt="">
            </div>
            <div class="contactdesc"> 
            <h5>ECA Blinds<h5>
            <p>Window Blinds Supplier</p>
            </div>
        </div>

        <h6>We are top-tier window blinds supplier and service provider. Let us transform your windows into stunning fical points!</h6>
    </div>

    <div class="newsletter">
        <div class="news-head">
        <p>Follow us</p>
            <a href="https://www.facebook.com/ecawindowblindstrading" target="_blank"><i class="fab fa-facebook"></i></a>
        </div>
    
    <div class="contactInfo">
        <i class="fas fa-phone"></i>
        <span>0975 908 4803</span><br>
        <i class="far fa-clock"></i>
        <span>Mon-Fri: 9:00 AM - 5:00 PM</span><br>
        <i class="fas fa-map-marker-alt"></i>
        <span>Nasugbu, Batangas</span>
        </div>
    </div>

    <div class="gallery">
    <p>Quick Links</p>
            <a href="products.php">Products</a><br>
            <a href="<?php echo $profile_link; ?>">Accounts</a><br>
            <a href="estimate.php">Price Estimation</a><br>
            <a href="measure.php">Measurement Guide</a><br>
            <a href="<?php echo $profile_link1; ?>">Contact Us</a>
    </div>
</div>
</footer>


    <script>
        const menuBtn = document.getElementById('menuBtn');
    const menuContainer = document.getElementById('menuContainer');
    const closeMenuBtn = document.getElementById('closeMenuBtn');

    menuBtn.addEventListener('click', (event) => {
        event.preventDefault();
        event.stopPropagation();
        menuContainer.style.display = 'block';
    });

    closeMenuBtn.addEventListener('click', () => {
        menuContainer.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (!menuBtn.contains(event.target)) {
            menuContainer.style.display = 'none';
        }
    });

    const scheduleMenuBtn = document.querySelector('a[href="schedule.php"]');
    const popupForm = document.getElementById('popupForm');
    const closePopupBtn = document.getElementById('closePopupBtn');

    scheduleMenuBtn.addEventListener('click', (event) => {
        event.preventDefault();
        event.stopPropagation();
        popupForm.style.display = 'block';
    });

    closePopupBtn.addEventListener('click', () => {
        popupForm.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (!scheduleMenuBtn.contains(event.target) && !popupForm.contains(event.target)) {
            popupForm.style.display = 'none';
        }
    });
    </script>

    </html>
