<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update a type</title>
    <link rel="stylesheet" href="../layouts/style.css">
</head>
<body>
    <?php
        include_once "../layouts/header.php";
    ?>
    <?php
        $id = $_GET['id'];
        include_once "../../connection/open.php";
        $sql = "SELECT * FROM types WHERE TYPE_ID = '$id'";
        $types = mysqli_query($connection, $sql);
        include_once "../../connection/close.php";
    ?>
    <form method="post" action="update.php">
        <?php
            foreach ($types as $type) {
        ?>
            <label for="id">ID: </label><input type="text" name="id" id="id" readonly value="<?php echo $type['TYPE_ID']; ?>"><br>
            <label for="name">Name: </label><input type="text" name="name" id="name" value="<?php echo $type['NAME']; ?>"><br>
        <?php
            }
        ?>
        <button class="button-name" role="button">Update</button>
    </form>
    <?php
        include_once "../layouts/footer.php";
    ?>
</body>
</html>