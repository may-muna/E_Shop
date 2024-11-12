<?php 

if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from user where name=' $user_session_name'";
    $r=mysqli_query($con,$select_query);
    $row=mysqli_fetch_assoc($r);
    $id=$row['id'];
    $email=$row['email'];
    $address=$row['address'];
    $phone=$row['phone'];
    $username=$row['name'];

    if(isset($_GET['update'])){
        $update_id=$id;
        $username=$_POST['name'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $user_image=$_FILES['image']['name'];
        $user_tmp=$_FILES['image']['tmp'];
        move_uploaded_file($user_tmp,"./user_img/$user_image");
    
        $update_query="update user set ";
    
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .edit_img{
    width: 100px;
    object-fit:contain;
    height: 100px;

    }
</style>
<body>
    <h2 class="text-center my-5">Edit Account</h2>
    <form action="" method="post" enctype="multipart/form-data"class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username?>" name="username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto " value="<?php echo $email?>"name="email">
        </div>
        <div class="form-outline mb-4 w-50 m-auto d-flex">
            <input type="file" class="form-control m-auto" name="image">
            <img src="./user_img/<?php echo $user_img?>" alt="" class="edit_img">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto " value="<?php echo $address?>"name="address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto " value="<?php echo $phone?>"name="phone">
        </div>
        <input type="submit" value="update" class="text-light bg-secondary border-0 py-2 px-3" name="update">


    </form>
</body>
</html>