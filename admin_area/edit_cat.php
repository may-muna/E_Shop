<?php
include('../admin_area/header.php');
include('../include/db.php');

if (isset($_GET['edit_cat'])) {
    $edit_cat = $_GET['edit_cat'];
    $get_cat = "SELECT * FROM category WHERE Cat_id = '$edit_cat'";
    $r = mysqli_query($con, $get_cat);
    if (!$r) {
        die("Query failed: " . mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($r);
    $cat_title = $row['Cat_title'];
}

if (isset($_POST['edit_cat'])) {
    $cat_t = $_POST['Cat_title'];
    $update_query = "UPDATE category SET Cat_title = '$cat_t' WHERE Cat_id = '$edit_cat'";
    $res = mysqli_query($con, $update_query);
    if ($res) {
        echo "<script>alert('Category updated Successfully')</script>";
        echo "<script>window.open('./view_cat.php', '_self');</script>";
    } else {
        die("Update failed: " . mysqli_error($con));
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center mt-4">Edit Categories</h1>
    <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="Cat_title" class="form-label">Category Title</label>
            <input type="text" name="Cat_title" id="Cat_title" class="form-control" required value="<?php echo $cat_title; ?>">
        </div>
        <input type="submit" value="Update Category" class="btn btn-info px-3 mb-3" name="edit_cat">
    </form>
</div>

<?php include('footer.php'); ?>
