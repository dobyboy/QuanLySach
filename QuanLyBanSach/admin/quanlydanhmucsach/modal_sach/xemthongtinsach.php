 <?php
            $id = $_GET['id'];
            $sql1="SELECT * FROM sach s JOIN tac_gia tg ON s.id_tac_gia = tg.id_tac_gia 
                        JOIN kho k ON s.id_sach = k.id_sach 
                        JOIN dich_gia dg on s.id_dichgia = dg.id_dichgia
                        JOIN nha_xuat_ban nxb ON s.id_nxb = nxb.id_nxb
                        JOIN gia_sach gs ON s.id_sach = gs.id_sach 
                        JOIN kich_thuoc kt ON s.id_kichthuoc = kt.id_kichthuoc
                        JOIN nha_cung_cap ncc ON s.id_nha_cung_cap = ncc.id_nha_cung_cap
                        JOIN loai_bia lbs ON lbs.id_loaibia = s.id_loaibia
                        JOIN loai_sach ls ON s.id_loai_sach = ls.id_loai_sach
                        JOIN hinh_anh_sach ha ON ha.id_sach = s.id_sach
                        WHERE s.id_sach= '".$id."'";
            include '../../../xuly/connect.php';
            $result1 = mysqli_query($conn,$sql1);

            while ($row1=$result1->fetch_assoc()){
                $sach = ['idsach' => $row1['id_sach'], 'tensach' => $row1['ten_sach'],'tacgia' => $row1['ten_tac_gia'],
                    'dichgia' => $row1['ten_dichgia'],'st' => $row1['so_trang'],'kt' => $row1['kich_thuoc'],'loaibia' => $row1['ten_loaibia'] ,
                    'ls' => $row1['ten_loai_sach'],'ngayxb' => $row1['ngay_xuat_ban'], 'ncc' => $row1['ten_nha_cung_cap'],
                    'sdk' => $row1['ma_sach'] ,'mota' => $row1['mo_ta'],'gia' => $row1['gia'] ,'soluong' => $row1['so_luong_sach'], 'hasach' => $row1['lienket'],'trangthaikinhdoanh' => $row1['trangthaikinhdoanh']];
            }
    ?>


<html class="no-js" lang="">
<head>
<?php include '../../phan_header.php';?>
    <style type="text/css">
        .table td{
        padding: 4px;
        text-align: left;
        vertical-align: middle;
    }
    .table-hover{
        width: 75%;
        float: left;
        margin-right: 10px;
    }
    .btnsubmit{
        position: absolute;
        top: 85px;
        left:290px;
        height: 45px;
        width: 50px;
        color: blue;
        font-weight: bold;
        font-size: 20px;
        background-color: lightblue;
    }
    </style>
</head>
<body>
    <!-- Include các thành phần vào -->
    <?php include '../../menudoc.php';?>
    <div id="right-panel" class="right-panel">
    <?php include '../../menungang.php';?>
        <!-- Nội dung -->
         <form method="POST" action="../quan-ly-sach.php">
        <input type="submit" name="trove" value="<<" class="btnsubmit">
        <h2>Xem thông tin sách</h2>
        <div class="background">    
        <div >     
            <table class="table table-hover" >
                            <thead>
                                <tr>
                                    <th colspan="2">Thông tin sách</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td >Mã sách: </td>
                                <td > <?php echo $sach['idsach'] ?></td>
                            </tr>
                            <tr>
                                <td >Tên sách: </td>
                                <td > <?php echo $sach['tensach'] ?></td>
                            </tr>
                            <tr>
                                <td >Tác giả :</td>
                                <td > <?php echo $sach['tacgia'] ?></td>
                            </tr>
                            <tr>
                                <td >Dịch giả :</td>
                                <td><?php echo $sach['dichgia'] ?></td>
                            </tr>
                            <tr>
                                <td >Kích thước:</td>
                                <td > <?php echo $sach['kt'] ?></td>
                            </tr>
                            <tr>
                                <td>Loại bìa sách :</td>
                                <td><?php echo $sach['loaibia'] ?></td>
                            </tr>
                            <tr>
                                <td >Loại sách: </td>
                                <td><?php echo $sach['ls'] ?> </td>
                            </tr>
                            <tr>
                                <td >Ngày xuất bản:</td>
                                <td><?php echo $sach['ngayxb'] ?></td>
                            </tr>
                            <tr>
                                <td>NHà cung cấp:</td>
                                <td > <?php echo $sach['ncc'] ?></td>
                            </tr>
                            <tr>
                                <td >Số đăng ký:</td>
                                <td><?php echo $sach['sdk'] ?></td>
                            </tr>
                            <tr>
                                <td>Giá: </td>
                                <td><?php echo $sach['gia'] ?> </td>
                            </tr>
                            <tr>
                                <td>Số lượng</td>
                                <td><?php echo $sach['soluong'] ?></td>
                            </tr>
                            <tr>
                                <td>Trạng thái kinh doanh</td>
                                <td><?php echo $sach['trangthaikinhdoanh'] ?></td>
                            </tr>
                            <tr>
                                <td>Giới thiệu sách:</td>
                                <td><textarea cols="90" rows="8" style="border: none;overflow: scroll;"><?php echo $sach['mota'] ?></textarea></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php $duongdan = "http://localhost:8080/QuanLyBanSach/Bookshop/BookShop/image/Sachbanchay/".$sach['hasach'];
                                    echo '<div><img  style="box-shadow: 0px 1px 5px grey;" src="'.$duongdan.'" /></div> ';
                        ?>
                </form>
            </div>
        </div>
    </div>

    <script src="../../../css/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../../../css/assets/js/popper.min.js"></script>
    <script src="../../../css/assets/js/plugins.js"></script>
    <script src="../../../css/assets/js/main.js"></script>
</body>
</html>
