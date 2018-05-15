<html class="no-js" lang="">
<head>
    <?php include '../phan_header.php';?>
    <style type="text/css">
    </style>
    <script type="text/javascript">
    </script>
</head>
<body>
<!-- Include các thành phần vào -->
<?php include '../menudoc.php';?>
<div id="right-panel" class="right-panel">
    <?php include '../menungang.php';?>
    <!-- Include Modal -->
    <!-- Nội dung -->
    <h2>Quản Lý Khuyến Mãi</h2>
    <div class="background">
        <div class="container">
            <h5> Cập nhật thông tin khuyến mãi</h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã khuyến mãi</th>
                    <th>Tên khuyến mãi</th>
                    <th>Giá trị</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Sách được khuyến mãi</th>
                    <th>Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include '../../xuly/connect.php';
                $sql_select_km="SELECT * FROM khuyen_mai where";
                $result_select_km=mysqli_query($conn,$sql_select_km);
                if($result_select_km)

                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Nội dung -->
</div>
<script src="../../css/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="../../css/assets/js/popper.min.js"></script>
<script src="../../css/assets/js/plugins.js"></script>
<script src="../../css/assets/js/main.js"></script>
</body>
</html>