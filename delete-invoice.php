<?php 
include "dbconn.php";
if($_SERVER["REQUEST_METHOD"]== "POST"){  

    $first_name =mysqli_real_escape_string($conn,$_POST['first_name']) ;

    $sql= "DELETE FROM invoice WHERE first_name='$first_name'";

if (mysqli_query($conn, $sql)){
    // echo "success";
}else{
    echo "unsuccessful". mysqli_error($conn);
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deleteForm PHP</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 60%;
            font-weight: bold;
        }
        form{
            background-color: indianred;
            border-radius: 10px;
            padding: 100px 140px;
            margin: auto;
            display: flex;
            flex-direction: column;
        }
        form select{
            padding: 10px 90px;
        }
        input{
            padding: 10px 30px;
            text-align: center;
            margin-top: 30px;
            background-color: darkorchid;
            border-radius: 20px;
        }
        input:hover{
            background-color: darkmagenta;
        }
        a{
            padding: 15px 30px;
            text-align: center;
            margin-top: 30px;
            background-color: darkorchid;
            border-radius: 20px;
            border: 2px solid black;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

    <select name="first_name" id="">
    <?php 

$sql= "SELECT * from invoice";

$result= mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    while($row= mysqli_fetch_assoc($result)){
        ?>
        <option value="<?php echo $row["first_name"];?>"><?php echo $row["first_name"];?></option>
        <?php
        // echo $row["first_name"]. "<br>";
        // echo $row["last_name"]. "<br>";
        // echo $row["email"]. "<br>";
        // echo $row["password"]. "<br>";
        // echo $row["phone_number"]. "<br>";
        // echo $row["reg_date"]. "<br> <br>";
    }
}
?>
    </select>

    <input type="submit" value="DELETE">
    <a href="registration.php">Back to Invoices</a>

    </form>
</body>
</html>