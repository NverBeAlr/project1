<?php
    //Lấy id của bản ghi cần xóa
    $id = $_GET["id"];
    //Mở kết nối
    include_once "../../connection/open.php";
    //Viết sql
    $sql = "DELETE FROM products WHERE PRD_ID = '$id'";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../../connection/close.php";
    //Quay về danh sách
    header("Location: index.php");
?>