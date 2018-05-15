	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bookshop.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="http://localhost:8080/QuanLyBanSach/css/assets/css/normalize.css">
    <link rel="stylesheet" href="http://localhost:8080/QuanLyBanSach/css/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost:8080/QuanLyBanSach/css/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost:8080/QuanLyBanSach/css/assets/css/themify-icons.css">
    <link rel="stylesheet" href="http://localhost:8080/QuanLyBanSach/css/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="http://localhost:8080/QuanLyBanSach/css/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="http://localhost:8080/QuanLyBanSach/css/assets/scss/style.css">

	<style>
/*định dạng kích thước hình ảnh logo*/
	.navbar .navbar-brand img{
		max-width: 230px;
		height: 50px;
	}
/*nút để mở hay thu nhỏ menu dọc*/
	.menutoggle{
		width:38px;
		height:38px;
		margin-left: -50px;
		background:blue;
	}
	.pull-left{
		padding-top: 10px;
	}
	.open aside.left-panel{
		max-width: 80px;
		width: 80px;
		padding: 0px 30px;
	}
/*kích thước hình ảnh logo khi thu nhỏ menu*/
	.open aside.left-panel .navbar .navbar-brand.hidden img{
		max-width:50px;
	}
/*backgournd left menu*/
	aside.left-panel{
		background: #263238;
	}
/*backgournd right- header- menu*/
	.right-panel header.header{
		background: #37474F;
	}
/*backgournd right- nội dung- menu*/
	.right-panel{
		background: white;
	}
/*backgournd left menu*/
	.navbar{
		background: #263238;
	}

	.navbar .navbar-brand{
		border-bottom: 1px solid #ECEFF1;
	}

/*nền và kich thước icon*/
	.navbar .navbar-nav li.menu-item-has-children .sub-menu i{
		width:40px;
		color:#0091EA;
	}
/*nền và kich thước icon*/
	.navbar .navbar-nav li > a .menu-icon{
		width:40px;
		color: #0091EA;
	}
/* định dạngchữ trên menu*/
	.navbar .navbar-nav li > a{
		margin-top: -8px;
		font-weight: 400;
		font-size: 16px;
		text-shadow: 0px 1px 5px black;
		color: #FFFDE7 !important;
	}
	.navbar .navbar-nav li.menu-item-has-children .sub-menu{
		padding-top:10px;
		background: #455A64;
	}
	/*mau chu khi bấm vào avartar*/
	.user-area .user-menu .nav-link{
	color: white;
	}
	.navbar .navbar-nav li.menu-item-has-children.show .sub-menu{
		margin-bottom:10px;
		background: #263238;
	}
	/*màu chữ và nền khi bấm vào icon user*/
	.user-area .user-menu{
		background: #536DFE;
		color: white;
	}

	/*đinh dạng bảng*/
	.table-hover>tbody>tr:nth-of-type(odd){background-color:#ECEFF1 ;}
	.table-hover>tbody>tr:nth-of-type(even){background-color:#FFFFFF ;}
	.table-hover tbody tr:hover{background-color:#E0F7FA;}
	.table{
		box-shadow: 0px 1px 8px #BDBDBD;
		overflow: scroll;
	}
	.table thead th{
		border-bottom: 1px solid black;
		border-top: 1px solid black;
		padding: 6px;
		text-align: center;
		vertical-align: middle;
	}
	.table td{
		padding: 4px;
		text-align: center;
		vertical-align: middle;
	}
	thead{
		background-color: #81D4FA;
		margin-bottom: 2px;
		}

		/*định dạng chữ tiêu đề của đầu trang bên right menu*/
	h2{
		color: blue;
		text-align: center;
	 	margin: 10px 10px 15px 10px ; 
		border-bottom: 2px solid #BDBDBD;
		padding: 2px 0px 5px 0px;
		box-shadow: 0px 1px 8px #BDBDBD;
		vertical-align: center;
	}

	/*định dạng cho tên bảng nằm trên bảng*/
	h5{
		font-size: 22px;
		color: blue;
		text-align: center;
	 	margin: 10px;
		padding-bottom: 5px;
	}
    label{
        color: blue;
        font-weight: bold;
    }

	/*định dạng nội dung nền bên right-menu*/
	.background{
		border: none;
	    box-shadow: 0px 1px 8px #BDBDBD, 1px 0px 8px #BDBDBD;
	    padding:10px 0px 5px 0px;
	    margin:5px 10px 10px 10px;
	    min-height: 620px;
	    height: 100%;
	}	
	.user-area .user-avatar{
		width: 50px;
	}
	.right-panel header.header{
		padding: 12px 20px 9px;
	}

	/*định dạng khoảng cách cho phần chữ vào icon menu*/
	.open aside.left-panel .navbar .navbar-nav li{
		margin-right: -8px;
	}
	.open aside.left-panel .navbar .navbar-nav li.menu-item-has-children .sub-menu li a{
		padding: 2px 0px 2px 30px;
	}
	.navbar .navbar-nav li.menu-item-has-children .sub-menu a{
		padding: 10px 0px 0px 30px;
	}

	/*màu icon search*/
	.fa-search:before{
		color: white;
	}
	.navbar .navbar-nav li > a:hover, .navbar .navbar-nav li > a:hover .menu-icon{
		color: blue !important;
	}

	
	/*set buttton*/
	.buttonthem{
			margin-bottom: 2px;
			float: right;
			background: green;
			color: white; 
			border-radius: 5px;
			order: none;
			font-size: 15px;
			padding-left: 10px;
			padding-right: 10px;
			margin-left: 5px;
		}
	.buttonthem:hover{
			background-color: lightyellow;
			color: blue;
		}

		/**/
		.buttonduyet{
			color: white;
			background: green;
			text-align: center;
            padding: 1px 11px 1px 11px;
			font-size: 15px;
			border-radius: 3px;
			border-style: none;
			width: 70px !important;
            margin-bottom: 2px !important;
		}
		.buttonxem{
			color: white;
			background: #FF9800;
			text-align: center;
            padding: 1px 11px 1px 11px;
			font-size: 15px;
			border-radius: 3px;
			border-style: none;
			width: 70px !important;
            margin-bottom: 2px !important;
		}
		.buttonsua{
			color: white;
			background: #2979FF;
			text-align: center;
            padding: 1px 11px 1px 11px;
			font-size: 15px;
			border-radius: 3px;
			border-style: none;
			width: 70px !important;
            margin-bottom: 2px !important;
		}

		.buttonxoa {
			color: white;
			background: #D50000;
			text-align: center;
			padding: 1px 11px 1px 11px;
			font-size: 15px;
			border-radius: 3px;
			border-style: none;
			width: 70px !important;
            margin-bottom: 2px !important;
		}
		.buttonsearch{ 
			margin-bottom: 2px;
			float: right;
			background: transparent;
			color: black; 
			border-radius: 5px;
			font-size: 15px;
			padding-left: 10px;
			padding-right: 10px;
			border: 1px solid grey;
		}
		.buttonsearch:hover{
			background-color: lightyellow;
			color: blue;
		}
		.txt-search{
			margin-bottom: 2px; 
			float: right;
			background: transparent;
			color: black; 
			border-radius: 5px;
			font-size: 15px;
			padding-left: 2px;
			padding-right: 5px;
			border: 1px solid grey;
			width: 250px;
		}

        .no-margin {
            margin: 0;
        }
	</style>