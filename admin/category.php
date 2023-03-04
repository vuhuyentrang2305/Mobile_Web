<?php
 include_once("../config/db.php");
 $limit = 6; //số bản ghi sản phẩm trên 1 trang
    $sqlTotalRecords = "SELECT COUNT(cat_id) as total FROM category";
    $queryToltalRecords = mysqli_query($conn, $sqlTotalRecords);
    $result = mysqli_fetch_assoc($queryToltalRecords);
    $total_records = $result['total']; // tổng số bản ghi
    $total_page = ceil($total_records/$limit); //tổng số trang

    if(isset($_GET['current_page'])){
        $current_page = $_GET['current_page']; 
    }else{
        $current_page = 1; // trường hợp không có ttin trang thì mặc định là 1
    }
    //trường hợp bấm nút trở về trang trước quá trang số 1
    if($current_page < 1){
        $current_page = 1;
    }
    //trường hợp bất nút "trang sau" ở trang cuối
    if($current_page > $total_page){
        $current_page = $total_page;
    }
// tìm chỉ số start
    $start = ($current_page -1) * $limit;

    $sqlAllCat = "SELECT * FROM category C
                    ORDER BY C.cat_id ASC LIMIT $start,$limit";
    $queryAllCat = mysqli_query($conn, $sqlAllCat);
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
									<li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
									  </svg> Đăng xuất</a></li>
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
		<ul class="list-group">
		
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
				<li class="active">Quản lý danh mục</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="add_category.php" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm danh mục
            </a>
        </div>
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table 
									data-toolbar="#toolbar"
									data-toggle="table">
		
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên danh mục</th>
										<th>Hành động</th>
									</tr>
									</thead>
									<tbody>

									<?php
											$sqlAllCategory = "SELECT * FROM category ORDER BY cat_id";
											$queryAllCategory = mysqli_query($conn, $sqlAllCategory);
											if(mysqli_num_rows($queryAllCategory) > 0){
												while ($cate = mysqli_fetch_assoc($queryAllCategory)){	
									  	?>
								
										<tr>
											<td style=""><?php echo $cate['cat_id']; ?></td>
											<td style=""><?php echo $cate['cat_name']; ?></td>
											<td class="form-group">
												<a href="edit_category.php?cat_id=<?php echo $cate['cat_id']; ?>" class="btn btn-secondary"><i class="glyphicon glyphicon-pencil"></i></a>
												<a href="del_category.php?cat_id=<?php echo $cate['cat_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
											
											</a>
											</td>
										</tr>

										<?php
											}
										}
										?>
										
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<nav aria-label="Page navigation example">
								<ul class="pagination">
                                <?php 
                                 if($current_page > 1 && $total_page > 1){
                                    $prev = $current_page -1;
                                    echo '<li class="page-item"><a class="page-link" href="category.php?current_page='.$prev.'">&laquo;</a></li>';
                                 }
                                ?>
                                <?php 
                                 for($i = 1; $i < $total_page; $i++){
                                    if($i == $current_page){
                                        echo '<li class="page-item active"><a class="page-link disable" >'.$i.'</a></li>';
                                    } else{
                                        echo '<li class="page-item"><a class="page-link" href="category.php?current_page='.$i.'">'.$i.'</a></li>';//
                                    }
                                 }
                                ?>

                                <?php 
                                 if($current_page < $total_page && $total_page > 1){
                                    $next = $current_page +1;
                                    echo '<li class="page-item"><a class="page-link" href="category.php?current_page='.$next.'">&raquo;</a></li>';

                                 }
                                ?>
                                
                
                            </ul>
								</nav>
							</div>
						</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>	
</body>

</html>
