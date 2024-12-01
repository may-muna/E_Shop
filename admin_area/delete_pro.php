<?php
include('../admin_area/header.php');
include('../include/db.php');

if(isset($_GET['delete_pro'])){
    $delete_id=$_GET['delete_pro'];

    $delete_product="Delete from products where pro_id= $delete_id";
    $result=mysqli_query($con,$delete_product);
    if($result){
        echo "<script>alert('Product deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";

    }
    
}

?>


<?php
include('footer.php');
?>