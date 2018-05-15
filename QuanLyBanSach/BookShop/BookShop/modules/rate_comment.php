
<?php

$return_idbl_end = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM binh_luandanh_gia "));
$idbl_next = $return_idbl_end[0] + 1;

if (($idbl_next >= 1000) && ($idbl_next >= 100)) {
    $idbl_nextto= 'BL'. $idbl_next;

} else if ($idbl_next >= 10) {
    $idbl_nextto= 'BL0' . $idbl_next;

} else if ($idbl_next >= 1) {
    $idbl_nextto= 'BL00' . $idbl_next;

}
if (isset($_POST['post'])){
    $date= date('Y-m-d');
    $query_sel_bl= mysqli_query($conn,"Select diem_danh_gia from binh_luandanh_gia WHERE id_tk='".$_SESSION['idtk']."' and id_sach= '".$_GET['idsp']."' ");
    $result_num= mysqli_num_rows($query_sel_bl);
    if ( $result_num > 0){
        $query_up_bl= mysqli_query($conn,"Update binh_luandanh_gia set noidung= '".$_POST['comment']."', diem_danh_gia= '".$_POST['sosao']."' 
        WHERE id_tk='".$_SESSION['idtk']."' and id_sach= '".$_GET['idsp']."'");
    }else{
        $query_post= mysqli_query($conn,"Insert into binh_luandanh_gia VALUES ('$idbl_nextto','".$_POST['comment']."','$date','".$_SESSION['idtk']."', '" . $_GET['idsp'] . "','".$_POST['sosao']."')");
    }



//    echo '<script> window.location.reload()</script>';
} ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="icon" href="favicon.ico">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/navbar-fixed-top.css" rel="stylesheet">
<link rel="stylesheet" href="../css/rate_com.css">
<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]>
<script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="js/ie-emulation-modes-warning.js"></script>


