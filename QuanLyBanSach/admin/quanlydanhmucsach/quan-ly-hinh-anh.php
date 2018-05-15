<html class="no-js" lang="">
<head>
<?php include '../header.php';?>
	<style type="text/css">
	</style>
	<script type="text/javascript">
		function over() {
			document.getElementsByName("xemchitietdonhang").background = grey;
		}
	</script>
</head>
<body>
	<!-- Include các thành phần vào -->
	<?php include '../menudoc.php';?>
	<div id="right-panel" class="right-panel">
	<?php include '../menungang.php';?>
	<!-- Include Modal -->
	<?php include 'modal-duyet-dh.php' ?>
	<?php include 'modal-xem-dh.php' ?>
		<!-- Nội dung -->
		<h2>Quản lý hình ảnh</h2>
		<div class="background">    
		<div class="container">		
		<h5> Danh hình ảnh của sách </h5>  
		<!-- include chuyển trang -->
		<?php include '../chuyentrang.php' ?>
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>STT</th>
			        <th>Mã khuyến mãi</th>
			        <th>Tên khuyến mãi</th>
			        <th>Ngày bắt đầu</th>
			        <th>Ngày kết thúc</th>
			        <th>Nội dung</th>
					<th>Xem chi tiết</th>
			        <th>Duyệt đơn hàng</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>1</td>
			        <td>dh00001</td>
			        <td>kh00001</td>
			        <td>22-10-2017</td>
			        <td>100.000vnd</td>
			        <td>Đã duyệt</td>
			        <td><button type="button" class="buttonxem" data-toggle="modal" data-target="#modal-xem">Xem</button></td>
			        <td><button type="button" class="buttonduyet" data-toggle="modal" data-target="#modal-duyet">Cập nhật</button></td>
			      </tr>
			      <tr>
			        <td>1</td>
			        <td>dh00001</td>
			        <td>kh00001</td>
			        <td>22-10-2017</td>
			        <td>100.000vnd</td>
			        <td>Đã duyệt</td>
			        <td><button type="button" class="buttonxem" data-toggle="modal" data-target="#modal-xem">Xem</button></td>
			        <td><button type="button" class="buttonduyet" data-toggle="modal" data-target="#modal-duyet">Cập nhật</button></td>
			      </tr>
			      <tr>
			        <td>1</td>
			        <td>dh00001</td>
			        <td>kh00001</td>
			        <td>22-10-2017</td>
			        <td>100.000vnd</td>
			        <td>Đã duyệt</td>
			        <td><button type="button" class="buttonxem" data-toggle="modal" data-target="#modal-xem">Xem</button></td>
			        <td><button type="button" class="buttonduyet" data-toggle="modal" data-target="#modal-duyet">Cập nhật</button></td>
			      </tr>
					 <tr>
			        <td>1</td>
			        <td>dh00001</td>
			        <td>kh00001</td>
			        <td>22-10-2017</td>
			        <td>100.000vnd</td>
			        <td>Dã duyệt</td>
			        <td><button type="button" class="buttonxem" data-toggle="modal" data-target="#modal-xem">Xem</button></td>
			        <td><button type="button" class="buttonduyet" data-toggle="modal" data-target="#modal-duyet">Cập nhật</button></td>
			      </tr>
			      <tr>
			        <td>1</td>
			        <td>dh00001</td>
			        <td>kh00001</td>
			        <td>22-10-2017</td>
			        <td>100.000vnd</td>
			        <td>Đã duyệt</td>
			        <td><button type="button" class="buttonxem" data-toggle="modal" data-target="#modal-xem">Xem</button></td>
			        <td><button type="button" class="buttonduyet" data-toggle="modal" data-target="#modal-duyet">Cập nhật</button></td>
			      </tr>
			      <tr>
			        <td>1</td>
			        <td>dh00001</td>
			        <td>kh00001</td>
			        <td>22-10-2017</td>
			        <td>100.000vnd</td>
			        <td>Đã duyệt</td>
			        <td><button type="button" class="buttonxem" data-toggle="modal" data-target="#modal-xem">Xem</button></td>
			        <td><button type="button" class="buttonduyet" data-toggle="modal" data-target="#modal-duyet">Cập nhật</button></td>
			      </tr>
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