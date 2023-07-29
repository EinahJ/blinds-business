<?php
include("connection.php");

$img = "";
$name = "";
$href = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $img = $_POST['img'];
    $name = $_POST['name'];
    $href = $_POST['href'];
    
    do {
        if ( empty($img) || empty($name) || empty($href)){
            $errorMessage = "All the fields are required";
            break;
        }
        // add new product to db
        $sql = "INSERT INTO products (img, name, href) VALUES ('$img', '$name', '$href')";
        $result = $con->query($sql);

        $img = "";
        $name = "";
        $href = "";

        $successMessage = "Product added";

        header("location: ADproduct.php");
        exit;

    }while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Crushed" />
    <link rel="icon" type="image/png" href="img/DIlogo" sizes="32x32">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
</head>
<body>
    <div class="row">
    <div class="column left" >
            <div class="left">
                <img class="logoo" src="img/ecalogo.png" width="40px" height="55px">
                <h1 class="eca">Accounts</h1>
                <h1 class="eca">Visit Shedule</h1>
                
                
            </div>
        </div>
       
        <div class="column right" >
            <div class="Top">
                
                    
                    <a href="logout.php"><svg class="logout" xmlns="http://www.w3.org/2000/svg" width="61" height="53" viewBox="0 0 61 53" fill="none">
                    <path d="M22.5307 0V7.51022H52.5716V45.0613H22.5307V52.5716H60.0818V0H22.5307ZM15.0204 15.0204L0 26.2858L15.0204 37.5511V30.0409H45.0613V22.5307H15.0204V15.0204Z" fill="black"/>
                    </svg></a>
                    <h3 class="adminName">Welcome, Admin</h3>
                    
                    
                    
        
            </div>


            
            <div class="form-container">
    <div id="regForm">
        <h2>Add Product</h2>
        <?php 
        if ( !empty($errorMessage)){
            echo "
            <div clas='alert alert warning alert-dismissible fade show' role='alert'>
            <strong?$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="POST">
            <input type="text" id="name" name="img" placeholder="Image" required value="<?php echo $img; ?>"><br>

            <div class="container">
            <input type="text" id="email" name="name" placeholder="Product Name" required value="<?php echo $name; ?>"><br>

            <div class="container2">
            <input type="text" id="contact" name="href" placeholder="Links" required value="<?php echo $href; ?>"><br>


            
            <div class="create-account-container">
            <button type="submit">Add</button>
            </div>
            
        </form>
         <!-- Add this sign-up button -->

            <!-- Add your image here, adjust the src attribute accordingly -->
    </div>
    </div>


<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this user?');
}
</script>
    
</body>
</html>
<style>
* {
  margin: 0;
  padding: 0;
  text-decoration: none;
}
body{
    background: #efeff0ca;
}
.logoo{
    margin-top: 14px;
    margin-left: 20px;
    margin-bottom: 30px;
}
.eca{
margin-left: 20px;
margin-top: 20px;
    color: #FFF;
font-family: Crushed;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
}
.Top{

height: 75px;
flex-shrink: 0;
border: 1px solid #DCDCDC;
background: #FFF;
}
.carts{
flex-shrink: 0;
margin-left: 60px;
margin-top: 15px;
}
.cartL{
margin-top: 125px;
margin-left: 30px;
margin-bottom: 20px;
width: 30px;
height: 30px;
}
.productL{
    margin-left: 30px;
margin-bottom: 20px;
width: 30px;
height: 30px;
}
.left{
    top:0%;
    left: 0%;

height: 1024px;
flex-shrink: 0;
background: #C19868;
}
.column {
  float: left;
}

.left {
  width: 15%;
}

.right {
  width: 85%;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.arrowDown{
    float: right;
    margin-top: 25px;
margin-left: 10px;
margin-right: 20px;
border: none;
background-color: white;
}


.Order{
    float: right;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 20px;
    margin-left: 10px;
    color: #000;
font-size: 24px;
font-style: normal;
font-weight: 600;
line-height: normal;
margin-top: 19px;
margin-right: 780px;
}

.orderbox{
width: 1210px;
height: 862px;
flex-shrink: 0;
border-radius: 9px;
border: 0.8px solid #D1D1D1;
background: #FFF;
margin-top: 30px;
margin-left: 50px;
}
.ordernum{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin-top: 30px;
    margin-left: 40px;
    margin-bottom: 20px;

}

table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    
}

th, td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}
.status{
width: 92px;
height: 27px;
flex-shrink: 0;
border-radius: 25px;
background: #E8E8E8;
font-weight: bold;
}
.productinfo{
    border: none;
background-color: white;
margin-top: 6px;
}
.logout{
    margin-top:20px;
    width: 25px;
    height: 32px;
    margin-left: 20px;
    float: right;
    margin-right: 40px;
}
.adminName{
    margin-top: 18px;
    margin-left:4%;
    color: #000;
text-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
font-family: Crushed;
font-size: 34px;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 3.4px;
    text-align: left;
}
.prof{
float: left;
width: 40px;
height: 40px;
flex-shrink: 0;
border-radius: 52px;
border: #000 1px solid;
margin-top: 15px;
margin-left: 20px;
margin-right: 10px;
}
.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


#regForm {
        position: absolute;
        top: 50%;
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