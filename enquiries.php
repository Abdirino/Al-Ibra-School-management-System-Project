<?php 
session_start();
if($_SESSION['authlevel'] > 0 and  $_SESSION['authlevel']!= 2){

include "dbconn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries</title>
    <style>
        *{
                padding: 0; margin: 0;
                text-decoration: none;
                list-style: none;
                box-sizing: border-box;
            }
             .navbar{
            background-color: black;
            width: 100%;
            min-height: 90px;
        }
        .navbar nav .logo{
            display: inline;
            display: flex;
            flex-direction: row;
        }
        .navbar nav .logo h1{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 40px;
            color: aqua;
            display: inline;
            margin-top: 20px;
            margin-left: 10px;
        }
        .navbar nav .logo i{
            font-size: 60px;
            margin-top: 10px;
            margin-left: 10px;
        }
        .navbar nav ul{
            float: right;
            display: flex;
            flex-direction: row;
        }
        .navbar nav ul li a{
            padding: 25px 8px;
            color: aqua;
            font-size: 18px;
            font-weight: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-right: 20px;
            /* line-height: 10px; */
            position: relative;
            bottom: 30px;
        }
        .navbar nav ul li a:hover{
            background-color: white;
            border-radius: 10px;
        }
        form{
            max-width: 500px;
            background-color: #0897fa;
            margin: auto;
            border-radius: 10px;
            margin-top: 20px;
        }
        form input{
            padding: 10px 15px;
            margin-bottom: 20px;
            margin-top: 10px;
            margin-left: 20px;
            border-radius: 10px;
        }
        form textarea{
            padding: 10px 15px;
            margin-bottom: 20px;
            margin-left: 20px;
            border-radius: 10px;
        }
        form a{
            padding: 10px 15px;
            margin-bottom: 20px;
            margin-top: 10px;
            margin-left: 20px;
            border-radius: 10px;
            background-color: white;
            color: black;
            border: 2px solid black;
        }
    </style>
</head>
<body>
<?php 
function input_cleaner($input){
    $input=trim($input);
    $input=stripslashes($input);
    $input=htmlspecialchars($input);

    return $input;
}
if($_SERVER["REQUEST_METHOD"]  == 'POST'){
    $first_name =mysqli_real_escape_string($conn, input_cleaner($_POST['first_name'])) ;
    $other_name =mysqli_real_escape_string($conn, input_cleaner($_POST['other_name'])) ;
    $phone =mysqli_real_escape_string($conn, input_cleaner($_POST['phone'])) ;
    $email =mysqli_real_escape_string($conn, input_cleaner($_POST['email'])) ;
    $course =mysqli_real_escape_string($conn, input_cleaner($_POST['course'])) ;
    $about =mysqli_real_escape_string($conn, input_cleaner($_POST['about'])) ;
    $date =mysqli_real_escape_string($conn, input_cleaner($_POST['date'])) ;


    $sql ="insert into enquiries(first_name, other_name, phone, email, course, about, date)
values ('$first_name', '$other_name', '$phone', '$email', '$course', '$about','$date');";


if(mysqli_query($conn,$sql)){
    // echo "<h1 class='drop'>Thank You For submiting</h1>";
    $sql="select id from enquiries where date='$date'";
    $result= mysqli_query($conn,$sql);
}else{
    // echo "creation unsuccessful". mysqli_error($conn);
}
}
?>

<div class="navbar">
        <nav>
            <div class="logo">
                <h1>AL-IBRA</h1>
                <i class='bx bxs-graduation' style='color:#0897fa'  ></i>
            </div>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="staff.php">Staff</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="enquiries.php">Enquiries</a></li>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="invoice.php">Billing/Invoice</a></li>
                <li><a href="receipt.php">Receipt</a></li>
                <li><a href="logout.php" class="out">Log Out</a></li>
            </ul>
        </nav>
    </div>
    <form action="" method="post" autocomplete="off">
        <input type="text" required name="first_name" placeholder="First Name"> <input type="text" name="other_name" placeholder="Last Name"><br>
        <input type="text" required placeholder="Phone" name="phone"><br>
        <input type="email" required name="email" placeholder="E-Mail"><br>
        <input type="text" required name="course" placeholder="Course"><br>
        <textarea name="about" required id="" cols="30" rows="10" placeholder="How did you hear about Us......?"></textarea><br>
        <input type="date" name="date" required><br>

        <input type="submit" value="Submit Enquiries">
        <a href="sub_enquiries.php">Submitted Enquiries</a>
    </form>
</body>
</html>
<?php
}else{
    header("location: login.php");
}
?>