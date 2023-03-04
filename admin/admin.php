<?php 
 include_once("../config/db.php");
 $sqlAllProduct = "SELECT COUNT(prd_id) FROM product";
 $queryAllProduct = mysqli_query($conn, $sqlAllProduct);
 $Product = mysqli_fetch_assoc($queryAllProduct);

 $sqlAllCategories = "SELECT COUNT(cat_id) FROM category";
 $queryAllCategories = mysqli_query($conn, $sqlAllCategories);
 $Cat = mysqli_fetch_assoc($queryAllCategories);

 $sqlAllUser = "SELECT COUNT(user_id) FROM user ";
 $queryAllUser = mysqli_query($conn, $sqlAllUser);
 $User = mysqli_fetch_assoc($queryAllUser);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Mobile Shop - Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">


<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

</head>

<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">VHT Shop</a>
						<ul class="user-menu">
							<li class="dropdown pull-right">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Admin <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Hồ sơ</a></li>
									<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
								</ul>
							</li>
						</ul>
					</div>
									
				</div><!-- /.container-fluid -->
			</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="admin.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="user.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li><a href="product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li ><a href="order.php"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>Quản lý đơn hàng</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Trang chủ quản trị</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Trang chủ quản trị</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<a href="category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"></use></svg></a>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $Cat["COUNT(cat_id)"];?></div>
							<div class="text-muted">Danh mục</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<a href="product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg></a>
						</div>
						<div  class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $Product["COUNT(prd_id)"];?></div>
							<div class="text-muted">Sản Phẩm</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<a href="user.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg></a>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $User["COUNT(user_id)"];?></div>
							<div class="text-muted">Thành Viên</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<a href="order.php"><a href="order.php"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></a>
</svg></a>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">4</div>
							<div class="text-muted">Đơn hàng</div>
						</div>
					</div>
				</div>
			</div>
		
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
</body>

</html>
