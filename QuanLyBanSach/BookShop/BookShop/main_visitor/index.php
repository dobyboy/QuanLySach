

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bạn thích sách gì?</title>
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
    <?php include ('../lib/link.php')?>
</head>
<body>

<?php
if (isset($_SESSION['loi'])){

    echo "<script>swal('Thông báo', '{$_SESSION['loi']}', 'error')</script>";
    unset($_SESSION['loi']);
}

?>
<!-- Navigation -->
<?php include  ('../modules_visitor/tes_menu_bar.php');?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div id="list" class="col-lg-3">
            <?php
            include('../modules/list_menu.php');
            ?>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
            <?php
            include('../lib/img_move.php');
            ?>
            <div id="title">
                <h3 style="font-weight: bold; color: #005cbf;">Sách bán chạy nhất</h3><hr style="border: 1.5px solid #005cbf ;">
            </div>
            <div class="row row-item">
                <?php
                include('../modules/list_banchay.php');
                ?>
            </div>
            <div id="title">
                <button  name= "more" style="margin-top: 20px;padding: 5px 5px; width: 130px; height: 30px; background-color: #005cbf; color: #FFFFFF; border-radius: 10px;">
                    <a name="more" href="../main_visitor/list_all.php" style="color: #FFFFFF; text-underline:hover: none">Xem thêm>></a></button>
            </div>
            <div id="title">
                <h3 style="font-weight: bold;color: #005cbf;">Sách mới phát hành</h3><hr style="border: 1.5px solid #005cbf ;">
            </div>
            <div class="row row-item">
                <?php
                include('../modules/list_moinhat.php');
                ?>
                <!-- /.row -->
            </div>
            <div id="title">
                <button  name= "more" style="margin-top: 20px;padding: 5px 5px; width: 130px; height: 30px; background-color: #005cbf; color: #FFFFFF; border-radius: 10px;">
                    <a name="more" href="../main_visitor/list_all.php" style="color: #FFFFFF; text-underline:hover: none">Xem thêm>></a></button>
            </div>
            <!-- /.col-lg-9 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<footer >
    <?php include ('../modules/footer.php');?>
</footer>


    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>