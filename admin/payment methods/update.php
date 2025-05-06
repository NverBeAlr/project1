<?php
    $id = $_POST['id'];
    $name = $_POST['name'];
    include_once "../../connection/open.php";
    $sql = "UPDATE payment_methods SET name = '$name' WHERE PAY_ID = '$id'";
    mysqli_query($connection, $sql);
    include_once "../../connection/close.php";
    header("Location: index.php");
?>