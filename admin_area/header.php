<?php
session_start();

if (isset($_SESSION['id'])) {
    // Use the session id to fetch the admin details
    $id = $_SESSION['id'];
    include('db.php');
    $sql = "SELECT * FROM admin WHERE id = $id";
    $exe = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($exe);
} else {
    // If no session exists, redirect to login page
    header('Location: admin_login.php');
    exit;
}

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
</head>
<body>
    <!--navbar-->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(250, 236, 239);">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                <?php 
                if (isset($_SESSION['email'])) {
                    echo "<li class='nav-item ms-3'><a class='nav-link text-dark fs-4' href='#'><h2>Welcome " . $data['name'] . "</h2></a> </li>";
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