<?php 
session_start();
if($_SESSION['authlevel'] > 0 and $_SESSION['authlevel']!= 1 and  $_SESSION['authlevel']!= 2 and $_SESSION['authlevel'] != 3 ){

include "dbconn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
        body{
            background-color: blueviolet;
        }
        table, tr, td, th{
                padding: 15px 20px;
                border: 2px solid black;
                border-collapse: collapse;
                font-weight: bold;
                font-size: 18px;
            }
            th{
                font-size: 20px;
                font-weight: bolder;
            }
            table{
                width: 90%;
                margin: auto;
            }
            form{
                width: 50%;
                margin: auto;
            }
            .but a{
                background-color: #0897fa;
                padding: 15px 25px;
                border-radius: 5px;
                margin: auto;
                position: relative;
                left: 560px;
                top: 800px;
                color: white;
                font-weight: bold;
            }
            .btn a:hover{
                background-color: aqua;
            }
    </style>
</head>
<body>
    <?php 
    $sql="SELECT * from users";
    $query_run= mysqli_query($conn, $sql);

    if(mysqli_num_rows($query_run) > 0){
    ?>

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

    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="text" name="date" placeholder="Name">
            <select name="column" id="">
                <option value="date asc">Date Ascending</option>
                <option value="date desc">First Descending</option>
            </select>

            <!-- <input type="text" name="wage_gap" id="" placeholder="salary"> -->

            <input type="submit" name="submit" value="search">
            <!-- <input type="submit" name="submit" value="view_all"> -->
    </form>

    <table>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Type Of User</th>
                <th>Department</th>
            </tr>
            <?php 
            while($row= mysqli_fetch_assoc($query_run)){
            ?>
            <tr>
                <td><?php echo $row["first_name"]; ?></td>
                <td><?php echo $row["middle_name"]; ?></td>
                <td><?php echo $row["last_name"]; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["user_group"]; ?></td>
                <td><?php echo $row["department"]; ?></td>
            </tr>

            <?php
                    }
                }
?>

<div class="but">
            <a href="create-user.php">Add New User</a>
            <a href="users-delete.php">Delete User</a>
        </div>
</body>
</html>
<?php
}else{
    header("location: login.php");
}
?>