<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
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
            padding: 20px;
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
            top: 149%;
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
            top: 265%;
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
        padding: 30px 60px;
        display: flex;
        align-items: center;
    }

    .contacts {
        flex: 1;
        max-width: 10%;
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
        font-size: 15px;
        margin: 10px 0;
    }

    .contactInfo {
        margin-top: 10px;
        border-top: 1px solid white;
        padding-top: 10px; /* Add padding to the top */
    }

    .contactInfo i {
        margin-right: 5px;
    }

    .contactInfo span {
        font-size: 12px;
    }

    .newsletter {
        flex: 1;
        max-width: 10%;
        text-align: left;
        padding: 0 10px; /* Add padding to the left and right */
    }

    .newsletter h1 {
        font-size: 25px;
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
        margin-top: 10px;
    }

    .newsletter-foot p {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .newsletter-foot i {
        font-size: 15px;
        margin-right: 5px;
    }

    .gallery {
        flex: 1;
        max-width: 10%;
        text-align: center;
    }

    .gallery h6 {
        font-size: 20px;
    }

    .row1 img,
    .row2 img {
        width: 90px;
        height: 90px;
        margin: 5px;
    }



        
        
    </style>
</head>
<header>
    <a href="" class="head-logo"><img src="img/Logo.png" alt=""></a>
    <h1 class="bus-name">ECA BLINDS</h1>

    <nav>
        <ul>
            <li><a href="">HOME</a></li>
            <li><a href="">PRODUCTS</a></li>
            <li><a href="">CONTACTS</a></li>
        </ul>
    </nav>

    <a href="" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
    <a href="" id="menuBtn" class="menu-icon"><i class="fas fa-bars"></i></a>
    <div id="menuContainer">
        <div class="menuHeader">
            <img class="menuLogo" src="img/Logo.png" alt="Business Logo">
            <button id="closeMenuBtn">Close</button>
        </div>
        <ul class="menuList">
            <li>
                <a href="login.php"><i class="fas fa-user"></i>Account</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-calendar"></i>Schedule</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-dollar-sign"></i>Price Estimation</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-comments"></i>Support</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </li>
        </ul>
    </div>
</header>

<body>

    <div class="banner">
        <h1>DISCOVER THE<br>BEAUTY OF<br>BLINDS</h1>
        <a href="" class="btn">SHOP NOW</a>
    </div>

    <h1 class="prod-header">WHAT WE OFFER</h1>
    <div class="product-container">
        <button class="scroll-button" id="scrollLeftBtn"><i class="fas fa-chevron-left"></i></button>
        <button class="scroll-button" id="scrollRightBtn"><i class="fas fa-chevron-right"></i></button>
        <div class="product-card">
            <div class="product-image">
                <img src="img/pic2.png" alt="Product 1">
            </div>
            <div class="product-name">Different Color</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic3.png" alt="Product 2">
            </div>
            <div class="product-name">Different Sizes</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic4.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic2.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic3.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic4.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic2.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic3.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic4.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic2.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
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
                <img src="img/pic2.png" alt="Product 1">
            </div>
            <div class="product-name">Different Color</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic3.png" alt="Product 2">
            </div>
            <div class="product-name">Different Sizes</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic4.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic2.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic3.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic4.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic2.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic3.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic4.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <div class="product-card">
            <div class="product-image">
                <img src="img/pic2.png" alt="Product 3">
            </div>
            <div class="product-name">Amazing Quality</div>
        </div>

        <!-- Add more product cards as needed... -->

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

        <h6>We are top-tier window blinds<br>supplier and service provider. Let us transform your windows into stunning fical points!</h6>

        <div class="contactInfo">
        <i class="fas fa-phone"></i>
        <span>123-456-7890</span><br>
        <i class="far fa-clock"></i>
        <span>Mon-Fri: 9:00 AM - 5:00 PM</span><br>
        <i class="fas fa-map-marker-alt"></i>
        <span>123 Main St, City, Country</span>
        </div>
    </div>

    <div class="newsletter">
        <h1>Newsletter</h1>
        <p>Join our email for tips and useful information</p>
        <button class="btn1">Enter your Email</button><br>
        <button class="btn2">Subscribe</button>
        <div class="newsletter-foot">
            <p>Follow us</p>
            <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-google"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <div class="gallery">
        <h6>Gallery</h6>
        <div class="row1">
            <img src="img/pic2.png" alt="">
            <img src="img/pic2.png" alt="">
        </div>
        <div class="row2">
            <img src="img/pic2.png" alt="">
            <img src="img/pic2.png" alt="">
        </div>
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
    "img/pic1.png",
    "img/pic2.png",
    "img/pic3.png",
    "img/pic4.png"
];
let currentIndex = 0;
let intervalId;

function changeBackgroundImage() {
    currentIndex = (currentIndex + 1) % backgroundImages.length;
    aboutSection.style.backgroundImage = `url(${backgroundImages[currentIndex]})`;
}

// Change background image every 5 seconds (5000 milliseconds)
intervalId = setInterval(changeBackgroundImage, 3000);
</script>
</html>