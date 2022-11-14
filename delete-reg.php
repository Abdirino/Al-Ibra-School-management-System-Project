<?php 
include "dbconn.php";
if($_SERVER["REQUEST_METHOD"]== "POST"){  

    $student_id =mysqli_real_escape_string($conn,$_POST['student_id']) ;

    $sql= "DELETE FROM registration WHERE student_id='$student_id'";

if (mysqli_query($conn, $sql)){
    header("location: registration.php");
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

    <!-- <select name="first_name" id=""> -->
    <?php 

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$url = "https://";   
else  
$url = "http://";   
// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    

// echo $url;


// Initialize URL to the variable
// $url = 'https://www.geeksforgeeks.org?name=Tonny';
	
// Use parse_url() function to parse the URL
// and return an associative array which
// contains its various components
$url_components = parse_url($url);

// Use parse_str() function to parse the
// string passed via URL
parse_str($url_components['query'], $params);
	
// Display result
$id= $params['id'];

$sql= "SELECT * from registration WHERE student_id= '$id'";

$result= mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    while($row= mysqli_fetch_assoc($result)){
        ?>
        <input type="text" name="student_id" value="<?php echo $row["student_id"];?>" hidden>
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

    <input type="submit" value="DELETE">
    <a href="registration.php">Back to Registration</a>

    </form>
</body>
</html>