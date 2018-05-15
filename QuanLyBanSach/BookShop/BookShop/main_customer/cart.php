<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giỏ hàng của tôi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include('../lib/link.php') ?>
</head>

<body>
<!-- Navigation -->
<?php include('../modules_customer/tk_menu_bar.php');
include('../modules/connection.php');
if (isset($_SESSION['loi_del'])) {
    echo "<script>swal('Thông báo', '{$_SESSION['loi_del']}', 'error')</script>";
    unset($_SESSION['loi_del']);
}
if (isset($_SESSION['loi_up'])) {
    echo "<script>swal('Thông báo', '{$_SESSION['loi_up']}', 'error')</script>";
    unset($_SESSION['loi_up']);
}
if (isset($_POST['order'])) {
    $ktgh = mysqli_query($conn, "SELECT * FROM gio_hang g JOIN chi_tiet_gio_hang c ON g.id_gio_hang= c.id_gio_hang 
                                      JOIN sach s ON c.id_sach= s.id_sach WHERE g.id_tk= '" . $_SESSION['idtk'] . "' AND g.id_gio_hang='" . $_SESSION['idgh'] . "'");

    $ok = true;
    while ($row_ktgh = mysqli_fetch_array($ktgh)) {
        $ktk = mysqli_query($conn, "SELECT * FROM kho WHERE id_sach='" . $row_ktgh['id_sach'] . "'");
        //var_dump($ktk);die;
        $row_k = mysqli_fetch_array($ktk);
        if ($row_k['so_luong_sach'] < $row_ktgh['so_luong']) {
            $ok = false;
            break;
//            $del_sp = mysqli_query($conn, "DELETE FROM chi_tiet_gio_hang WHERE id_sach='" . $row_ktgh['id_sach'] . "'");
        }
    }

    if ($ok)
        echo '<script> window.location.href="../main_customer/payment.php"</script>';
    else
        echo '<script>alert("Hiện tại sản phẩm ' . $row_ktgh['ten_sach'] . ' đã hết hàng!")</script>';

}
$result_cart = mysqli_query($conn, "   SELECT * FROM chi_tiet_gio_hang c JOIN sach s ON c.id_sach = s.id_sach 
                                                    JOIN gio_hang h ON c.id_gio_hang = h.id_gio_hang
                                                    JOIN hinh_anh_sach a ON s.id_sach = a.id_sach
                                                  WHERE c.id_gio_hang='" . $_SESSION['idgh'] . "' AND h.trang_thai= 0");
?>

<!-- Page Content -->
<div class="container">
    <div id="cart1" class="row">
        <div id="giohang">
            <h3> Giỏ hàng</h3>
            <hr id="cart">

            <form action="../modules_customer/update_product.php" method="post">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th id="check"><input type="checkbox" style="width: 20px; height: 20px;" name="checkall"
                                              onchange="checkAll()"/></th>
                        <th id="sp">Sản phẩm</th>
                        <th id="dg">Đơn giá</th>
                        <th id="sl">Số lượng</th>
                        <th id="tht">Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php while ($dong_cart = mysqli_fetch_array($result_cart)){

                        ?>
                        <td id="check"><input type="checkbox" style="width: 20px; height: 20px;" name="id_check[]"
                                              value=<?php echo $dong_cart['id_sach'] ?>></td>
                        <td id="sp">
                            <img style="width: 70px; height: 100px;"
                                 src="../image/sachbanchay/<?php echo $dong_cart['lienket'] ?>"
                                 alt="<?php $dong_cart['ten_sach'] ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
                                    style="color: #005cbf;"><?php echo $dong_cart['ten_sach'] ?></a>

                        </td>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM khuyen_mai WHERE id_sach='" . $dong_cart['id_sach'] . "'");
                        $rowkm = mysqli_fetch_array($query);
                        $num = mysqli_num_rows($query);
                        if ($num > 0) {
                            ?>
                            <td id="dg"><?php echo number_format($dong_cart['don_gia']) ?> đ</td>

                            <td><input id="sl" type="number" style="padding-left: 15px;"
                                       name="<?php echo $dong_cart['id_sach']; ?>" min="1" max="10"
                                       value="<?php echo $dong_cart['so_luong'] ?>">
                            </td>
                            <td id="tht"><?php echo number_format($dong_cart['so_luong'] * $dong_cart['don_gia']) . 'đ' ?></td>
                        <?php } else { ?>
                            <td id="dg"><?php echo number_format($dong_cart['don_gia']) ?> đ</td>

                            <td><input id="sl" type="number" style="padding-left: 15px;"
                                       name="<?php echo $dong_cart['id_sach']; ?>" min="1" max="10"
                                       value="<?php echo $dong_cart['so_luong'] ?>">
                            </td>
                            <td id="tht"><?php echo number_format($dong_cart['so_luong'] * $dong_cart['don_gia']) ?>đ
                            </td>
                        <?php } ?>
                    </tr>

                    <?php } ?>
                    </tbody>
                </table>
                <button id="btn-del" type="submit" name="delete">Xóa</button>
                <button id="btn-update" type="submit" name="update">Cập nhật</button>
            </form>
        </div>
    </div>
    <label id="sum">Tổng tiền:
        <label style="color: #1a9024; font-size: 20px;"><?php include('../modules/connection.php');
            $sum = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM( so_luong*don_gia)
                                FROM chi_tiet_gio_hang WHERE id_gio_hang='" . $_SESSION['idgh'] . "'"));
            echo number_format($sum[0]) . ' đ';
            ?>
        </label></label>

    <form action="" method="post">
        <button id="order" name="order" onclick=""
                class="btn btn-info btn-lg">
            <i class="glyphicon glyphicon-shopping-cart"></i> Mua hàng
        </button>
    </form>
</div>
<!-- /.container -->

<?php include('../modules/footer.php') ?>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    function checkAll() {
        $('[name="id_check[]"]').attr('checked', $('[name="checkall"]').prop('checked'));
    }

    function change_sl(e) {
        console.log(e);
    }
</script>


</body>

</html>
