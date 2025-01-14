<?php
include('../include/db.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!----bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!----css---->
    <link rel="stylesheet" href="style.css">
    <!----font awesome---->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow: hidden;
        }
        .admin {
            width: 600px;
            height: 500px;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../admin_area/5.jpg" alt="Admin Registration" class="admin">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" id="username" name="username" placeholder="Enter Your Username" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter Your Email" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="image" class="form-label">Admin Image:</label>
                        <input type="file" id="image" name="image" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Your Password" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="phone" class="form-label">Phone number:</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter Your Phone Number" required class="form-control">
                    </div>
                    <div>
                        <input type="submit" name="admin_reg" class="bg-info py-2 px-3 border-0" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="admin_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['admin_reg'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone = $_POST['phone'];

    // Check if image was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        // Upload image
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
        
            // Move the uploaded file
            if (!move_uploaded_file($image_tmp, "../admin_img/$image")) {
                echo "<script>alert('Image upload failed. Please try again.');</script>";
                exit();
            }
        } else {
            echo "<script>alert('Please upload an image.');</script>";
            exit();
        }
    }        
    global $con;

    // Check for existing username or email
    $select_query = "SELECT * FROM admin WHERE name='$username' OR email='$email'";
    $r = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($r);

    if ($rows_count > 0) {
        echo "<script>
        swal({
            title: 'Error',
            text: 'Username & Email already exists!',
            icon: 'error',
            button: 'OK',
        });
        </script>";
    } elseif ($password != $confirm_password) {
        echo "<script>
        swal({
            title: 'Error',
            text: 'Passwords do not match!',
            icon: 'error',
            button: 'OK',
        });
        </script>";
    } else {
        // Insert into database
        $insert_query = "INSERT INTO admin (name, email, password, image, phn) VALUES ('$username', '$email', '$password', '$image', '$phone')";
        $sql_execute = mysqli_query($con, $insert_query);

        if ($sql_execute) {
            echo "<script>
            swal({
                title: 'Success',
                text: 'Registration successful!',
                icon: 'success',
                button: 'OK',
            });
            </script>";
        } else {
            echo "<script>alert('Registration failed. Please try again.');</script>";
        }
    }
}
?>
