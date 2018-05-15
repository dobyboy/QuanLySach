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
		<h2>Quản Lý Kho</h2>
		<div class="background">    
		<div class="container">		
		<h5> Danh sách Sách hiện có trong kho </h5> 
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>STT</th>
			        <th>Mã sách</th>
			        <th>Tên sách</th>
			        <th>Tác giả</th>
			        <th>Tên nhà cung cấp</th>
			        <th>Số lượng</th>
			        <th>Tác vụ</th>
			      </tr>
			    </thead>
			    <tbody>
			      	<?php 
				    	include '../../xuly/connect.php';   	
				    	$sql_select_kho="SELECT s.ma_sach, s.ten_sach,tg.ten_tac_gia,s.ngay_xuat_ban, ncc.ten_nha_cung_cap,k.so_luong_sach
				    	FROM sach s join kho k on  s.id_sach=k.id_sach
				    	join tac_gia tg on s.id_tac_gia = tg.id_tac_gia 
				    	join nha_cung_cap ncc on s.id_nha_cung_cap = ncc.id_nha_cung_cap";
				    	$result_select_kho=mysqli_query($conn,$sql_select_kho);
				    	if($result_select_kho){
				    		$stt =1;
				    		while ($row_kho=$result_select_kho->fetch_assoc()) {
				    			echo "<tr>";
				    			echo "<td>".$stt."</td>";
				    			echo "<td>".$row_kho['ma_sach']."</td>";
				    			echo '<td style="text-align:left; width:270px;">'.$row_kho['ten_sach'].'</td>';
				    			echo '<td style="text-align:left;">'.$row_kho['ten_tac_gia'].'</td>';
				    			echo '<td style="text-align:left;">'.$row_kho['ten_nha_cung_cap'].'</td>';
				    			echo '<td>'.$row_kho['so_luong_sach'].'</td>';
				    			echo '<td style="width:150px;">
				    					<button type="button" class="buttonduyet" data-toggle="modal" data-target="#modal-xem">Nhập hàng</button>
				    					<button type="button" class="buttonxoa" style="width:65px;" data-toggle="modal" data-target="#modal-xem">Khuyến mãi</button>
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