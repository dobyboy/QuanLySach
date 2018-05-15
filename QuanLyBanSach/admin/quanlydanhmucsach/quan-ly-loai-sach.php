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
		<h2>Quản lý loại sách</h2>
		<div class="background">    
		<div class="container">		
		<h5> Danh sách loại sách </h5> 
		<button type="button" class="buttonthem" data-toggle="modal" data-target="#modal-themloaisach">Thêm loại sách</button>
		<!-- include chuyển trang -->
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>STT</th>
			        <th>Mã loại sách</th>
			        <th>Tên Loại sách</th>
			        <th>Tác vụ</th>
			      </tr>
			    </thead>
			    <tbody>
			      	<?php 
				    	include '../../xuly/connect.php';   	
				    	$sql_noidung="SELECT * FROM loai_sach";
				    	$result_noidung=mysqli_query($conn,$sql_noidung);
				    	if($result_noidung){
				    		$stt =1;
				    		while ($row_noidung=$result_noidung->fetch_assoc()) {
				    			echo "<tr>";
				    			echo "<td>".$stt."</td>";
				    			echo "<td>".$row_noidung['id_loai_sach']."</td>";
				    			echo '<td style="text-align:left;">'.$row_noidung['ten_loai_sach'].'</td>';
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