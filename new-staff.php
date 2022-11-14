<?php 
include "dbconn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Staff</title>
    <style>
        *{
            margin: 0; padding: 0;
            box-sizing: border-box;
            text-transform: capitalize;
            text-decoration: none;
            list-style: none;
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
            line-height: 10px;
            position: relative;
            bottom: 30px;
        }
        .navbar nav ul li a:hover{
            background-color: white;
            border-radius: 10px;
        }
        body{
            background-color: teal;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        form{
            background-color: aqua;
            max-width: 300px;
            border-radius: 10px;
            margin-top: 50px;
            text-align: center;
        }
        form p{
            font-size: 25px;
        }
        form input{
            padding: 8px 25px;
            margin: 10px;
            border-radius: 5px;
        }
        form select{
            padding: 5px 10px;
            margin: 10px 10px;
        }
        form a{
            background-color: white;
            color: black;
            padding: 6px 15px;
            border: 2px solid black;
            border-radius: 5px;
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
    $middle_name =mysqli_real_escape_string($conn, input_cleaner($_POST['middle_name'])) ;
    $last_name =mysqli_real_escape_string($conn, input_cleaner($_POST['last_name'])) ;
    $gender =mysqli_real_escape_string($conn, input_cleaner($_POST['gender'])) ;
    $position =mysqli_real_escape_string($conn, input_cleaner($_POST['position'])) ;
    $department =mysqli_real_escape_string($conn, input_cleaner($_POST['department'])) ;
    $join_date =mysqli_real_escape_string($conn, input_cleaner($_POST['join_date'])) ;


    $sql ="insert into staff_details(first_name, middle_name, last_name, gender, position, department, join_date)
values ('$first_name', '$middle_name', '$last_name', '$gender', '$position', '$department','$join_date');";


if(mysqli_query($conn,$sql)){
    // echo "<h1 class='drop'>Thank You For submiting</h1>";
    $sql="select id from user where join_date='$join_date'";
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



    <form action="" method="post">
        <h1>Staff Signup</h1>
        <input type="text" name="first_name" id="" required placeholder="First Name">
        <input type="text" name="middle_name" id="" required placeholder="Middle Name">
        <input type="text" name="last_name" id="" required placeholder="Last Name">
        <input type="text" name="gender" required placeholder="Gender">
        <input type="text" name="position" required placeholder="Position">
        <input type="text" name="department" required placeholder="Department">

        
        <p>Registration Date :</p><input type="date" name="join_date" id="" required><br><br>
        <input type="submit" value="Add Staff" class="btn">
        <a href="staff.php">Staff List</a>
    </form>
</body>
</html>