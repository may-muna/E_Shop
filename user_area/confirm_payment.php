<?php 
include('../include/db.php');
session_start();
if(isset($_GET['o_id'])){
    $oid=$_GET['o_id'];
    $select_data="select * from orders where o_id=$oid";   
    $res=mysqli_query($con,$select_data);    
    $row_f=mysqli_fetch_assoc($res);
    $invoice_no=$row_f['invoice_no'];
    $amount_due=$row_f['amount'];

}
if(isset($_POST['confirm_payment'])){
    $invoice_no=$_POST['invoice_no'];
    $amount_due=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    
    $insert_query="insert into payments (o_id,invoice_no,amount,pay_mode) values($oid,$invoice_no,$amount_due,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_order="update orders set status='Complete' where o_id=$oid ";
    $res=mysqli_query($con,$update_order);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!----bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container my-5">
    <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_no" value="<?php echo $invoice_no?>">
            </div> 
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due?>">
            </div> 
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode"class="form-select w-50 m-auto" >
                    <option>Select Payment Mode</option>
                    <option>Bkash</option>
                    <option>Nagad</option>
                    <option>cash on delivery</option>
                    <option>Pay Offline</option>
                </select>
            </div> 
            <div class="form-outline my-4 text-center w-50 m-auto">
               <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>

        </form>


    </div>
</body>
</html>