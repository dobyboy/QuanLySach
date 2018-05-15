<?php
include("../modules/connection.php");

$sql = "SELECT * FROM loai_sach ORDER BY id_loai_sach ASC LIMIT 10";
$result = mysqli_query($conn, $sql) or die(mysql_error());
?>

<p id="list-book">Danh mục sách</p>
<div class="list-group">

    <?php
    while ($dong_sp = mysqli_fetch_array($result)) {
        ?>
        <a href="allitem.php?xem=chitietloaisanpham&id=<?php echo $dong_sp['id_loai_sach'] ?>"
           class="list-group-item">
            <span class="glyphicon glyphicon-tags"> </span>&nbsp;&nbsp;<?php echo $dong_sp['ten_loai_sach'] ?></a>
        <?php
    }
    ?>
</div>
<div>

</div>
<p id="list-book">Tác giả</p>
<div class="list-group">

    <?php
    $result_tg= mysqli_query($conn,"Select * from tac_gia ORDER BY id_tac_gia ASC LIMIT 10");
    while ($dong_tg = mysqli_fetch_array($result_tg)) {
        ?>
        <a href="allitem.php?xem=chitietloaisanpham&id_tg=<?php echo $dong_tg['id_tac_gia'] ?>"
           class="list-group-item">
            <span class="glyphicon glyphicon-tags"> </span>&nbsp;&nbsp;<?php echo $dong_tg['ten_tac_gia'] ?></a>
        <?php
    }
    ?>
</div>