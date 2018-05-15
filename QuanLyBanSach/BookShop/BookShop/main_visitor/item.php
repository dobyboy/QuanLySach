<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
    <link rel="icon" href="../image/logo.png">
	<title>Sản phẩm</title>
	<?php 
	include ('../lib/link.php');
	session_start();
	$_SESSION['last_url'] = $_SERVER['REQUEST_URI'];
	?>
</head>

<body>

	<!-- Navigation -->
    <?php include ('../modules_visitor/tes_menu_bar.php');?>

		<!-- Page Content -->
		<div class="container">
				<?php include ('../modules_visitor/item_detail.php') ?>
		<!-- /.container -->
        </div>
		<!-- Footer -->
				<!-- /.container -->
            <?php include ('../modules/footer.php')?>

		<!-- Bootstrap core JavaScript -->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	</body>

	</html>
