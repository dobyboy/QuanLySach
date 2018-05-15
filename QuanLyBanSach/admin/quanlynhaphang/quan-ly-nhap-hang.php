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
		<h2>Quản LýNhập Hàng</h2>
		<div class="background">    
		<div class="container">		
		<h5> Danh sách Phiếu Nhập</h5> 
		<button type="button" class="buttonthem" data-toggle="modal" data-target="#modal-them-khuyen-mai">Thêm Phiếu nhập</button>
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>STT</th>
			        <th>Mã phiếu nhập</th>
			        <th>Ngày nhập hàng</th>
			        <th>Người nhập</th>
			        <th>Nhà cung cấp</th>
			        <th>Tác vụ</th>
			      </tr>
			    </thead>
			    <tbody>
			      	<?php 
				    	include '../../xuly/connect.php';   	
				    	$sql_select_phieunhap="SELECT * 
				    	FROM phieu_nhap pn join nha_cung_cap ncc on pn.id_nha_cung_cap = ncc.id_nha_cung_cap 
				    	join thong_tin_chu_tai_khoan tt on tt.id_taikhoan = pn.id_tk";
				    	$result_select_phieunhap=mysqli_query($conn,$sql_select_phieunhap);
				    	if($result_select_phieunhap){
				    		$stt =1;
				    		while ($row_phieunhap=$result_select_phieunhap->fetch_assoc()) {
				    			echo "<tr>";
				    			echo "<td>".$stt."</td>";
				    			echo "<td>".$row_phieunhap['id_phieu_nhap']."</td>";
				    			echo '<td style="text-align:left;">'.$row_phieunhap['ngay_nhap'].'</td>';
				    			echo '<td style="text-align:left;">'.$row_kho['ten_chhu_tk'].'</td>';
				    			echo '<td style="text-align:left;">'.$row_kho['ten_nha_cung_cap'].'</td>';
				    			echo '<td style="width:80px;">
				    					<button type="button" class="buttonxem" data-toggle="modal" data-target="#modal-xem">Xem</button>
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