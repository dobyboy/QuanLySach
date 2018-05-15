<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Tình trạng đơn hàng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
		include ('../lib/link.php');
	 ?>
  </head>
<style type="text/css">
	a:link{
		color: :blue !important;
	}
</style>
  <body>

    <!-- Navigation -->
    <?php include ('../modules_customer/tk_menu_bar.php');?>

    <!-- Page Content -->
   <div class="container">

		<div id="order" class="row">

			<div id="order-0"class="col-lg-3">
				<div class="myaccount">
                    <center><img id="img_avt" src="../image/avatar.jpg" ></center>
					<ul>
						<li><a href="myaccount.php"><span
								class="glyphicon glyphicon-user" class="close"
								title="Close Modal"></span> Tài khoản của tôi</a></li>
						<li><a href="changepwd.php" ><span
								class="glyphicon glyphicon-edit" class="close"
								title="Close Modal"></span> Đổi mật khẩu</a></li>


						<li><a href="order.php" class="active"><span
								class="glyphicon glyphicon glyphicon-th-list"  ></span> Đơn mua</a></li>
						<li><a href="#"><span
								class="glyphicon glyphicon glyphicon-bell"></span>Thông báo</a></li>
					</ul>
				</div>
			</div>
			<!-- /.col-lg-3 -->

			<div id="order-1" class="col-lg-9">
				<div id="od" class="container">
					<div id="ode" class="panel panel-default">
						<div id="order11" class="panel-body">
                            <ul id="order" class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#chothanhtoan">Chờ thanh toán</a></li>
                                <li><a data-toggle="tab" href="#cholay">Chờ lấy hàng</a></li>
                                <li><a data-toggle="tab" href="#danggiao">Đang giao</a></li>
								<li><a data-toggle="tab" href="#dagiao">Đã giao</a></li>
								<li><a data-toggle="tab" href="#dahuy">Đã hủy</a></li>
                            </ul>

                            <div class="tab-content">
								<div id="chothanhtoan" class="tab-pane fade in active">
                                    <h3>Chờ thanh toán</h3>
                                    <table class="table table-hover" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Ngày đặt hàng</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                    <?php include ('../modules/connection.php');
                                        $query= mysqli_query($conn,"SELECT * FROM don_hang d JOIN chi_tiet_don_hang c on d.id_don_hang=c.id_don_hang 
                                                                        JOIN sach s ON c.id_sach = s.id_sach
                                                                      WHERE d.id_tk='".$_SESSION['idtk']."' and d.trangthai like 'Chưa duyệt'");
                                        $num= mysqli_num_rows($query);
                                    if ($num > 0){
                                         while ($row_dh= mysqli_fetch_array($query)) { ?>
                                    <tr style="margin-bottom: 20px!important;">
                                        <td style="margin-bottom: 20px!important;"><?php echo $row_dh['ten_sach'] ?></td>
                                        <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['don_gia']) ?> đ</td>
                                        <td style="margin-bottom: 20px!important;"> <?php echo $row_dh['so_luong'] ?>  </td>

                                        <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['so_luong'] * $row_dh['don_gia']) ?>
                                            đ
                                        </td>
                                        <td style="margin-bottom: 20px!important;"> <?php echo $row_dh['ngay_dat_hang'] ?>  </td>
                                    </tr>

                                    <?php }
                                    } else{
                                        echo '<p>Không tìm thấy đơn hàng.</p>';
                                    }?>
                                    <hr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="cholay" class="tab-pane fade">
                                    <h3>Chờ lấy hàng</h3>
                                    <table class="table table-hover" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Ngày duyệt đơn hàng</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php include ('../modules/connection.php');
                                        $query= mysqli_query($conn,"SELECT * FROM don_hang d JOIN chi_tiet_don_hang c on d.id_don_hang=c.id_don_hang 
                                                                        JOIN sach s ON c.id_sach = s.id_sach
                                                                      WHERE d.id_tk='".$_SESSION['idtk']."' and d.trangthai like 'Đã duyệt'");
                                        $num= mysqli_num_rows($query);
                                        if ($num > 0){
                                            while ($row_dh= mysqli_fetch_array($query)) { ?>
                                                <tr style="margin-bottom: 20px!important;">
                                                    <td style="margin-bottom: 20px!important;"><?php echo $row_dh['ten_sach'] ?></td>
                                                    <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['don_gia']) ?> đ</td>
                                                    <td style="margin-bottom: 20px!important;"> <?php echo $row_dh['so_luong'] ?>  </td>

                                                    <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['so_luong'] * $row_dh['don_gia']) ?>
                                                        đ
                                                    </td>
                                                    <td style="margin-bottom: 20px!important;"> <?php echo $row_dh['ngay_duyet_don_hang'] ?>  </td>
                                                </tr>

                                            <?php }
                                        } else{
                                            echo '<p>Không tìm thấy đơn hàng.</p>';
                                        }?>
                                        <hr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="danggiao" class="tab-pane fade">
                                    <h3>Đang giao</h3>
                                    <table class="table table-hover" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Ngày giao hàng</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php include ('../modules/connection.php');
                                        $query= mysqli_query($conn,"SELECT * FROM don_hang d JOIN chi_tiet_don_hang c on d.id_don_hang=c.id_don_hang 
                                                                        JOIN sach s ON c.id_sach = s.id_sach
                                                                      WHERE d.id_tk='".$_SESSION['idtk']."' and d.trangthai like 'Đang giao'");
                                        $num= mysqli_num_rows($query);
                                        if ($num > 0){
                                            while ($row_dh= mysqli_fetch_array($query)) { ?>
                                                <tr style="margin-bottom: 20px!important;">
                                                    <td style="margin-bottom: 20px!important;"><?php echo $row_dh['ten_sach'] ?></td>
                                                    <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['don_gia']) ?> đ</td>
                                                    <td style="margin-bottom: 20px!important;"> <?php echo $row_dh['so_luong'] ?>  </td>

                                                    <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['so_luong'] * $row_dh['don_gia']) ?>
                                                        đ
                                                    </td>
                                                    <td style="margin-bottom: 20px!important;"> <?php echo $row_dh['ngay_giao_hang'] ?>  </td>
                                                </tr>

                                            <?php }
                                        } else{
                                            echo '<p>Không tìm thấy đơn hàng.</p>';
                                        }?>
                                        <hr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="dagiao" class="tab-pane fade">
                                    <h3>Đã giao</h3>
                                    <table class="table table-hover" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th>Ngày nhận hàng</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php include ('../modules/connection.php');
                                        $query= mysqli_query($conn,"SELECT * FROM don_hang d JOIN chi_tiet_don_hang c on d.id_don_hang=c.id_don_hang 
                                                                        JOIN sach s ON c.id_sach = s.id_sach
                                                                      WHERE d.id_tk='".$_SESSION['idtk']."' and d.trangthai like 'Đã giao'");
                                        $num= mysqli_num_rows($query);
                                        if ($num > 0){
                                            while ($row_dh= mysqli_fetch_array($query)) { ?>
                                                <tr style="margin-bottom: 20px!important;">
                                                    <td style="margin-bottom: 20px!important;"><?php echo $row_dh['ten_sach'] ?></td>
                                                    <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['don_gia']) ?> đ</td>
                                                    <td style="margin-bottom: 20px!important;"> <?php echo $row_dh['so_luong'] ?>  </td>

                                                    <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['so_luong'] * $row_dh['don_gia']) ?>
                                                        đ
                                                    </td>
                                                    <td style="margin-bottom: 20px!important;"> <?php echo $row_dh['ngay_nhan_hang'] ?>  </td>
                                                </tr>

                                            <?php }
                                        } else{
                                            echo '<p>Không tìm thấy đơn hàng.</p>';
                                        }?>
                                        <hr>
                                        </tbody>
                                    </table>
                                </div>
								<div id="dahuy" class="tab-pane fade">
                                    <h3>Đã hủy</h3>
                                    <table class="table table-hover" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php include ('../modules/connection.php');
                                        $query= mysqli_query($conn,"SELECT * FROM don_hang d JOIN chi_tiet_don_hang c on d.id_don_hang=c.id_don_hang 
                                                                        JOIN sach s ON c.id_sach = s.id_sach
                                                                      WHERE d.id_tk='".$_SESSION['idtk']."' and d.trangthai like 'Đã hủy'");
                                        $num= mysqli_num_rows($query);
                                        if ($num > 0){
                                            while ($row_dh= mysqli_fetch_array($query)) { ?>
                                                <tr style="margin-bottom: 20px!important;">
                                                    <td style="margin-bottom: 20px!important;"><?php echo $row_dh['ten_sach'] ?></td>
                                                    <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['don_gia']) ?> đ</td>
                                                    <td style="margin-bottom: 20px!important;"> <?php echo $row_dh['so_luong'] ?>  </td>

                                                    <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['so_luong'] * $row_dh['don_gia']) ?>
                                                        đ
                                                    </td>
                                                </tr>

                                            <?php }
                                        } else{
                                            echo '<p>Không tìm thấy đơn hàng.</p>';
                                        }?>
                                        <hr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

						</div>
					</div>
					<!-- /.col-lg-9 -->

				</div>
				<!-- /.row -->
			</div>
		</div>
		<!-- /.container -->
	</div>
    <!-- /.container -->

    <?php include ('../modules/footer.php')?>

  </body>

</html>
