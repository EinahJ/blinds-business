<?php

include("auth.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $win_no = $_POST['win_no']; // Corrected to match the form field name
    $dov = $_POST['dov'];
    $address = $_POST['address'];

    // Insert the data into the database, including the file path
    $query = "INSERT INTO sched (name, contact, win_no, dov, address) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    if (!$stmt) {
        die("Error in preparing the statement: " . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "sssss", $name, $contact, $win_no, $dov, $address);
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        die("Error in executing the statement: " . mysqli_error($con));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    header("Location: login.php");
    // Optionally, display a success message to the user
    echo "Message sent successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            margin: 0px 0px 0px 30px;
            padding: 15px;
        }

        .head-logo img { /*header business logo*/
            height: 60px;
        }

        .bus-name { /*ECA BLINDS*/
            margin-right: 100px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .cart-icon {
            font-size: 30px;
            color: #333;
            margin-left: auto;
            margin-right: 25px;
        }

        .menu-icon {
            font-size: 30px;
            color: #333;
            margin-left: auto;
            margin-right: 35px;
        }

        .banner { /*home background img*/
            background-image: url("img/bg.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 0%;
            padding: 300px 60px;
            text-align: left;
            color: black;
        }

        .banner h1 { /*Discover the beauty...*/
            font-family: 'Montserrat', sans-serif;
            font-size: 60px;
        }

        .banner .btn { /*Shop now button*/
            display: inline-block;
            padding: 12px 40px;
            background-color: #af733f;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-size: 22px;
            font-weight: bolder;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 30px;
        }

        .banner2 { /*home background img*/
            background-image: url("img/bg.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 0%;
            height: 50%;
            padding: 150px 60px;
            text-align: center;
            color: white;
        }

        .banner2 h1 { /*Ready for new discovery...*/
            font-family: 'Montserrat', sans-serif;
            font-size: 50px;
            margin-bottom: 20px;
        }

        .banner2 h2 { /*Eca Blinds is ready to give...*/
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 30px;
        }


        .banner2 .btn2 { /*Shop now button*/
            display: inline-block;
            padding: 12px 40px;
            background-color: #af733f;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-size: 22px;
            font-weight: bolder;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 30px;
            margin-left: 700px;
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

        .prod-header{ /*what we offer*/
            font-family: 'Montserrat', sans-serif;
            font-size: 40px;
            text-align: center;
            margin: 60px 0px 10px 0px;
        }

        .product-container {
            overflow-x: hidden;
            white-space: nowrap;
            padding: 20px;
        }

        .product-container2 {
            overflow-x: hidden;
            white-space: nowrap;
            padding: 20px;
        }

        .product-card {
            display: inline-block;
            width: 580px;
            margin: 10px;
            text-align: center;
            margin-top: 30px;
        }

        .product-image {
            width: 550px;
            height: 550px;
            overflow: hidden;
            margin: 0 auto 10px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-name {
            font-size: 16px;
            font-weight: bold;
            text-align: left;
            margin-left: 15px;
        }

        .scroll-button {
            position: absolute;
            top: 185%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: gray; /*subject to change of the bg color of scroll button*/
            color: white; /*subject to change the color of the color if scroll icon*/
            border: none;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
        }

        .scroll-button2 {
            position: absolute;
            top: 335%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: gray; /*subject to change of the bg color of scroll button*/
            color: white; /*subject to change the color of the color if scroll icon*/
            border: none;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
        }
        
        #scrollLeftBtn,#scrollLeftBtn2 {
            left: 10px;
            opacity: 50%;
        }
        
        #scrollRightBtn,#scrollRightBtn2 {
            right: 10px;
            opacity: 50%;
        }
        
        .about-section {
            position: relative;
            background-image: url("img/bg.png"); /* Replace "your-image-url.jpg" with the URL of the image you want to use as the background */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin-top: 40px;
        }
        
        .about-content {
            position: relative;
            background-color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
            padding: 40px;
            color: white;
        }
        
        .about-content h1 {
            font-size: 40px;
            margin-bottom: 20px;
            color: white;
            text-align: center;
        }
        
        .about-content p {
            font-size: 18px;
            line-height: 1.6;
            padding: 0px 30px 60px 30px;
            color: white;
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


        
        
    </style>
</head>
<header>
    <a href="" class="head-logo"><img src="img/Logo.png" alt=""></a>
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
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" required>

            <label for="num_windows">Number of Windows:</label>
            <input type="number" id="num_windows" name="win_no" min="1" required>

            <label for="date">Date of Visit:</label>
            <input type="date" id="date" name="dov" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <button type="submit" value="Schedule Visit">Schedule Now</button>
            <button type="button" id="closePopupBtn">Close</button>
        </form>
    </div>
    
</div>

    <div class="banner">
        <h1>DISCOVER THE<br>BEAUTY OF<br>BLINDS</h1>
        <a href="products.php" class="btn">SHOP NOW</a>
    </div>

    <h1 class="prod-header">WHAT WE OFFER</h1>
    <div class="product-container">
        <button class="scroll-button" id="scrollLeftBtn"><i class="fas fa-chevron-left"></i></button>
        <button class="scroll-button" id="scrollRightBtn"><i class="fas fa-chevron-right"></i></button>
        <div class="product-card">
            <div class="product-image">
                <img src="products/Checker/Checker.PNG" alt="Product 1">
            </div>
            <div class="product-name">Checker</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Crescendo/Crescendo.PNG" alt="Product 2">
            </div>
            <div class="product-name">Crescendo</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Curves/Curves.PNG" alt="Product 3">
            </div>
            <div class="product-name">Curves</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Duology/Duology.PNG" alt="Product 3">
            </div>
            <div class="product-name">Duology</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Elegancy/Elegancy.PNG" alt="Product 3">
            </div>
            <div class="product-name">Elegancy</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Galaxy/Galaxy.PNG" alt="Product 3">
            </div>
            <div class="product-name">Galaxy</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Hannover Premium Blackout/Hannover Premium Blackout.PNG" alt="Product 3">
            </div>
            <div class="product-name">Hannover Premium Blackout</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Izmir/Izmir.PNG" alt="Product 3">
            </div>
            <div class="product-name">Izmir</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Kingswood/Kingswood.PNG" alt="Product 3">
            </div>
            <div class="product-name">Kingswood</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Linen/Linen.PNG" alt="Product 3">
            </div>
            <div class="product-name">Linen</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Losa Wood Premium/Losa Wood Premium.PNG" alt="Product 3">
            </div>
            <div class="product-name">Losa Wood Premium</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Luxury Premium Blackout/Luxury Premium Blackout.PNG" alt="Product 3">
            </div>
            <div class="product-name">Luxury Premium Blackout</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Majesty Premium Blackout/Majesty Premium Blackout.PNG" alt="Product 3">
            </div>
            <div class="product-name">Majesty Premium Blackout</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Mono/Mono.PNG" alt="Product 3">
            </div>
            <div class="product-name">Mono</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Natural/Natural.PNG" alt="Product 3">
            </div>
            <div class="product-name">Natural</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Picasso Premium Blackout/Picasso Premium Blackout.PNG" alt="Product 3">
            </div>
            <div class="product-name">Picasso Premium Blackout</div>
        </div>

        <!-- Add more product cards as needed... -->

    </div>

    <div class="about-section" id="aboutSection">
        <div class="about-content">
            <h1>About Us</h1>
            <p>
                At ECA Blinds, we are passionate about enhancing the beauty and functionality of your living spaces through our premium-quality blinds and window treatments. With years of experience in the industry, we take pride in offering an extensive range of blinds that cater to your unique style and requirements.
    
                Our Vision
    
                Our vision is to be the leading provider of blinds and window coverings, renowned for our exceptional products and outstanding customer service. We aim to transform the way you experience your home or office by providing elegant and practical solutions that blend seamlessly with your decor.
            </p>
        </div>
    </div>

    <h1 class="prod-header">TRENDING PRODUCTS</h1>
    <div class="product-container2">
        <button class="scroll-button2" id="scrollLeftBtn2"><i class="fas fa-chevron-left"></i></button>
        <button class="scroll-button2" id="scrollRightBtn2"><i class="fas fa-chevron-right"></i></button>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Pinova/Pinova.PNG" alt="Product 2">
            </div>
            <div class="product-name">Pinova</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Pleat _ Twist/Pleat _ Twist.PNG" alt="Product 3">
            </div>
            <div class="product-name">Pleat Twist</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Pleated 7/Pleated 7.PNG" alt="Product 3">
            </div>
            <div class="product-name">Pleated 7</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Pleated Trinity/Pleated Trinity.PNG" alt="Product 3">
            </div>
            <div class="product-name">Pleated Trinity</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Prima-S Supreme Blackout/Prima-S Supreme Blackout.PNG" alt="Product 3">
            </div>
            <div class="product-name">Prima-S Supreme Blackout</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Prime Wood/Prime Wood.PNG" alt="Product 3">
            </div>
            <div class="product-name">Prime Wood</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Sara Screen/Sara Screen.PNG" alt="Product 3">
            </div>
            <div class="product-name">Sara Screen</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Silk/Silk.PNG" alt="Product 3">
            </div>
            <div class="product-name">Silk</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Timber Wood/Timber Wood.PNG" alt="Product 3">
            </div>
            <div class="product-name">Timber Wood</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Trilogy/Trilogy.PNG" alt="Product 3">
            </div>
            <div class="product-name">Trilogy</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Ultima Supreme Blackout/Ultima Supreme Blackout.PNG" alt="Product 3">
            </div>
            <div class="product-name">Ultima Supreme Blackout</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Vanity/Vanity.PNG" alt="Product 3">
            </div>
            <div class="product-name">Vanity</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Vega/Vega.PNG" alt="Product 3">
            </div>
            <div class="product-name">Vega</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="products/Wider/Wider.PNG" alt="Product 3">
            </div>
            <div class="product-name">Wider</div>
        </div>


    </div>

    <div class="banner2">
        <h1>READY FOR NEW EXPERIENCE?</h1>
        <h2>Eca Blinds is ready to give your window a completely new look, wich<br>
    is achieve through numerous window blinds designs you can find<br>at our store.</h2>

        <a href="" class="btn2">SHOP NOW</a>
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
            <a href="profile.php">Accounts</a><br>
            <a href="estimate.php">Price Estimation</a><br>
            <a href="support.php">Contact</a>
    </div>
</div>
</footer>


<script>
    /*for menu*/
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

    /for the scroll of products*/
    const scrollLeftBtn = document.getElementById('scrollLeftBtn');
const scrollRightBtn = document.getElementById('scrollRightBtn');
const productContainer = document.querySelector('.product-container');

scrollLeftBtn.addEventListener('click', () => {
    productContainer.scrollBy({ left: -350, behavior: 'smooth' });
});

scrollRightBtn.addEventListener('click', () => {
    productContainer.scrollBy({ left: 350, behavior: 'smooth' });
});

const scrollLeftBtn2 = document.getElementById('scrollLeftBtn2');
const scrollRightBtn2 = document.getElementById('scrollRightBtn2');
const productContainer2 = document.querySelector('.product-container2');

scrollLeftBtn2.addEventListener('click', () => {
    productContainer2.scrollBy({ left: -350, behavior: 'smooth' });
});

scrollRightBtn2.addEventListener('click', () => {
    productContainer2.scrollBy({ left: 350, behavior: 'smooth' });
});


const aboutSection = document.getElementById('aboutSection');
const backgroundImages = [
    "img/pic6.jpg",
    "img/pic7.jpg",
    "img/pic8.jpg",
    "img/pic9.jpg"
];
let currentIndex = 0;
let intervalId;

function changeBackgroundImage() {
    currentIndex = (currentIndex + 1) % backgroundImages.length;
    aboutSection.style.backgroundImage = `url(${backgroundImages[currentIndex]})`;
}

intervalId = setInterval(changeBackgroundImage, 3000);

  // Show the popup form when "Schedule" menu button is clicked
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