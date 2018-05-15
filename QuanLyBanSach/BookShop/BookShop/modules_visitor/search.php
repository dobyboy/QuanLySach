<?php
include('../modules/connection.php');

if (isset($_POST['oke'])) {
    if (!empty($_POST['search'])) {
        $search = addslashes($_POST['search']);
        var_dump($search);
        header("Location: ../main_visitor/allitem.php?search&q=$search");
    } elseif (empty($_POST['search'])) {
        header("Location: ../main_visitor/index.php");
    }
}
$query_sach = "SELECT *
                FROM loai_sach AS l 
                JOIN sach AS s ON l.id_loai_sach = s.id_loai_sach
                JOIN tac_gia AS t ON s.id_tac_gia = t.id_tac_gia
                JOIN gia_sach g ON g.id_sach = s.id_sach	
                JOIN hinh_anh_sach h ON h.id_sach = s.id_sach
                JOIN nha_cung_cap n ON n.id_nha_cung_cap = s.id_nha_cung_cap
				WHERE s.ten_sach LIKE '%" . $_GET['q'] . "%' OR t.ten_tac_gia LIKE '%" . $_GET['q'] . "%'";
$result_search = mysqli_query($conn, $query_sach);

if ($num = mysqli_num_rows($result_search) == 0) {
    echo '<div id="title">
                <h3 style="font-weight: bold; color: #005cbf;">
                <label style="color: #1a9024;font-size: 20px;">Kết quả tìm kiếm &gt;&gt;</label>' . $_GET['q'] . ' 
                </h3>
                <hr style="border: 1.5px solid #005cbf ;"></div>';
    echo 'Không có sách hoặc sản phẩm nào phù hợp với thông tin bạn tìm kiếm. Vui lòng thử lại với từ khóa khác.';
} else {
echo '<div id="title">
                <h3 style="font-weight: bold; color: #005cbf;">
                <label style="color: #1a9024;font-size: 20px;">Kết quả tìm kiếm &gt;&gt;</label>' . $_GET['q'] . ' 
                </h3>
                <hr style="border: 1.5px solid #005cbf ;"></div>';
    while ($row_search = mysqli_fetch_array($result_search)) {
?>
            <div class="row">
                <div class="col-lg-2">
                    <a href="item.php?xem=chitietsp&idsp=<?php echo $row_search['id_sach'] ?>"><img
                                src="../image/sachbanchay/<?php echo $row_search['lienket'] ?>"
                                alt="<?php $row_search['ten_sach'] ?>"
                                style="width: 100%"></a>
                </div>
                <div class="col-lg-7">
                    <h4 class="card-title"><a href="item.php?xem=chitietsp&idsp=<?php echo $row_search['id_sach'] ?>"
                                              style="font-size: 14px; font-weight: bold;"><?php echo $row_search['ten_sach'] ?></a>
                    </h4>
                    <p class="card-text"><?php echo $row_search['ten_tac_gia'] ?></p>
                    <p class="text-warning">
                        &#9733; &#9733; &#9733; &#9733; &#9734; <label
                                style="font-size: 10px; color: #8A888B; font-weight: normal;">(1 đánh giá - 1 bình
                            luận)</label></p>
                    <h3><a id="newcost"
                           style="font-size: 13px; font-weight: bold;"><?php echo number_format($row_search['gia']) . ' đ' ?>
                            &nbsp;
                            &nbsp;VNĐ</a>
                    </h3>
                    <p style="font-size: 13px;">Nguồn Cội (Tựa dự kiến: Nguyên Bản, Tựa tiếng Anh: Origin) - Tác
                        giả: Dan
                        Brown ...<a href="#">Xem thêm nhiều hơn</a></p>
                </div>
                <div class="col-lg-3">

                    <button type="submit" class="btn btn-info btn-lg" name="muahang"
                            onclick="window.location.href='allitem.php?xemchitetsp&id=<?php echo $row_search['id_loai_sach'] ?>&idsp=<?php echo $row_search['id_sach'] ?>&show=1';">
                        <i class="glyphicon glyphicon-shopping-cart"></i>Mua hàng
                    </button>
                </div>
            </div>
            <hr style="border: 0.5px solid #DEDEDC;"/>
        <?php }
        }
include ('modal_buy.php');
include ('../modules/pagination.php');
?>


