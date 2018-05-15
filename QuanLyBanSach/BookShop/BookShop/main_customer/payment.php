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
if (isset($_SESSION['thongbao'])){
    echo "<script>swal('Thông báo', '{$_SESSION['thongbao']}', 'sucess')</script>";
    unset($_SESSION['thongbao']);
}
//if (isset($_SESSION['loi'])){
//    echo "<script>swal('Thông báo', '{$_SESSION['tt']}', 'error')</script>";
//    unset($_SESSION['loi']);
//}
?>
<!-- Navigation -->
<?php include('../modules_customer/tk_menu_bar.php'); ?>


<div id="tt" class="container">
    <div id="pn" class="panel-primary">
        <div id="title" class="panel panel-title">THANH TOÁN ĐƠN HÀNG</div>
        <form id="body" class="panel panel-body" action="" method="post">
            <table>
                <tr>
                    <td class="col-lg-4">
                        <h5 style="color: #1c7430;">SẢN PHẨM</h5>
                        <hr>
                    </td>
                    <td class="col-lg-4">
                        <h5 style="color: #1c7430;">THÔNG TIN GIAO HÀNG</h5>
                        <hr>
                    </td>
                    <td class="col-lg-4">
                        <h5 style="color: #1c7430;">HÌNH THỨC GIAO HÀNG</h5>
                        <hr>
                    </td>

                </tr>
                <tr>
                    <td class="col-lg-4" style="margin-top: -20px;">
                        <?php include ('../modules_customer/list_pay.php')?>
                    </td>
                    <td class="col-lg-4">
                        <?php
                            $result_tk = mysqli_fetch_array(mysqli_query($conn,"Select * from thong_tin_chu_tai_khoan WHERE id_taikhoan='$_SESSION[idtk]'"))

                        ?>

                            <input type="hidden" name="httt" value="cash">
                            <label class="control-label col-sm-5" for="name">Họ và tên:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name"
                                       style="width: 100%" placeholder="Nhập họ và tên..." name="name" value="<?php echo $result_tk['ten_chu_tk']?>">
                            </div>
                            <label class="control-label col-sm-5" for="tel">Số điện thoại:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tel"
                                       style="width: 100%" placeholder="Nhập số điện thoại..." name="tel" value="<?php echo $result_tk['sdt'] ?>">
                            </div>
                            <label class="control-label col-sm-7" for="street">Địa chỉ nhận hàng:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="street"
                                       style="width: 100%" placeholder="Nhập địa chỉ..." name="address" value="<?php echo $result_tk['diachi'] ?>">
                            </div>
                            <div class="col-sm-10">
                                <button type="submit" class="save" name="save">LƯU</button>
                            </div>

                    </td>
                    <td class="col-lg-4">
                        <div class="ht_tt" id="myDIV">
                            <button id="tra" class="btn active" data-val="cash">Thanh toán bằng tiền mặt khi nhận hàng</button>

                            <button id="tra" class="btn" data-val="internet">Thẻ ATM có Internet Banking (miễn phí)</button>

                            <button id="tra" class="btn" data-val="visa">Thẻ VISA/Master Card/JCB (miễn phí)</button>

                            <button id="tra" class="btn" data-val="atm">Thanh toán bằng thẻ ATM hoặc ví điện tử</button>
                        </div>

                    </td>
                </tr>
                <tr id="footer" style="background-color: #6c757da; color: #0c5460;">
                    <td>Tạm tính: <label style="color: #e58a14"><?php include('../modules/connection.php');
                            $sum = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM( so_luong*don_gia)
                                FROM chi_tiet_gio_hang WHERE id_gio_hang='" . $_SESSION['idgh'] . "'"));
                            echo number_format($sum[0]) . ' đ';
                            ?></label></td>
                    <td>Phí vận chuyển: <label style="color: #e58a14">0 đ</label></td>
                    <td>Phụ phí: <label style="color: #e58a14">0 đ</label></td>
                </tr>
            </table>
            <div id="th">
            <button  class="btn btn-info"  onclick="window.location.href='../main_customer/home.php'" style="width: 20%;">Tiếp tục mua hàng</button>
            <button  class="btn btn-warning" type="submit" name="dathang" onclick="window.location.href='../main_customer/payment.php'" style="width: 20%;">Đặt hàng</button>
            </div>
        </form>
    </div>
</div>
<?php include ('../modules/footer.php')?>
<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    // Add active class to the current button (highlight it)

    $('#myDIV').find('button').click(function (e) {
        $('#myDIV').find('button').removeClass('active');
        $('[name="httt"]').val($(this).data('val'));
        //alert($(this).data('val'));
        $(this).addClass('active');
        return false
        ;
    });
</script>
<?php
if (isset($_POST['save'])){
    $sql_up="UPDATE thong_tin_chu_tai_khoan 
                SET ten_chu_tk='".$_POST['name']."',sdt='".$_POST['tel']."' , diachi='".$_POST['address']."'
                WHERE id_taikhoan='$_SESSION[idtk]'";
    $reusult= mysqli_query($conn,$sql_up);

    if($reusult==true){

        echo '<script> alert("Lưu thành công!");
                        window.location.href= "../main_customer/payment.php";</script>';
    }
}

