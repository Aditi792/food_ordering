<?php require("partials/header.php"); ?>

<div class="container">
    <h4 class="text-center m-4 position-relative">
        <a href="<?php $siteUrl ?>add_food.php"><button type="submit" class="btn bg-primary text-light position-absolute top-0 start-0" name="addAdmin">Add Food</button></a>Manage Food
    </h4>
</div>

<?php

if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

if (isset($_SESSION['update'])) {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
if (isset($_SESSION['delete'])) {
    echo $_SESSION["delete"];
    unset($_SESSION["delete"]);
}
if (isset($_SESSION['remove'])) {
    echo $_SESSION["remove"];
    unset($_SESSION["remove"]);
}
if (isset($_SESSION['upload'])) {
    echo $_SESSION["upload"];
    unset($_SESSION["upload"]);
}

?>
<div class="container text-center">

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Food id</th>
                <th scope="col">Title</th>
                <th scope="col">Image Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Category_id</th>
                <th scope="col">Featured</th>
                <th scope="col">Active</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $sql = "SELECT * FROM tbl_food";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $x = 1;
            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id =  $rows['id'];
                    $title = $rows['title'];
                    $img = $rows['image_name'];
                    $desc = $rows['description'];
                    $price = $rows['price'];
                    $cat_id = $rows['category_id'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];

            ?>
                    <tr>
                        <th scope="row"><?php echo $x++; ?></th>
                        <td><?php echo $title; ?></td>
                        <td>
                            <?php
                            if ($img != "") { ?>
                                <img src="<?php echo $siteUrl . 'images/food/' . $img ?>" alt="food item" width="100px"><?php
                                                                                                                    }
                                                                                                                        ?>
                        </td>
                        <td><?php echo $desc; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $cat_id; ?></td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td colspan="2">

                            <a href="<?php $siteUrl; ?>update_food.php?id=<?php echo $id; ?>&image_name=<?php $img;?>" type="submit" name="update" class="btn btn-primary bg-success btn-sm mb-2">Update</a>

                            <a href="<?php $siteUrl; ?>delete_food.php?id=<?php echo $id; ?>&image_name=<?php $img;?>"
                                type="submit" name="delete" class="btn btn-primary bg-danger btn-sm">Delete</a>
                        </td>

                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>



<?php require("partials/footer.php"); ?>