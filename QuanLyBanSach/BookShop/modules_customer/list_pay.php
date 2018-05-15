<?php
include('../modules/connection.php');

$result_pay = mysqli_query($conn, "   SELECT * FROM chi_tiet_gio_hang c JOIN sach s ON c.id_sach = s.id_sach 
                                                    JOIN gio_hang h ON c.id_gio_hang = h.id_gio_hang
                                                    JOIN hinh_anh_sach a ON s.id_sach = a.id_sach
                                                  WHERE c.id_gio_hang='" . $_SESSION['idgh'] . "'");

?>

<?php while ($dong_pay = mysqli_fetch_array($result_pay)) { ?>
    <div class="row">
        <div class="col-sm-3"><img style="width: 45px; height: 65px; border: 1px solid #4a37e5;"
                                   src="../image/sachbanchay/<?php echo $dong_pay['lienket'] ?>"
                                   alt="<?php $dong_pay['ten_sach'] ?>">&nbsp;&nbsp;
        </div>
        <div class="col-sm-4"><a
                    style="color: #005cbf; font-size: 11px;"><?php echo $dong_pay['ten_sach'] ?></a></div>

        <div class="col-sm-1" style="color: black;"><?php echo $dong_pay['so_luong'] ?></div>
    <?php
                    $query= mysqli_query($conn,"Select * from khuyen_mai WHERE id_sach='" . $dong_pay['id_sach'] . "'");
                    $rowkm= mysqli_fetch_array($query);
                    $num= mysqli_num_rows($query);
                    if ($num > 0){?>
        <div class="col-sm-4" style="color: black;"><?php echo number_format($dong_pay['don_gia']) ?> đ</div>
                        <?php }else{ ?>
                        <div class="col-sm-4" style="color: black;"><?php echo number_format($dong_pay['don_gia'] + ($rowkm['gia_tri']*$dong_pay['don_gia'])) ?> đ</div><?php } ?>
    </div><hr/>


<?php
    // xử lý id_gio_hang tăng dần
    $return_idgh_end = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM gio_hang "));
    $idgh_next = $return_idgh_end[0] + 1;
    if (($idgh_next >= 1000) && ($idgh_next >= 100)) {
        $idgh_nextto= 'DH'. $idgh_next;
    } else if ($idgh_next >= 10) {
        $idgh_nextto= 'DH0' . $idgh_next;
    } else if ($idgh_next >= 1) {
        $idgh_nextto= 'DH00' . $idgh_next;
    }
if (isset($_POST['thanhtoan'])){
    $result_pay= $conn->query("Insert into chi_tiet_don_hang VALUES ('".$idgh_nextto."','".$dong_pay['id_sach']."','".$dong_pay['so_luong']."','".$dong_pay['don_gia']."')");
    //cập nhật lại trạng thái của giỏ hàng
    $result_upgh= $conn->query("Update chi_tiet_gio_hang set trang_thai= 1 WHERE id_gio_hang= '" . $_SESSION['idgh'] . "'");

    $result_dh= $conn->query("Insert into don_hang(id_don_hang, id_tk, ngay_dat_hang, dia_chi_nhan, hinh_thuc_thanh_toan)
                        VALUES ('".$idgh_nextto."','".$_SESSION['idtk']."','".date("Y-M-D h-i-sa")."','".$_POST['address']."')");
}

} ?>