<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang danh sách sản phẩm</title>
    <link rel="stylesheet" href="../layouts/style.css">
    <style>
        /* CSS cho cửa sổ nổi (modal) */
        .modal {
            display: none; /* Ẩn modal mặc định */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5); /* Màu nền mờ */
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            text-align: center;
            border-radius: 8px;
        }

        .modal-buttons {
            margin-top: 20px;
        }

        .modal-buttons button {
            margin: 0 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-buttons .confirm {
            background-color: #d9534f;
            color: white;
        }

        .modal-buttons .cancel {
            background-color: #5bc0de;
            color: white;
        }
    </style>
    <script>
        // Hàm hiển thị modal
        function showModal(deleteUrl) {
            const modal = document.getElementById('deleteModal');
            const confirmButton = document.getElementById('confirmDelete');

            // Hiển thị modal
            modal.style.display = 'block';

            // Gắn URL xóa vào nút xác nhận
            confirmButton.onclick = function () {
                window.location.href = deleteUrl;
            };
        }

        // Hàm đóng modal
        function closeModal() {
            const modal = document.getElementById('deleteModal');
            modal.style.display = 'none';
        }
    </script>
</head>
<body>
    <p>
        <a href="#">Trang chủ</a> > <a href="#">Danh sách sản phẩm</a>
    </p>
    <?php
        session_start();
        if(empty($_SESSION['USERNAME'])){
            header('Location: ../login/login.php');
        }
        include_once "../layouts/header.php";
    ?>
    <?php
        // Mở kết nối đến DB
        include_once "../../Connection/open.php";
        // Số bản ghi trên 1 trang
        $recordPerPage = 3;
        // Query Lấy được tổng số bản ghi
        $sqlCountRecords = "SELECT COUNT(*) AS total FROM products
                            WHERE products.NAME LIKE '%$keyword%'";
        // Chạy SQL
        $countRecords = mysqli_query($connection, $sqlCountRecords);
        // Lấy tổng số bản ghi
        foreach ($countRecords as $countRecord){
            $totalRecords = $countRecord['total_records'];
        }
        // Tính tổng số trang
        $pages = ceil($totalRecords / $recordPerPage);
        // Lấy trang hiện tại
        if (isset($_GET['page'])) {
            $Page = $_GET['page'];
        } else {
            $Page = 1;
        }
        // Tính chỉ số bắt đầu
        $start = ($Page - 1) * $recordPerPage;
        // Lấy từ khóa tìm kiếm
        if(isset($_GET["keyword"])){
            $keyword = $_GET["keyword"];
        } else {
            // Viết SQL
            $keyword = "";
        }
        // Viết SQL
        $sql = "SELECT products.*, brands.NAME AS brand_name, types.NAME AS type_name 
                FROM products INNER JOIN brands ON brands.BRAND_ID = products.BRAND_ID 
                INNER JOIN types ON types.TYPE_ID = products.TYPE_ID 
                WHERE products.NAME LIKE '%$keyword%' 
                LIMIT $start, $recordPerPage";
        // Viết SQL lấy dữ liệu
        $sql = "SELECT products.*, brands.NAME AS brand_name, types.NAME AS type_name FROM products INNER JOIN brands ON brands.BRAND_ID = products.BRAND_ID INNER JOIN types ON types.TYPE_ID = products.TYPE_ID";
        // Chạy query
        $products = mysqli_query($connection, $sql);
        // Đóng kết nối đến DB
        include_once "../../Connection/close.php";
        // Hiển thị dữ liệu
    ?>
    <a href="create.php">
        <button class="button-name" role="button">Thêm một sản phẩm mới</button>
    </a>
    <table class="table table-striped table-hover">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Ram</th>
            <th>Chip</th>
            <th>Rom</th>
            <th>Kích cỡ màn hình</th>
            <th>Camera</th>
            <th>Màu sắc</th>
            <th>Giá thành</th>
            <th>Số lượng</th>
            <th>Nhãn hàng</th>
            <th>Kiểu máy</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            foreach ($products as $product){
        ?>
            <tr>
                <td style="text-align: center;">
                    <?php echo $product['PRD_ID']; ?>
                </td>
                <td>
                    <?php echo $product['NAME']; ?>
                </td>
                <td>
                    <img src="<?php echo $product['IMAGE']; ?>" alt="" width="100px" height="100px">
                </td>
                <td style="text-align: center;">
                    <?php echo $product['RAM']; ?>
                </td>
                <td>
                    <?php echo $product['CHIP']; ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $product['ROM']; ?>
                </td>
                <td>
                    <?php echo $product['SCREEN_SIZE']; ?>
                </td>
                <td>
                    <?php echo $product['CAMERA']; ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $product['COLOR']; ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $product['PRICE']; ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $product['QUANTITY']; ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $product['brand_name']; ?>
                </td>
                <td style="text-align: center;">
                    <?php echo $product['type_name']; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $product["PRD_ID"]; ?>">
                        <button class="vista-button"><div>Chỉnh sửa</div></button>
                    </a>
                </td>
                <td>
                    <!-- Thêm sự kiện onclick để hiển thị modal -->
                    <button class="vista-button" onclick="showModal('destroy.php?id=<?php echo $product["PRD_ID"]; ?>')">
                        <div>Xóa</div>
                    </button>
                </td>
            </tr>
        <?php
            }
            for($page = 1; $page <= $pages; $page++){
                if($keyword == ""){
        ?>
            <a href="?page=<?php echo $page; ?>"> 
                <?php echo $page; ?>
            </a>
        <?php
            } else {
        ?>
            <a href="?page=<?php echo $page; ?>&&keyword<?php echo $keyword; ?> "> 
                    <?php echo $page; ?>
                </a>
        <?php
            }
        ?>
                
        <?php
            }
        ?>
    </table>

    <!-- Modal xác nhận xóa -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <p>Bạn có chắc chắn muốn xóa không?</p>
            <div class="modal-buttons">
                <button id="confirmDelete" class="confirm">Xóa</button>
                <button class="cancel" onclick="closeModal()">Hủy</button>
            </div>
        </div>
    </div>
</body>
</html>