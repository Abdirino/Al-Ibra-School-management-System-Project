<?php
session_start();

error_reporting(0);
ini_set('display_errors', 0);

// try {
//     echo $_SESSION['authlevel'] ;
// }catch(Exception $e){
//     echo "Not Created";
// }





if ($_SESSION['authlevel'] > 0) {
    header("location: dashboard.php");
} else {



    include "dbconn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo 'match';
            while ($row = mysqli_fetch_assoc($result)) {
                // echo $row['user_group'];
                if ($row['user_group'] == 'sys_admin') {
                    $_SESSION['authlevel'] = 4;
                } elseif ($row['user_group'] == 'admin') {
                    $_SESSION['authlevel'] = 3;
                } elseif ($row['user_group'] == 'accounts') {
                    $_SESSION['authlevel'] = 2;
                } elseif ($row['user_group'] == 'management') {
                    $_SESSION['authlevel'] = 1;
                }
            }

            header("location: dashboard.php");
        } else {
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
        <style>
            * {
                box-sizing: border-box;
            }

            body {
                background: #131315;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }

            .login-box {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 400px;
                padding: 40px;
                transform: translate(-50%, -50%);
                background: #242026;
                box-shadow: 0 15px 25px rgba(143, 124, 236, 0.7);
                border-radius: 10px;
            }

            .login-box h2 {
                font-size: 25px;
                letter-spacing: 4px;
                margin: 0 0 30px;
                padding: 0;
                color: #fff;
                text-align: center;
            }

            .login-box .user-box input {
                position: relative;
                width: 100%;
                padding: 10px 0;
                font-size: 16px;
                color: #fff;
                margin-bottom: 30px;
                border: none;
                border-bottom: 1px solid #fff;
                border-radius: 10px;
                outline: none;
                background: transparent;
            }

            .login-box .user-box label {
                font-size: 20px;
                position: relative;
                left: 10px;
                top: -60px;
                padding: 10px 0;
                font-size: 16px;
                color: #fff;
                pointer-events: none;
                transition: .5s;
            }

            .login-box .user-box input:focus~label,
            .login-box .user-box input:valid~label {
                top: -85px;
                left: 0;
                color: #8F7CEC;
                font-size: 12px;
            }

            #submit {
                padding: 10px 20px;
                color: #CBBDDB;
                background-color: #131315;font-weight: bold;
                font-size: 16px;
                text-decoration: none;
                text-transform: uppercase;
                overflow: hidden;
                transition: .5s;
                letter-spacing: 4px;
                border: 1px solid #8F7CEC;
                margin: auto;
            }

            #submit:hover {
                background: #8F7CEC;
                color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 5px #8F7CEC, 0 0 25px #8F7CEC;
            }

            .button-form {
                display: flex;
                flex-direction: row;
                margin-top: 20px;
            }

            #register {
                font-size: 14px;
                text-decoration: none;
                color: #CBBDDB;
                margin: auto;
                width: 60%;
                text-align: center;
            }

            #register a {
                margin: auto;
                color: #8F7CEC;
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <div class="login-box">
            <h2>Login</h2>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" autocomplete="off">
                <div class="user-box">
                    <input type="text" name="username" required>
                    <label for="">Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
        </div>
        <div class="button-form">
            <!-- <a href="#" id="submit">Login</a> -->
            <input type="submit" value="Login" id="submit">
        </div>
        </form>
        </div>
    </body>

    </html>
<?php
}
?>