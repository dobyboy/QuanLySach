
<html class="no-js" lang="">
<head>
<?php include '../phan_header.php';?>
	<style type="text/css">
        .buttonxem1{
            color: white;
            background: #FF9800;
            text-align: center;
            padding: 0px 9px 0px 9px;
            font-size: 15px;
            border-radius: 3px;
            border-style: none;
            margin-bottom: 2px !important;
        }
        .buttonsua1{
            color: white;
            background: #2979FF;
            text-align: center;
            padding: 1px 12px 1px 12px;
            font-size: 15px;
            border-radius: 3px;
            border-style: none;
            margin-bottom: 2px !important;
        }

        .buttonxoa1{
            color: white;
            background: #D50000;
            text-align: center;
            padding: 1px 11px 1px 11px;
            font-size: 15px;
            border-radius: 3px;
            border-style: none;
            margin-bottom: 2px !important;
        }
	</style>

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
            <form method="post" action="./them-khuyen-mai.php">
                <h5> Danh sách khuyến mãi hiện có</h5>
                <button id ="themKM" type="submit" class="buttonthem" >Thêm khuyến mãi</button>
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
                                $sql_select_km="SELECT * FROM khuyen_mai";
                                $result_select_km=mysqli_query($conn,$sql_select_km);
                                if($result_select_km){
                                    $stt =1;
                                    while ($row_km=$result_select_km->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$stt."</td>";
                                        echo "<td>".$row_km['id_km']."</td>";
                                        echo '<td style="text-align:left;">'.$row_km['ten_km'].'</td>';
                                        echo '<td style="text-align:left;">'.$row_km['gia_tri'].'</td>';
                                        echo '<td style="text-align:left;">'.$row_km['ngaybatdau'].'</td>';
                                        echo '<td style="text-align:left;">'.$row_km['ngayketthuc'].'</td>';
                                        echo '<td style="text-align:left;">'.$row_km['id_sach'].'</td>';
                                        echo '<td style="width:80px;">
                                                <a class="buttonxem1" href="them-khuyen-mai.php?id=' . $row_km['id_km'] . '" class="buttonxem">Xem</a>
                                                <a class="buttonsua1" href="them-khuyen-mai.php?id=' . $row_km['id_km'] . '" class="buttonsua">Sửa</a>
                                               <button  type="button" class="buttonxoa1" onclick="xoakhuyenmai("'.$row_km['id_km'].'")">Xóa</button>
                                            </td>';
                                        echo "</tr>";
                                        $stt = $stt+1;
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
            </form>
		</div>
		</div>
		<!-- Nội dung -->
	</div>
	<script src="../../css/assets/js/vendor/jquery-2.1.4.min.js"></script>
	<script src="../../css/assets/js/popper.min.js"></script>
	<script src="../../css/assets/js/plugins.js"></script>
	<script src="../../css/assets/js/main.js"></script>

    <script type="text/javascript">
        function xoakhuyenmai(id_km) {
            if(confirm("Bạn có muốn xóa Khuyến mãi"+<?php  ?>))
        }
    </script>
</body>
</html>