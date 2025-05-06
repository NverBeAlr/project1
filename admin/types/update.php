<?php
    $id = $_POST['id'];
    $name = $_POST['name'];
    include_once "../../connection/open.php";
    $sql = "UPDATE types SET name = '$name' WHERE TYPE_ID = '$id'";
    mysqli_query($connection, $sql);
    include_once "../../connection/close.php";
    header("Location: index.php");
?>