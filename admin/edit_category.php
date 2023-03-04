<?php
	include_once ("../config/db.php");
		if(isset($_GET ['cat_id'])){
			$sqlEditCate = "SELECT * FROM category WHERE cat_id =".$_GET['cat_id'];
			$queryEditCate = mysqli_query($conn, $sqlEditCate);
			$cateEdit = mysqli_fetch_assoc($queryEditCate);
		
		}

		if(isset($_POST ['sbm'])){
			if(empty ($_POST ['cat_name'])){
				$errors['cat_name'] = '<span style="color:red;"> Bạn cần phải nhập tên danh mục </span>';
			}else{
				$cat_name = $_POST['cat_name'];
				$sqlCheck = "SELECT * FROM category WHERE cat_name = '$cat_name'";
				$queryCheck = mysqli_query ($conn, $sqlCheck);
				if(mysqli_num_rows($queryCheck) > 0){ // trg hợp tồn tại bản ghi có tên danh mục mới nhập
					$errors ['error'] = '<div class="alert alert-danger"> Danh mục đã tồn tại !</div>';
				}else{ // trg hợp tên danh mục mới nhập chưa tồn tại
				$sqlUpdateCate = "UPDATE category SET cat_name = '$cat_name' WHERE cat_id =" .$_GET['cat_id'];// cbi truy vấn
				   mysqli_query($conn, $sqlUpdateCate);
					header("Location: category.php");// chuyển sang danh sách danh mục
				}
			}
		}
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

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

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
			<li ><a href="admin.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="user.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li class="active"><a href="category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li><a href="product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
			<li ><a href="order.php"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>Quản lý đơn hàng</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="category.php">Quản lý danh mục</a></li>
				<li class="active"></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục:<?php echo $cateEdit['cat_name'];?></h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
						<?php
								if(isset($errors['error'])){
									echo $errors['error'];  
								}
							?>
                       		 <form role="form" method="post">
								<div class="form-group">
									<label>Tên danh mục:</label>
									<input type="text" name="cat_name" value="<?php echo $cateEdit['cat_name']; ?>" class="form-control" placeholder="Tên danh mục...">
									<?php
											if(isset($errors['cat_name'])){
												echo $errors['cat_name'];  
											}
									?>
                        <form role="form" method="post">
                           
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	
</body>

</html>
