<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new payment methods</title>
    <link rel="stylesheet" href="../layouts/style.css">
</head>
<body>
    <?php
        include_once "../layouts/header.php";
    ?>
    <form action="store.php" method="post">
        <label for="name">name: </label><input type="text" name="name" id="name"><br>
        <button class="button-name" role="button">Add</button>
    </form>
    <?php
        include_once "../layouts/footer.php";
    ?>
</body>
</html>