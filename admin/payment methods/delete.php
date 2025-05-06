<?php
    $id = $_GET['id'];
    include_once "../../connection/open.php";
    $sql = "DELETE FROM payment_methods WHERE PAY_ID = '$id'";
    mysqli_query($connection, $sql);
    include_once "../../connection/close.php";
    header(header:"Location: index.php");
?>