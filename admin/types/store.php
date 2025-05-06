<?php
    $name = $_POST["name"];
    include_once "../../connection/open.php";
    $sql = "INSERT INTO types(name) VALUES ('$name')";
    mysqli_query($connection, $sql);
    include_once "../../connection/close.php";
    header("Location: index.php");
?>