<?php
include("auth.php");

// Fetch accounts data from the database
$query = "SELECT * FROM user";
$result = mysqli_query($con, $query);

// Initialize the $users array to store the account data
$user = array();

// Check if there are any accounts
if (mysqli_num_rows($result) > 0) {
    // Loop through accounts and add them to the $users array
    while ($row = mysqli_fetch_assoc($result)) {
        $user[] = $row;
    }
}

// Check if the delete button was clicked
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['delete_user'];

    // Query to delete the user from the database
    $delete_query = "DELETE FROM users WHERE user_id = ?";
    $delete_stmt = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_stmt, "i", $user_id);
    mysqli_stmt_execute($delete_stmt);

    // After deleting, redirect back to the same page to update the user list
    header("Location: ADaccountmanage.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Crushed" />
    <link rel="icon" type="image/x-icon" href="img/favcon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <div class="row">
    <div class="column left" >
            <div class="left">
                <img class="logoo" src="img/ecalogo.png" width="40px" height="55px">
                <a href="ADaccount.php"><h1 class="eca">Accounts</h1></a>
                <a href="ADsched.php"><h1 class="eca">Visit Shedule</h1></a>
                <a href="ADmails.php"><h1 class="eca">Mails</h1></a>
                <a href="ADproduct.php"><h1 class="eca">Product Management</h1></a>
                <a href="ADnotiff.php"><h1 class="eca">Notification Management</h1></a>

                
                
            </div>
        </div>
       
        <div class="column right" >
            <div class="Top">
                
                    
                    <a href="logout2.php"><svg class="logout" xmlns="http://www.w3.org/2000/svg" width="61" height="53" viewBox="0 0 61 53" fill="none">
                    <path d="M22.5307 0V7.51022H52.5716V45.0613H22.5307V52.5716H60.0818V0H22.5307ZM15.0204 15.0204L0 26.2858L15.0204 37.5511V30.0409H45.0613V22.5307H15.0204V15.0204Z" fill="black"/>
                    </svg></a>
                    <h3 class="adminName">Welcome, Admin</h3>
                    
                    
                    
        
            </div>


            <div class="orderbox">
    <h2 class="ordernum">Accounts (<?= count($user); ?>)</h2>
    <table class="order-list">
        <thead>
            <tr>
                
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Password</th>
                
            </tr>
        </thead>
        <tbody id="user-table">
            <!-- User account data will be dynamically added here -->
            <?php foreach ($user as $user): ?>
                <tr>
                    <td><?= $user['user_id']; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['gender']; ?></td>
                    <td><?= $user['contact']; ?></td>
                    <td><?= $user['address']; ?></td>
                    <td><?= $user['password']; ?></td>
                    
                   
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
</style>