<?php
require("partials/header.php");
?>
<h4 class="text-center m-4">Add food</h4>
<form action="" method="post" enctype="multipart/form-data">
    <div class="container w-50 h-80">
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Title </label>
            <input type="text" name="title" class="form-control" placeholder="Enter title" required="required">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Image </label>
            <input type="file" name="image" class="form-control" placeholder="Enter username" required="required">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Description </label>
            <input class="form-control" type="textarea" name="description">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Price </label>
            <input class="form-control" type="text" name="price">
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Category </label>
            <select name="category" id="inputState" class="form-control">
                <?php $sql1 = "SELECT id,title from tbl_category WHERE active='Yes'";
                $res1 = mysqli_query($conn,$sql1);
                if($res1 && mysqli_num_rows($res1)>0){
                    while($rows = mysqli_fetch_assoc($res1)){
                        $id = $rows['id'];
                        $title = $rows['title'];

                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
            <input class="form-check-input" type="radio" name="featured" value="Yes">
            <label class="form-check-label" value="Yes">Yes</label>

            <input class="form-check-input" type="radio" name="featured" value="No">
            <label class="form-check-label" value="No">No</label>
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Active</label>
            <input class="form-check-input" type="radio" name="active" value="Yes">
            <label class="form-check-label" value="Yes">Yes</label>

            <input class="form-check-input" type="radio" name="active" value="No">
            <label class="form-check-label" value="No">No</label>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
    </div>
</form>


<?php
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $cat_id = $_POST['category'];

    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = "No";
    }

    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        $ext1 = explode('.', $image_name);
        $ext = strtolower(end($ext1));
        $image_name = "Food-Name-" . rand(100, 10000) . '.' . $ext;
        $source_path = $_FILES['image']['tmp_name'];
        $dest_path = "../images/food/" . $image_name;
        $upload = move_uploaded_file($source_path, $dest_path);

        if ($upload == false) {
            $_SESSION['upload'] = '<div class="container w-50 alert alert-danger alert-dismissible fade show" role="alert">
            Image not uploaded!!!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            header("location:" . 'manage_food.php');
            exit; //stop the process
        }
    } else {
        $image_name = "";
    }


    $sql = "INSERT INTO `tbl_food` (`title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES ('$title', '$desc', ' $price', '$image_name', '$cat_id', '$featured', '$active')";

    $res = mysqli_query($conn, $sql);


    if ($res == true) {
        $_SESSION['add'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
  food added successfully!!!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        header("Location:".$siteUrl. 'manage_food.php');
    } else {
        $_SESSION['add'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        food not added !!!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header("Location:" .$siteUrl. 'add_food.php');
    }
}

?>
<?php
require("partials/footer.php");
?>