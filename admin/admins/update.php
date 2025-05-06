<?php
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $role = $_POST["role"];
    include_once "../../connection/open.php";
    $sql = "UPDATE admins SET NAME = '$name', EMAIL = '$email', USERNAME = '$username', ADDRESS = '$address', PASSWORD = '$pasword', ROLE = '$role' WHERE ADMIN_ID = '$id'";
    mysqli_query($connection, $sql);
    include_once "../../connection/close.php";
    header("Location: index.php");
?>