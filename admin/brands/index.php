<!DOCTYPE html>
<<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brand list</title>
    <link rel="stylesheet" href="../layouts/style.css">
</head>
<body>
    <?php
        include_once "../layouts/header.php";
    ?>
    <?php
        include_once "../../connection/open.php";
        $sql = "SELECT * FROM brands";
        $brands = mysqli_query($connection, $sql);
        include_once "../../connection/close.php";
    ?>
    <a href="create.php">
        <button class="button-name" role="button">Add new brand</button>
    </a>
    <table class="table table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            foreach ($brands as $brand) {
        ?>
            <tr>
                <td>
                    <?php echo $brand['BRAND_ID']; ?>
                </td>
                <td>
                    <?php echo $brand['NAME']; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $row['BRAND_ID']; ?>">
                        <button class="vista-button"><div>Edit</div></button>
                    </a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $row['BRAND_ID']; ?>">
                        <button class="vista-button"><div>Delete</div></button>
                    </a>                
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    <?php
        include_once "../layouts/footer.php";
    ?>
</body>
</html>