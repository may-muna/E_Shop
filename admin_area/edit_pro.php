<?php
include('../admin_area/header.php');
include('../include/db.php');
?>
<style>
    .edit_img {
        width: 100px;
        object-fit: contain;
    }
</style>
<?php
if (isset($_GET['edit_pro'])) {
    $edit_id = intval($_GET['edit_pro']); 
    $get_data = "SELECT * FROM products WHERE pro_id = $edit_id";
    $res = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($res);
    $pro_title = $row['pro_title'];
    $pro_des = $row['pro_des'];
    $pro_key = $row['pro_key'];
    $Cat_id = $row['Cat_id'];
    $pro_img = $row['pro_img'];
    $price = $row['price'];

    $select_cat = "SELECT * FROM category WHERE Cat_id = $Cat_id";
    $res_cat = mysqli_query($con, $select_cat);
    $row_cat = mysqli_fetch_assoc($res_cat);
    $Cat_title = $row_cat['Cat_title'];
}
?>
<div class="container mt-5 mb-4 w-50 m-auto">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <label for="pro_title" class="form-label">Product Title</label>
            <input type="text" id="pro_title" name="pro_title" value="<?php echo htmlspecialchars($pro_title); ?>" class="form-control" required>
        </div>
        <div class="form-outline mb-4">
            <label for="pro_des" class="form-label">Product Description</label>
            <input type="text" id="pro_des" name="pro_des" value="<?php echo htmlspecialchars($pro_des); ?>" class="form-control" required>
        </div>
        <div class="form-outline mb-4">
            <label for="pro_key" class="form-label">Product Keywords</label>
            <input type="text" id="pro_key" name="pro_key" value="<?php echo htmlspecialchars($pro_key); ?>" class="form-control" required>
        </div>
        <div class="form-outline mb-4">
            <label for="pro_cat" class="form-label">Product Categories</label>
            <select name="pro_cat" class="form-select">
                <option value="<?php echo $Cat_id; ?>"><?php echo htmlspecialchars($Cat_title); ?></option>
                <?php
                $select_cat_all = "SELECT * FROM category";
                $res_cat_all = mysqli_query($con, $select_cat_all);
                while ($row_cat_all = mysqli_fetch_assoc($res_cat_all)) {
                    $Cat_title_all = $row_cat_all['Cat_title'];
                    $Cat_id_all = $row_cat_all['Cat_id'];
                    echo "<option value='$Cat_id_all'>$Cat_title_all</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4">
            <label for="pro_img" class="form-label">Product Image</label>
            <div class="d-flex">
                <input type="file" id="pro_img" name="pro_img" class="form-control w-90 m-auto">
                <img src="./pro_img/<?php echo htmlspecialchars($pro_img); ?>" alt="" class="edit_img">
            </div>
        </div>
        <div class="form-outline mb-4">
            <label for="price" class="form-label">Product Price</label>
            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" class="form-control" required>
        </div>
        <div class="text-center m-auto">
            <input type="submit" name="edit_pro" value="Update Product" class="btn btn-secondary px-3 mb-3">
        </div>
    </form>
</div>

<?php
if (isset($_POST['edit_pro'])) {
    $pro_title = mysqli_real_escape_string($con, $_POST['pro_title']);
    $pro_des = mysqli_real_escape_string($con, $_POST['pro_des']);
    $pro_key = mysqli_real_escape_string($con, $_POST['pro_key']);
    $pro_cat = intval($_POST['pro_cat']);
    $pro_img = $_FILES['pro_img']['name'];
    $temp_img = $_FILES['pro_img']['tmp_name'];
    $price = floatval($_POST['price']);

    if ($pro_title == '' || $pro_des == '' || $pro_key == '' || $pro_cat == '' || $price == '') {
        echo "<script>alert('Please fill all the fields.')</script>";
    } else {
        if (!empty($pro_img)) {
            $target_dir = "./pro_img/";
            $target_file = $target_dir . basename($pro_img);
            if (move_uploaded_file($temp_img, $target_file)) {
                $update_pro = "UPDATE products SET Cat_id = $pro_cat, pro_title = '$pro_title',  pro_des = '$pro_des',  pro_key = '$pro_key', pro_img = '$pro_img', price = $price, date = NOW() WHERE pro_id = $edit_id";
            } else {
                echo "<script>alert('Failed to upload image.')</script>";
                exit();
            }
        } else {
            $update_pro = "UPDATE products SET Cat_id = $pro_cat, pro_title = '$pro_title',  pro_des = '$pro_des', pro_key = '$pro_key', price = $price, date = NOW() WHERE pro_id = $edit_id";
        }

        $res_update = mysqli_query($con, $update_pro);
        if ($res_update) {
            echo "<script>alert('Product updated successfully.')</script>";
            echo "<script>window.open('./view_products.php', '_self');</script>";
        } else {
            echo "<script>alert('Error updating product.')</script>";
        }
    }
}
?>
<?php include('footer.php'); ?>
