<?php require("partials/header.php"); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql1 = "SELECT * FROM tbl_category WHERE id = $id";
$res1 = mysqli_query($conn, $sql1);
$title = $current_img = $featured = $active = ""; // Initialize variables to prevent warnings

if ($res1 && mysqli_num_rows($res1) > 0) {
    $rows = mysqli_fetch_assoc($res1);
    $id = $rows['id'];
    $title = $rows['title'];
    $current_img = $rows['image_name'];
    $featured = $rows['featured'] ?? "No";
    $active = $rows['active'] ?? "No";
}
?>

<body>
    <h4 class="text-center m-4 w-50">Update Category</h4>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container w-50 h-80">
            <div class="form-group mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php echo $title; ?>">
            </div>
            <div class="form-group mb-3 position-relative">
                <label>Image</label>
                <?php if (!empty($current_img)) : ?>
                    <img src="<?php echo $siteUrl; ?>images/category/<?php echo $current_img; ?>" width="100px" class="position-absolute top-0 end-0">
                <?php else : ?>
                    <div class="alert alert-danger">Image not Added!!!</div>
                <?php endif; ?>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Featured</label>
                <input type="radio" name="featured" value="Yes" <?php echo ($featured == 'Yes') ? 'checked' : ''; ?>> Yes
                <input type="radio" name="featured" value="No" <?php echo ($featured == 'No') ? 'checked' : ''; ?>> No
            </div>
            <div class="form-group mb-3">
                <label>Active</label>
                <input type="radio" name="active" value="Yes" <?php echo ($active == 'Yes') ? 'checked' : ''; ?>> Yes
                <input type="radio" name="active" value="No" <?php echo ($active == 'No') ? 'checked' : ''; ?>> No
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Update Category">
        </div>
    </form>
</body>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'] ?? "";
    $featured = $_POST['featured'] ?? "No";
    $active = $_POST['active'] ?? "No";
    $image_name = $current_img; // Default to existing image

    if (!empty($_FILES['image']['name'])) {
        $image_name = "Food_Category_" . rand(100, 999) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category/" . $image_name;

        if (move_uploaded_file($source_path, $destination_path)) {
            if (!empty($current_img) && file_exists("../images/category/" . $current_img)) {
                unlink("../images/category/" . $current_img); // Remove old image
            }
        } else {
            $_SESSION['upload'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    Image not uploaded!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
            header("Location: " . $siteUrl . 'update_category.php');
            exit;
        }
    }

    $sql = "UPDATE tbl_category SET 
    title='$title', 
    image_name='$image_name', 
    featured='$featured', 
    active='$active' 
    WHERE id='$id'";
    $res = mysqli_query($conn, $sql);

    $_SESSION['update'] = $res
        ? '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    Category Updated Successfully!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>'
        : '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    Category not updated!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

    header("Location: " . $siteUrl . 'admin/manage_category.php');
    exit;
}
?>

<?php require("partials/footer.php"); ?>