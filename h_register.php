<?php   
    // include("navigation.php");
    require ('config.php');
    // error_reporting(0);
    //creating columns for cours
    $username= $password= $confirm_password="";
    $username_err= $password_err= $confirm_password_err="";
    if($_SERVER['REQUEST_METHOD']=="POST") 
    {
        $param_username = $_POST['username'];
        $param_password =  $_POST['password'];

        if(empty(trim($_POST['username'])))
        {
            $username_err="Username cannot be blank";
        }
        else    
        {
            $sql="SELECT * FROM hospital WHERE Name='$param_username'";
            $stmt=mysqli_query($con,$sql);
            $row = mysqli_num_rows($stmt);
            if($row > 0) 
            {
                $username_err="This username is already taken";
            }
            else
            {
    
        if(empty(trim($_POST['password'])))
        {
            $password_err="Password cannot be blank";
        }
        else if(strlen(trim($_POST['password']))<6)
        {
            $password_err="Password length cannot be less than 6 characters";
        }
        else
        {
            $password=trim($_POST['password']);
        }

        if(trim($_POST['confirm_password'])!=trim($_POST['password']))
        {
            $confirm_password_err="Password should match";
        }
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
        {   
                $param_username = $_POST['username'];
                $param_password =  $_POST['password'];
                $param_password_hash=password_hash($param_password,PASSWORD_DEFAULT);
                $sql="INSERT INTO `hospital` (`Name`,`Password`) VALUES ('$param_username', '$param_password_hash')";
                $stmt=mysqli_query($con,$sql); 
                if($stmt){
                    $login = true;
                    session_start();
                    $_SESSION['h_loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['sno']=$row['sno'];
                    header("location: index.php");

                }
                else
                {
                    echo"Something went wrong , cannot redirect";
                }
            }
               
              mysqli_close($con);
        }
        }
    }
    
    

?>
<!-- <?php
// if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
//     header("location:home.php");
// }
// else
// // {
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>
<body>
<img src="back.jpg" alt="" class="back">
    <div class="heading">
        <div class="img">
            <img class="img" src="blood.png" alt="">
        </div>
        <div class="text">
            <h1>Welcome to blood bank</h1>
        </div>
    </div>  
    <div class="form">
        <form action="" method="post">
            <p id="signup">Signup as Hospital</p>
            <p id="label">Username</p>
            <input type="text" name="username" id="username" placeholder="Enter the username">
            <span><?php echo $username_err; ?></span>
            <p id="label">Password</p>
            <input type="password" name="password" id="pass" placeholder="Enter your password">
            <span><?php echo $password_err; ?></span>
            <p id="label">Confirm Password</p>
            <input type="password" name="confirm_password" id="pass" placeholder="Enter password again">
            <span><?php echo $confirm_password_err; ?></span>
            <div class="reg">
                <a href="h_login.php">Login</a>
                <button>Signup</button>
            </div>
        </form>
    </div>
</body>
</html>
<!-- <?php
// }
?> -->