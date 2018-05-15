<?php

include("connection.php");

$sql = "SELECT *
FROM loai_sach AS l 
JOIN sach AS s ON l.id_loai_sach = s.id_loai_sach
JOIN tac_gia AS t ON s.id_tac_gia = t.id_tac_gia
JOIN gia_sach g ON g.id_sach = s.id_sach	
JOIN hinh_anh_sach h ON h.id_sach = s.id_sach
JOIN nha_cung_cap n ON n.id_nha_cung_cap = s.id_nha_cung_cap
JOIN kho k ON s.id_sach = k.id_sach
ORDER BY s.id_sach DESC LIMIT 8";

$result = mysqli_query($conn, $sql);
while ($dong_sp = mysqli_fetch_array($result)) {
    ?>

    <div class="col-lg-3" xmlns="http://www.w3.org/1999/html" style="margin-top: 20px">


        <div class="card h-100">
            <div class="box" style="min-height: 150px!important;">
                <div class="ribbon green"><span class="green">mới</span>
                </div>
                <a class="img" href="item.php?xem=chitietsp&idsp=<?php echo $dong_sp['id_sach'] ?>">
                    <center>
                        <img class="card-img-top"
                             src="../image/sachbanchay/<?php echo $dong_sp['lienket'] ?>"
                             alt="anh sach">
                    </center>
                </a>
            </div>


            <div class="card-body" style="min-height: 50px;">
                <h4 class="card-title">
                    <a href="item.php?xem=chitietsp&idsp=<?php echo $dong_sp['id_sach'] ?>"><?php echo $dong_sp['ten_sach'] ?></a>
                </h4>

                <p class="card-text"><?php echo $dong_sp['ten_tac_gia'] ?></p>
                <?php $query_avg = $conn->query("SELECT round(avg(diem_danh_gia),1) AS avg FROM binh_luandanh_gia WHERE id_sach= '" . $dong_sp['id_sach'] . "'");
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

                } ?>

                <?php
                $query = mysqli_query($conn, "SELECT * FROM khuyen_mai WHERE id_sach='" . $dong_sp['id_sach'] . "'");
                $rowkm = mysqli_fetch_array($query);
                $num = mysqli_num_rows($query);
                if ($num > 0) {
                    ?>
                    <h5><strike id="oldcost"><?php echo number_format($dong_sp['gia']) ?></strike></h5>
                    <h4><a id="newcost"
                           style="font-size: 13px; font-weight: bold;"><?php echo number_format($dong_sp['gia'] - ($rowkm['gia_tri'] * $dong_sp['gia']) / 100) ?>
                            đ
                            &nbsp;</a>
                    </h4>

                <?php } else { ?>
                    <h3><a id="newcost"
                           style="font-size: 13px; font-weight: bold;"><?php echo number_format($dong_sp['gia']) ?>
                        đ
                        &nbsp;</a>
                    </h3><?php } ?>

            </div>


        </div>
        <div id="title"><br></div>

    </div>

<?php } ?>