<?php

include("auth.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $Inquiry = $_POST['Inquiry']; // Corrected to match the form field name
  

    // Insert the data into the database, including the file path
    $query = "INSERT INTO mails (name, email, Inquiry) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    if (!$stmt) {
        die("Error in preparing the statement: " . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $Inquiry);
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
    <title>Contact Page</title>
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

        .contact-form-container {
            max-width: 300px;
            margin-left: 10px;
            padding: 20px 40px 20px 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }

        .contact-form-container h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .contact-form-container form {
            display: flex;
            flex-direction: column;
        }

        .contact-form-container label {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            text-align: left;
        }

        .contact-form-container input[type="text"],
        .contact-form-container input[type="email"],
        .contact-form-container textarea {
            width: 96%;
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .contact-form-container textarea {
            resize: vertical;
            min-height: 150px;
        }

        .contact-form-container input[type="submit"] {
            padding: 12px 20px;
            background-color: #af733f;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 105%;
        }

        .contact-form-container input[type="submit"]:hover {
            background-color: #955d32;
        }
        .estimate-container {
    display: flex; /* Use flexbox to place elements side by side */
    margin: 40px 60px 80px 100px;
}

.contact-form-container {
    flex: 1; /* Allow the form to grow and take available space */
    padding: 40px 60px 40px 40px; /* Add some padding for spacing */
}

.image-container {
    flex: 1; /* Allow the image to grow and take available space */
    padding: 20px; /* Add some padding for spacing */
}

#selectedImage {
    width: 100%; /* Make the image occupy the full width of its container */
    height: 100%;
    max-width: 500px; /* Set a maximum width for the image */
    margin: 60px 0px 0px 20px;
    border: 1px solid white;
}
        #blindType {
    width: 105%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    appearance: none; /* Remove default styling for select button (not supported in some browsers) */
    -webkit-appearance: none; /* Safari */
    -moz-appearance: none; /* Firefox */
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center; /* Position the drop-down arrow */
    background-size: 16px 16px; /* Size of the drop-down arrow */
    background-color: #fff; /* Set the background color */
}

.price-container {
    padding: 20px;
    background-color: white;
    border-radius: 4px;
    margin-top: 65px;
    margin-left: 20px;
    height: 50%;
  }

  .price-container h2 {
    font-family: 'Montserrat', sans-serif;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
  }

  .price-container p {
    font-size: 18px;
    text-align: center;
    font-weight: bold;
    color: #af733f;
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
      }

        

        
    </style>
</head>
<header>
    <a href="home.php" class="head-logo"><img src="img/ecalogo.png" alt=""></a>
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
                <a href="measure.php"><i class="fas fa-ruler"></i>Measurement</a>
            </li>
            <li>
                <a href="support.php"><i class="fas fa-comments"></i>Support</a>
            </li>
        </ul>
    </div>
</header>
<body>
<div class="estimate-container">
<div class="contact-form-container">
        <h2>Design and Price Estimation</h2>
        <form method="POST">
            <label for="width">Width</label>
            <input type="text" id="width" name="width" required placeholder="Inches">

            <label for="height">Height</label>
            <input type="text" id="height" name="height" required placeholder="Inches">


            <label for="type">Type of Blinds</label>
            <select name="type" id="blindType">
                <option value="">Select Type</option>
                <option value="duology">Duology</option>
                <option value="trilogy">Trilogy</option>
                <option value="primewood">Primewood</option>
                <option value="timberwood">Timberwood</option>
                <option value="pleated">Pleated Trinity</option>
                <option value="mono">Mono</option>
                <option value="elegancy">Elegancy</option>
                <option value="sara">Sara Screen</option>
            </select>

        </form>
        
    </div>
    
    <img id="selectedImage" src="" alt="" style="display:none;">

    <div class="price-container">
        <h2>Estimated Price</h2>
        <p id="estimatedPriceElement">₱ 0</p>
    </div>

    </div>

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
            <a href="measure.php">Measurement Guide</a><br>
            <a href="support.php">Contact</a>
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


    const blindTypeSelect = document.getElementById('blindType');
    const selectedImage = document.getElementById('selectedImage');

    const blindTypeImages = {
        'duology': 'products/Duology/Duology.PNG',
        'trilogy': 'products/Trilogy/Trilogy.PNG',
        'primewood': 'products/Prime Wood/Prime Wood.PNG',
        'timberwood': 'products/Timber Wood/Timber Wood.PNG',
        'pleated': 'products/Pleated Trinity/Pleated Trinity.PNG',
        'mono': 'products/Mono/Mono.PNG',
        'elegancy': 'products/Elegancy/Elegancy.PNG',
        'sara': 'products/Sara Screen/Sara Screen.PNG'
    };

    blindTypeSelect.addEventListener('change', function () {
        const selectedOption = this.value;
        if (selectedOption && blindTypeImages[selectedOption]) {
            selectedImage.src = blindTypeImages[selectedOption];
            selectedImage.style.display = 'block'; // Show the image if an option is selected
        } else {
            selectedImage.src = '';
            selectedImage.style.display = 'none'; // Hide the image if no option is selected
        }
    });

    const blindTypePrices = {
    'duology': 130,    
    'trilogy': 150, 
    'primewood': 120, 
    'timberwood': 120, 
    'pleated': 210, 
    'mono': 170, 
    'elegancy': 210, 
    'sara': 240   
  };

  blindTypeSelect.addEventListener('change', function () {
    const selectedOption = this.value;
    if (selectedOption && blindTypeImages[selectedOption]) {
      selectedImage.src = blindTypeImages[selectedOption];
      selectedImage.style.display = 'block'; // Show the image if an option is selected

      if (blindTypePrices[selectedOption]) {
        const width = parseFloat(document.getElementById('width').value);
        const height = parseFloat(document.getElementById('height').value);
        const price = blindTypePrices[selectedOption];
        if (width && height && !isNaN(width) && !isNaN(height)) {
          const estimatedPrice = ((width * height) / 144) * price;
          estimatedPriceElement.textContent = `₱${estimatedPrice.toFixed(2)}`;
        } else {
          estimatedPriceElement.textContent = '-'; // Display a dash if width or height is not valid
        }
      } else {
        estimatedPriceElement.textContent = '-'; // Display a dash if the price is not available
      }
    } else {
      selectedImage.src = '';
      selectedImage.style.display = 'none'; // Hide the image if no option is selected
      estimatedPriceElement.textContent = '-'; // Hide the estimated price
    }
  });


    </script>

    </html>
