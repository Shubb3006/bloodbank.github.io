<?php
require('config.php');

if(isset($_POST['blood']))
  {

    
    if($_POST['blood']=='a+' || $_POST['blood']=='b+' || $_POST['blood']=='b-' || $_POST['blood']=='a-' || $_POST['blood']=='ab-' || $_POST['blood']=='ab+' || $_POST['blood']=='o-'  || $_POST['blood']=='o+' || $_POST['blood']=='A+' || $_POST['blood']=='B+' || $_POST['blood']=='O+' || $_POST['blood']=='AB+' || $_POST['blood']=='A-' || $_POST['blood']=='B-' || $_POST['blood']=='O-' || $_POST['blood']=='AB-')
    {
        $blood=$_POST['blood'];
        $capacity=$_POST['capacity'];
        $sql="SELECT * FROM `blooddetails` WHERE `BGroup`='$blood'";
        $stmt=mysqli_query($con,$sql);
        $row = mysqli_num_rows($stmt);
        $select = mysqli_fetch_assoc($stmt);
        if($row > 0) 
        {

            $sno=$select['sno'];

            $newcapacity=$select['capacity']+$capacity;
            $sql="UPDATE `blooddetails` SET `capacity` = $newcapacity WHERE `blooddetails`.`sno` = $sno";
        
            $stmt=mysqli_query($con,$sql);
            if($stmt)
            {
                header('location:index.php');
            }

        }
        else
        {
            $sql="INSERT INTO `blooddetails` (`BGroup`, `capacity`) VALUES ('$blood', '$capacity')";
            $stmt=mysqli_query($con,$sql);
            header('location:index.php');

        }
    }
    else
    echo"Please enter the appropriate blood group";
    
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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
    <form action="" method="post">
        <h1>Add Blood Details</h1>
        <p id="label">Blood Group</p>
        <input type="text" name="blood" id="blood" placeholder="Enter the Blood Group" required>

        <p id="label">Capacity</p>
        <input type="text" name="capacity" id="capacity" placeholder="Enter your Capacity" required>
        <input type="submit" class="btn2" value="Submit" style="margin-top: 20px;">
    </form>
</body>
</html>