<?php
include('../include/db.php');
include('../functions/common_function.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!----bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    img{
        width:100%;
        margin:auto;
        display: block;


    }
</style>
<body>
    <?php
    global $con;
    $ip=getIPAddress();
    $get_user="select * from user where ip='$ip'";
    $r=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($r);
    $id=$run_query['id'];

    ?>
<div class="container">
    <div class="bg-secondary py-3 m-5">
        <h3 class="text-center text-light">Payment Options </h3>
    </div>
    <div class="row py-4 d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6">
        <a href="https://www.bkash.com" target="_blank"><img src="../admin_area/bk.png" alt=""></a>
        </div>
        <div class="col-md-6">
        <a href="order.php?id=<?php echo $id ?>"><h2 class="text-center">Pay Offline</h2></a>
        </div>
       
    </div>
</div>

</body>
</html>