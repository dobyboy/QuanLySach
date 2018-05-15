<?php
    include ('../modules/connection.php');
    session_start();
    $sql_up="UPDATE thong_tin_chu_tai_khoan 
            SET ten_chu_tk='".$_POST['name']."', phai='".$_POST['gender']."', 
            ngaysinh='".$_POST['birthday']."' , email='".$_POST['email']."' , diachi='".$_POST['address']."'
            WHERE id_taikhoan='$_SESSION[idtk]'";
    $reusult= mysqli_query($conn,$sql_up);

    if($reusult==true){
        $_SESSION['thong_bao']="Cập nhật thành công!";
        header('Location: ../main_customer/myaccount.php');
    }
    else{
        $_SESSION['loi_up']="Cập nhật thất bai. Vui lòng kiếm tra lại thông tin vừa nhập!";
    }
?>