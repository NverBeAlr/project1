<?php
    $name = $_POST["name"];
    include_once "../../connection/open.php";
    $sql = "INSERT INTO payment_methods(name) VALUES ('$name')";
    mysqli_query($connection, $sql);
    include_once "../../connection/close.php";
    header("Location: index.php");
?>