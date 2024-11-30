<?php
include('../admin_area/header.php');
include('../include/db.php');
?>
<style>
    .pro_img {
        width: 100px;
        
        object-fit: contain;  
    }
    .custom-table {
        border-collapse: collapse;
        width: 50% !important; /* Force the width to 50% */
        margin: 0 auto; /* Center the table horizontally */
    }
    
    .custom-table th, .custom-table td {
        padding: 20px;
        text-align: center;
    }
</style>

<h1 class="text-center mt-4">View All Products</h1>
<table class="custom-table table-bordered mt-5">
    <thead>
        <tr class="text-center" style="background-color:rgb(250, 236, 239);">
            <th>Product Id</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_pro = "select * from products";
        $r = mysqli_query($con, $get_pro);
        
        while ($row = mysqli_fetch_assoc($r)) {
            $pro_id = $row['pro_id'];
            $pro_title = $row['pro_title'];
            $pro_img = $row['pro_img'];
            $pro_price = $row['price'];
            $pro_status = $row['status'];
          
            ?>
            <tr class='text-center'>
            <td><?php echo $pro_id; ?></td>
            <td><?php echo$pro_title; ?></td>
            <td><img src='./pro_img/<?php echo $pro_img; ?>' class='pro_img'></td>
            <td><?php echo $pro_price; ?></td>
            <td><?php
            $get_count="select * from order_pending where pro_id= $pro_id";
            $r_count=mysqli_query($con,$get_count);
            $row_count=mysqli_num_rows($r_count);
            echo $row_count;
            ?></td>
            <td><?php echo $pro_status;?></td>
            <td><a href='edit_pro.php'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='delete_pro.php'><i class='fa-solid fa-trash'></i></a></td>
        </tr><?php
        }
        ?>
    </tbody>
</table>

<?php
include('footer.php');
?>
