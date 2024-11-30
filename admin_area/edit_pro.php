<?php
include('../admin_area/header.php');
include('../include/db.php');
?>
<style>
    .edit_img{
        width: 100px;       
        object-fit: contain;  
    }
</style>
<div class="container mt-5 mb-4 w-50 m-auto">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <label for="pro_title" class="form-label">Product Title</label>
            <input type="text" id="pro_title" name="pro_title" class="form-control" required>
        </div>
        <div class="form-outline mb-4">
            <label for="pro_des" class="form-label">Product Description</label>
            <input type="text" id="pro_des" name="pro_des" class="form-control" required>
        </div>
        <div class="form-outline mb-4">
            <label for="pro_key" class="form-label">Product Keywords</label>
            <input type="text" id="pro_key" name="pro_key" class="form-control" required>
        </div>
        <div class="form-outline mb-4">
        <label for="pro_cat" class="form-label">Product Categories</label>
           <select name="pro_cat" class="form-select">           
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
            <option value="">4</option>
            <option value="">5</option>
           </select>
        </div>
        <div class="form-outline mb-4">
            <label for="pro_img" class="form-label">Product Image</label>
            <div class="d-flex">
            <input type="file" id="pro_img" name="pro_img" class="form-control w-90 m-auto" required>
            <img src="./pro_img/download (1).jpeg" alt="" class="edit_img">
            </div>
        </div>
        <div class="form-outline mb-4">
            <label for="price" class="form-label">Product Price</label>
            <input type="text" id="price" name="price" class="form-control" required>
        </div>
        <div class="text-center m-auto">
            <input type="submit" name="edit_pro" value="Update products" class="btn btn-secondary px-3 mb-3" >
        </div>
    </form>

</div>

<?php
include('footer.php');
?>