<div id="rate" class="container">
    <div id="rate_1" class="row">
        <div class="col-sm-3">
            <div class="rating-block">
                <?php include('connection.php');
                $query_avg = $conn->query("SELECT round(avg(diem_danh_gia),1) AS avg FROM binh_luandanh_gia WHERE id_sach= '" . $_GET['idsp'] . "'");
                $result_avg = mysqli_fetch_assoc($query_avg);

                ?>
                <h4 style="font-weight: bold">Đánh giá trung bình</h4>
                <h2 class="bold padding-bottom-7">
                    <?php
                    if ($result_avg['avg'] == null) {
                        echo 0;
                    } else echo $result_avg['avg'] ?>
                    <small>/ 5</small>
                </h2>

                <?php
                if ($result_avg['avg'] == null) {
                    for ($i = 1; $i <= 5; $i++) {
                        echo '<button id="star" type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </button> &nbsp;';
                    }
                } else {
                    if (($result_avg['avg'] >= 1) && ($result_avg['avg'] < 2)) {
                        echo '<button id="star" type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button> &nbsp;';
                        for ($i = 1; $i <= 4; $i++) {
                            echo '<button id="star" type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </button> &nbsp;';
                        }
                    }
                    if (($result_avg['avg'] >= 2) && ($result_avg['avg'] < 3)) {
                        for ($i = 1; $i <= 2; $i++) {
                            echo '<button id="star" type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button> &nbsp;';
                        }
                        for ($i = 1; $i <= 3; $i++) {
                            echo '<button id="star" type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </button> &nbsp;';
                        }
                    }
                    if (($result_avg['avg'] >= 3) && ($result_avg['avg'] < 4)) {
                        for ($i = 1; $i <= 3; $i++) {
                            echo '<button id="star" type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button> &nbsp;';
                        }
                        for ($i = 1; $i <= 2; $i++) {
                            echo '<button id="star" type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </button> &nbsp;';
                        }
                    }
                    if (($result_avg['avg'] >= 4) && ($result_avg['avg'] < 5)) {
                        for ($i = 1; $i <= 4; $i++) {
                            echo '<button id="star" type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button> &nbsp;';
                        }
                        echo '<button id="star" type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </button> &nbsp;';

                    }
                    if ($result_avg['avg'] == 5) {
                        for ($i = 1; $i <= 5; $i++) {
                            echo '<button id="star" type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button> &nbsp;';
                        }
                    }
                }
                ?>

            </div>
        </div>
        <div class="col-sm-3">
            <h4>Đánh giá xếp hạng</h4>
            <div class="pull-left">
                <?php
                $query_5 = $conn->query("SELECT * FROM binh_luandanh_gia WHERE id_sach= '" . $_GET['idsp'] . "' AND diem_danh_gia= 5");
                $num_5 = mysqli_num_rows($query_5);
                ?>
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5"
                             aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                            <span class="sr-only">80% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;"><?php echo $num_5 ?></div>
            </div>
            <div class="pull-left">
                <?php
                $query_4 = $conn->query("SELECT * FROM binh_luandanh_gia WHERE id_sach= '" . $_GET['idsp'] . "' AND diem_danh_gia= 4");
                $num_4 = mysqli_num_rows($query_4);

                ?>
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4"
                             aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                            <span class="sr-only">80% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;"><?php echo $num_4 ?></div>
            </div>
            <div class="pull-left">
                <?php
                $query_3 = $conn->query("SELECT * FROM binh_luandanh_gia WHERE id_sach= '" . $_GET['idsp'] . "' AND diem_danh_gia= 3");
                $num_3 = mysqli_num_rows($query_3);

                ?>
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3"
                             aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                            <span class="sr-only">80% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;"><?php echo $num_3 ?></div>
            </div>
            <div class="pull-left">
                <?php
                $query_2 = $conn->query("SELECT * FROM binh_luandanh_gia WHERE id_sach= '" . $_GET['idsp'] . "' AND diem_danh_gia= 2");
                $num_2 = mysqli_num_rows($query_2);

                ?>
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2"
                             aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                            <span class="sr-only">80% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;"><?php echo $num_2 ?></div>
            </div>
            <div class="pull-left">
                <?php
                $query_1 = $conn->query("SELECT * FROM binh_luandanh_gia WHERE id_sach= '" . $_GET['idsp'] . "' AND diem_danh_gia= 1");
                $num_1 = mysqli_num_rows($query_1);

                ?>
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1"
                             aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                            <span class="sr-only">80% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;"><?php echo $num_1 ?></div>
            </div>
        </div>
    </div>
    <hr/>

    <div id="coment" class="col-lg-15">
        <div class="container-cmt">
            <div class="row">
                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                    </div><!-- /thumbnail -->
                </div><!-- /col-sm-1 -->

                <div class="col-lg-10">
                    <div id="panel-cmt" class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Tôi</strong> <span class="text-muted"></span>
                        </div>
                        <form class="panel-body" action="" method="post">
                            <div id="mybtn">
                                <button id="star"  class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" style="" aria-hidden="false"></span>
                                </button> &nbsp;
                                <button id="star" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button> &nbsp;
                                <button id="star" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button> &nbsp;
                                <button id="star" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button> &nbsp;
                                <button id="star" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button> &nbsp;
                                <input type="hidden" name="sosao" value="0">
                                <input id="cmt" type="text" placeholder="Thêm bình luận..." name="comment">
                            </div>
                            <button id="post" type="submit" name="post">Đăng</button>
                        </form><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->
            </div>
        </div>
        <div class="col-lg-15">
            <h3>Bình luận của khách hàng</h3>
            <hr/>
            <div class="review-block">
                <?php $query_tk= mysqli_query($conn,"Select * from sach s JOIN binh_luandanh_gia g ON s.id_sach = g.id_sach                                                         
                                                        JOIN  thong_tin_chu_tai_khoan t on t.id_taikhoan= g.id_tk  WHERE s.id_sach= '".$_GET['idsp']."'");
                while ($result_tk= mysqli_fetch_array($query_tk)){
                    ?>
                <div class="row">

                    <div class="col-sm-3">

                        <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" style="width: 50px; height: 50px;" class="img-rounded">
                        <div class="review-block-name"><a href="#"><?php echo $result_tk['ten_chu_tk'] ?></a></div>
                        <div class="review-block-date"><?php  ?><br/></div>
                    </div>
                    <div class="col-sm-9">
                        <div class="review-block-rate">
                            <?php
                    if ($result_tk['diem_danh_gia'] == 1)  {
                                echo '<button id="star" type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button> &nbsp;';
                                for ($i = 1; $i <= 4; $i++) {
                                    echo '<button id="star" type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button> &nbsp;';
                                }
                    }
                    if ($result_tk['diem_danh_gia'] == 2)  {
                                for ($i = 1; $i <= 2; $i++) {
                                    echo '<button id="star" type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button> &nbsp;';
                                }
                                for ($i = 1; $i <= 3; $i++) {
                                    echo '<button id="star" type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button> &nbsp;';
                                }
                    }
                    if ($result_tk['diem_danh_gia'] == 3) {
                                for ($i = 1; $i <= 3; $i++) {
                                    echo '<button id="star" type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button> &nbsp;';
                                }
                                for ($i = 1; $i <= 2; $i++) {
                                    echo '<button id="star" type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button> &nbsp;';
                                }
                    }
                    if ($result_tk['diem_danh_gia'] == 4) {
                                for ($i = 1; $i <= 4; $i++) {
                                    echo '<button id="star" type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button> &nbsp;';
                                }
                                echo '<button id="star" type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button> &nbsp;';

                    }
                    if ($result_tk['diem_danh_gia'] == 5) {
                                for ($i = 1; $i <= 5; $i++) {
                                    echo '<button id="star" type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </button> &nbsp;';
                                }
                    }
                            ?>
                        </div>

                        <div class="review-block-description">
                            <?php echo $result_tk['noidung']?>
                        </div>
                    </div>
                </div>
                <hr/><?php }?>
            </div>
        </div>
    </div>

</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>

<script>
    // Add active class to the current button (highlight it)

    $('#mybtn').find('button').click(function (e) {
        //alert($(this).data('val'));
        $(this).addClass('active');
        var count= $('.active').length;
        $('[name="sosao"]').val(count);
        return false ;
    });
</script>

<?php


?>