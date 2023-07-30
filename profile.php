<?php

include ("auth.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
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

        body{
            background-image: url('img/pic3.png');
            background-size: cover;
            background-repeat: no-repeat;
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
            margin-left: 20px;
            margin-right: 10px;
        }

        .bus-name { /*ECA BLINDS*/
            margin-right: 40px;
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

        #profileDetails {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 40px 80px;
            width: 400px;
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

        #profileDetails i {
            margin-right: 10px;
            font-size: 16px;
            color: gray;
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
            align-items: center;
            justify-content: center;
        }

        .profile-details .info-value{
            text-align: left;
            margin-right: 10px;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .profile-details .info-Gvalue{
            text-align: left;
            margin-right: 10px;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: capitalize;
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
            display: inline-block;
            padding: 10px 15px;
            font-size: 15px;
            color: #AF733F;
            background-color: transparent;
            border: 1px solid #AF733F;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            margin-right: 15px;
        }

        .profile-buttons button:hover {
            background-color: #955d32;
            color: white;
        }
        #noti_number{
            margin-left: 1050px;
            font-size: 30px;
        }

        
    </style>
</head>
<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <a href="" class="head-logo"><img src="img/ecalogo.png" alt=""></a>

    <h1 class="bus-name">ECA BLINDS</h1>
    <a href="notif.php"><i class="fa fa-bell" aria-hidden="true" id="noti_number" style="color: black;"></i></a>
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

    <div id="profileDetails">
        <div class="profile-image"><img class="profile-image" src="img/Logo.png"></div>
        <div class="profile-details-container">
            <div class="profile-name">
            <div class="info-value"><?php echo $user_data['name']; ?></div>
            </div>

            <div class="profile-email">
            <div class="info-value"><?php echo $user_data['email']; ?></div>
            </div>
            
                <div class="profile-details">
                
                <div class="info-Gvalue"><i class="fas fa-mars"></i><?php echo $user_data['gender']; ?></div>
                
                <div class="info-value"><i class="fas fa-phone"></i><?php echo $user_data['contact']; ?></div>
                
                <div class="info-value"><i class="fas fa-map"></i><?php echo $user_data['address']; ?></div>

                </div>
            </div>
            
            <div class="profile-buttons">
            <a href="editprof.php">
                <button>Edit Profile</button>
            </a>
            <a href="cpass.php">
                <button>Change Password</button>
            </a>
                <a href="logout.php">
                <button>Logout</button>
                </a>
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
    <script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "data.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>
    </html>
