<?php
// Include database connection and common functions
include('../include/db.php');
include('../functions/common_function.php');

// Start the session
session_start();

// Check if the form is submitted
if (isset($_POST['admin_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to select the admin with matching credentials
    $select_query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $r = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($r);

    // If a matching admin is found, set session and redirect
    if ($rows_count > 0) {
        // Fetch the user data from the query
        $admin_data = mysqli_fetch_assoc($r);

        // Set session variables for email and id
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $admin_data['id'];  // Store the admin's id in the session

        // Redirect to the dashboard
        echo "<script>
            window.location.href = './index.php';
        </script>";
    } else {
        // Display error if login fails
        echo "<script>
            alert('Invalid Username or Password');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        body {
            overflow: hidden;
        }
        .admin {
            width: 400px;
            height: 400px;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../admin_area/5.jpg" alt="Admin Registration" class="admin">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username: </label>
                        <input type="text" id="username" name="email" placeholder="Enter Your Username" required class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password: </label>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password" required class="form-control">
                    </div>

                    <div>
                        <input type="submit" name="admin_login" class="bg-info py-2 px-3 border-0" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_reg.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
