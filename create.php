<?php
session_start();

include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if (!empty($name) && !empty($email) && !empty($gender) && !empty($contact) && !empty($address) && !empty($password) && !empty($confirm_password)) {
        if (isValidName($name)  && isValidContact($contact) && isValidEmail($email)) {
            if ($password === $confirm_password) {
                // Passwords match, proceed with registration
                $user_id = random_num(10);
                $privilege = 'user';

                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO user (user_id, name, email, gender, contact, address, password, privilege) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "isssssss", $user_id, $name, $email, $gender, $contact, $address, $hashed_password, $privilege);
                mysqli_stmt_execute($stmt);

                // Check if the data was inserted successfully
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    // Data inserted successfully, redirect to profile.php
                    header("Location: login.php");
                    die;
                } else {
                  echo '<p class="custom-text">Failed to create an account.</p>';
                }
            } else {
                echo '<p class="custom-text">Password do not match!</p>';
            }
        } else {
          echo '<p class="custom-text">Please enter some valid information.</p>';
        }
    } else {
      echo '<p class="custom-text">Please fill out all input fields.</p>';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
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

        .form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


#regForm {
        position: absolute;
        top: 63%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 40px 60px;
        width: 400px;
        text-align: center;
    }

    #regForm h2 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
    }

    #regForm form {
        display: flex;
        flex-direction: column;
    }

    #regForm label {
        font-size: 16px;
        color: #333;
        margin-bottom: 8px;
        text-align: left;
    }

    #regForm input[type="text"],
    #regForm input[type="email"],
    #regForm input[type="password"]
     {
        width: 91%;
        padding: 12px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    #regForm select{
        width: 97%;
        padding: 12px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        color: gray;
    }

    #regForm .container,
    #regForm .container2 {
        display: flex;
        flex-direction: column;
    }

    #regForm .create-account-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        font-size: 14px;
    }

    #regForm button {
        padding: 12px 20px;
        background-color: #af733f;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    #regForm button:hover {
        background-color: #955d32;
    }

    #regForm a {
        display: block;
        text-decoration: none;
        color: #af733f;
        font-size: 14px;
        margin-top: 10px;
    }

    #regForm a:hover {
        text-decoration: underline;
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


    <div class="form-container">
    <div id="regForm">
        <h2>Create Account</h2>
        <form method="POST">
            <input type="text" id="name" name="name" placeholder="Name" required><br>

            <div class="container">
            <input type="email" id="email" name="email" placeholder="Email" required><br>

            <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            </select><br>
            </div>

            <div class="container2">
            <input type="text" id="contact" name="contact" placeholder="Contact Number" required><br>

            <input type="text" id="address" name="address" placeholder="Home Address" required><br>
            </div>

            <input type="password" id="password" name="password" placeholder="Password" required><br>

            <input type="password" id="Cpassword" name="confirm-password" placeholder="Confirm Password" required><br>

            
            <div class="create-account-container">
            <button type="submit">Sign Up</button>
            </div>
            
        </form>
         <!-- Add this sign-up button -->

            <!-- Add your image here, adjust the src attribute accordingly -->
    </div>
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


    </script>

    </html>
