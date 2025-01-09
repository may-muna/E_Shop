<?php
include('../admin_area/header.php');
include('../include/db.php');

if(isset($_GET['delete_user'])){
    $delete_user=$_GET['delete_user'];
    
    $delete_query="delete from user where id=$delete_user";
    $res=mysqli_query($con,$delete_query);
    if ($res) {
        echo "<script>alert('User deleted Successfully')</script>";
        echo "<script>window.open('./list_users.php', '_self');</script>";
    } else {
        die("Delete  failed: " . mysqli_error($con));
    }

}


?>
<?php include('footer.php'); ?>
