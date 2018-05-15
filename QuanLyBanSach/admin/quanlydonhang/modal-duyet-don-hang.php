<?php
if(isset($_POST['duyetdh'])) {
    include '../../xuly/connect.php';
    $sql = "update don_hang set trangthai='đã duyệt' where id_don_hang = '".$_POST['id']."'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>
               alert('Duyệt đơn hàng thành công!');
              </script>";
    }
}
?>

<div id="modal-duyet" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Duyệt Đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="post">
      <div class="modal-body">
        <table STYLE="font-weight: bold; font-size: 18px; width: 100%">
          <tr style="border: 1px solid gray;height: 30px;">
            <td > Mã đơn hàng:</td> 
            <td style="color: blue"><input style="border: none;" type="text" name="id" value="<?php echo $sach['iddh'] ?>"></td>
          </tr>
          <tr style="border: 1px solid gray;height: 30px">
            <td>Tên khách hàng:</td>  
            <td style="color: blue"><?php echo $sach['tenkh'] ?></td>      
          </tr>
        </table>

      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            <button name="duyetdh" type="submit" class="btn btn-primary">Duyệt</button>
          </form>
      </div>
    </div>
  </div>
</div>
