<?php
    $id = $_GET['id'];
    include_once "../../connection/open.php";
    $sql = "DELETE FROM brands WHERE BRAND_ID = '$id'";
    mysqli_query($connection, $sql);
    include_once "../../connection/close.php";
    header("Location: index.php");
?>