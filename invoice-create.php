<?php
include "dbconn.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $date = $_POST['date'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $course = $_POST['course'];
    $tuition = $_POST['tuition'];
    $hostel = $_POST['hostel'];
    $library = $_POST['library'];
    $total = $_POST['total'];


    $sql = "INSERT INTO `invoice`(`date`, first_name ,last_name,course,`tuition`, `hostel`, `library`, `total`) VALUES 
('$date','$first_name','$last_name','$course','$tuition','$hostel','$library','$total')";

    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT id from invoice where date='$date'";
        $result = mysqli_query($conn, $sql);
    } else {
        echo "creation unsuccessful" . mysqli_error($conn);
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice creation</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
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
            /* line-height: 10px; */
            position: relative;
            bottom: 30px;
        }

        .navbar nav ul li a:hover {
            background-color: white;
            border-radius: 10px;
        }

        form {
            max-width: 500px;
            background-color: #0897fa;
            margin: auto;
            border-radius: 10px;
            margin-top: 20px;
        }

        form input {
            padding: 10px 15px;
            margin-bottom: 20px;
            margin-top: 10px;
            margin-left: 20px;
            border-radius: 10px;
        }

        form textarea {
            padding: 10px 15px;
            margin-bottom: 20px;
            margin-left: 20px;
            border-radius: 10px;
        }

        form a {
            padding: 10px 15px;
            margin-bottom: 20px;
            margin-top: 10px;
            margin-left: 20px;
            border-radius: 10px;
            background-color: white;
            color: black;
            border: 2px solid black;
        }

        form h2 {
            text-align: center;
            border-bottom: 1px solid black;
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

    <form action="" method="post" autocomplete="off">
        <h2>Student Info</h2>
        <input type="date" name="date" required><br>
        <input type="text" required name="first_name" placeholder="First Name">
        <input type="text" required name="last_name" placeholder="Last Name">
        <input type="text" required name="course" placeholder="Course Taken"><br>
        <input type="text" required name="tuition" placeholder="Tuition-Fees"><br>
        <input type="text" name="hostel" placeholder="Hostel Fees"><br>
        <input type="text" name="library" placeholder="Library Fees"><br>
        <input type="text" name="total" placeholder="Total Amount"><br>


        <input type="submit" value="Add Invoice">
        <a href="invoice.php">Prev Invoices</a>
    </form>
</body>

</html>