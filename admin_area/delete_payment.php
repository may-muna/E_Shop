<?php
include('../admin_area/header.php');
include('../include/db.php');

if(isset($_GET['delete_payment'])){
    $delete_order=$_GET['delete_payment'];
    
    $delete_query="delete from payments where pay_id=$delete_order";
    $res=mysqli_query($con,$delete_query);
    if ($res) {
        echo "<script>alert('Payment deleted Successfully')</script>";
        echo "<script>window.open('./list_payment.php', '_self');</script>";
    } else {
        die("Delete  failed: " . mysqli_error($con));
    }

}


?>
<?php include('footer.php'); ?>
