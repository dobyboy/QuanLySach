<html>

 <body>
	<?php
		if($_POST['user'] == "vanloc" && $_POST["pass"] == "vanloc"){
			
		header('Location: http://localhost:8080/QuanLyBanSach/admin/tongquan/tongquan.php');
		}else{
			echo "<script>";
				echo 'alert("loi dang nhap !!");';	
				echo "window.location.replace('http://localhost:8080/QuanLyBanSach/admin/loginadmin.php');";
			echo "</script>";
		
		}
	?>
</body>
</html>