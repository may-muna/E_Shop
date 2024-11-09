<?php 
include('../include/db.php');
include('../functions/common_function.php');

if(isset($_GET['id'])){
    $u_id=$_GET['id'];
   
}
$ip=getIPAddress();
$total_price=0;
$cart_query="select * from cart where ip='$ip'";
$r=mysqli_query($con,$cart_query);
$invoice_no=mt_rand();
$status='pending';
$count_pro=mysqli_num_rows($r);
while($row_pri=mysqli_fetch_array($r)){
    $pro_id=$row_pri['pro_id'];
    $cart_product="select * from products where pro_id=$pro_id";
    $run_pri=mysqli_query($con,$cart_product);
    while($row_pro_pri=mysqli_fetch_array($run_pri)){
        $pro_price=array($row_pro_pri['price']);
        $total_p=array_sum($pro_price);
        $get_cart="select * from cart where pro_id=$pro_id";
        $run_cart=mysqli_query($con,$get_cart);
        $get_item=mysqli_fetch_array($run_cart);
        $quantity=$get_item['quantity']?? 1;       
        $sub=$total_p*$quantity;       
        $total_price+=$sub;
       
    }
   
}

$insert_order = "INSERT INTO orders (u_id, amount, invoice_no, total_pro, o_date, status) 
                 VALUES ('$u_id', '$total_price', '$invoice_no', '$count_pro', NOW(), '$status')";
$result_query=mysqli_query($con,$insert_order);
echo $result_query;
if($result_query){
    echo "<script>alert('Order are submited successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}else{
    echo "<script>alert('Error in submitting the order.try again')</script>";
}


$insert_pending_order = "INSERT INTO order_pending (u_id,invoice_no,pro_id,quantity,status) 
                 VALUES ('$u_id','$invoice_no','$pro_id',' $quantity','$status')";
$result_pending=mysqli_query($con,$insert_pending_order);


$empty_cart="Delete from cart where ip='$ip'";
$result_delete=mysqli_query($con,$empty_cart);

?> 
