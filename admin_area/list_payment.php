<?php
include('../admin_area/header.php');
include('../include/db.php');
?>
<h1 class="text-center">All Payments</h1>
<div class="table-responsive">
    <table class="table-center custom-table table-bordered mt-5 mb-5" style="margin: 0 auto; width: 50%;">
        <thead style="background-color:rgb(250, 236, 239);">
            <?php 
            $get_order="select * from payments ";
            $r=mysqli_query($con,$get_order);
            $row=mysqli_num_rows($r);
            echo "<tr class='text-center' >
                <th>SI_NO</th>
                <th>pay_id</th>
                <th>Order_id</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment mode</th>
                <th> Date</th>
                <th>Delete</th>
                </tr>
                </thead>
                <tbody>";
                if($row==0){
                    echo "<h2 class=text-center mt-5> No payments received Yet</h2>";
                }else{
                    $num=0;
                    while($row=mysqli_fetch_assoc($r)){
                        $o_id=$row['o_id'];
                        $pay_id=$row['pay_id'];
                        $amount=$row['amount'];
                        $invoice_no=$row['invoice_no'];
                        $pay_mode=$row['pay_mode'];
                        $date=$row['date'];                       
                        $num+=1;
                        ?>
                        <tr class='text-center'>
                        <td><?php echo $num; ?></td>
                        <td><?php echo $pay_id; ?></td>
                        <td><?php echo $o_id; ?></td>
                        <td><?php echo $amount; ?></td>
                        <td><?php echo $invoice_no; ?></td>
                        <td><?php echo $pay_mode; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><a href='delete_payment.php?delete_payment=<?php echo  $pay_id?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
                        <?php
                    }
                }
?>
            
        
        
            
        </tbody>
    </table>
</div>

<?php
include('footer.php'); ?>