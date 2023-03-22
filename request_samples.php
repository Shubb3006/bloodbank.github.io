<?php
session_start();
include('config.php');
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  if(isset($_POST['name']))
  {
    if($_POST['blood']=='a+' || $_POST['blood']=='b+' || $_POST['blood']=='b-' || $_POST['blood']=='a-' || $_POST['blood']=='ab-' || $_POST['blood']=='ab+' || $_POST['blood']=='o-'  || $_POST['blood']=='o+' || $_POST['blood']=='A+' || $_POST['blood']=='B+' || $_POST['blood']=='O+' || $_POST['blood']=='AB+' || $_POST['blood']=='A-' || $_POST['blood']=='B-' || $_POST['blood']=='O-' || $_POST['blood']=='AB-')
    {
      $blood=$_POST['blood'];
      $name=$_POST['name'];

      $sql="INSERT INTO `request` (`Name`, `BGroup`) VALUES ('$name', '$blood')";
      $stmt=mysqli_query($con,$sql);
      if($stmt)
      {
        header('location:index.php');
      }
    }
    else
    {
      echo"Please enter the appropriate blood group";
    }
  }
  
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="login.css">
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
    <h1>Request Sample</h1>
  <div class="form">
    <form action="" method="post">
      <p id="label">Name</p>
      <input type="text" name="name" id="name" placeholder="Enter your Name" required><br>
      <p id="label">Blood Group</p>
      <input type="text" name="blood" id="blood" placeholder="Enter your Blood Group" required><br>
      <!-- <input type="submit" value=""> -->
      <input type="submit" class="btn" value="Submit">
    </form>
    
  </div> 
</body>
</html>
<?php
}
else
{
  header('location:r_login.php');
}
?>

