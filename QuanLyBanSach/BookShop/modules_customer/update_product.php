<?php
session_start();
include('../modules/connection.php');
if (isset($_POST["delete"])) {
    if (isset($_POST['id_check'])) {
        $ids = $_POST['id_check'];
        foreach ($ids as $id) {
            $result_del = mysqli_query($conn, "Delete from chi_tiet_gio_hang where id_gio_hang= '" . $_SESSION['idgh'] . "' and id_sach= '$id'");

        }
        if ($result_del == TRUE) {
            header("location: ../main_customer/cart.php");
        } else {
            $_SESSION['loi_del'] = "Bạn chưa chọn sản phẩm cần xóa";
            header("location: ../main_customer/cart.php");
        }
    } else {
        $_SESSION['loi_del'] = "Bạn chưa chọn sản phẩm cần xóa";
        header("location: ../main_customer/cart.php");
    }
}
if (isset($_POST["update"])) {

    if (isset($_POST['id_check'])) {
        $ids = $_POST['id_check'];
        foreach ($ids as $id) {
                //var_dump($_POST[$id]);die;
            $query_kho= mysqli_query($conn,"Select * from kho WHERE id_sach= '$id'");
            $result_k = mysqli_fetch_array($query_kho);
            $soluong= $_POST[$id];
            if ($result_k['so_luong_sach'] >= $soluong ){
                $result_up = mysqli_query($conn, "UPDATE chi_tiet_gio_hang SET so_luong= '$soluong' 
                WHERE id_gio_hang= '" . $_SESSION['idgh'] . "' AND id_sach= '$id' ");


                if ($result_up) {
                    echo '<script> alert("Cập nhật số lượng thành công"); </script>';
                    header("location: ../main_customer/cart.php");
                } else {
                    $_SESSION['loi_up'] = "Bạn chưa chọn sản phẩm cần cập nhật";
                    header("location: ../main_customer/cart.php");
                }
            }
            else{
                echo '<script> alert("Hiện tại sản phẩm không đủ hàng");
                                window.location.href= "../main_customer/cart.php";</script>';

            }
        }

    } else {
        $_SESSION['loi_up'] = "Bạn chưa chọn sản phẩm cần cập nhật";
        header("location: ../main_customer/cart.php");
    }
}
?>