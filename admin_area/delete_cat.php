<?php
include('../admin_area/header.php');
include('../include/db.php');

if(isset($_GET['delete_cat'])){
    $delete_cat=$_GET['delete_cat'];
    
    $delete_query="delete from category where Cat_id=$delete_cat";
    $res=mysqli_query($con,$delete_query);
    if ($res) {
        echo "<script>alert('Category deleted Successfully')</script>";
        echo "<script>window.open('./view_cat.php', '_self');</script>";
    } else {
        die("Delete  failed: " . mysqli_error($con));
    }

}


?>
<?php include('footer.php'); ?>
