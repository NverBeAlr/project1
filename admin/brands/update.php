<?php
    $id = $_POST['id'];
    $name = $_POST['name'];
    include_once "../../connection/open.php";
    $sql = "UPDATE brands SET name = '$name' WHERE BRAND_ID = '$id'";
    mysqli_query($connection, $sql);
    include_once "../../connection/close.php";
    header("Location: index.php");
?>