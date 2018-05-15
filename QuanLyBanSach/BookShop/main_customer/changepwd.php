<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thay đổi mật khẩu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include('../lib/link.php');
    ?>
</head>

<body>

<!-- Navigation -->
<?php include ('../modules_customer/tk_menu_bar.php');?>

<!-- Page Content -->
<div class="container">

    <div id="change" class="row">

        <div id="change-0" class="col-lg-3">
            <div class="myaccount">
                <center><img id="img_avt" src="../image/avatar.jpg "></center>
                <ul>
                    <li><a href="myaccount.php"><span
                                    class="glyphicon glyphicon-user" class="close"
                                    title="Close Modal"></span> Tài khoản của tôi</a></li>
                    <li><a href="changepwd.php" class="active"><span
                                    class="glyphicon glyphicon-edit" class="close"
                                    title="Close Modal"></span> Đổi mật khẩu</a></li>


                    <li><a href="order.php"><span
                                    class="glyphicon glyphicon glyphicon-th-list"></span> Đơn mua</a></li>
                    <li><a href="#"><span
                                    class="glyphicon glyphicon glyphicon-bell"></span>Thông báo</a></li>
                </ul>
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div id="change-1" class="col-lg-9">
            <div id="changep" class="container">
                <div id="psw" class="panel panel-default">
                    <div class="panel-body">
                        <h3 id="my-user">Đổi mật khẩu</h3>
                        <p id="info">Để bảo mật tài khoản, vui lòng không chia sẻ mật
                            khẩu cho người khác</p>
                        <hr id="account">
                        <form class="form-horizontal" action="/action_page.php">

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Mật
                                    khẩu hiện tại:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name"
                                           placeholder="Nhập ký tự..." name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Mật
                                    khẩu mới:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name"
                                           placeholder="Nhập ký tự..." name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Xác
                                    nhận lại mật khẩu:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name"
                                           placeholder="Nhập ký tự..." name="name">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Xác
                                        nhận
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-lg-9 -->

            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.container -->
</div>
<?php include ('../modules/footer.php')?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
