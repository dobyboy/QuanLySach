<?php
include('../modules/connection.php');

if(isset($_GET['show'])){
    $sql_sach = "select * from sach s 
JOIN loai_sach sach2 ON s.id_loai_sach = sach2.id_loai_sach
    JOIN hinh_anh_sach h ON s.id_sach = h.id_sach 
    JOIN gia_sach g ON s.id_sach = g.id_sach
    WHERE s.id_sach='$_GET[idsp]'";

    $result_s = mysqli_query($conn,$sql_sach);


    while ($row_sach= mysqli_fetch_array($result_s)){

    //insert into table gio-hang

    // xử lý id_gio_hang tăng dần
    $return_idgh_end = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM gio_hang "));
    $idgh_next = $return_idgh_end[0] + 1;

    if (($idgh_next >= 1000) && ($idgh_next >= 100)) {
        $idgh_nextto= 'GH'. $idgh_next;

    } else if ($idgh_next >= 10) {
        $idgh_nextto= 'GH0' . $idgh_next;

    } else if ($idgh_next >= 1) {
        $idgh_nextto= 'GH00' . $idgh_next;

    }
    //Xử lý nếu sản phẩm thêm vào trùng id_sach

    $selec_sl_kho= mysqli_fetch_array(mysqli_query($conn,"Select * from kho WHERE id_sach='" .$_GET['idsp']."'"));
    if ($selec_sl_kho['so_luong_sach'] > 0) {
        $query_trung= mysqli_query($conn,"SELECT * FROM chi_tiet_gio_hang WHERE id_sach= '" .$_GET['idsp']."' and id_gio_hang= '".$_SESSION['idgh']."'");
        $row_trung= mysqli_fetch_array($query_trung);
        if (mysqli_num_rows($query_trung) > 0) {
            $soluong = $row_trung['so_luong'] + 1;
            if ($soluong < $selec_sl_kho['so_luong_sach'] ){
                $query_insert_ct_gh = "UPDATE chi_tiet_gio_hang SET so_luong= '$soluong' WHERE id_sach= '" . $_GET['idsp'] . "' and id_gio_hang= '" . $_SESSION['idgh'] . "'";
                $result_insert_ct_gio_hang = mysqli_query($conn, $query_insert_ct_gh);
            }else echo '<script> alert("Số lượng trong giỏ hàng đã vượt mức số lượng hiện có!");
                        window.location.href="item.php?xem=chitietsp&idsp=' . $_GET['idsp'] . '";</script>';
        } else {
            $query= mysqli_query($conn,"Select * from khuyen_mai WHERE id_sach='" . $_GET['idsp'] . "'");
            $rowkm= mysqli_fetch_array($query);
            $num= mysqli_num_rows($query);
            if ($num > 0) {
                $dongia= $row_sach['gia'] - $row_sach['gia']*$rowkm['gia_tri']/100;
                $query_insert_ct_gh = "INSERT INTO chi_tiet_gio_hang(id_gio_hang, id_sach, so_luong, don_gia) VALUE ('" . $_SESSION['idgh'] . "','" . $_GET['idsp'] . "',1,'$dongia')";
                $result_insert_ct_gio_hang = mysqli_query($conn, $query_insert_ct_gh);
            }else{
                $query_insert_ct_gh = "INSERT INTO chi_tiet_gio_hang(id_gio_hang, id_sach, so_luong, don_gia) VALUE ('" . $_SESSION['idgh'] . "','" . $_GET['idsp'] . "',1,'" . $row_sach['gia'] . "')";
                $result_insert_ct_gio_hang = mysqli_query($conn, $query_insert_ct_gh);
            }

        }
    }
    ?>
<div id="modal-buy" class="modal">
    <form class="modal-content" style="width: 65%; height: 65%;" action="/action_page.php">
        <span onclick="document.getElementById('modal-buy').style.display='none'" class="close"
              title="Close Modal">&times;</span>
        <div class="container-buy">
            <div class="modal-header" style="background-color: #1c7430;">
                <h5 class="modal-buy-title" style="float: left; font-weight: bold; color: #fbfff9;">Sản phẩm đã được thêm vào giỏ</h5>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-2">
                        <?php
                        $query= mysqli_query($conn,"Select * from khuyen_mai WHERE id_sach='" . $_GET['idsp'] . "'");
                        $rowkm= mysqli_fetch_array($query);
                        $num= mysqli_num_rows($query);
                        if ($num > 0){
                        ?>
                        <div class="box2">
                            <div class="cross-shadow-ribbon"><?php echo $rowkm['gia_tri']?>%</div>
                        <img src="../image/sachbanchay/<?php echo $row_sach['lienket']?>" alt="ảnh sách" style="width: 100%; height:100%;">

                        </div>
                        <?php }else{ ?>
                        <img src="../image/sachbanchay/<?php echo $row_sach['lienket']?>" alt="ảnh sách" style="width: 100%; height:100%;"><?php } ?>
                    </div>
                    <div class="col-lg-6">
                        <h4 style="font-weight: bold; color: #005cbf"><?php echo $row_sach['ten_sach']?></h4>
                    </div>
                    <div class="col-lg-3">

                            <?php
                            $query= mysqli_query($conn,"Select * from khuyen_mai WHERE id_sach='" . $_GET['idsp'] . "'");
                            $rowkm= mysqli_fetch_array($query);
                            $num= mysqli_num_rows($query);
                            if ($num > 0){
                                ?>
                            <p> 1 x <?php echo number_format(($row_sach['gia']-($rowkm['gia_tri']*$row_sach['gia'])/100))?> đ</p>
                            <h5 style="font-weight: bold; color: #1a9024; " >Tổng tiền tạm tính:
                                <label style="color: #ef2323"><?php echo number_format(1*($row_sach['gia']-($rowkm['gia_tri']*$row_sach['gia'])/100)) ?> đ</label>
                            <?php } else{ ?>
                                <p> 1 x <?php echo number_format($row_sach['gia']).' đ'?></p>
                                <h5 style="font-weight: bold; color: #1a9024; " >Tổng tiền tạm tính:
                            <label style="color: #ef2323"><?php echo number_format(1*$row_sach['gia']).' đ' ?></label>
                            <?php } ?>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info"  onclick="window.location.href='?xem=chitietsp&id=<?php echo $row_sach['id_loai_sach']?>&idsp=<?php echo $_GET['idsp']?>'" style="width: 20%;">Tiếp tục mua hàng</button>
                <button type="button" class="btn btn-warning" onclick="window.location.href='../main_customer/payment.php'" style="width: 20%;">Thanh toán</button>

            </div>

            <?php } ?>
        </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('modal-buy');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<?php } ?>
<?php if (isset($_GET['show'])){
    echo "<script>  document.getElementById('modal-buy').style.display = 'block'; </script>";} ?>
