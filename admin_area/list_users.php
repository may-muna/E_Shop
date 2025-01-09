<?php
include('../admin_area/header.php');
include('../include/db.php');
?>
<style>
    .u-img{
        width: 100px;
        object-fit: contain;
    }
</style>
<h1 class="text-center">All Users</h1>
<div class="table-responsive">
    <table class="table-center custom-table table-bordered mt-5 mb-5" style="margin: 0 auto; width: 50%;">
        <thead style="background-color:rgb(250, 236, 239);">
            <?php 
            $get_user="select * from user ";
            $r=mysqli_query($con,$get_user);
            $row=mysqli_num_rows($r);
            echo "<tr class='text-center' >
                <th>SI_NO</th>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Image</th>
                <th>Phone</th>
                <th>Delete</th>
                </tr>
                </thead>
                <tbody>";
                if($row==0){
                    echo "<h2 class=text-center mt-5> No users Yet</h2>";
                }else{
                    $num=0;
                    while($row=mysqli_fetch_assoc($r)){
                        $id=$row['id'];
                        $name=$row['name'];
                        $email=$row['email'];
                        $address=$row['address'];
                        $image=$row['image'];
                        $phone=$row['phone'];                       
                        $num+=1;
                        ?>
                        <tr class='text-center'>
                        <td><?php echo $num; ?></td>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><img src="../user_area/user_img/<?php echo $image; ?> " class="u-img"></td>
                        <td><?php echo $phone; ?></td>
                        <td><a href='delete_user.php?delete_user=<?php echo  $id?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
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