<html class="no-js" lang="">
<head>
<?php include '../phan_header.php';?>

   
	<style type="text/css">
	        .buttonxem{
            color: white;
            background: #FF9800;
            text-align: center;
            padding: 0px 9px 0px 9px;
            font-size: 15px;
            border-radius: 3px;
            border-style: none;
            margin-bottom: 2px !important;
        }
        .buttonsua{
            color: white;
            background: #2979FF;
            text-align: center;
            padding: 1px 12px 1px 12px;
            font-size: 15px;
            border-radius: 3px;
            border-style: none;
            margin-bottom: 2px !important;
        }

        .buttonxoa{
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
	<?php include 'modal_sach/modal-themsach.php' ?>
		<!-- Nội dung -->
		<h2>Quản lý sách</h2>
		<div class="background">    
		<div class="container">		
		<h5> Danh sách sách hiện có trong hệ thống: </h5>
		<form method="POST">
			<button type="button" class="buttonthem" data-toggle="modal" data-target="#modal-themsach">Thêm sách</button>
			<input class="buttonsearch" type="button" name="btn-search" value="Tìm">
			<input class="txt-search" type="text" name="txt-search" placeholder="Số đăng ký sách..." style="width: 180px;">
			<table class="table table-hover">
			    <thead>
			      <tr>
                      <th>STT</th>
                      <th>Mã sách</th>
                      <th>Số đăng ký </th>
                      <th>Tên sách</th>
                      <th>Tác giả</th>
                      <th>Dịch giả</th>
                      <th>Ngày phát hành</th>
                      <th>NXB</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Thao tác</th>
			      </tr>
			    </thead>
			    <tbody>
				    <?php 
				    	include '../../xuly/connect.php';
				    	$sql="SELECT s.id_sach,s.ten_sach,s.ma_sach,tg.ten_tac_gia,dg.ten_dichgia,s.ngay_xuat_ban,nxb.ten_nxb,
				    	gs.gia,k.so_luong_sach
						FROM sach s join tac_gia tg ON s.id_tac_gia = tg.id_tac_gia 
						JOIN kho k ON s.id_sach = k.id_sach 
						JOIN dich_gia dg on s.id_dichgia = dg.id_dichgia
						JOIN nha_xuat_ban nxb ON s.id_nxb = nxb.id_nxb
						JOIN gia_sach gs ON s.id_sach = gs.id_sach";
				    	$result=mysqli_query($conn,$sql);
				    	if($result){
				    		$stt =1;
				    		while ($row=$result->fetch_assoc()) {
				    			echo "<tr>";
				    			echo "<td>".$stt."</td>";
                                echo "<td>".$row['id_sach']."</td>";
				    			echo "<td>".$row['ma_sach']."</td>";
				    			echo "<td>".$row['ten_sach']."</td>";
				    			echo "<td>".$row['ten_tac_gia']."</td>";
				    			echo "<td>".$row['ten_dichgia']."</td>";
				    			echo "<td>".$row['ngay_xuat_ban']."</td>";
				    			echo "<td>".$row['ten_nxb']."</td>";
				    			echo "<td>".$row['gia']." vnđ</td>";
				    			echo "<td>".$row['so_luong_sach']."</td>";
				    			echo '<td >
                                        <a href="modal_sach/xemthongtinsach.php?id=' . $row['id_sach'] . '" class="buttonxem">Xem</a>
				    					 <a href="modal_sach/capnhatthongtinsach.php?idsua=' . $row['id_sach'] . '" class="buttonsua">Sửa</a>
				                      	<a href="modal_sach/capnhatthongtinsach.php?idxoa=' . $row['id_sach'] . '" class="buttonxoa">Xóa</a>

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

    <script>
        let url = window.location.href;
        url = url.replace(/\?.*/, '');
        window.history.pushState({url: url}, '', url);
    </script>

	<script type="text/javascript">
        function toggle(source,name) {
            checkboxes = document.getElementsByName(name);
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }
	</script>
	<script type="text/javascript">
     function xoa() {
            if(confirm("Thao tác sẽ đưa Sách vào trạng thái ngừng kinh doanh ??")){
            	<?php include '../../xuly/connect.php' ;
            	$sql = "UPDATE sach set trangthaikinhdoanh='Ngừng kinh doanh' where id_sach ='".$_GET['idxoa']."'";
            	var_dump($sql); die();
            	$result= mysqli_query($conn,$sql);
            	if($result){
            		echo "<script>
               alert('Cập nhật thành công!');
              </script>";
            	}
            	?>

            }
        }
	</script>


</body>
</html>