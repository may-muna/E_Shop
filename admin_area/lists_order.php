<?php
include('../admin_area/header.php');
include('../include/db.php');
?>
<h1 class="text-center">All Orders</h1>
<div class="table-responsive">
    <table class="table-center custom-table table-bordered mt-5 mb-5" style="margin: 0 auto; width: 50%;">
        <thead style="background-color:rgb(250, 236, 239);">
            <?php 
            $get_order="select * from orders ";
            $r=mysqli_query($con,$get_order);
            $row=mysqli_num_rows($r);
            echo "<tr class='text-center' >
                <th>SI_no</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Total Products</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Delete</th>
                </tr>
                </thead>
                <tbody>";
                if($row==0){
                    echo "<h2 class=text-center mt-5> No Orders Yet</h2>";
                }else{
                    $num=0;
                    while($row=mysqli_fetch_assoc($r)){
                        $o_id=$row['o_id'];
                        $u_id=$row['u_id'];
                        $amount=$row['amount'];
                        $invoice_no=$row['invoice_no'];
                        $total_pro=$row['total_pro'];
                        $o_date=$row['o_date'];
                        $status=$row['status'];
                        $num+=1;
                        ?>
                        <tr class='text-center'>
                        <td><?php echo $num; ?></td>
                        <td><?php echo $amount ?></td>
                        <td><?php echo $invoice_no ?></td>
                        <td><?php echo $total_pro ?></td>
                        <td><?php echo $o_date ?></td>
                        <td><?php echo $status ?></td>
                        <td><a href='delete_order.php?delete_order=<?php echo  $o_id?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
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