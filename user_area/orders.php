<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
   
</head>

<body>
<?php
   
    $username=$_SESSION['username'];
    $get_user="select * from user where name='$username'";
    $r=mysqli_query($con,$get_user);
    $row=mysqli_fetch_assoc($r);
    $id=$row['id'];

?>
<h1 class="text-center my-5">My All Orders</h1>
<table class="table table-bordered mt-5 text-center">
   
    <tr class="bg-secondary">
        <th>SI no</th>
        <th>Amount Due</th>        
        <th>Total Products</th>
        <th>Invoice_no</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    <tbody class="bg-info">
        <?php 
        $get_order="select * from orders where u_id=$id";
        $rs=mysqli_query($con,$get_order);
        $num=1;
        while($row=mysqli_fetch_assoc($rs)){
            $oid=$row['o_id'];
            $amount=$row['amount'];
            $total_pro=$row['total_pro'];
            $invoice=$row['invoice_no'];        
            $status=$row['status'];
            if($status=='pending'){
                $status='Incomplete';
            }else{
                $status='Complete';
            }

            $o_date=$row['o_date'];
       

            echo "<tr>
            <td>$num</td>
            <td>$amount</td>
            <td>$total_pro</td>
            <td>$invoice</td>
            <td>$o_date</td>
            <td>$status</td>";
            ?>
            <?php
            if($status=='Complete'){
                echo "<td>Paid</td>";
            }else{
                echo "<td><a href='confirm_payment.php?o_id=$oid' class='text-black'>Confirm</a></td></tr>";
            } 
            
       $num++;
    }

?>      
        
    </tbody>
</table>
</body>
</html>
<?php
?>