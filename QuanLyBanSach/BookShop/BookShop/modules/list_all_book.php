<?php
include('connection.php');
?>

<?php
$sql_loai = mysqli_query($conn, "select * from loai_sach   WHERE id_loai_sach='$_GET[id]'");

while ($dong_loai = mysqli_fetch_array($sql_loai)) {

    echo '<div id="title">
                <h3 style="font-weight: bold; color: #005cbf;"><label style="color: #1a9024;font-size: 20px;">Bộ lọc theo loại sách &gt;&gt;</label>' . $dong_loai['ten_loai_sach'] . ' </h3><hr style="border: 1.5px solid #005cbf ;"></div>';

    $sql_loaisp = " SELECT *
                FROM loai_sach AS l 
                JOIN sach AS s ON l.id_loai_sach = s.id_loai_sach
                JOIN tac_gia AS t ON s.id_tac_gia = t.id_tac_gia
                JOIN gia_sach g ON g.id_sach = s.id_sach	
                JOIN hinh_anh_sach h ON h.id_sach = s.id_sach
                JOIN nha_cung_cap n ON n.id_nha_cung_cap = s.id_nha_cung_cap
				WHERE s.id_loai_sach='" . $dong_loai['id_loai_sach'] . "'";

    $row = mysqli_query($conn, $sql_loaisp);
    $count = mysqli_num_rows($row);
    if ($count <= 0) {
        echo '<h3>Hiện tại sản phẩm đã hết hàng!</h3>';
    } else {
        while ($dong = mysqli_fetch_array($row)) {

        ?>
        <div class="row">
                <div class="col-lg-2">
                    <?php
                    $query= mysqli_query($conn,"Select * from khuyen_mai WHERE id_sach='" . $dong['id_sach'] . "'");
                    $rowkm= mysqli_fetch_array($query);
                    $num= mysqli_num_rows($query);
                    if ($num > 0){
                        ?><div class="box2">
                        <div class="cross-shadow-ribbon"><?php echo $rowkm['gia_tri']?>%</div>
                        <a href="item.php?xem=chitietsp&idsp=<?php echo $dong['id_sach'] ?>"><img
                                    src="../image/sachbanchay/<?php echo $dong['lienket'] ?>"
                                    alt="<?php $dong['ten_sach'] ?>"
                                    style="width: 100%"></a>
                        </div>
                    <?php }else{ ?>
                    <a href="item.php?xem=chitietsp&idsp=<?php echo $dong['id_sach'] ?>"><img
                                src="../image/sachbanchay/<?php echo $dong['lienket'] ?>"
                                alt="<?php $dong['ten_sach'] ?>"
                                style="width: 100%"></a><?php } ?>
                </div>
                <div class="col-lg-7">
                    <h4 class="card-title"><a href="item.php?xem=chitietsp&idsp=<?php echo $dong['id_sach'] ?>"
                                              style="font-size: 14px; font-weight: bold;"><?php echo $dong['ten_sach'] ?></a>
                    </h4>
                    <p class="card-text"><?php echo $dong['ten_tac_gia'] ?></p>
                    <?php $query_avg = $conn->query("SELECT round(avg(diem_danh_gia),1) AS avg FROM binh_luandanh_gia WHERE id_sach= '" . $dong['id_sach'] . "'");
                    $result_avg = mysqli_fetch_assoc($query_avg);

                    if ($result_avg['avg'] == null) {
                        echo '<p class="text-warning">&#9734; &#9734; &#9734; &#9734; &#9734;</p>';
                    } else {
                        if (($result_avg['avg'] >= 1) && ($result_avg['avg'] < 2)) {
                            echo '<p class="text-warning">&#9733; &#9734; &#9734; &#9734; &#9734;</p>';
                        }
                        if (($result_avg['avg'] >= 2) && ($result_avg['avg'] < 3)) {
                            echo '<p class="text-warning">&#9733; &#9733; &#9734; &#9734; &#9734;</p>';
                        }
                        if (($result_avg['avg'] >= 3) && ($result_avg['avg'] < 4)) {
                            echo '<p class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</p>';
                        }
                        if (($result_avg['avg'] >= 4) && ($result_avg['avg'] < 5)) {
                            echo '<p class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</p>';
                        }
                        if ($result_avg['avg'] == 5) {
                            echo '<p class="text-warning">&#9734; &#9734; &#9734; &#9734; &#9734;</p>';
                        }

                    }?><label
                                style="font-size: 10px; color: #8A888B; font-weight: normal;">(1 đánh giá - 1 bình
                            luận)</label></p>
                    <h3><a id="newcost" style="font-size: 13px; font-weight: bold;"><?php echo number_format($dong['gia']).' đ' ?>&nbsp;
                            &nbsp;</a>
                    </h3>
                    <p style="font-size: 13px;">Nguồn Cội (Tựa dự kiến: Nguyên Bản, Tựa tiếng Anh: Origin) - Tác
                        giả: Dan
                        Brown ...<a href="item.php?xem=chitietsp&idsp=<?php echo $dong['id_sach'] ?>">Xem thêm</a></p>
                </div>
                <div class="col-lg-3">

                    <button type="submit" class="btn btn-info btn-lg" name="muahang"
                            onclick="window.location.href='../main_visitor/payment.php?idsp=<?php echo $dong['id_sach'] ?>'">
                        <i class="glyphicon glyphicon-shopping-cart"></i>Mua hàng
                    </button>
                </div>
        </div><hr style="border: 0.5px solid #DEDEDC;"/>
            <?php
        }
    }
}
include ('pagination.php');
        ?>


