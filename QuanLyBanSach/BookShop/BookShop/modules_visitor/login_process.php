<?php
include ('../modules/connection.php');
require_once '../lib/db.php';

session_start();
if (isset($_POST['sign-in'])) {
// Get data from form
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM tai_khoan tk 
  JOIN thong_tin_chu_tai_khoan t on tk.id_tk = t.id_taikhoan 
  WHERE ten_dang_nhap= '$username' AND mat_khau= '$password'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) <= 0) {

        $_SESSION['loi'] = "Tài khoản hoặc mật khẩu không đúng vui lòng nhập lại.";
        header('Location: ../main_visitor/index.php');

    } else {
        $_SESSION['uname'] = $username;
        $_SESSION['psw'] = $password;
        $_SESSION['hoten'] = $row['ten_chu_tk'];
        $_SESSION['idtk'] = $row['id_tk'];

        // xử lý id_gio_hang tăng dần
        $return_idgh_end = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM gio_hang "));
        $idgh_next = $return_idgh_end[0] + 1;
        if (($idgh_next >= 1000) && ($idgh_next >= 100)) {
            $idgh_nextto = 'GH' . $idgh_next;
            echo $idgh_nextto;
        } else if ($idgh_next >= 10) {
            $idgh_nextto = 'GH0' . $idgh_next;
            echo $idgh_nextto;
        } else if ($idgh_next >= 1) {
            $idgh_nextto = 'GH00' . $idgh_next;
            echo $idgh_nextto;
        }
        $kt_gh = mysqli_query($conn, "SELECT * FROM gio_hang  WHERE id_tk='" . $_SESSION['idtk'] . "' AND trang_thai='0'");

        $row_kt = mysqli_fetch_array($kt_gh);
        if ($result_kt = mysqli_num_rows($kt_gh) > 0) {
            $query_cart = mysqli_query($conn, "SELECT * FROM chi_tiet_gio_hang
                                            WHERE id_gio_hang='" . $row_kt['id_gio_hang'] . "'");
            $_SESSION['idgh'] = $row_kt['id_gio_hang'];
        } else {
            $query_insert_gh = "INSERT INTO gio_hang(id_tk,id_gio_hang,trang_thai) VALUE ('" . $_SESSION['idtk'] . "' ,'" . $idgh_nextto . "',0)";
            $result_insert_gio_hang = mysqli_query($conn, $query_insert_gh);
            $_SESSION['idgh'] = $idgh_nextto;
        }

        //$url = $_SESSION['last_url'];
//        unset($_SESSION['last_url']);
        header("Location: ../main_customer/home.php");

    }
}
?>

