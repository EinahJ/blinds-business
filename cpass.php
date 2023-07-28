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
            margin-right: 25px;
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

        #createAccountLink {
    color: #af733f;
    text-decoration: underline;
    margin-left: 5px;
}

.create-account-container {
    display: flex;
    align-items:
    margin-top: 20px;
    font-size: 14px;
}

        #loginForm {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 40px 60px;
    width: 300px;
    text-align: center;
    z-index: 2;
}

#loginForm h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #333;
}

#loginForm form {
    display: flex;
    flex-direction: column;
}

#loginForm label {
    font-size: 16px;
    color: #333;
    margin-bottom: 8px;
    text-align: left;
}

#loginForm input[type="email"],
#loginForm input[type="password"] {
    width: 91%;
    padding: 12px;
    margin-bottom: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

#loginForm .create-account-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

#loginForm button {
    padding: 12px 10px;
    background-color: #af733f;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
    margin-bottom: 10px;
}

#loginForm button:hover {
    background-color: #955d32;
}

#loginForm a {
    display: block;
    text-decoration: none;
    color: #af733f;
    font-size: 14px;
    margin-top: 10px;
}

#loginForm a:hover {
    text-decoration: underline;
}

        
    </style>
</head>
<header>
<a href="home.php" class="head-logo"><img src="img/ecalogo.png" alt=""></a>
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
        <form method="POST" >
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
        <h2>Change Password</h2>
        <form method = "POST">
            <input type="password" id="oldpass" name="password" placeholder="Old Password" required><br>
            <input type="password" id="newpass" name="new-password" placeholder="New Password" required><br>
            <input type="password" id="confirm" name="confirm-password" placeholder="Confirm New Password" required><br>
            <button type="submit" class="create-button">Save</button>
            <button type="button" class="cancel-button" onclick="window.location.href='profile.php';">Cancel</button>
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

    </script>

    </html>
