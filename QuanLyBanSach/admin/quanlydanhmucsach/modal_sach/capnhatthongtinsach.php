<!-- Modal -->
<?php
if(isset($_POST['capnhat'])) {
    include '../../../xuly/connect.php';
    $idsach = $_POST['id-sach'];
    $tensach = $_POST['ten-sach'];
    $tg = $_POST['tac-gia'];
    $dg = $_POST['dich-gia'];
    $sotrang = $_POST['so-trang'];
    $kichthuoc = $_POST['kich-thuoc'];
    $loaibs = $_POST['loai-bia-sach'];
    $ls = $_POST['loai-sach'];
    $ngayxb = $_POST['ngay-xuat-ban'];
    $nhaxb = $_POST['nha-xuat-ban'];
    $nhacungcap = $_POST['nha-cung-cap'];
    $sodangky = $_POST['so-dang-ky'];
    $mota = $_POST['mo-ta'];

    $gia = $_POST['gia-sach'];
    $ngaythem =date("m-d-y");

    if(!empty($idsach) &&!empty($tensach)&&!empty($sotrang)&&!empty($sodangky)&&!empty($ngayxb)&&!empty($mota)) {
        $sql = "UPDATE `sach` SET `ten_sach`='".$tensach."',`mo_ta`='".$mota."',`ngay_xuat_ban`='".$ngayxb."',`so_trang`=".$sotrang.",`ma_sach`='".$sodangky."',`id_kichthuoc`='".$kichthuoc."',`id_tac_gia`='".$tg."',`id_dichgia`='".$dg."',`id_loai_sach`='".$ls."',`id_nha_cung_cap`='".$nhacungcap."',`id_loaibia`='".$loaibs."',`id_nxb`='".$nhaxb."' WHERE id_sach ='".$idsach."'";

        $sql2= "UPDATE `gia_sach` SET `gia`=".$gia.",`ngay_cap_nhat`='".$ngaythem."' WHERE id_sach='".$idsach."'";
        // var_dump($sql);
        // var_dump($sql2);die();
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);

        if ($result && $result2) {
            echo "<script>
               alert('Cập nhật thành công!');
              </script>";

        } else {
            echo "<script>
              alert('Cập nhật thất bại!');
              </script>";
        }
    }else{
        echo "<script>
               alert('vui long nhạp du thong tin!');
              </script>";
    }
}
?>

 <?php
            $id = $_GET['idsua'];
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
                    'sdk' => $row1['ma_sach'] ,'mota' => $row1['mo_ta'],'gia' => $row1['gia'] ,'soluong' => $row1['so_luong_sach'], 'hasach' => $row1['lienket']];
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
        top: 91px;
        left:290px;
        height: 45px;
        width: 50px;
        color: blue;
        font-weight: bold;
        font-size: 20px;
        background-color: lightblue;
    }
     .td-ten-thuoctinh{
      width: 20% !important;
      font-weight: bold;
    }
    .td-input-short{
      width: 30%;
    }
    .td-input-long{
      width: 80%;
    }
    .td-input-button{
      width: 110px;
      padding: 3px 5px;
      color: white;
      border-radius: 5px;
      border: none;
      box-shadow: 0px 1px 5px grey;
      font-size: 18px;
    }
    .td-input-button:hover{
      background-color: lightblue !important;
      color: black;
    }
    .background{
      min-height: 720px;
    }
    select{
      overflow: hidden;
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
      </form>
      <form method="POST">
        <h2>Cập nhật thông tin sách</h2>
        <div class="background">    
        <div >     
          <table class="table table-hover">
            <tr>
              <th colspan="2">Thông tin sách</th>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Mã sách: </td>
            <td><input class="td-input-short" type="text" name="id-sach" value="<?php echo $sach['idsach'] ?>"></td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Tên sách: </td>
              <td><textarea name="ten-sach" cols="70" rows="2" style="border: 1px solid grey;"><?php echo $sach['tensach'] ?></textarea></td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Tác giả </td>
              <td>
                <select  class="td-input-long" name="tac-gia">
                  <?php
                  include '../../xuly/connect.php';
                  $sql_select_tg = "SELECT * FROM tac_gia";
                  $result_select_tg = mysqli_query($conn,$sql_select_tg);
                  while ($row_tg=$result_select_tg->fetch_assoc()) {
                    echo '<option value="'.$row_tg['id_tac_gia'].'">'.$row_tg['ten_tac_gia'].'</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Dịch giả </td>
              <td>
                <select  class="td-input-long" name="dich-gia">
                  <?php
                  include '../../xuly/connect.php';
                  $sql_select_dg = "SELECT * FROM dich_gia";
                  $result_select_dg= mysqli_query($conn,$sql_select_dg);
                  while ($row_dg = $result_select_dg->fetch_assoc()) {
                    echo '<option value="'.$row_dg['id_dichgia'].'">'.$row_dg['ten_dichgia'].'</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Số trang: </td>
              <td><input class=" td-input-short" type="number" min="1"  name="so-trang" value="<?php echo $sach['st'] ?>"></td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Kích thươc: </td>
              <td>
                <select class="td-input-short" name="kich-thuoc">
                  <?php
                  include '../../xuly/connect.php';
                  $sql_select_kt = "SELECT * FROM kich_thuoc";
                  $result_select_kt = mysqli_query($conn,$sql_select_kt);
                  while ($row_kt = $result_select_kt->fetch_assoc()) {
                    echo '<option value="'.$row_kt['id_kichthuoc'].'">'.$row_kt['kich_thuoc'].'</option>';
                   }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh"">Loại bìa sách</td>
              <td>
                <select class="td-input-short" name="loai-bia-sach">
                  <?php
                  include '../../xuly/connect.php';
                  $sql_select_bs = "SELECT * FROM loai_bia";
                  $result_select_bs = mysqli_query($conn,$sql_select_bs);
                  while ($row_bs = $result_select_bs->fetch_assoc()) {
                    echo '<option value="'.$row_bs['id_loaibia'].'">'.$row_bs['ten_loaibia'].'</option>';
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Loại sách: </td>
              <td>
                <select class="td-input-long" name="loai-sach">
                  <?php
                    include '../../xuly/connect.php';
                    $sql_select_ls = "SELECT * FROM loai_sach";
                    $result_select_ls = mysqli_query($conn,$sql_select_ls);
                    while ($row_ls = $result_select_ls->fetch_assoc()) {
                        echo '<option value="'.$row_ls['id_loai_sach'].'">'.$row_ls['ten_loai_sach'].'</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Ngày xuất bản: </td>
              <td><input class="td-input-short" type="date" name="ngay-xuat-ban" value="<?php echo $sach['ngayxb'] ?>"></td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Nhà xuất bản </td>
              <td>
                <select class="td-input-long" name="nha-xuat-ban">
                  <?php
                    include '../../xuly/connect.php';
                    $sql_select_nxb = "SELECT * FROM nha_xuat_ban";
                    $result_select_nxb = mysqli_query($conn,$sql_select_nxb);
                    while ($row_nxb = $result_select_nxb->fetch_assoc()) {
                      echo '<option value="'.$row_nxb['id_nxb'].'">'.$row_nxb['ten_nxb'].'</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Nhà cung cấp </td>
              <td>
                <select class="td-input-long" name="nha-cung-cap">
                  <?php
                    include '../../xuly/connect.php';
                    $sql_select_ncc = "SELECT * FROM nha_cung_cap";
                    $result_select_ncc =mysqli_query($conn,$sql_select_ncc);
                    while ($row_ncc = $result_select_ncc->fetch_assoc()) {
                      echo '<option value="'.$row_ncc['id_nha_cung_cap'].'">'.$row_ncc['ten_nha_cung_cap'].'</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Số đăng ký </td>
              <td><input class="td-input-short" type="text" name="so-dang-ky" value="<?php echo $sach['sdk'] ?>"></td>
            </tr>
              <tr>
                  <td class="td-ten-thuoctinh">Giá sách: </td>
                  <td><input class="td-input-short" type="text" name="gia-sach" value="<?php echo $sach['gia'] ?>"></td>
              </tr>
            <tr>
              <td class="td-ten-thuoctinh"> Giới thiệu sách: </td>
              <td><textarea cols="70" rows="5" style="border: 1px solid grey;" name="mo-ta"><?php echo $sach['mota'] ?></textarea></td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh"></td>
              <td style="text-align: right;padding: 20px 5px 10px 5px;">
                <input class="td-input-button" style="background-color: blue;" type="reset" value="Làm lại">
                <input class="td-input-button" style="background-color: green;" type="submit" name="capnhat" value="Thêm sách">
              </td>
            </tr>
          </table>

                        <?php $duongdan = "http://localhost:8080/QuanLyBanSach/Bookshop/BookShop/image/Sachbanchay/".$sach['hasach'];
                                    echo '<div><img style="box-shadow: 0px 1px 5px grey;" src="'.$duongdan.'" /></div> ';
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
