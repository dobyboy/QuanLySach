<html class="no-js" lang="">
<head>
<?php include '../phan_header.php';?>
	<style type="text/css">
	.hinhanh{
		width: 100px;
		height: 100px;
		float: left;
		box-shadow: 2px 4px 8px grey;
		border-radius: 50px;
	}
	.canhle{
		margin: 5px 2px 5px 2px;
		width: 100%;
        box-shadow: 0px 1px 8px grey;
	}
	.td_ten{
		color: orangered;
		font-size: 18px;
		font-weight: 500;
        text-align: center;
        padding-bottom: 5px;

	}
	.dongho{
		color: blue;
		text-align: center;
	 	margin: 10px 10px 15px 10px ; 
		border-bottom: 2px solid #BDBDBD;
		padding: 5px 0px 3px 0px !important;
		box-shadow: 0px 1px 8px #BDBDBD;
		vertical-align: center;
		font-size:15px;
		font-weight: 500;
	}

    table{
        width: 100%;
        height:100%;
        box-shadow: 1px 1px 8px #BDBDBD;
    }
    table thead tr th{
             padding: 5px 2px;
             text-align: center;
             color: blue;
             background-color: lightblue;
             border-radius: 3px;
             border: 1px solid grey;
         }
    td{
        background-color: white !important;
    }

	</style>
	<script type="text/javascript">
	function refrClock(){
		var d=new Date();
		var s=d.getSeconds();
		var m=d.getMinutes();
		var h=d.getHours();
		var day=d.getDay();
		var date=d.getDate();
		var month=d.getMonth();
		var year=d.getFullYear();
		var days=new Array("Chủ nhật","Thứ hai","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7");
		var months=new Array("1","2","3","4","5","6","7","8","9","10","11","12");
		var am_pm;
		if (s<10) {s="0" + s}
		if (m<10) {m="0" + m}
		if (h>12) {h-=12;AM_PM = "PM"}
		else {AM_PM="AM"}
		if (h<10) {h="0" + h}
		document.getElementById("clock").innerHTML=days[day] + " Ngày " + date + "/" +months[month] + "/" + year + " Bây giờ là "+ "  [" + h + ":" + m + ":" + s + "] " + AM_PM;
		setTimeout("refrClock()",1000);
	}
