
<?php
session_start();
$r_login = false;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

</head>
<body>
    <!-- <img class="back"src="background.jpg" alt=""> -->
    <img src="back.jpg" alt="" class="back">
    <div class="heading">
        <div class="img">
            <img class="img" src="blood.png" alt="">
        </div>
        <div class="text">
            <h1>Welcome to blood bank</h1>
        </div>
    </div>
    <div class="tags">
        <div class="body">
            <button><a href="available_blood.php">Available blood Samples</a></button>
        </div>
        <?php
        if(isset($_SESSION['h_loggedin']))
        {
            ?>
            <div class="body">
            <button><a href="add_blood.php">Add Blood Info</a></button>
            </div>
            <div class="body">
            <button><a href="view_request.php">View Requests</a></button>
            </div>
            <?php
        }
        else
        {
            ?>
            <div class="body">
            <button><a href="request_samples.php">Request Samples</a></button>
            </div>
            <?php
        }
        if(isset($_SESSION['loggedin']) || isset($_SESSION['h_loggedin'])|| $r_login==true)
        {
            ?>
            <div class="body">
            <button><a href="logout.php">logout</a></button>
            </div>
            <?php
        }
        else
        {
        ?> 
         
    </div>
    <div class="body">
        If you want to register as hospital
        <button><a href="h_register.php">Click Here</a></button>
    </div>
    <div class="body">
        If you want to register as receiver
        <button><a href="r_register.php">Click Here</a></button>
    </div>
    <div class="body">
        If you want to login as Hospital
        <button><a href="h_login.php">Click Here</a></button>
    </div>
    <div class="body">
        If you want to login as receiver
        <button><a href="r_login.php">Click Here</a></button>
    </div>
    <?php
        }
        ?>
    
    
</body>
</html>