if (isset($_POST['dathang'])) {
    $return_iddh_end = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM don_hang "));
    $iddh_next = $return_iddh_end[0] + 1;

    if (($iddh_next >= 1000) && ($iddh_next >= 100)) {
        $iddh_nextto = 'DH' . $iddh_next;

    } else if ($iddh_next >= 10) {
        $iddh_nextto = 'DH0' . $iddh_next;

    } else if ($iddh_next >= 1) {
        $iddh_nextto = 'DH00' . $iddh_next;

    }
    //xét hình thức thanh toán

    if ($_POST['httt'] == 'cash') {
        $tt = "Thanh toán bằng tiền mặt khi nhận hàng";
    } else if ($_POST['httt'] == 'internet') {
        $tt = "Thẻ ATM có Internet Banking (miễn phí)";
    } else if ($_POST['httt'] == 'visa') {
        $tt = "Thẻ VISA/Master Card/JCB (miễn phí)";
    } else if ($_POST['httt'] == 'atm') {
        $tt = "Thanh toán bằng thẻ ATM hoặc ví điện tử";
    }

    $date = date('Y-m-d');


    // insert vào chi tiết đơn hàng


    $query_gh = mysqli_query($conn, "SELECT * FROM chi_tiet_gio_hang WHERE id_gio_hang= '" . $_SESSION['idgh'] . "'");
    while ($rowgh = mysqli_fetch_array($query_gh)) {

//        //kiểm tra số lượng sách trong kho
        $query_k = mysqli_query($conn, "SELECT * FROM kho k JOIN sach s ON k.id_sach = s.id_sach  WHERE k.id_sach= '" . $rowgh['id_sach'] . "'");
        $reusult_k = mysqli_fetch_array($query_k);
//        if ($reusult_k['so_luong_sach'] >= $rowgh['so_luong']) {

        // Thêm vào đơn hang
        $state= "Chưa duyệt";
        $query_dh = mysqli_query($conn, "Insert into don_hang(id_don_hang, id_tk, ngay_dat_hang,dia_chi_nhan, hinh_thuc_thanh_toan,trangthai) 
            VALUES ('$iddh_nextto', '$_SESSION[idtk]', '$date','" . $_POST['address'] . "','$tt','$state')");

        // Thêm vào chi tiết đơn hàng

        $query_ctdh = mysqli_query($conn, "Insert into chi_tiet_don_hang 
                      VALUES ('$iddh_nextto','" . $rowgh['id_sach'] . "','" . $rowgh['so_luong'] . "','" . $rowgh['don_gia'] . "')");

        $query_del = mysqli_query($conn, "UPDATE kho SET so_luong_sach= '" . $reusult_k['so_luong_sach'] . "' - '" . $rowgh['so_luong'] . "' 
                    WHERE id_sach='" . $rowgh['id_sach'] . "'");

        // XÓa csdl trong giỏ hàng
        //$reusult_delctgh = mysqli_query($conn, "Delete from chi_tiet_gio_hang WHERE id_gio_hang= '" . $_SESSION['idgh'] . "'");
        $reusult_delgh = mysqli_query($conn, "Update gio_hang  set trang_thai=1 where id_gio_hang= '" . $_SESSION['idgh'] . "'");




    }
    echo '<script> alert("Cám ơn bạn đã tin tưởng và mua sản phẩm của shop!")
                    window.location.href="payment.php";</script>';
    // tạo session giỏ hàng mới
    $return_idgh_end = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM gio_hang "));
    $idgh_next = $return_idgh_end[0] + 1;
    if (($idgh_next >= 1000) && ($idgh_next >= 100)) {
        $idgh_nextto= 'GH'. $idgh_next;
        echo $idgh_nextto;
    } else if ($idgh_next >= 10) {
        $idgh_nextto= 'GH0' . $idgh_next;
        echo $idgh_nextto;
    } else if ($idgh_next >= 1) {
        $idgh_nextto= 'GH00' . $idgh_next;
        echo $idgh_nextto;
    }
    $kt_gh= mysqli_query($conn,"Select * from gio_hang  WHERE id_tk='".$_SESSION['idtk']."' and trang_thai='0'");

    $row_kt= mysqli_fetch_array($kt_gh);
    if ($result_kt= mysqli_num_rows($kt_gh) > 0) {
        $query_cart = mysqli_query($conn, "SELECT * FROM chi_tiet_gio_hang
                                            WHERE id_gio_hang='" . $row_kt['id_gio_hang'] . "'");
        $_SESSION['idgh']= $row_kt['id_gio_hang'];
    }
    else{
        $query_insert_gh = "INSERT INTO gio_hang(id_tk,id_gio_hang,trang_thai) VALUE ('".$_SESSION['idtk']."' ,'" . $idgh_nextto . "',0)";
        $result_insert_gio_hang= mysqli_query($conn, $query_insert_gh);
        $_SESSION['idgh']= $idgh_nextto;
    }
}
?>
</body>

</html>
