<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $phone_number = $_POST["phone"];
    $description = $_POST["description"];
    include_once "../../connection/open.php";
    $sql = "INSERT INTO customers(name, email, gender, address, phone_number, description)
     VALUES ('$name', '$email', '$gender', '$address', '$phone_number', '$description')";
    mysqli_query($connection, $sql);
    include_once "../../connection/close.php";
    header("Location: index.php");
?>