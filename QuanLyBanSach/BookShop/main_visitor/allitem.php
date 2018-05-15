<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Danh sách sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include('../lib/link.php');
    ?>
</head>

<body>

<!-- Navigation -->
<?php

    include ('../modules_visitor/tes_menu_bar.php');

?>
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
            if(isset($_GET['id'])){
                include('../modules/list_all_book.php');
            }
            if(isset($_GET['id_tg'])){
                include ('../modules/list_all_book_tg.php');
            }
            if (isset($_GET['q']))
                include ('../modules_visitor/search.php');
            if (isset($_POST['']))
//            ?>
            <!-- /.col-lg-9 -->
        </div>
        <!-- /.row -->
    </div>
</div>
    <!-- /.container -->
<?php include ('../modules/footer.php')?>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>