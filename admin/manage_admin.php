<?php require("partials/header.php"); ?>



<div class="container">

    <h4 class="text-center m-4 position-relative">
        <a href="<?php $siteUrl ?>addAdmin.php"><button type="submit" class="btn bg-primary text-light position-absolute top-0 start-0" name="addAdmin">Add Admin</button></a>Manage Admin
    </h4>
</div>
<?php

if (isset($_SESSION['add'])) {
    echo $_SESSION["add"];
    unset($_SESSION["add"]);
}else

if (isset($_SESSION['delete'])) {
    echo $_SESSION["delete"];
    unset($_SESSION["delete"]);
}
if (isset($_SESSION['update'])) {
    echo $_SESSION["update"];
    unset($_SESSION["update"]);
}
if (isset($_SESSION['chng-pass'])) {
    echo $_SESSION['chng-pass'];
    unset($_SESSION['chng-pass']);
}

?>
<div class="container">

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Admin Id</th>
                <th scope="col">Full Name</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $sql = "SELECT * FROM tbl_admin";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $x = 1;
            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id =  $rows['id'];
                    $fullName = $rows['full_name'];
                    $userName = $rows['username'];
                    $Password = md5($rows['password']);
            ?>
                    <tr>
                        <th scope="row"><?php echo $x++; ?></th>
                        <td><?php echo $fullName; ?></td>
                        <td><?php echo $userName; ?></td>
                        <td><?php echo $Password; ?></td>
                        <td>
                            <a href="<?php $siteUrl; ?>change_Password.php?id=<?php echo $id; ?>"><button type="submit" name="changePass" class="btn btn-secondary btn-sm bg-secondary text-wrap">Change Password</button></a>

                            <a href="<?php $siteUrl; ?>update_admin.php?id=<?php echo $id; ?>"type="submit" name="update" class="btn btn-primary bg-success btn-sm">Update</a>

                            <a href="<?php $siteUrl; ?>delete_admin.php?id=<?php echo $id; ?>"
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