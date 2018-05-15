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

$result = mysqli_query($conn, $sql);
$chitiet_sp = $result->fetch_assoc();
?>
<div id="item" class="row">
    <div class="col-lg-3">
        <?php
        $query= mysqli_query($conn,"Select * from khuyen_mai WHERE id_sach='$_GET[idsp]'");
        $rowkm= mysqli_fetch_array($query);
        $num= mysqli_num_rows($query);
        if ($num > 0){
        ?>
        <div class="box2">
            <div class="cross-shadow-ribbon"><?php echo $rowkm['gia_tri']?>%</div>
            <div class="card"><img src="../image/sachbanchay/<?php echo $chitiet_sp['lienket'] ?>" alt="Avatar"
                                   style="width: 100%"></div>
            </div>
<?php }else{ ?>
        <div class="card"><img src="../image/sachbanchay/<?php echo $chitiet_sp['lienket'] ?>" alt="Avatar"
                               style="width: 100%"></div><?php } ?>

    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-5">
        <h4 style="font-weight: bold;"><?php echo $chitiet_sp['ten_sach'] ?> </h4>
        <p><label>Tác giả: </label><a href="#"> <?php echo $chitiet_sp['ten_tac_gia'] ?></a></p>
        <p><label>Nhà xuất bản: </label><a href="#"><?php echo $chitiet_sp['ten_nxb'] ?></a></p>
        <p><label> Nhà phát hành: </label>&nbsp;<?php echo $chitiet_sp['ten_nha_cung_cap'] ?></p>
            <?php include ('danh_gia_sao.php')?>
        <p> &nbsp;<br><?php echo $chitiet_sp['mo_ta'] ?> <a href="#">Xem thêm</a></p>
        <!-- /.row -->
    </div>

    <div class="col-lg-4">
        <div  id="thongtin" class="panel panel-primary">
            <div class="panel-heading">Thông tin thanh toán</div>
            <div class="panel-body">
                <table>
                    <tr>
                        <td id="id_1">Giá bìa:</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<strike><?php echo number_format($chitiet_sp['gia']) ?></strike></td>
                    </tr>
                    <?php
                        $query= mysqli_query($conn,"Select * from khuyen_mai WHERE id_sach='$_GET[idsp]'");
                        $rowkm= mysqli_fetch_array($query);
                        $num= mysqli_num_rows($query);
                        if ($num > 0){
                    ?>
                    <tr>
                        <td id="id_1">Giá bán:</td>

                        <td style="color: red;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($chitiet_sp['gia'] - ($rowkm['gia_tri']*$chitiet_sp['gia'])/100) ?> đ</td>

                    </tr>
                    <tr>
                        <td id="id_1">Tiết kiệm:</td>
                        <td style="color: #56B0B9;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format(($rowkm['gia_tri']*$chitiet_sp['gia'])/100) ?> đ(<?php echo $rowkm['gia_tri']?>%)</td>
                    </tr>
                    <?php }else{ ?>
                    <tr>
                        <td id="id_1">Giá bán:</td>

                        <td style="color: red;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($chitiet_sp['gia']) ?> đ</td>

                    </tr>
                    <tr>
                        <td id="id_1">Tiết kiệm:</td>
                        <td style="color: #56B0B9;">&nbsp;&nbsp;&nbsp;&nbsp;0 đ(0%)</td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <td id="id_1">Chất lượng:</td>
                        <td style="color: #63C560;">&nbsp;&nbsp;&nbsp;&nbsp;Loại A</td>
                    </tr>
                </table>
                <hr style="border: 1px dashed #8A888B;">

                <center>
                    <?php
                    if ($chitiet_sp['so_luong_sach'] == 0){?>
                            <i class="glyphicon glyphicon-remove" style="color: red; font-weight: bold;"></i> <a
                            style="color: red; font-weight: bold;">Hết hàng!</a><br>
                        <p style="font-weight: bold;">(Hiện tại còn <?php echo $chitiet_sp['so_luong_sach'] ?> sản phẩm)</p>
                        <button style="color: #FFFFFF" class="btn-shopping"
                                onclick="thongbao()" ><i
                                    style="color: #FFFFFF" class="glyphicon glyphicon-shopping-cart"></i> Mua hàng
                        </button>
                    <?php } else{ ?>
                        <i class="glyphicon glyphicon-ok" style="color: #1a9024; font-weight: bold;"></i> <a
                            style="color: #1a9024; font-weight: bold;">Còn hàng</a><br>
                        <p style="font-weight: bold;">(Hiện tại còn <?php echo $chitiet_sp['so_luong_sach'] ?> sản phẩm)</p>
                        <button style="color: #FFFFFF" class="btn-shopping"
                                onclick="window.location.href='?xemchitetspid=<?php echo $chitiet_sp['id_loai_sach']?>&idsp=<?php echo $chitiet_sp['id_sach'] ?>&show=1';"><i
                                    style="color: #FFFFFF" class="glyphicon glyphicon-shopping-cart"></i> Mua hàng
                        </button>
                   <?php } ?>

                </center>

            </div>
        </div>
        <center>
            <button class="btn-heart">
                <i class="glyphicon glyphicon-heart"></i> <a>Thích</a>
            </button>
            <button class="btn-check">
                <i class="glyphicon glyphicon-check"></i> <a>Đã đọc</a>
            </button>
        </center>

        <!-- /.row -->
    </div>
</div>
<div id="information" class="w3-container">
    <h5 style=" font-weight: bold; ">GIỚI THIỆU SÁCH</h5>
    <hr style="border: 0.5px solid #DEDEDC;">

    <div id="intro" class="w3-container info" style="display: inline-block;">
        <h4 style="font-weight: bold;"><?php echo $chitiet_sp['ten_sach'] ?></h4>
        <p>
            <?php echo $chitiet_sp['mo_ta'] ?>
        </p>
    </div>
    <h5 style=" font-weight: bold; ">THÔNG TIN CHI TIẾT</h5>
    <hr style="border: 0.5px solid #DEDEDC;">
    <div id="detail" class="w3-container info" style="display: block;">

        <table class="infor-detail">
            <tr>
                <td id="id19">Nhà phát hành</td>
                <td><?php echo $chitiet_sp['ten_nha_cung_cap'] ?></td>
            </tr>
            <tr>
                <td id="id19">Nhà xuất bản</td>
                <td><a href="#"><?php echo $chitiet_sp['ten_nxb'] ?></a></td>
            </tr>
            <tr>
                <td id="id19">Kích thước</td>
                <td><?php echo $chitiet_sp['kich_thuoc'] ?></td>
            </tr>
            <tr>
                <td id="id19">Tác giả</td>
                <td><a href="#"><?php echo $chitiet_sp['ten_tac_gia'] ?></a></td>
            </tr>
            <tr>
                <td id="id19">Dịch giả</td>
                <td><?php echo $chitiet_sp['ten_dichgia'] ?></td>
            </tr>
            <tr>
                <td id="id19">Loại bìa</td>
                <td><?php echo $chitiet_sp['ten_loaibia'] ?></td>
            </tr>
            <tr>
                <td id="id19">Số trang</td>
                <td><?php echo $chitiet_sp['so_trang'] ?></td>
            </tr>
            <tr>
                <td id="id19">Ngày xuất bản</td>
                <td><?php echo $chitiet_sp['ngay_xuat_ban'] ?></td>
            </tr>
            <tr>
                <td id="id19">Mã sản phẩm</td>
                <td><?php echo $chitiet_sp['ma_sach'] ?></td>
            </tr>
        </table>
    </div>
    <h5 style=" font-weight: bold; ">ĐÁNH GIÁ & NHẬN XÉT CỦA KHÁCH HÀNH</h5>
    <hr style="border: 0.5px solid #DEDEDC;">
    <div id="comment" class="w3-container info" style="display: block;">
        <?php include('../modules/rate_comment.php') ?>
    </div>
</div>
<script>
    function thongbao() {
        alert("Sản phẩm hiện tại đã hết hàng!");

    }
</script>
<?php include('modal_buy.php'); ?>


