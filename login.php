<?php
session_start();

include ("connection.php");
include ("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {

        $query = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            
            // Verify the hashed password
            if (password_verify($password, $user_data['password'])) {
                $_SESSION['user_id'] = $user_data['user_id'];

                // Check if the user is an admin
                if ($user_data['privilege'] === 'admin') {
                    header("Location: none.php");
                } else {
                    header("Location: home.php");
                }
                die;
            } else {
                echo '<p class="custom-text">Invalid password.</p>';
            }
        } else {
            echo '<p class="custom-text">User not found.</p>';
        }
    } else {
        echo '<p class="custom-text">Please fill out all input fields.</p>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
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
            padding: 15px;
            background-color: #d1a680;
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

        #loginForm {
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
        
        #loginForm h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        
        #loginForm form {
            display: flex;
            flex-direction: column;
        }
        
        #loginForm label {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            text-align: left;
        }
        
        #loginForm input[type="email"],
        #loginForm input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        
        #loginForm a {
            display: block;
            text-decoration: none;
            color: #af733f;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            margin-bottom: 10px;
            text-align: left;
        }

        #loginForm .create-account-container {
            display: flex;
            justify-content: center; /* Center the content horizontally */
        }
        
        
        #loginForm button {
            padding: 12px 20px;
            background-color: #af733f;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        
        #loginForm button:hover {
            background-color: #955d32;
        }

        
    </style>
</head>
<header>
    <a href="" class="head-logo"><img src="img/Logo.png" alt=""></a>
    <h1 class="bus-name">ECA BLINDS</h1>
    <a href="" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
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
                <a href="#"><i class="fas fa-box"></i>Products</a>
            </li>
            <li>
            <a href="<?php echo $profile_link; ?>"><i class="fas fa-user"></i>Account</a>
            </li>
            <li>
                <a href=""><i class="fas fa-calendar"></i>Schedule</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-dollar-sign"></i>Price Estimation</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-comments"></i>Support</a>
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

    <div id="loginForm">
        <h2>Login</h2>
        <form method = "POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <div class="create-account-container">
                <a href="create.php" id="createAccountLink">Create Account</a>
            </div>

            <button type="submit" class="sign-in-button">Login</button>
        </form>
    </div>
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

    </html>
