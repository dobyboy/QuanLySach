<!-- Modal -->
<style type="text/css">
  .btn-primary{
    padding: 5px 20px 5px 20px;
  }
  .btn-secondary{
    padding: 5px 20px 5px 20px;
  }
  .modal-footer{
    padding: 5px;
  }
  .modal-header{
    padding: 5px;
  }
  .modal-dialog {
    max-width: 1050px !important;
    min-width: 1050px !important;
  }
  .modal-open .modal{
    overflow: scroll;
  }
  .modal-title{
    font-size: 28px;
    color: blue;
    padding-left: 450px
  }
  .modal-body{
    padding-bottom: 0px;
  }

  table{
      width: 75%;
      height:100%;
      box-shadow: 0px 1px 8px #BDBDBD;
    }
    table tr th{
      padding: 10px 0px;
      text-align: center;
      color: blue;
      background-color: lightblue;
      border-radius: 3px;
    }
    table tr td{
      text-align: left;
      font-size: 17px;      
      padding: 5px 10px;
      margin-left: auto;
      margin-right: auto;
    }
    .anhsach{
      font-size: 13px;
      color: blue;
      box-shadow: 0px 1px 8px #BDBDBD;
      position: absolute;
      right:15px;
    }
    input{
      border: 1px solid grey;
    }
    textarea{
      width: 80%;
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
    select{
      overflow: hidden;
    }
</style>
<div class="modal fade" id="modal-themsach" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <!--header của modal  -->
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Thêm sách</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Phần nội dung bên trong modal -->
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="anhsach">
            <div style="width: 250px; height: 150px; background-color: lightblue;"></div>
            <input type="file" name="hinhanhsach" style="border: none; padding: 2px;color: blue;">
          </div>
          <div>
          <table>
            <tr>
              <th colspan="2">Thêm thông tin sách</th>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Mã sách: </td>
            <td><input class="td-input-short" type="text" name="id_sach"></td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh">Tên sách: </td>
              <td><textarea name="ten-sach" cols="70" rows="2" style="border: 1px solid grey;"></textarea></td>
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
              <td><input class=" td-input-short" type="number" min="1"  name="so-trang"></td>
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
                    echo '<option value="'.$row_kt['idkichthuoc'].'">'.$row_kt['kich_thuoc'].'</option>';
                   }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh"">Loại bìa sách</td>
              <td>
                <select class="td-input-short" name="loaibiasach">
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
              <td><input class="td-input-short" type="date" name="ngay-xuat-ban"></td>
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
              <td><input class="td-input-short" type="text" name="id_sach"></td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh"> Giới thiệu sách: </td>
              <td><textarea cols="70" rows="5" style="border: 1px solid grey;"></textarea></td>
            </tr>
            <tr>
              <td class="td-ten-thuoctinh"></td>
              <td style="text-align: right;padding: 20px 5px 10px 5px;">
                <input class="td-input-button" style="background-color: tomato;" type="button" data-dismiss="modal" value="Hủy tác vụ">
                <input class="td-input-button" style="background-color: blue;" type="reset" value="Làm lại">
                <input class="td-input-button" style="background-color: green;" type="button" name="them" value="Thêm sách">          
              </td>
            </tr>
          </table>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
<!-- xử lý thêm thông tin sách mới vào csdl -->
<!-- <?php 
  // include '../../xuly/connect.php'
  // $sql="INSERT INTO sach(id_sach,ten_sach,mo_ta,ngay_xuat_ban,so_trang,ma_sach,id_kichthuoc,id_tac_gia,id_dichgia,id_loai_sach,id_nha_cung_cap,id_loaibia,id_nxb)
  //  VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13])";
 ?> -->