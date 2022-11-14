<?php
session_start();
if($_SESSION['authlevel'] > 0){



include "dbconn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
            margin: 0;
            padding: 0;
            text-decoration: none;
            box-sizing: border-box;
            list-style: none;
            text-transform: capitalize;
        }

        .navbar {
            background-color: black;
            width: 100%;
            min-height: 90px;
        }

        .navbar nav .logo {
            display: inline;
            display: flex;
            flex-direction: row;
        }

        .navbar nav .logo h1 {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 40px;
            color: aqua;
            display: inline;
            margin-top: 20px;
            margin-left: 10px;
        }

        .navbar nav .logo i {
            font-size: 60px;
            margin-top: 10px;
            margin-left: 10px;
        }

        .navbar nav ul {
            float: right;
            display: flex;
            flex-direction: row;
        }

        .navbar nav ul li a {
            padding: 25px 8px;
            color: aqua;
            font-size: 18px;
            font-weight: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-right: 20px;
            line-height: 10px;
            position: relative;
            bottom: 30px;
        }
        /* .navbar nav ul li a:nth-child(8){
            background-color: wheat;
            color: #0897fa;
        } */
        .out{
            background-color: white;
            border-radius: 10px;
        }

        .navbar nav ul li a:hover {
            background-color: white;
            border-radius: 10px;
        }
        .out:hover{
            background-color: black;
        }
        .school-info{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            text-align: center;
            background-color: #0897fb;
        }
        .school-info h1{
            font-size: 30px;
            border-bottom: 2px solid black;
            font-weight: bold;
            margin: 10px 20px;
        }
        .school-info p{
            font-size: 22px;
            font-weight: bold;
            margin: 10px 30px;
        }
        .reports{
            display: flex;
            flex-direction: row;
        }
        .reports .report{
            width: 350px;
            height: 200px;
            margin: 10px 25px;
            background: linear-gradient(green, blue);
            border-radius: 10px;
            text-align: center;
        }
        .reports .report h2{
            margin: 18px 10px;
            font-size: 35px;
            font-weight: bold;
        }
        .reports .report p{
            font-size: 50px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <nav>
            <div class="logo">
                <h1>AL-IBRA</h1>
                <i class='bx bxs-graduation' style='color:#0897fa'></i>
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
    <div class="school-info">
        <h1>AL-IBRA INTEGRATED SCHOOL</h1>
        <p>AL-IBRA INTEGRATED SCHOOL is a collegiate research School in Moyale, Kenya. There is evidence 
            of teaching as early as 1096,[2] making it the oldest university in the English-speaking world and 
            the world's second-oldest university in continuous operation.[2][10][11] It grew rapidly from 1167
            when Henry II banned English students from attending the University of Paris.[2] After disputes 
            between students and Oxford townsfolk in 1209, some academics fled north-east to Cambridge where
            they established what became the University of Nairobi.[12] The two English ancient universities
            share many common features, are jointly referred to as Oxbridge. Both are ranked among the most
            prestigious universities in the world.</p>
    </div>

    <div class="reports">
        <div class="report">
            <h2>Registration</h2>
            <?php
            require "dbconn.php";

            $query= "SELECT * FROM registration ORDER BY reg_date";
            $query_run= mysqli_query($conn, $query);
            // print_r($query_run);
            if ($row= mysqli_num_rows($query_run)) {

            echo "<h1>".$row."</h1>";}
            ?>
            <!-- <p>6</p> -->
        </div>
        <div class="report">
            <h2>Staff</h2>
            <?php
            require "dbconn.php";

            $query= "SELECT * FROM staff_details";
            $query_run= mysqli_query($conn, $query);
            // print_r($query_run);
            if ($row= mysqli_num_rows($query_run)) {

            echo "<h1>".$row."</h1>";}
            ?>
            <!-- <p>6</p> -->
        </div>
        <div class="report">
            <h2>Users</h2>
            <?php
            require "dbconn.php";

            $query= "SELECT * FROM users";
            $query_run= mysqli_query($conn, $query);
            // print_r($query_run);
            if ($row= mysqli_num_rows($query_run)) {

            echo "<h1>".$row."</h1>";}
            ?>
        </div>
        <div class="report">
            <h2>Enquiries</h2>
            <?php
            require "dbconn.php";

            $query= "SELECT * FROM enquiries";
            $query_run= mysqli_query($conn, $query);
            // print_r($query_run);
            if ($row= mysqli_num_rows($query_run)) {

            echo "<h1>".$row."</h1>";}
            ?>
        </div>
    </div>

</body>

</html>

<?php 
}else{
    header("location: login.php");
}
?>