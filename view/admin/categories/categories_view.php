<?php
require_once "../../../controller/admin/categories/view_categories_controller.php";

//Check if user is blocked
require_once "../../../utility/blocked_user_dir_back.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Categories</title>
    <link rel="stylesheet" href="../../../web/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../web/assets/css/adminPanel.css">
    <script src="../../../web/assets/js/jquery-1.11.1.min.js"></script>
    <script src="../../../web/assets/js/admin/remove.admin.js"></script>
    <!-- Add Favicon -->
    <link rel="shortcut icon" href="../../../web/assets/images/favicon.ico?v4" type="image/x-icon">
</head>
<body>
<div align="center">
    <h2>Categories</h2>
    <p>Here you can add, edit or delete categories.</p>
    <a href="../admin_panel.php">
        <button class="btn btn-primary">Back to Admin Panel</button>
    </a>
    <a href="categories_create.php">
        <button class="btn btn-primary">New Category</button>
    </a>
</div>
<div class="adminMainWindow">
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Supercategory</th>
            <th>Options</th>
        </tr>
        <?php
        foreach ($cats as $cat) {
            ?>
            <tr id="delId-<?= $cat['id'] ?>">
                <td><?= $cat['id'] ?></td>
                <td><?= $cat['name'] ?></td>
                <td><?= $cat['supercatname'] ?></td>
                <td>
                    <a href="categories_edit.php?cid=<?= $cat['id'] ?>">
                        <button class="btn btn-warning">
                            Edit
                        </button>
                    </a>,
                    <button class="btn btn-danger" onclick="deleteCat(<?= $cat['id'] ?>)">Delete</button>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>