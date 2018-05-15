<html class="no-js" lang="">
<head>
<?php include '../phan_header.php';?>
	<style type="text/css">
	</style>
</head>
<body>
	<!-- Include các thành phần vào -->
	<?php include '../menudoc.php';?>
	<div id="right-panel" class="right-panel">
	<?php include '../menungang.php';?>
	<!-- Include Modal -->

		<!-- Nội dung -->
		<h2>Quản lý Dịch Giả</h2>
		<div class="background">    
		<div class="container">		
		<center><h5> Danh sách những dịch giả có trong hệ thống: </h5></center>
		<form method="POST">
			<button type="button" class="buttonthem" data-toggle="modal" data-target="#modal-them-dich-gia">Thêm dịch giả</button>
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>STT</th>
			        <th>Mã tác giả</th>
			        <th>Tác giả</th>
					<th>Tác vụ</th>
			      </tr>
			    </thead>
			    <tbody>
				    <?php 
				    	include '../../xuly/connect.php';
				    	$sql="SELECT * FROM dich_gia";
				    	$result=mysqli_query($conn,$sql);
				    	if($result){
				    		$stt =1;
				    		while ($row=$result->fetch_assoc()) {
				    			echo "<tr>";
				    			echo "<td>".$stt."</td>";
				    			echo "<td>".$row['id_dichgia']."</td>";
				    			echo '<td style="text-align:left;">'.$row['ten_dichgia'].'</td>';
				    			echo '<td style="width:150px;">
				    					<button type="button" class="buttonsua" data-toggle="modal" data-target="#modal-xem">sửa</button>
				    					<button type="button" class="buttonxoa" data-toggle="modal" data-target="#modal-xem">xóa</button>
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