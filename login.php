<?php
session_start();

error_reporting(0);
ini_set('display_errors', 0);

// try {
//     echo $_SESSION['authlevel'] ;
// }catch(Exception $e){
//     echo "Not Created";
// }





if($_SESSION['authlevel'] > 0){
    header("location: dashboard.php");
}else{



include "dbconn.php";
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $username= mysqli_real_escape_string($conn,$_POST['username']);
    $password= mysqli_real_escape_string($conn,$_POST['password']);

    $sql= "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result= mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        echo 'match';
        while($row= mysqli_fetch_assoc($result)){
            // echo $row['user_group'];
            if($row['user_group']== 'sys_admin'){
                $_SESSION['authlevel']= 4;
            }elseif($row['user_group']== 'admin'){
                $_SESSION['authlevel']= 3;
            }elseif($row['user_group']== 'accounts'){
                $_SESSION['authlevel']= 2;
            }elseif($row['user_group']== 'management'){
                $_SESSION['authlevel']= 1;
            }}

            header("location: dashboard.php");
    }else{
        echo '<script type="text/javascript">
        alert("Invalid")

    </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login PHP</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <h1>Sign in</h1>
        <input type="text" name="username" placeholder="Username" id="">
        <input type="password" name="password" placeholder="Password" id="">

        <input type="submit" value="Sign In">
    </form>
</body>
</html>
<?php
}
?>