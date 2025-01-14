<?php
include('../include/db.php');
include('../functions/common_function.php');
@session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!----bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!----css---->
    <link rel="stylesheet" href="style.css">
    <!----font awesome---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow: hidden;
        }
        .admin{
            width: 600px;
            height: 500px;
        }
    </style>

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login </h2>
        <div class="row d-flex justify-content-center">
        <div class ="col-lg-6 col-xl-5">
                <img src="../admin_area/5.jpg" alt="Admin Registration" class="admin" >
            </div>
            <div class ="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username : </label>
                        <input type="text" id="username" name="username" placeholder="Enter Your Username" required class="form-control">
                    </div>
                   
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password : </label>
                        <input type="password" id="password" name="password" placeholder="Enter Your password" required class="form-control">
                    </div>
                    
                    <div>
                        <input type="submit" name="admin_login"   class="bg-info py-2 px-3 border-0" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account?<a href="admin_reg.php">Register</a> </p>
                    </div>
                    
                </form>
            </div>
        </div>
        
    </div>
</body>
</html>



<?php
if(isset($_POST['admin_login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $select_query="select * from admin where name= '$username' AND password ='$password'  ";
    $r=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($r);
    

    
    if($rows_count>0){
        $_SESSION['username']=$username;
        if($rows_count==1){
            echo"<script>alert('Login Successfull')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }else{
        echo "<script>
        swal({
            title: 'Error',
            text: 'invalid password or username ',
            icon: 'error',
            button: 'OK',
        });
    </script>";
    }

    

} 

?>