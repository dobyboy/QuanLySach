<?php
if(isset($_POST['them'])) {
    include '../../xuly/connect.php';
    $idkm = $_POST['idkm'];
    $tenkm = $_POST['tenkm'];
    $giatri= $_POST['gtkm'];
    $nbd = $_POST['ngaybd'];
    $nkt = $_POST['ngaykt'];

    $sqlsach="SELECT id_sach from sach where ma_sach='".$_POST['sachkm']."'";
    $result1 = mysqli_query($conn, $sqlsach);

    while ($row1 = $result1->fetch_assoc()) {
      $skm= $row1['id_sach'];
  }
    
    if(!empty($idkm) &&!empty($tenkm)&&!empty($giatri)&&!empty($nbd)&&!empty($nkt)&&!empty($skm)) {
        $sql = "INSERT INTO khuyen_mai values('".$idkm."','".$tenkm."',".$giatri.",'".$nbd."','".$nkt."','".$skm."');";
        $result = mysqli_query($conn, $sql);
        if ($result ) {
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


<html class="no-js" lang="">
<head>
<?php include '../phan_header.php';?>
    <style type="text/css">
        .table td{
        padding: 4px;
        text-align: left;
        vertical-align: middle;
        width: 50px;
        font-weight: bold;
    }
    .table-hover{
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
      font-weight: initial;
       width: 80%;
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
    .buttonxem1{
            color: white;
            background: #FF9800;
            text-align: center;
            padding: 0px 9px 0px 9px;
            font-size: 15px;
            border-radius: 3px;
            border-style: none;
            margin-bottom: 2px !important;
        }
        .buttonsua1{
            color: white;
            background: #2979FF;
            text-align: center;
            padding: 1px 13px 1px 13px;
            font-size: 15px;
            border-radius: 3px;
            border-style: none;
            margin-bottom: 2px !important;
        }

        .buttonxoa1{
            color: white;
            background: #D50000;
            text-align: center;
            padding: 1px 11px 1px 11px;
            font-size: 15px;
            border-radius: 3px;
            border-style: none;
            margin-bottom: 2px !important;
        }
    </style>
</head>
<body>
    <!-- Include các thành phần vào -->
    <?php include '../menudoc.php';?>
    <div id="right-panel" class="right-panel">
    <?php include '../menungang.php';?>
        <!-- Nội dung -->
      <form method="POST" action="quan-ly-khuyen-mai.php">
        <input type="submit" name="trove" value="<<" class="btnsubmit">
      </form>
      <form method="POST">
        <h2>Thêm khuyến mãi</h2>
        <div class="background">    
        <div >     
         <table class="table table-hover">
                <tbody>
                <tr>
                    <td>
                        Mã khuyến mãi
                    </td>
                    <td>
                <input class="td-input-short" type="text" name="idkm"
                       value="<?php
                        include '../../xuly/connect.php';
                        $return_idsach_end = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM khuyen_mai "));
                        $idsach_next = $return_idsach_end[0] + 1;
                        if (($idsach_next >= 1000) && ($idsach_next >= 100)) {
                        $idsach_nextto= 'km'. $idsach_next;
                        echo $idsach_nextto;
                        } else if ($idsach_next >= 10) {
                        $idsach_nextto= 'km0' .$idsach_next;
                        echo $idsach_nextto;
                        } else if ($idsach_next >= 1) {
                        $idsach_nextto= 'km00' . $idsach_next;
                        echo $idsach_nextto;
                        }
                        mysqli_close($conn);?>">
                    </td>
                   
                </tr>
                <tr>
                    <td>
                        Tên Khuyến mãi
                    </td>
                    <td>
                        <input class="td-input-short" type="text" name="tenkm" placeholder="nhập tên khuyến mãi ...">
                    </td>
                   
                </tr>
                <tr>
                    <td>
                        Giá trị khuyến mãi
                    </td>
                    <td>
                        <input class="td-input-short" type="number" min="1" max="90" name="gtkm" >
                    </td>
                   
                </tr>
                <tr>
                    <td>
                       Ngày bắt đầu khuyến mãi
                    </td>
                    <td>
                        <input class="td-input-short" type="date"  name="ngaybd" >
                    </td>
                   
                </tr>
                <tr>
                    <td>
                        Ngày kết thúc khuyến mãi
                    </td>
                    <td>
                        <input class="td-input-short" type="date" name="ngaykt" >
                    </td>
                   
                </tr>
                <tr>
                    <td>
                       Sách được khuyến mãi
                    </td>
                    <td>
                        <input class="td-input-short" type="text" name="sachkm" placeholder="nhập số đăng ký sách được khuyến mãi ...">
                    </td>
                   
                </tr>

                </tbody>
            </table>
            <input class="td-input-button" style="background-color: blue;" type="reset" value="Làm lại">
            <input class="td-input-button" style="background-color: green;width: auto;" type="submit" name="them" value="Thêm Khuyến mãi">
        </form>
            </div>
        </div>
    </div>

    <script src="../../css/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../../css/assets/js/popper.min.js"></script>
    <script src="../../css/assets/js/plugins.js"></script>
    <script src="../../css/assets/js/main.js"></script>
</body>
</html>
