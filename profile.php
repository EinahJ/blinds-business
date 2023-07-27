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
            margin: 0px 0px 0px 0px;
            padding: 20px 20px 20px 50px;
            background-color: #d1a680;
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

        
    </style>
</head>
<header>
    <a href="" class="head-logo"><img src="img/Logo.png" alt=""></a>
    <h1 class="bus-name">ECA BLINDS</h1>

    <nav>
        <ul>
            <li><a href="home.php">HOME</a></li>
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
                <a href="index.php"><i class="fas fa-user"></i>Account</a>
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
<body>
    <div id="profileDetails">
        <div class="profile-image"></div>
        <div class="profile-details-container">
            <div class="profile-name">John Doe</div>
            <div class="profile-email">john.doe@example.com</div>
            <div class="profile-details">
                <h3>Male</h3>
                <h3>09-405-6230</h3>
                <h3>123 Main PUP Street Manila City</h3>
            </div>
            <div class="profile-buttons">
                <button>Edit Profile</button>
                <button>Change Password</button>
                <button>Logout</button>
            </div>

            <!-- Add more profile details here such as age, location, etc. -->
        </div>
    </div>
</body>
</body>
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
    </script>

    </html>
