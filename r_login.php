<?php
// include('navigation.php');
require('config.php');

$n_insert = false;
$r_login = false;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $sql = "SELECT * FROM receiver WHERE Name='$username'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1)
    {  
      while($row = mysqli_fetch_assoc($result))
      {
        if (password_verify($password, $row['password']))
        {
          $r_login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          $_SESSION['sno']=$row['sno'];
          header("location: index.php");
        } 
        else
        {
          $n_insert = true;
          echo"Wrong password ! Please try again";
        }
      }
    }  
    else 
    {
      $n_insert = true;
      echo "Please enter the correct username !";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
        <p id="login">Login</p>
        <p id="label">Username</p>
        <input type="text" name="username" id="username" placeholder="Enter your username"><br>
        <p id="label">Password</p>
        <input type="password" name="password" id="pass" placeholder="Enter your password"><br>
        <div class="reg">
            <a href="r_register.php">Sign up</a>
            <button>Login</button>
        </div>
    </form>
    </div>
    <?php
// }  
?>
</body>
</html>
