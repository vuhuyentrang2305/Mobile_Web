<?php 
 include_once ("config/db.php");
 if(isset($_GET['cat_id'])){
    $cat_id = $_GET['cat_id'];
    $queryCate = mysqli_query($conn, "SELECT * FROM category WHERE cat_id = $cat_id");
    $resultCate = mysqli_fetch_assoc($queryCate);
    $limit = 9;
    $sqlTotalRecords = "SELECT count(prd_id) as total FROM product WHERE cat_id = $cat_id";
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

    $sqlAllProduct = "SELECT * FROM product P
                    INNER JOIN category C
                    ON P.cat_id = C.cat_id
                    WHERE p.cat_id = $cat_id
                    ORDER BY P.prd_id ASC LIMIT $start, $limit";
    $queryAllproduct = mysqli_query($conn, $sqlAllProduct);

 } ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Category</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/category.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body>

    <!--	Header	-->
    <div id="header">
    <!-- Logo -->
          

	<div class="container">
    	<div class="row">
            <div id="logo" class="col-lg-2 col-md-3 col-sm-12">
            	<h1><a href="index.php"><img class="img-fluid" src="images/mainlogo.png"></a></h1>
            </div>
            <div id="search" class="col-lg-4 col-md-1 col-sm-12">
                <form class="form-inline">
                    <input class="form-control mt-3" type="search" placeholder="Tìm kiếm" aria-label="Search">
                    <button class="btn btn-danger mt-3" type="submit">Tìm kiếm</button>
                </form>
            </div>
         
            <div id="cart" class="col-lg-2 col-md-1 col-sm-12">
            	<a class="mt-4 mr-1" href="cart.php">Giỏ hàng
                    <i class="fa-solid fa-cart-shopping cart-icon">
                    <span class="mt-3">8</span></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
    	<span class="navbar-toggler-icon"></span>
    </button>
</div>
<!--	End Header	-->

<!--	Body	-->
<div id="body">
	<div class="container">
    <div class="row">
            <div id = "main" class="col-lg-12 col-md-12 col-sm-12">
                <div id="slide" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                      <li data-target="#slide" data-slide-to="0" class="active"></li>
                      <li data-target="#slide" data-slide-to="1"></li>
                    </ul>
                  
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="images/Screenshot 2022-12-21 052440.png" alt="Webleaners Training">
                      </div>
                      <div class="carousel-item">
                        <img src="images/Screenshot 2022-12-21 055945.png" alt="Webleaners Training">
                     
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#slide" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#slide" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>
                  
                  </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <?php include_once("common/menu.php"); ?>
             
            </div>
                    <!--	List Product	-->
                    <div class="products">
                        <h3> <?php echo $resultCate['cat_name'];?> </h3>
                        <div class="product-list row">
                            <?php 
                             if(mysqli_num_rows($queryAllproduct)){
                                while($product = mysqli_fetch_assoc($queryAllproduct)){

                            ?>
                             <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                                <div class="product-item card text-center">
                                    <a href="product-detail.php?prd_id=<?php echo $product['prd_id'];?>"><img src="images/product/<?php echo $product['prd_image'];?>"></a>
                                    <h4><a href="product-detail.php?prd_id=<?php echo $product['prd_id'];?>"><?php echo $product['prd_name']?></a></h4>
                                    <p>Giá Bán: <span><?php echo number_format($product['prd_price'],0,'.','.'); ?>đ</span></p>
                                </div>
                            </div>

                            <?php 
                            }
                        }
                            ?>
                 
                           
                        </div>
                    </div>
                    <!--	End List Product	-->

                    <div id="pagination">
                        <ul class="pagination">
                        <?php 
                                 if($current_page > 1 && $total_page > 1){
                                    $prev = $current_page -1;
                                    echo '<li class="page-item"><a class="page-link" href="category-product.php?cat_id='.$cat_id.'&current_page="'.$prev.'">&laquo;</a></li>';
                                 }
                                ?>
                                <!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li> -->
                                <?php 
                                 for($i = 1; $i < $total_page; $i++){
                                    if($i == $current_page){
                                        echo '<li class="page-item"><a class="page-link disable" >'.$i.'</a></li>';
                                    } else{
                                        echo '<li class="page-item"><a class="page-link" href="category-product.php?cat_id='.$cat_id.'&current_page='.$i.'">'.$i.'</a></li>';//
                                    }
                                 }
                                ?>

                                <?php 
                                 if($current_page < $total_page && $total_page > 1){
                                    $next = $current_page +1;
                                    echo '<li class="page-item"><a class="page-link" href="category-product.php?cat_id='.$cat_id.'&current_page='.$next.'">&raquo;</a></li>';

                                 }
                                ?>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--	End Body	-->
    <div id="footer-top">
	<div class="container">
    	<div class="row">
        	<div id="logo-2" class="col-lg-3 col-md-6 col-sm-12">
            	<h2><a href="#"><img class="img-footer" src="images/mainlogo.png"></a></h2>
              
            </div>
            <div id="address" class="col-lg-3 col-md-6 col-sm-12">
            	<h3>Địa chỉ</h3>
                <p>Trương Định- Hà Nội</p>
            </div>
            <div id="service" class="col-lg-3 col-md-6 col-sm-12">
            	<h3>Dịch vụ</h3>
            	<p>Chúng tôi chuyên cung cấp những sản phẩm chính hãng từ Apple</p>
            	<p>Giá cả hợp lý- Chất lượng uy tín</p>
                <p>UY TÍN TẠO NIỀM TIN</p>
            </div>
            <div id="hotline" class="col-lg-3 col-md-6 col-sm-12">
            	<h3>Hotline</h3>
            	<p>Phone : (+84) 967007697</p>
                <p>Email: vuhuyentrang@gmail.com</p>
            </div>
        </div>
    </div>
</div>

<!--	Footer	-->
<div id="footer-bottom">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<p>
                    2022 © vuhuyentrangmobile
                </p>
            </div>
        </div>
    </div>
</div>
<!--	End Footer	-->
  
</body>

</html>