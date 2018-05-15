<?php include ('../modules/connection.php');
session_destroy();
$return_idtk_end = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM tai_khoan "));
$idtk_next = $return_idtk_end[0] + 1;

if (($idtk_next >= 1000) && ($idtk_next >= 100)) {
    $idtk_nextto= 'TK'. $idtk_next;

} else if ($idtk_next >= 10) {
    $idtk_nextto= 'TK0' . $idtk_next;

} else if ($idtk_next >= 1) {
    $idtk_nextto= 'TK00' . $idtk_next;

}

if (isset($_POST['sign-up'])){

    if (!empty($_POST['fullname']) && !empty($_POST['name-registered'])&&!empty($_POST['psw'])&&!empty($_POST['psw-repeat'])&&!empty($_POST['email'])){

        $query_trung= mysqli_query($conn,"Select * from tai_khoan WHERE ten_dang_nhap= '".$_POST['name-registered']."'");
        $num= mysqli_num_rows($query_trung);
        if ($num > 0){
            echo '<script> alert("Tài khoản đã tồn tại! Vui lòng đăng ký với tài khoản khác.");
                           window.location.href="../main_visitor/index.php";</script>';
        }else
        if ( $_POST['psw'] == $_POST['psw-repeat'] ){
            $query_dk= mysqli_query($conn,"Insert into tai_khoan VALUES ('$idtk_nextto','".$_POST['name-registered']."','".$_POST['psw']."','L002')");

            $query_tttk= mysqli_query($conn,"Insert into thong_tin_chu_tai_khoan(id_taikhoan, ten_chu_tk,email) VALUES ('$idtk_nextto','".$_POST['fullname']."','".$_POST['email']."')");

            echo '<script>  alert("Đăng ký thành công. Bây giò hãy đăng nhập nào");
                            window.location.href="../main_visitor/index.php";</script>';

        }else echo '<script> alert("Vui lòng nhập đúng mật khẩu!");
                                window.location.href="../main_visitor/index.php";</script>';
    }else echo '<script> alert("Vui lòng không bỏ trống các thông tin đăng ký. Vui lòng nhập lại!");
                                     window.location.href="../main_visitor/index.php";</script>';

}




?>