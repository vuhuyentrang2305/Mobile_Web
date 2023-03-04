<?php
    include_once ("../config/db.php");
    $sqlAllCategory = "SELECT * FROM category ORDER BY cat_id ASC"; // cbi câu truy vấn
    $queryAllCategory = mysqli_query( $conn, $sqlAllCategory); // thực thi câu truy vấn
    if(isset($_GET['prd_id'])){

        $prd_id = $_GET['prd_id'];
        // lấy thông tin sản phẩm cũ trc khi sửa
        $sqlProductEdit = "SELECT * FROM product WHERE prd_id = $prd_id";
        $queryProductEdit = mysqli_query ($conn, $sqlProductEdit);
        if(mysqli_num_rows($queryProductEdit) > 0){
            $product = mysqli_fetch_assoc($queryProductEdit);
        }else {
            header ("Location: product.php");
        }
        //cập nhật thông tin sản phẩm
     if(isset ($_POST['sbm'])){
        
        if(isset($_POST['prd_name'])){
            $prd_name = $_POST['prd_name'];
        }else{
            $errors['prd_name']= 'Tên sản phẩm không được để trống';
        }
        $prd_price = $_POST['prd_price'];
        $prd_warranty = $_POST['prd_warranty'];
        $prd_accessories = $_POST['prd_accessories'];
        $prd_promotion = $_POST['prd_promotion'];
        if(isset($_POST['prd_new'])){
            $prd_new=$_POST['prd_new'];
       }else{
               $prd_new=0;
       }
        $cat_id = $_POST['cat_id'];
        $prd_status = $_POST['prd_status'];
        if(isset($_POST['prd_featured'])){
            $prd_featured = 1;
        }else{
           $prd_featured = 0;
        }
        $prd_details = $_POST['prd_details'];
        if(isset($_FILES['prd_image']['name'])){
            $prd_image = $_FILES['prd_image']['name'];
            $prd_tmp_image = $_FILES['prd_image'] ['tmp_name'];
            //upload file ảnh
            move_uploaded_file($prd_tmp_image, "images/".$prd_image);
        }else{
            $prd_image = $product['prd_image'];
        }
        $sqlUpdate = "UPDATE product SET
                      prd_name= '$prd_name',
                      prd_price= $prd_price,
                      prd_warranty= $prd_warranty,
                      prd_accessories= '$prd_accessories',
                      prd_promotion= $prd_promotion,
                      prd_new= $prd_new,
                      cat_id = $cat_id,
                      prd_status= $prd_status,
                      prd_featured= $prd_featured,
                      prd_details= '$prd_details',
                      prd_image= '$prd_image'
                      WHERE prd_id = $prd_id";
        // die($sqlUpdate);
        mysqli_query($conn, $sqlUpdate);
        header ("Location: product.php");
    }
}else {
        header ("Location: product.php");
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
			<li class="active1"><a href="admin.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="user.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
			<li><a href="category.php"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
			<li class="active"><a href="product.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm</a></li>
            <li ><a href="order.php"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>Quản lý đơn hàng</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="product.php">Quản lý sản phẩm</a></li>
				<li class="active"><?php  echo $product['prd_name'] ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm: <?php echo $product['prd_name'];?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="prd_name" required value="<?php echo $product['prd_name'] ?>" class="form-control"   placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" name="prd_price" required value="<?php echo $product['prd_price'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input type="text" name="prd_warranty" required value="<?php echo $product['prd_warranty'] ?>" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input type="text" name="prd_accessories" required value="<?php echo $product['prd_accessories'] ?>" class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input type="text" name="prd_promotion" required value="<?php echo $product['prd_promotion'] ?>" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input type="text" name="prd_new" required value="<?php echo $product['prd_new'] ?>" type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="file" name="prd_image" onchange = "preview()" >
                                    <br>
                                    <div>
                                        <img src="images/<?php echo $product['prd_image'];?>" id="prdImage" width="400px" height="390px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id" class="form-control">
                                    <?php 
                                            if (mysqli_num_rows($queryAllCategory)){
                                                while ($cate = mysqli_fetch_assoc($queryAllCategory)){
    
                                     ?>
                                      <option value=<?php echo $cate['cat_id'];?> <?php if($product['cat_id'] == $cate['cat_id']) {echo "selected";} ?>>
                                                <?php echo $cate['cat_name']; ?>       
                                            </option>
                                        <?php
                                              }
                                            }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="prd_status" class="form-control">
                                        <option value=1 <?php if($product['prd_status']==1) {echo 'selected';}?>>Còn hàng</option>
                                        <option value=0 <?php if($product['prd_status']==0 ){echo'selected';}?>>Hết hàng</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" <?php if($product['prd_featured']==1) {echo 'checked';}?>>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea name="prd_details" required class="form-control" rows="3" <?php echo $product['prd_details'];?>></textarea>
                                    </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
    <script>
        function preview() {
            prdImage.src=URL.createObjectURL(event.target.files[0])
    }
    </script>
</body>
</html>