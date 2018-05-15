<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Form For Admin</title>
      <link rel="stylesheet" href="../css/login.css">  
	   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
 <script language="javascript">
	function change_color_user(){
		document.getElementById("tdn").style.color = 'white';
		document.getElementById("mk").style.color = '#aaa';
	}
	function change_color_pass(){
		document.getElementById("tdn").style.color = '#aaa';
		document.getElementById("mk").style.color = 'white';
	}
</script>
<body>
<div class="nen">
	<div class="login-wrap">
		<div class="login-html">
			<h1 class="h1"> BOOK SHOP </h1>
			<h2 class="h2"> <span class="span"> Đăng Nhập </span> <sub class="sub"> Admin  </sub> </h2>
			
			<div class="login-form" >
				<form action="../xuly/login.php" method="post">
				<div>
					<div class="group">
						<label id="tdn" for="user" class="label">Tên đăng nhập</label>
						<input id="user" class ="input" type="text" onfocus="change_color_user()" name="user">
					</div>
					
					<div class="group">
						<label id="mk" for="pass" class="label">Mật khẩu</label>
						<input id="pass" class ="input" type="password" onfocus="change_color_pass()" name="pass">
					</div>
					
					<div class="group">
						<input id ="checkdangnhap"type="checkbox" class ="check" >
						<label for ="checkdangnhap"> <span class="icon"></span> Tự động đăng nhập</label>
					</div>
					
					<br>
					<div class="group">
						<input type="submit" class="button" value="Đăng nhập" name="submit">
					</div>
					<div class="hr"></div>
					<div class="foot-lnk">
						<a href="#forgot">Quên mật khẩu?</a>
					</div>
				</div>
				</form>
				
			</div>
		</div>
	</div>
</div>
</body>

</html>
