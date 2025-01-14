<?php 
include('../include/db.php');
include('../functions/common_function.php');
//include('../admin_area/header.php');

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!----bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!----css---->
    <link rel="stylesheet" href="style.css">
    <!----font awesome---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .admin_image{
            width: 50%;
            height: 40%;
            object-fit: contain; 
                    
        }
        .bt{
            width: 220px;
            height: 40px;
            background-color:rgb(250, 226, 210);
            font-weight: bold;
            
        }
        .footer{
            position: absolute;
            bottom: 0;

        }
        
    </style>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(250, 236, 239);">
        <div class="container-fluid">
            <img src="../images/logo.jpeg" alt="" class="width: 50px; ">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                <?php 
                if (isset($_SESSION['username'])) {
                    echo "<li class='nav-item ms-3'><a class='nav-link text-dark fs-4' href='#'><h2>Welcome " . $_SESSION['username'] . "</h2></a> </li>";
                    echo " <li class='nav-item ms-3'><a class='nav-link text-dark fs-4' href='./admin_logout.php'><h2>Logout</h2></a></li>";
                } else {
                        echo "<li class='nav-item ms-3'><a class='nav-link text-dark fs-4' href='#'><h2>Welcome Admin</h2></a></li>";
                        echo "<li class='nav-item ms-3'><a class='nav-link text-dark fs-4' href='./admin_login.php'><h2>Login</h2></a></li>";
                }
                ?>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<div class="container-fluid p-0">
   

    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-5">
            <?php 
                if (isset($_SESSION['username'])) {
                $username=$_SESSION['username'];
                $select="select * from admin where name='$username'";
                $r=mysqli_query($con,$select);
                $row=mysqli_fetch_array($r);                
                $img=$row['image'];
                //echo $img;
                echo"<a href='#'><img src='./admin_img/$img' alt='' class='admin_image ms-4' ></a>
                <h3 class='text-light my-4 ms-5'>$username </h3>";
                }
            ?>
            </div>

            <div class="button text-center w-100 ">
                <button class="my-3 bt"><a href="insert_product.php" class="nav-link   my-1">Insert Products</a></button>
                <button class="bt"><a href="view_products.php" class="nav-link  my-1">View Products</a></button>
                <button class="bt"><a href="insert_cat.php" class="nav-link  my-1">Insert Categories</a></button>
                <button class="bt" ><a href="view_cat.php" class="nav-link  my-1">View Categories</a></button>
                <button class="bt"><a href="lists_order.php" class="nav-link  my-1">All Orders</a></button>
                <button class="bt"><a href="list_payment.php" class="nav-link  my-1">Payments</a></button>
                <button class="bt"><a href="list_users.php" class="nav-link  my-1">List Users</a></button>
                
            </div>
        </div>
    </div>
    <div class="container my-5">
       
    </div>  
</div>
<?php 
    include('footer.php');
?>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
<?php
        if(isset($_GET['insert_cat'])){
            include('insert_cat.php');
        }
        if(isset($_GET['view_Products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_pro'])){
            include('edit_pro.php');
        }
        if(isset($_GET['delete_pro'])){
            include('delete_pro.php');
        }
        if(isset($_GET['view_cat'])){
            include('view_cat.php');
        }
        if(isset($_GET['edit_cat'])){
            include('edit_cat.php');
        }
        if(isset($_GET['delete_cat'])){
            include('delete_cat.php');
        }
        
        if(isset($_GET['lists_order'])){
            include('lists_order.php');
        }
        if(isset($_GET['delete_order'])){
            include('delete_order.php');
        }
        if(isset($_GET['list_payment'])){
            include('list_payment.php');
        }
        if(isset($_GET['delete_payment'])){
            include('delete_payment.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        if(isset($_GET['delete_user'])){
            include('delete_user.php');
        }

        
        ?>

