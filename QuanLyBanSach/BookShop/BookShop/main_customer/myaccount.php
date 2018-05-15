<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Tài khoản của tôi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
		include ('../lib/link.php');
	 ?>
  </head>

  <body>
  <?php
  if (isset($_SESSION['loi_up'])){
      echo "<script>swal('Thông báo', '{$_SESSION['loi']}', 'error')</script>";
      unset($_SESSION['loi_up']);
  }
  else if (isset($_SESSION['thong_bao'])){
      echo "<script>swal('Thông báo', '{$_SESSION['thong_bao']}', 'success')</script>";
      unset($_SESSION['thong_bao']);
  }
  ?>
    <!-- Navigation -->
  <?php include ('../modules_customer/tk_menu_bar.php');?>
    <!-- Page Content -->
<div  class="container">
		<div id="my" class="row">
            <?php
                include ('../modules/connection.php');
                $sql="Select * from thong_tin_chu_tai_khoan WHERE id_taikhoan= '$_SESSION[idtk]'";
                $result=mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                if(mysqli_num_rows($result) > 0){
            ?>

			<div id="my-0" class="col-lg-3">
				<div class="myaccount">
                    <center><img id="img_avt" src="../image/avatar.jpg " ></center>
                    <ul>
						<li><a href="myaccount.php" class="active"><span
								class="glyphicon glyphicon-user" class="close"
								title="Close Modal"></span> Tài khoản của tôi</a></li>
						<li><a href="changepwd.php"><span
								class="glyphicon glyphicon-edit" class="close"
								title="Close Modal"></span> Đổi mật khẩu</a></li>
						<li><a href="order.php"><span
								class="glyphicon glyphicon glyphicon-th-list"></span> Đơn mua</a></li>
						<li><a href="#"><span
								class="glyphicon glyphicon glyphicon glyphicon-bell"></span>Thông
								báo</a></li>
					</ul>
				</div>
			</div>
			<!-- /.col-lg-3 -->

			<div id="my-1" class="col-lg-9">
				<div id="myacc" class="container">
					<div id="mya" class="panel panel-default">
						<div class="panel-body">
							<h3 id="my-user">Hồ sơ của tôi</h3>
							<p id="info">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
							<hr id="account">
							<form class="form-horizontal" action="../modules_customer/up_account.php" method="post">
                                <center><?php include ('../modules_customer/upload_img.php');?></center>
								<div class="form-group">
									<label class="control-label col-sm-2" for="email">Email:</label>
									<div class="col-sm-10">
                                        <input type="email" class="form-control-static" name="email" value="<?php echo $row['email']==null ? 'someone@example.com' : $row['email']?>">
                                    </div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="num">Số
										điện thoại:</label>
									<div class="col-sm-10">
                                        <input type="tel" class="form-control-static" name="num" value="<?php echo $row['sdt']==null? 'Không có': $row['sdt'] ?>">

									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">Tên:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name_tk"
                                               placeholder="Nhập tên..." name="name" value="<?php echo $row['ten_chu_tk'] ?>">
                                    </div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="gender">Giới
										tính:</label>
									<div class="col-sm-10">
										<label class="radio-inline" for="gender"> <input type="radio"
                                                                                          name="gender" value="1" <?php echo $row['phai']==1 ? 'checked' : '' ?>>Nam
										</label> <label class="radio-inline" for="gender"> <input type="radio"
                                                                                      name="gender" value="0" <?php echo $row['phai']==0 ? 'checked' : '' ?>>Nữ
										</label>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="birthday">Ngày sinh:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="birthday" value="<?php echo $row['ngaysinh']==null ? '01/01/1980' : $row['ngaysinh'] ?>">
                                    </div>
								</div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="address">Địa chỉ:</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="width: 400px;"  class="form-control" id="address"
                                               placeholder="Nhập địa chỉ..." name="address" value="<?php echo $row['diachi'] ?>">
                                    </div>
                                </div>

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-default" name="save">Lưu</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- /.col-lg-9 -->
<?php } ?>
				</div>
				<!-- /.row -->
			</div>
		</div>
		<!-- /.container -->
	</div>
    <!-- /.container -->

  <?php include ('../modules/footer.php')?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
