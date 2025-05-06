<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update a payment method</title>
    <link rel="stylesheet" href="../layouts/style.css">
</head>
<body>
    <?php
        include_once "../layouts/header.php";
    ?>
    <?php
        $id = $_GET['id'];
        include_once "../../connection/open.php";
        $sql = "SELECT * FROM payment_methods WHERE PAY_ID = '$id'";
        $payment_methods = mysqli_query($connection, $sql);
        include_once "../../connection/close.php";
    ?>
    <form method="post" action="update.php">
        <?php
            foreach ($payment_methods as $payment_method) {
        ?>
            <label for="id">ID: </label><input type="text" name="id" id="id" readonly value="<?php echo $payment_method['PAY_ID']; ?>"><br>
            <label for="name">Name: </label><input type="text" name="name" id="name" value="<?php echo $payment_method['NAME']; ?>"><br>
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