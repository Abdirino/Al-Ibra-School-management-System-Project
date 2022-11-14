<?php 
include "dbconn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Registration</title>
    <link rel="stylesheet" href="login.css">
    <style>
        body{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgb(8, 8, 60);
    flex-direction: column;
}
form{
    width: 500px;
    /* height: 600px; */
    display: flex;
    flex-direction: column;
    background-color: rgb(13, 72, 72);
    border-radius: 10px;
    margin-top: 30px;
}
form h1{
    font-size: 2.5rem;
    font-weight: bold;
    text-align: center;
    color: wheat;
}
form input{
    padding: 15px 30px;
    margin: 15px 30px;
    border-radius: 15px;
}
form select{
    padding: 15px 30px;
    margin: 15px 30px;
    border-radius: 15px;
}
/* .sub{
    padding: -20px -25px;
    margin: 10px 15px;
    border-radius: 10px;
} */
.sub:hover{
    background-color: black;
    color: wheat;
}
sub:active{
    background-color: rgb(42, 42, 42);
    color: wheat;
}
.drop{
    background-color: white;
    padding: 15px 20px;
    margin: 5px 10px;
    /* animation: disapear 5s; */
    /* visibility: hidden; */
    position: fixed;
    top: 0;
    border-radius: 10px;
}
@keyframes disapear{
    0%{
        opacity: 1;
        visibility: visible;
    }
    100%{
        opacity: 0;
        visibility: hidden;

    }
}
.textarea{
    margin: 20px 30px;
}
a{
    background-color: wheat;
    padding: 15px 30px;
    margin: 15px 30px;
    border-radius: 15px;
    text-decoration: none;
    color: black;
    font-weight: bold;
    font-size: 20px;
    text-align: center;
}
a:hover{
    background-color: black;
    color: wheat;
}
a:active{
    background-color: rgb(42, 42, 42);
    color: wheat;
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
    // $email= mysqli_real_escape_string($conn, input_cleaner($_POST['email']));
    $student_id =mysqli_real_escape_string($conn, input_cleaner($_POST['student_id'])) ;
    $first_name =mysqli_real_escape_string($conn, input_cleaner($_POST['first_name'])) ;
    $last_name =mysqli_real_escape_string($conn, input_cleaner($_POST['last_name'])) ;
    $gender =mysqli_real_escape_string($conn, input_cleaner($_POST['gender'])) ;
    $kin_name =mysqli_real_escape_string($conn, input_cleaner($_POST['kin_name'])) ;
    $kin_number =mysqli_real_escape_string($conn, input_cleaner($_POST['kin_number'])) ;


    $sql ="";

    if($first_name!=''){
        $sql.="update registration set first_name = '$first_name' where student_id = '$student_id';";
    }
    if($last_name!=''){
        $sql.="update registration set last_name = '$last_name' where student_id = '$student_id';";
    }
    if($gender!=''){
        $sql.="update registration set gender = '$gender' where student_id = '$student_id';";
    }
    if($kin_name!=''){
        $sql.="update registration set kin_name = '$kin_name' where student_id = '$student_id';";
    }
    if($kin_number!=''){
        $sql.="update registration set kin_number = '$kin_number' where student_id = '$student_id';";
    }
if(mysqli_multi_query($conn,$sql)){
    header("location: registration.php");
    // echo "<h1 class='drop'>Thank You For submiting</h1>";
}else{
    // echo "<h1 class='drop'>creation unsuccessful". mysqli_error($conn).'</h1>';
}
}
?>



        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" autocomplete="off">
            <h1>Update</h1>

            <!-- <select name="student_id" id=""> -->
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
        <!-- <option value="<?php echo $row["student_id"];?>"><?php echo $row["student_id"]." ". $row["first_name"];?></option> -->

    <!-- </select> -->
            <input type="text" name="student_id" value="<?php echo $row["student_id"];?>" hidden>
            <input type="text" placeholder="<?php echo $row["first_name"];?>" name="first_name">
            <input type="text" placeholder="<?php echo $row["last_name"];?>" name="last_name">
            <select name="gender" id="">
                <option value="">Unchanged</option>
                <option value="Male">Male</option>
                <option value="female">Female</option>
            </select>
            <input type="text" name="kin_name" placeholder="<?php echo $row["kin_name"];?>">
            <input type="number" name="kin_number" placeholder="<?php echo $row["kin_number"];?>">

            <input type="submit" class="sub" value="UPDATE REGISTRATION">
            <a href="registration.php">Back To Registration</a>
        </form>

        <?php
    }
}
?>
</body>
</html>