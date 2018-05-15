<?php
    $sql_cart="select * from gio_hang g JOIN chi_tiet_gio_hang h ON g.id_gio_hang = h.id_gio_hang
                WHERE g.id_tk='$_GET[idtk]'";
    $result_gh= mysqli_query($conn,$sql_cart);
    while ($row_gh= mysqli_fetch_array($result_gh)){

?>

<table class="table table-hover">
    <thead>
    <tr>
        <th id="sp">Sản phẩm</th>
        <th id="dg">Đơn giá</th>
        <th id="sl">Số lượng</th>
        <th id="tht">Thành tiền</th>
        <th id="tt">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td id="sp"><?php echo $row_gh['id_sach'] ?></td>
        <td id="dg"><?php echo $row_gh['don_gia'] ?></td>
        <td id="sl">
            <div class="btn-group">
                <a href="#" class="btn btn-primary"><span
                        class="glyphicon 	glyphicon glyphicon glyphicon-minus"></a>
                <a href="#" class="btn btn-primary"> <?php echo $row_gh['so_luong'] ?></a>
                <a href="#" class="btn btn-primary"><span
                        class="glyphicon 	glyphicon glyphicon glyphicon-plus"></a>
            </div>

        </td>
        <td id="tht"><?php echo 1*$row_gh['don_gia'] ?></td>
        <td id="tt"><a href="#">Xóa</a></td>
    </tr>


    </tbody>
</table>
<?php } ?>