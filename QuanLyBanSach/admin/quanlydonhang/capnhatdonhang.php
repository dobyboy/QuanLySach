<html class="no-js" lang="">
<head>
<?php include '../phan_header.php';?>
	<style type="text/css">
		.buttonsua{
			color: white;
			background: blue;
			text-align: center;
			padding: 0px 10px 0px 10px;
			font-size: 15px;
			border-radius: 3px;
			border-style: none;
			width: 60px;
		}

		.buttonxoa {
			color: white;
			background: #D50000;
			text-align: center;
			padding: 0px 10px 0px 10px;
			font-size: 15px;
			border-radius: 3px;
			border-style: none;
			width: 60px;
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
		<h2>Quản lý Đơn Hàng</h2>
		<div class="background">    
		<div class="container">		
		<h5> Danh sách đơn hàng đã duyệt: </h5>
		<form method="POST">
			<input class="buttonsearch" type="button" name="btn-search" value="Tìm">
			<input class="txt-search" type="text" name="txt-search" placeholder="Mã đơn hàng..." style="width: 180px;">
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>STT</th>
			        <th>Mã đơn hàng</th>
			        <th>Tên Khách hàng</th>
					<th>Ngày đặt hàng</th>
					<th>Địa chỉ</th>
					<th>Trạng thái</th>
					<th>Tác vụ</th>
			      </tr>
			    </thead>
			    <tbody>
				    <?php 
				    	include '../../xuly/connect.php';
				    	$sql="SELECT * FROM don_hang dh join thong_tin_chu_tai_khoan ttctk on dh.id_tk = ttctk.id_taikhoan Where trangthai != 'chưa duyệt'";
				    	$result=mysqli_query($conn,$sql);
				    	if($result){
				    		$stt =1;
				    		while ($row=$result->fetch_assoc()) {
				    			echo "<tr>";
				    			echo "<td>".$stt."</td>";
				    			echo "<td>".$row['id_don_hang']."</td>";
				    			echo '<td style="text-align:left;">'.$row['ten_chu_tk'].'</td>';
				    			echo '<td style="text-align:left;">'.$row['ngay_dat_hang'].'</td>';
				    			echo '<td style="text-align:left;">'.$row['dia_chi_nhan'].'</td>';
				    			echo '<td style="text-align:left;">'.$row['trangthai'].'</td>';
				    			echo '<td style="width:70px;">
				    					<button type="button" class="buttonduyet" data-toggle="modal" data-target="#modal-xem">Xem</button>
				    					<button type="button" class="buttonsua" data-toggle="modal" data-target="#modal-xem">Sửa</button>
				    					<button type="button" class="buttonxoa" data-toggle="modal" data-target="#modal-xem">Xóa</button>
				    				</td>';
				    			echo "</tr>";
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
</body>
</html>