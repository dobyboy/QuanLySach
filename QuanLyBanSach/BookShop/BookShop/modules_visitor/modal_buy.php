<?php
include('../modules/connection.php');

if (isset($_GET['idsp'])) {
    $sql_sach = "select * from sach s 
    JOIN hinh_anh_sach h ON s.id_sach = h.id_sach 
    JOIN gia_sach g ON s.id_sach = g.id_sach
    WHERE s.id_sach='$_GET[idsp]'";

    $result_s = mysqli_query($conn, $sql_sach);
while ($row_sach = mysqli_fetch_array($result_s)){


/*$result_insert= mysqli_query($conn,"Insert into chi_tiet_gio_hang VALUE('<?php echo $row_sach['id_sach'] ?>',') ");*/


    ?>
    <div id="modal-buy" class="modal">
        <form class="modal-content" style="width: 65%; height: 65%;" action="/action_page.php">
        <span onclick="document.getElementById('modal-buy').style.display='none'" class="close"
              title="Close Modal">&times;</span>
            <div class="container-buy">
                <div class="modal-header" style="background-color: #1c7430;">
                    <h5 class="modal-buy-title" style="float: left; font-weight: bold; color: #fbfff9;">Sản phẩm đã được
                        thêm vào giỏ</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="../image/sachbanchay/<?php echo $row_sach['lienket'] ?>" alt="ảnh sách"
                                 style="width: 100%; height:100%;">

                        </div>
                        <div class="col-lg-6">
                            <h4 style="font-weight: bold; color: #005cbf"><?php echo $row_sach['ten_sach'] ?></h4>
                        </div>
                        <div class="col-lg-3">
                            <p> 1 x <?php echo $row_sach['gia'] ?></p>
                            <h5 style="font-weight: bold; color: #1a9024; ">Tổng tiền tạm tính: <label
                                        style="color: #ef2323"><?php echo 1 * $row_sach['gia'] ?>&nbsp;&nbsp;VNĐ</label>
                            </h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" style="width: 20%;">Tiếp tục mua hàng</button>
                    <button type="button" class="btn btn-warning" style="width: 20%;"
                            onclick="window.location.href='payment.php'">Thanh toán
                    </button>

                </div>


            </div>
        </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('modal-buy');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

<?php } ?>
<?php if (isset($_GET['show'])) {
    echo "<script>  document.getElementById('modal-buy').style.display = 'block'; </script>";
} ?>
