
<?php
include('config.php');
session_start();
$r_login = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="register.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <title>Document</title>
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
    <h1>Available Blood Samples</h1>
    <table class="table ta">
        <thead>
          <tr>
            <th scope="col">S.no</th>
            <th scope="col">Blood Group</th>
            <th scope="col">Capacity</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php
            $sql = "select * from blooddetails";
            $run = mysqli_query($con, $sql);
            $num=1;
            while($row = mysqli_fetch_assoc($run)){ ?>
                <tr>
                    <th scope="row"><?php echo$num ?></th>
                    <td><?php echo$row['BGroup']?></td>
                    <td><?php echo$row['capacity']?></td>
                </tr>
                <?php
                 $num=$num+1;
                }
          ?>
        </tbody>

    </table>
    <?php
    if(isset($_SESSION['loggedin']) || isset($_SESSION['h_loggedin'])|| $r_login==true)
    {?>
    <div class="tags">
        <div class="body">
            <button><a href="request_samples.php">Request Samples</a></button>
        </div>
    </div>
    <?php
    }
    ?>
</body>
</html>