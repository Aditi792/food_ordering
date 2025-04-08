<?php require("partials/header.php"); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}


$sql2 = "SELECT * FROM tbl_food WHERE id =$id";
$res2 = mysqli_query($conn, $sql2);
$title = $current_img = $featured = $active = ""; // Initialize variables to prevent warnings

if ($res2 && mysqli_num_rows($res2) > 0) {
    $rows = mysqli_fetch_assoc($res2);
    $id = $rows['id'];
    $title = $rows['title'];
    $current_img = $rows['image_name'] ;
    $desc = $rows['description'];
    $price = $rows['price'] ;
    $cat = $rows['category_id'] ?? "Not Found";
    $featured = $rows['featured'] ?? "No";
    $active = $rows['active'] ?? "No";
}
?>

<body>
    <h4 class="text-center m-4 w-50">Update Food</h4>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="container w-50 h-80">
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Title </label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php echo $title; ?>">
        </div>
        <div class="form-group mb-3 position-relative">
            <label for="exampleInputEmail1">Image </label>
            <input type="file" name="image" class="form-control" placeholder="Enter username" >
            <?php if (!empty($current_img)) : ?>
                    <img src="<?php echo $siteUrl; ?>images/food/<?php echo $current_img; ?>" width="100px" class="position-absolute top-0 end-0">
                <?php endif?>
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Description </label>
            <input class="form-control" type="textarea" name="description" value="<?php echo $desc; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Price </label>
            <input class="form-control" type="text" name="price" value="<?php echo $price; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Category </label>
            <select name="category" id="inputState" class="form-control">

                <?php $sql1 = "SELECT id,title from tbl_category WHERE active='Yes'";
                $res1 = mysqli_query($conn,$sql1);
                if($res1 && mysqli_num_rows($res1)>0){
                    while($row = mysqli_fetch_assoc($res1)){
                        $category_id = $row['id'];
                        $category_title = $row['title'];

                        ?>
                        <option value="<?php echo $category_id; ?>" <?php echo ($cat == $category_id) ? 'selected' : ''; ?>><?php echo $category_title;?></option>
                        <?php
                    }

                }else{?>
                    <option value="0">No Category Found</option>
                    <?php
                }
                ?>
                
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Featured </label>
            <input class="form-check-input" type="radio" name="featured" value="Yes" <?php echo ($featured == 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" value="Yes">Yes</label>

            <input class="form-check-input" type="radio" name="featured" value="No" <?php echo ($featured == 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" value="No">No</label>
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Active</label>
            <input class="form-check-input" type="radio" name="active" value="Yes" <?php echo ($active == 'Yes') ? 'checked' : ''; ?>>
            <label class="form-check-label" value="Yes">Yes</label>

            <input class="form-check-input" type="radio" name="active" value="No" <?php echo ($active == 'No') ? 'checked' : ''; ?>>
            <label class="form-check-label" value="No">No</label>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Update Food">
    </div>
</form>
</body>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'] ;
    $price = $_POST['price'];
    $cat = $_POST['category'];
    $featured = $_POST['featured'] ?? "No";
    $active = $_POST['active'] ?? "No";
    $image_name = $current_img; // Default to existing image

    if (!empty($_FILES['image']['name'])) {
        $image_name = "Food_Category_" . rand(100, 9999) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/food/" . $image_name;

        if (move_uploaded_file($source_path, $destination_path)) {
            if (!empty($current_img) && file_exists("../images/food/" . $current_img)) {
                unlink("../images/food/" . $current_img); // Remove old image
            }
        } else {
            $_SESSION['upload'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    Image not uploaded!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
            header("Location: " . $siteUrl . 'update_food.php');
            exit;
        }
    }

    $sql = "UPDATE tbl_food SET 
    title='$title', 
    image_name='$image_name', 
    description ='$desc', 
    price = '$price', 
    category_id = '$cat',
    featured='$featured',
    active='$active' WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    $_SESSION['update'] = $res
        ? '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    Food Item Updated Successfully!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>'
        : '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
    food Item not updated!!!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

    header("Location: " . $siteUrl . 'admin/manage_food.php');
    exit;
}
?>

<?php require("partials/footer.php"); ?>