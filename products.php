<?php

include ("auth.php");

?>
<?php

require_once 'connection2.php';

$sql = "SELECT * FROM products";
$all_products = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
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
            background-color: #d1a680;
            margin-bottom: 30px;
        }

        footer {
        background-color: #333;
        color: #fff;
        padding: 20px 20px;
        display: flex;
        align-items: center;
    }

    .contacts {
        flex: 1;
        max-width: 20%;
        margin-left: 50px;
        margin-right: 250px;
    }

    .contactsHead {
        display: flex;
        align-items: center;
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
        font-size: 12px;
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
        padding: 0 10px;
        margin-right: 300px;
    }

    .newsletter h1 {
        font-size: 30px;
    }

    .newsletter p {
        font-size: 15px;
        margin: 10px 0;
    }

    .newsletter .btn1,
    .newsletter .btn2 {
        margin: 5px auto;
        padding: 7px 10px;
        background-color: #af733f;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 4px;
        width: 100%;
    }

    .newsletter-foot {
        display: flex;
        align-items: center;
    }

    .newsletter-foot p {
        font-size: 15px;
        margin-bottom: 10px;
        margin-right: 10px;
    }

    .newsletter-foot i {
        font-size: 15px;
        margin-right: 5px;
    }

    .footer-email {
        margin: 5px auto;
        padding: 7px 10px;
        background-color: white;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 4px;
        width: 91%;
    }

    .gallery {
        flex: 1;
        max-width: 10%;
        text-align: center;
    }

    .gallery h6 {
        font-size: 20px;
        margin-left: 80px;
    }

    .row1, .row2{
        display: flex;
    }

    .row1 img,
    .row2 img {
        width: 105px;
        height: 105px;
        margin: 5px;
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
    background-color: #ccc;
    margin-top: 10px;
}

        .head-logo img { /*header business logo*/
            height: 60px;
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

        #profileDetails {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 40px 80px;
            width: 300px;
            text-align: center;
            z-index: 2;
        }
        
        #profileDetails h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        
        #profileDetails p {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            text-align: left;
        }
        
        #profileDetails .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto;
            background-color: #ddd;
            margin-bottom: 10px;
            /* You can add an image here using background-image if you have one. */
        }

        #profileDetails .profile-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        #profileDetails .profile-email {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .profile-details {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-details h3{
            margin-right: 10px;
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 10px;
        }



        #profileDetails .profile-details-container {
            display: flex;
            flex-direction: column;
        }

        .profile-buttons {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.profile-buttons button {
    padding: 10px 10px;
    margin: 0 5px;
    background-color: #af733f;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 10px;
    transition: background-color 0.3s;
}

.profile-buttons button:hover {
    background-color: #955d32;
}
.main{
    max-width:1500px;
    width: 95%;
    margin: 30px auto;
    diplay: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: auto;
}

.products-title {
    text-align: center;
    margin-bottom: 20px;
    position: relative; /* Required for pseudo-elements */
    font-size: 30px;
}

/* Style for the products title text */
.products-title h2 {
    display: inline-block;
    background-color: #fff; /* Set the background color to match the page background */
    padding: 0 10px;
    position: relative; /* Required for pseudo-elements */
}

/* Style for the left line */
.products-title h2::before {
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
.products-title h2::after {
    content: "";
    position: absolute;
    right: -500px;
    top: 50%;
    transform: translateY(-50%);
    width: 500px; /* Adjust the line width as needed */
    height: 2px;
    background-color: #000; /* Set the line color */
}
main{
    max-width:1500px;
    width: 95%;
    margin 30px auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: auto;
}
main .produkto {
    max-width: 300px;
    text-align: center;
    margin: 20px;
    
    
}

main .produkto .imgg {
    height: 200px; /* Set a fixed height for the image container */
    margin-bottom: 0px;
    display: flex; /* Add this to align the image in the center of the container */
    justify-content: center; /* Add this to align the image in the center of the container */
    align-items: center; /* Add this to align the image in the center of the container */
    flex-wrap: wrap;
}

main .produkto .imgg img {
    max-width: 100%; /* Set the image width to take the full width of the container */
    max-height: 100%; /* Set the image height to take the full height of the container */
    object-fit: contain; /* This will maintain the aspect ratio and fit the image within the container */
}
main .produkto .pangalan{
   
    text-align: center;
    line-height: 3em;
    height: 15%;
    color: #000;
font-family: Crushed;
font-size: 30px;
font-style: normal;
font-weight: normal;

}

        
    </style>
</head>
<header>
    <a href="" class="head-logo"><img src="img/ecalogo.png" alt=""></a>
    <h1 class="bus-name">ECA BLINDS</h1>
    <a href="" class="cart-icon"><i class="fas fa-bell"></i></a>
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
                <a href="schedule.php"><i class="fas fa-calendar"></i>Schedule</a>
            </li>
            <li>
                <a href="estimate.php"><i class="fas fa-dollar-sign"></i>Price Estimation</a>
            </li>
            <li>
                <a href="support.php"><i class="fas fa-comments"></i>Support</a>
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
<div class="products-title">
        <h2>PRODUCTS</h2>
    </div>
    <main>
    <?php
    while ($row = mysqli_fetch_assoc($all_products)) {
    ?>

        <div class="produkto">
            <div class="imgg">
                <img src="<?php echo $row['img']; ?>">
            </div>
            <h2 class="pangalan"><?php echo $row['name']; ?></h2>
        </div>

    <?php
    }
    ?>
</main>




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

        <div class="contactInfo">
        <i class="fas fa-phone"></i>
        <span>0975 908 4803</span><br>
        <i class="far fa-clock"></i>
        <span>Mon-Fri: 9:00 AM - 5:00 PM</span><br>
        <i class="fas fa-map-marker-alt"></i>
        <span>Nasugbu, Batangas</span>
        </div>
    </div>

    <div class="newsletter">
        <h1>Newsletter</h1>
        <p>Join our email for tips and useful information</p>
        <input type="text" class="footer-email" placeholder="Enter your email">
        <button class="btn2">SUBSCRIBE</button>
        <div class="newsletter-foot">
            <p>Follow us</p>
            <a href="https://www.facebook.com/ecawindowblindstrading" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="ecawindowblindstrading@gmail.com" target="_blank"><i class="fab fa-google"></i></a>
        </div>
    </div>

    <div class="gallery">
        <h6>Gallery</h6>
        <div class="row1">
            <img src="img/pic5.jpg" alt="">
            <img src="img/pic7.jpg" alt="">
        </div>
        <div class="row2">
            <img src="img/pic9.jpg" alt="">
            <img src="img/pic8.jpg" alt="">
        </div>
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
