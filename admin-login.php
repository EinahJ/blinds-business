<?php
session_start();

include ("connection.php");
include ("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (!empty($email) && !empty($pass)) {

        $query = "SELECT * FROM admin WHERE email = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            
            


                // Check if the user is an admin
                if ($user_data['privilege'] === 'user') {
                    header("Location: none.php");
                } else {
                    header("Location: ADaccount.php");
                }
                die;
            
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
    <title>ECA | Admin Login Page</title>
    <link rel="icon" type="image/x-icon" href="img/favcon.png">
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
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        body{
            background-image: url('img/pic3.png');
            background-size: cover;
            background-repeat: no-repeat;
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
    margin-bottom: 10px;
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
    display: inline-block;
            padding: 10px 10px;
            font-size: 15px;
            color: #AF733F;
            background-color: transparent;
            border: 1px solid #AF733F;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            margin-top: 15px;
}

#loginForm button:hover {
    background-color: #955d32;
    color: white;
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
    <a href="" class="head-logo"><img src="img/ecalogo.png" alt=""></a>
    <h1 class="bus-name">ECA BLINDS</h1>
    
</header>
<body>


    <div id="loginForm">
        <h2>Admin Login</h2>
        <form method = "POST">
            <input type="email" id="email" name="email" placeholder="Email" required><br>

                <input type="password" id="password" name="pass" placeholder="Password" required><br>
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
    </script>

    </html>