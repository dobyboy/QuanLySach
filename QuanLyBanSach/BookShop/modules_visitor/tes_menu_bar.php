<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="../css/css_menu.css">
<script type="text/javascript" src="../bootstrap/js/menu_bar.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<?php include('../modules_visitor/modal_sign.php');
?>
<div id="flipkart-navbar">
    <div id="nav" class="container">
        <div class="row row1">
            <ul class="largenav pull-right">
                <li class="upper-links"><span class="glyphicon glyphicon-user" title="Close Modal"></span>&nbsp;&nbsp;
                    <a class="links" href="#" onclick="document.getElementById('id00').style.display='block'">Đăng
                        ký</a></li>
                <li class="upper-links"><span class="glyphicon glyphicon-log-in" title="Close Modal"></span>&nbsp;&nbsp;
                    <a class="links" href="#" onclick="document.getElementById('id01').style.display='block'">Đăng
                        nhập</a></li>
            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-3">
                <h1 style="margin:0px;"><span class="largenav"  onclick="window.location.href='../main_visitor/index.php'">BookShop.com</span>
                </h1>

            </div>
            <form action="../modules_visitor/search.php" method="post" class="flipkart-navbar-search smallsearch col-sm-7 col-xs-10">
                <div class="row">
                    <input class="flipkart-navbar-input form-control col-xs-11" style="width: 90%;" type="text" placeholder="Nhập từ khóa tìm kiếm..."
                           name="search">
                    <button class="flipkart-navbar-button col-xs-1" style="height: 34px; margin-top: 8.3px; padding: 3px;" type="submit" name="oke">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
                </div>
            </form>
            <div class="cart largenav col-sm-2">
                <a id="cart" class="cart-button" href="#">
                    <svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
                        <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 "
                              fill="#fff "></path>
                    </svg>
                    Giỏ hàng
                    <span class="item-number ">0</span>
                </a>
            </div>
        </div>
    </div>
</div>

