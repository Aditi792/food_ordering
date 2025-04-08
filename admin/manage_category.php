<?php require("partials/header.php"); ?>

<div class="container">

    <h4 class="text-center m-4 position-relative">
        <a href="<?php $siteUrl ?>add_category.php"><button type="submit" class="btn bg-primary text-light position-absolute top-0 start-0" name="addAdmin">Add Category</button></a>Manage Category
    </h4>
</div>

<?php

if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

if (isset($_SESSION['upload'])) {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
if (isset($_SESSION['delete'])) {
    echo $_SESSION["delete"];
    unset($_SESSION["delete"]);
}
if (isset($_SESSION['remove'])) {
    echo $_SESSION["remove"];
    unset($_SESSION["remove"]);
}
if (isset($_SESSION['update'])) {
    echo $_SESSION["update"];
    unset($_SESSION["update"]);
}

?>
<div class="container">

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">image Name</th>
                <th scope="col">Featured</th>
                <th scope="col">Active</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $x = 1;
            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];;
                    $title = $rows['title'];
                    $img = $rows['image_name'];
                    $feature = $rows['featured'];
                    $active = $rows['active'];
            ?>
                    <tr>
                        <th scope="row"><?php echo $x++ ?></th>
                        <td><?php echo $title ?></td>
                        <td><?php
                            if ($img != "") {
                            ?>
                                <img src="<?php echo $siteUrl . 'images/category/' . $img; ?>" alt="Category Image" width="100px">
                            <?php
                            }else{
                                echo "<div class='text-center'>Image not found</div>";
                            }
                            ?>
                        </td>
                        <td><?php echo $feature ?></td>
                        <td><?php echo $active ?></td>
                        <td>
                            <a href="<?php echo $siteUrl; ?>admin/update_category.php?id=<?php echo $id; ?>&image_name=<?php echo $img; ?>"type="submit" name="update" class="btn btn-primary bg-success btn-sm">Update</a>

                            <a href="<?php echo $siteUrl; ?>admin/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $img; ?>"
                                class="btn btn-primary bg-danger btn-sm">Delete</a>
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