<?php
$sql_dh= mysqli_query($conn,"Select * from don_hang WHERE id_tk='".$_SESSION['idtk']."'");
$sql_cart="SELECT * FROM don_hang d JOIN chi_tiet_don_hang c on d.id_don_hang=c.id_don_hang JOIN sach s ON c.id_sach = s.id_sach
                                                                      WHERE d.id_tk='".$_SESSION['idtk']."'";
$result_dh= mysqli_query($conn,$sql_cart);
$row_dh= mysqli_fetch_array($result_dh);?>


<table class="table table-hover" style="width: 100%">
        <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        </thead>

        <tbody>
    <?php while ($row_dh) { ?>
        <tr style="margin-bottom: 20px!important;">
            <td style="margin-bottom: 20px!important;"><?php echo $row_dh['ten_sach'] ?></td>
            <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['don_gia']) ?> đ</td>
            <td style="margin-bottom: 20px!important;"> <?php echo $row_dh['so_luong'] ?>  </td>

            <td style="margin-bottom: 20px!important;"><?php echo number_format($row_dh['so_luong'] * $row_dh['don_gia']) ?>
                đ
            </td>
        </tr>

    <?php }
       ?>


        <hr>
        </tbody>
    </table>