</script> 
</head>
<body onload="refrClock()">
	<!-- Include các thành phần vào -->
	<?php include '../menudoc.php';?>
	<div id="right-panel" class="right-panel">
	<?php include '../menungang.php';?>
	<!-- Include Modal -->

		<!-- Nội dung -->
		<h2 style="background-color: lightblue;">BookShop.com</h2>
		<div class="background">    
		<div class="container">
			<table class="canhle">
                <thead>
                <tr>
                    <th colspan="5" style="font-size: 22px ">TỔNG QUAN HỆ THỐNG</th>
                </tr>
                </thead>
				<tr>
					<td> 
						<img id="nhanvien" class="hinhanh" src="http://localhost:8080/quanlybansach/image/hinh-anh-chung/tongquan_nhanvien.png">
						<label for="nhanvien">Nhân viên	</label>
					</td>
					<td> 
						<img id ="khachhang" class="hinhanh" src="http://localhost:8080/quanlybansach/image/hinh-anh-chung/khachhang.png">
						<label for="khachhang">Khách hàng</label>
					</td>
					<td> 
						<img id ="sach" class="hinhanh" src="http://localhost:8080/quanlybansach/image/hinh-anh-chung/book.png">
						<label for="sach">Sách </label>
					</td>
					<td> 
						<img id="donhang"class="hinhanh" src="http://localhost:8080/quanlybansach/image/hinh-anh-chung/donhang.png">
						<label for="donhang">Đơn hàng </label>
					</td>
					<td> 
						<img id ="danhthu" class="hinhanh" src="http://localhost:8080/quanlybansach/image/hinh-anh-chung/danhthu.png">
						<label for="danhthu">Danh thu</label>
					</td>
				</tr>
				<tr>
					<td class="td_ten"><?php
                        include '../../xuly/connect.php';
                        $sql = "Select count(*) from tai_khoan where id_loai_tk ='L001'";
                        $result =mysqli_query($conn,$sql);
                        $row=$result->fetch_row();
                        echo $row[0];
                        ?></td>
					<td class="td_ten" ><?php
                        include '../../xuly/connect.php';
                        $sql = "Select count(*) from tai_khoan where id_loai_tk ='L002'";
                        $result =mysqli_query($conn,$sql);
                        $row=$result->fetch_row();
                        echo $row[0];
                        ?></td>
					<td class="td_ten" ><?php
                        include '../../xuly/connect.php';
                        $sql = "Select count(*) from sach";
                        $result =mysqli_query($conn,$sql);
                        $row=$result->fetch_row();
                        echo $row[0];
                        ?></td>
					<td class="td_ten" ><?php
                        include '../../xuly/connect.php';
                        $sql = "Select count(*) from don_hang";
                        $result =mysqli_query($conn,$sql);
                        $row=$result->fetch_row();
                        echo $row[0];
                        ?></td>
					<td class="td_ten"><?php
                        include '../../xuly/connect.php';
                        $sql = "Select sum(so_luong*don_gia) from chi_tiet_don_hang";
                        $result =mysqli_query($conn,$sql);
                        $row=$result->fetch_row();
                        echo $row[0] ."vnđ";
                        ?></td>
				</tr>
			</table>
            <div style="max-width: 500px;height: 400px;box-shadow: 1px 2px 8px grey;position: absolute;top: 340px;right: 22px;" >
                <table >
                    <thead>
                    <tr>
                        <th>Biểu đồ trạng thái đơn hàng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                       <td><div id="chart_div"> </div></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div style="width: 500px;height: 400px;box-shadow: 2px 1px 8px grey;position: absolute;top: 340px;left: 307px;" >
                <table style="height: auto !important;">
                    <thead>
                    <tr>
                        <th colspan="3">Thông báo mới nhất</th>
                    </tr>
                    <tr style="color: blue;text-align: center;font-weight: bold;padding:1px 3px 1px 3px;">
                        <td style="width: 30px;padding:1px 5px 1px 5px;text-align: center;">STT</td>
                        <td>Nội dung thông báo</td>
                        <td style="padding:1px 3px 1px 3px;">Tác vụ</td>
                    </tr>
                    </thead>

                    <tbody>
                    <tr >
                        <td style="width: 30px;padding:1px 5px 1px 5px;">1</td>
                        <td style="text-align: center;">Bạn có <?php
                                    include '../../xuly/connect.php';
                                    $sql = "Select count(*) from don_hang where trangthai like 'chưa duyệt'";
                                    $result =mysqli_query($conn,$sql);
                                    $row=$result->fetch_row();
                                    echo $row[0];
                                    ?> 
                                    đơn hàng cần duyệt
                        </td>
                        <td style="width: 30px;padding:1px 5px 1px 5px;"><a href="../quanlydonhang/duyetdonhang.php" class="buttonxem">Xem</a></td>
                    </tr>
                    </tbody>

                </table>
            </div>

		</div>
		</div>
		<h2  class="dongho">
			<label id="clock" ></label>
		</h2>
		<!-- Nội dung -->
	</div>
	<script src="../../css/assets/js/vendor/jquery-2.1.4.min.js"></script>
	<script src="../../css/assets/js/popper.min.js"></script>
	<script src="../../css/assets/js/plugins.js"></script>
	<script src="../../css/assets/js/main.js"></script>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load('visualization', '1.0', {'packages':['corechart']});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                <?php
                    include '../../xuly/connect.php';
                $sql="select trangthai ,COUNT(trangthai) as soluong FROM don_hang GROUP by trangthai";
                $result=mysqli_query($conn,$sql);
                if ($result){
                    $i = 1;$arrten=array();$arrvalue=array();
                    $data = [];
                    while ($row = $result->fetch_assoc()){
                        $data[] = [
                            $row['trangthai'],
                            (int)$row['soluong']
                        ];
                    }

                }
                ?>
                data.addRows(JSON.parse('<?php echo json_encode($data) ?>'));
                var options = {'title':'',
                    'width':500,
                    'height':300};
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>


</body>
</html>