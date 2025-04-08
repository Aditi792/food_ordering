<?php require("partials/header.php"); ?>


<body>
    <h4 class="text-center m-4">Add Category</h4>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container w-50 h-80">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Title </label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title" required="required">
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Image </label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1" placeholder="Enter username" required="required">
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
</body>
<?php

if (isset($_POST['submit'])) {

    $title = $_POST['title'];

    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = 'No';
    }

    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = 'No';
    }

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {
            $ext1 = (explode('.', $image_name));
            $ext=strtolower(end($ext1));
            $image_name = "Food_Category_".rand(000, 999).'.'.$ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/" . $image_name;
            //Finally Upload the Image
            $upload = move_uploaded_file($source_path, $destination_path);

            if ($upload == false) {
                $_SESSION['upload']='<div class="container w-50 alert alert-danger alert-dismissible fade show" role="alert">
                Image not uploaded!!!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
                header("location:".'add_category.php');
                exit;//stop the process
            }
        }
    }else{
        $image_name="";
    }



    $sql = "INSERT INTO tbl_category (title, image_name, featured,active) VALUES ('$title', '$image_name ', '$featured','$active');";
    $res = mysqli_query($conn, $sql);


    if ($res == true) {
        $_SESSION['add'] = '<div class="container w-50 alert alert-success alert-dismissible fade show" role="alert">
  Category added successfully!!!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        header("Location:" . 'manage_category.php');
    } else {
        $_SESSION['add'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Category not added !!!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header("Location:" . 'add_category.php');
    }
}

?>


<?php require("partials/footer.php"); ?>