<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thanh toán</title>
    <?php
    include('../lib/link.php');
    ?>
</head>

<body>
<?php

include("../modules/connection.php");

$sql = "SELECT *
		FROM sach as s 
		JOIN loai_sach as l on l.id_loai_sach = s.id_loai_sach
		JOIN tac_gia as t on s.id_tac_gia = t.id_tac_gia 
		JOIN hinh_anh_sach as h on s.id_sach = h.id_sach
		JOIN nha_cung_cap as n on s.id_nha_cung_cap = n.id_nha_cung_cap
		JOIN nha_xuat_ban nxb ON s.id_nxb = nxb.id_nxb
		JOIN kich_thuoc t2 ON s.id_kichthuoc = t2.id_kichthuoc
		JOIN loai_bia bia ON s.id_loaibia = bia.id_loaibia
		JOIN dich_gia g2 ON s.id_dichgia = g2.id_dichgia
		JOIN gia_sach as g on s.id_sach = g.id_sach		
		JOIN kho k ON s.id_sach = k.id_sach			
		WHERE s.id_sach ='$_GET[idsp]'";

$result = mysqli_query($conn, $sql) or die(mysql_error());
$chitiet_sp = mysqli_fetch_array($result);
?>

    <!-- Navigation -->
    <?php include('../modules_visitor/tes_menu_bar.php'); ?>
    <div class="container">
    <div class="container-pay">
        <div class="row-pay">
            <h3>ĐĂNG NHẬP</h3>
            <hr/>
            <form id="pay" class="col-lg-9" action="../modules_visitor/login_process.php" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Tên đăng nhập:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name"
                               placeholder="Nhập tên..." name="uname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="psw">Mật khẩu:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="psw"
                               placeholder="Nhập mật khẩu..." name="psw" ><br/>
                        <input type="checkbox">Ghi nhớ
                    </div>
                </div>
                <center><button type="submit" class="btn-info" style="width: 15%; border-radius: 5px;" name="sign-in">Đăng nhập</button></center>
            </form>
            <div id="pay1" class="col-lg-3">
                <div class="panel-pay panel-info">
                    <div class="panel panel-heading" > Thông tin sản phẩm </div>
                    <div class=" panel panel-body">
                        <img src="../image/sachbanchay/<?php echo $chitiet_sp['lienket']?>" style="width: 50px; height: 70px;" alt="ảnh sách">
                        <br><br><p style="color: #005cbf;"> <?php echo $chitiet_sp['ten_sach']?></p>
                    </div>

                </div>
            </div>
            <h3>CHƯA CÓ TÀI KHOẢN?</h3><hr/>
            <p>Đăng ký tài khoản để mua hàng ngay. <a href="#" onclick="document.getElementById('id00').style.display='block'" >Đăng ký</a></p>



        </div>
    </div>

</div>
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
