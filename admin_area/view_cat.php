<?php
include('../admin_area/header.php');
include('../include/db.php');
?>
<h1 class="text-center mt-4">View All Categories</h1>
<div class="table-responsive">
    <table class="table-center custom-table table-bordered mt-5 mb-5" style="margin: 0 auto; width: 50%;">
        <thead>
            <tr class="text-center" style="background-color:rgb(250, 236, 239);">
                <th>SI_no</th>
                <th>Category Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $selet_cat="select * from 	category ";
            $res=mysqli_query($con,$selet_cat);
            $num=0;
            while($row=mysqli_fetch_assoc($res)){
                $Cat_id=$row['Cat_id'];
                $Cat_title=$row['Cat_title'];
                $num++;
            ?>
            <tr class="text-center">
                <td><?php echo $num;?> </td>
                <td><?php echo $Cat_title;?> </td>
                
                <td><a href= 'edit_cat.php?edit_cat=<?php echo  $Cat_id?> '><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='delete_cay.php'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php 
            } ?>
        </tbody>
    </table>
</div>



<?php include('footer.php'); ?>