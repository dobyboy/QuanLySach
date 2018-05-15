<?php include('../modules/connection.php');
$query_avg = $conn->query("SELECT round(avg(diem_danh_gia),1) AS avg FROM binh_luandanh_gia WHERE id_sach= '" . $_GET['idsp'] . "'");
$result_avg = mysqli_fetch_assoc($query_avg);

if ($result_avg['avg'] == null) {
        echo '<p class="text-warning">&#9734; &#9734; &#9734; &#9734; &#9734;</p>';
} else {
    if (($result_avg['avg'] >= 1) && ($result_avg['avg'] < 2)) {
        echo '<p class="text-warning">&#9733; &#9734; &#9734; &#9734; &#9734;</p>';
    }
    if (($result_avg['avg'] >= 2) && ($result_avg['avg'] < 3)) {
        echo '<p class="text-warning">&#9733; &#9733; &#9734; &#9734; &#9734;</p>';
    }
    if (($result_avg['avg'] >= 3) && ($result_avg['avg'] < 4)) {
        echo '<p class="text-warning">&#9733; &#9733; &#9733; &#9734; &#9734;</p>';
    }
    if (($result_avg['avg'] >= 4) && ($result_avg['avg'] < 5)) {
        echo '<p class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</p>';
    }
    if ($result_avg['avg'] == 5) {
        echo '<p class="text-warning">&#9734; &#9734; &#9734; &#9734; &#9734;</p>';
        }

    }
?>