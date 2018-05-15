<?php

include("../modules/connection.php");

$sql = "SELECT *
FROM loai_sach AS l 
JOIN sach AS s ON l.id_loai_sach = s.id_loai_sach
JOIN tac_gia AS t ON s.id_tac_gia = t.id_tac_gia
JOIN gia_sach g ON g.id_sach = s.id_sach	
JOIN hinh_anh_sach h ON h.id_sach = s.id_sach
JOIN nha_cung_cap n ON n.id_nha_cung_cap = s.id_nha_cung_cap
ORDER BY s.id_sach DESC LIMIT 4";

$result = mysqli_query($conn, $sql);
while ($dong_sp = mysqli_fetch_array($result)) {
    ?>
    <div class="col-lg-3" xmlns="http://www.w3.org/1999/html">
        <div class="card h-100">

            <a class="img" href="item.php?xem=chitietsp&idsp=<?php echo $dong_sp['id_sach'] ?>">
                <center>
                <img class="card-img-top" src="../image/sachbanchay/<?php echo $dong_sp['lienket'] ?>" alt="anh sach"></a>
                </center>

            <div class="card-body">
                <h4 class="card-title">
                    <a href="item.php?xem=chitietsp&idsp=<?php echo $dong_sp['id_sach'] ?>"><?php echo $dong_sp['ten_sach'] ?></a>
                </h4>

                <p class="card-text"><?php echo $dong_sp['ten_tac_gia'] ?></p>
                <h4>
                    <a id="newcost"><?php echo number_format($dong_sp['gia']).' đ' ?>đ</a>
                </h4>
                <h5>
                    <strike><a id="oldcost">186.000đ</a></strike>
                </h5>
            </div>
            <div class="card-footer">
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

                }?>
            </div>
        </div>
    </div>
    <br/>
    <?php
}
include ('pagination.php');
?>
