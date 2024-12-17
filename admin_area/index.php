<?php 
include('../include/db.php');
include('../functions/common_function.php');
include('../admin_area/header.php');
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
            width: 100px;
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
   

    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-5">
                <a href="#"><img src="../images/a.jpg" alt="" class="admin_image" ></a>
                <p class="text-light text-center">Admin Name</p>
            </div>

            <div class="button text-center w-100 ">
                <button class="my-3 bt"><a href="insert_product.php" class="nav-link   my-1">Insert Products</a></button>
                <button class="bt"><a href="view_products.php" class="nav-link  my-1">View Products</a></button>
                <button class="bt"><a href="insert_cat.php" class="nav-link  my-1">Insert Categories</a></button>
                <button class="bt" ><a href="view_cat.php" class="nav-link  my-1">View Categories</a></button>
                <button class="bt"><a href="#" class="nav-link  my-1">All Orders</a></button>
                <button class="bt"><a href="#" class="nav-link  my-1">Payments</a></button>
                <button class="bt"><a href="#" class="nav-link  my-1">List Users</a></button>
                
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


        
        ?>

