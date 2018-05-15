<html class="no-js" lang="">
<head>
	<style type="text/css">
		 .buttonxem{
            color: white;
            background: #FF9800;
            text-align: center;
            padding: 0px 10px 0px 10px;
            font-size: 15px;
            border-radius: 3px;
            border-style: none;
            margin-bottom: 2px !important;
        }
        .buttonduyet{
			color: white;
			background: green;
			text-align: center;
            padding: 1px 7px 1px 7px;
			font-size: 15px;
			border-radius: 3px;
			border-style: none;
			width: 70px !important;
            margin-bottom: 2px !important;
		}
	</style>
<?php include '../phan_header.php';?>
<?php

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];
    $sql1="SELECT * FROM don_hang dh JOIN chi_tiet_don_hang ct ON dh.id_don_hang = ct.id_don_hang 
              JOIN thong_tin_chu_tai_khoan tt on dh.id_tk = tt.id_taikhoan
          WHERE dh.id_don_hang = '".$id."'";
    include '../../xuly/connect.php';
    $result1 = mysqli_query($conn,$sql1);
    while ($row1=$result1->fetch_assoc()){
        $sach = ['iddh' => $row1['id_don_hang'],'tenkh' =>$row1['ten_chu_tk']];
    }

}


?>
</head>
<body>
	<!-- Include các thành phần vào -->
	<?php include '../menudoc.php';?>
	<div id="right-panel" class="right-panel">
	<?php include '../menungang.php';?>
	<!-- Include Modal -->
        <?php include 'modal-duyet-don-hang.php' ?>
        <?php
        if (isset($sach)) {

            if($type=='view')
                echo "<script>jQuery(function() {jQuery('#').modal();})</script>";
            else echo "<script>jQuery(function() {jQuery('#modal-duyet').modal();})</script>";
        }
        ?>
		<!-- Nội dung -->
		<h2>Quản lý Đơn Hàng</h2>
		<div class="background">    
		<div class="container">		
		<h5> Danh sách đơn hàng cần duyệt: </h5>
		<form method="POST">
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
				    	$sql="SELECT * FROM don_hang dh join thong_tin_chu_tai_khoan ttctk on dh.id_tk = ttctk.id_taikhoan Where trangthai like 'chưa duyệt'";
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
				    			echo '<td style="width:200px;">
				    					<a href="?type=view&id='.$row['id_don_hang'].'" class="buttonxem" >Xem</a>
				    					<a href="?type=edit&id='.$row['id_don_hang'].'" class="buttonduyet" >Duyệt</a>
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
    <script>
        let url = window.location.href;
        url = url.replace(/\?.*/, '');
        window.history.pushState({url: url}, '', url);
    </script>
</body>
</html>