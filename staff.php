<?php 
session_start();
if($_SESSION['authlevel'] > 0 and $_SESSION['authlevel']!= 1 and  $_SESSION['authlevel']!= 2 and $_SESSION['authlevel'] != 3 ){

include "dbconn.php";

$sql= "SELECT * from staff_details";

if($_SERVER["REQUEST_METHOD"]=='POST'){
    // print_r($_POST);
    if($_POST['submit']=='search'){
        $first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
        $column=mysqli_real_escape_string($conn,$_POST['column']);
        $order=mysqli_real_escape_string($conn,$_POST['order']);
        $wage_gap=mysqli_real_escape_string($conn,$_POST['wage_gap']);
        $sql= "SELECT * from user where phone_number>$wage_gap  order by $column $order";
    }elseif($_POST['submit']=='view_all'){
        $sql= "SELECT * from user";
    }
}

$result= mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
        ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Staff</title>
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
                font-size: 24px;
                font-weight: bolder;
            }
            table{
                width: 80%;
                margin: auto;
            }
            form{
                width: 50%;
                margin: auto;
            }
            .but a{
                background-color: #0897fa;
                padding: 15px 25px;
                border-radius: 10px;
                margin: auto;
                position: relative;
                left: 560px;
                top: 500px;
                color: white;
                font-weight: bold;
            }
            .btn a:hover{
                background-color: aqua;
            }
        </style>
    </head>
    <body>
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
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <!-- <input type="text" name="first_name" placeholder="Name">
            <select name="column" id="">
                <option value="first_name">First Name</option>
                <option value="last_name">Last Name</option>
                <option value="email">Email</option>
                <option value="phone_number">Phone</option>
                <option value="reg_date">Date</option>
            </select>
            <select name="order" id="">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>

            <input type="text" name="wage_gap" id="" placeholder="salary">

            <input type="submit" name="submit" value="search">
            <input type="submit" name="submit" value="view_all"> -->


    </form>
        <table>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last name</th>
                <th>Gender</th>
                <th>position</th>
                <th>Department</th>
                <th>Registration Date</th>
            </tr>
            <?php 
             while($row= mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row["first_name"]; ?></td>
                <td><?php echo $row["middle_name"]; ?></td>
                <td><?php echo $row["last_name"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td><?php echo $row["position"]; ?></td>
                <td><?php echo $row["department"]; ?></td>
                <td><?php echo $row["join_date"]; ?></td>
            </tr>

            <?php
        
    }
}
?>
        <div class="but">
            <a href="new-staff.php">Add New Staff</a>
            <a href="staff-delete.php">Delete Staff</a>
        </div>
        </table>
    </body>
    </html>
    <?php
}else{
    header("location: login.php");
}
    ?>