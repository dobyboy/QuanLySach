<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Danh sách sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <script src="../lib/sweetalert.min.js"></script>
    <?php include('../lib/link.php') ?>
</head>
<body>

<!-- Navigation -->
<?php include('../modules_customer/tk_menu_bar.php'); ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div id="list" class="col-lg-3">
            <?php
            include('../modules/list_menu.php');
            ?>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9" style="margin-top: 20px">


            <div class="row row-item">
                <?php

                include("../modules/connection.php");

                $sql = "SELECT *
FROM loai_sach AS l 
JOIN sach AS s ON l.id_loai_sach = s.id_loai_sach
JOIN tac_gia AS t ON s.id_tac_gia = t.id_tac_gia
JOIN gia_sach g ON g.id_sach = s.id_sach	
JOIN hinh_anh_sach h ON h.id_sach = s.id_sach
JOIN nha_cung_cap n ON n.id_nha_cung_cap = s.id_nha_cung_cap
JOIN kho k ON s.id_sach = k.id_sach
ORDER BY s.id_sach ASC LIMIT 10";

                $result = mysqli_query($conn, $sql);
                while ($dong_sp = mysqli_fetch_array($result)) {
                    ?>

                    <div class="col-lg-3" xmlns="http://www.w3.org/1999/html" style="margin-top: 20px">


                        <div class="card h-100">
                            <?php
                            $query= mysqli_query($conn,"Select * from khuyen_mai WHERE id_sach='" . $dong_sp['id_sach'] . "'");
                            $rowkm= mysqli_fetch_array($query);
                            $num= mysqli_num_rows($query);
                            if ($num > 0){
                                ?><div class="box2">
                                <div class="cross-shadow-ribbon"><?php echo $rowkm['gia_tri']?>%</div>
                                <a href="item.php?xem=chitietsp&idsp=<?php echo $dong_sp['id_sach'] ?>"><img
                                            src="../image/sachbanchay/<?php echo $dong_sp['lienket'] ?>"
                                            alt="<?php $dong_sp['ten_sach'] ?>"
                                            style="width: 100%"></a>
                                </div>
                            <?php }else{ ?>
                            <a href="item.php?xem=chitietsp&idsp=<?php echo $dong_sp['id_sach'] ?>"><img
                                        src="../image/sachbanchay/<?php echo $dong_sp['lienket'] ?>"
                                        alt="<?php $dong_sp['ten_sach'] ?>"
                                        style="width: 100%"></a><?php } ?>


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

            </div>
            <?php include ('../modules/pagination.php')?>
            <!-- /.col-lg-9 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

</div>
<footer>
    <?php include('../modules/footer.php'); ?>
</footer>


<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>