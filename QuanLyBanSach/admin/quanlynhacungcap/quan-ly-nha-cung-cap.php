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
		<h2>Quản Lý Nhà Cung Cấp</h2>
		<div class="background">    
		<div class="container">		
		<h5> Danh sách những nhà cung cấp</h5> 
		<button type="button" class="buttonthem" data-toggle="modal" data-target="#modal-themnhacungcap">Thêm nhà cung cấp</button>
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>STT</th>
			        <th>Mã nhà cung cấp</th>
			        <th>Tên nhà cung cấp</th>
			        <th>Tác vụ</th>
			      </tr>
			    </thead>
			    <tbody>
			      	<?php 
				    	include '../../xuly/connect.php';   	
				    	$sql_noidung="SELECT * FROM nha_cung_cap";
				    	$result_noidung=mysqli_query($conn,$sql_noidung);
				    	if($result_noidung){
				    		$stt =1;
				    		while ($row_noidung=$result_noidung->fetch_assoc()) {
				    			echo "<tr>";
				    			echo "<td>".$stt."</td>";
				    			echo "<td>".$row_noidung['id_nha_cung_cap']."</td>";
				    			echo '<td style="text-align:left;"> Nhà cung cấp '.$row_noidung['ten_nha_cung_cap'].'</td>';
				    			echo '<td style="width:150px;">
				    					<button type="button" class="buttonsua" data-toggle="modal" data-target="#modal-xem">Sửa</button>
				    					<button type="button" class="buttonxoa" data-toggle="modal" data-target="#modal-xem">Xóa</button>
				    				</td>';
				    			echo "</tr>";
				    			$stt = $stt+1;
				    		}
				    	}
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