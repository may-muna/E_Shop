<?php
include('../admin_area/header.php');
include('../include/db.php');

if(isset($_GET['delete_order'])){
    $delete_order=$_GET['delete_order'];
    
    $delete_query="delete from orders where o_id=$delete_order";
    $res=mysqli_query($con,$delete_query);
    if ($res) {
        echo "<script>alert('Order deleted Successfully')</script>";
        echo "<script>window.open('./lists_order.php', '_self');</script>";
    } else {
        die("Delete  failed: " . mysqli_error($con));
    }

}


?>
<?php include('footer.php'); ?>
