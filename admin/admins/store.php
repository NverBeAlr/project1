<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $role = $_POST["role"];
    include_once "../../connection/open.php";
    $sql = "INSERT INTO admins(name, email, username, password, address, role)
     VALUES ('$name', '$email', '$username', '$password', '$address', '$role')";
    mysqli_query($connection, $sql);
    include_once "../../connection/close.php";
    header("Location: index.php");
?>