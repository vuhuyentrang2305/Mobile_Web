<?php 
 include_once ("config/db.php");
 if(isset($_GET['prd_id'])){
  $prd_id = $_GET['prd_id'];
  $sqlProductDetail = "SELECT * FROM product WHERE prd_id =$prd_id";
  $queryProductDetail = mysqli_query($conn, $sqlProductDetail);
  if(mysqli_num_rows($queryProductDetail)>0){
    $productDetail = mysqli_fetch_assoc($queryProductDetail);
  }else{
    header("Location: index.php");
  }
 }else{
  header("Location: index.php");
 }
 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Product</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="css/detail.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <div class="pd-wrap">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/product.css">
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
                    </div>
                  
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
                    <!--	End Slider	-->

                    <!--	List Product	-->
            <div class="col-lg-12 col-md-12 col-sm-12">        
                    <div id="product">
                        <div id="product-head" class="row">
                            <div class="container" class="col-lg-12 col-md-12 col-sm-12">
                                <div class="heading-section">
                                    <h2>Product Details</h2>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                
                                  <div class="product-list row">
                                      <img src="images/product/<?php echo $productDetail['prd_image']; ?>" />
                              
                                </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="product-dtl">
                                      <div class="product-info">
                                        <div class="product-name"><?php echo $productDetail['prd_name'];?>  </div>
                                        <div class="reviews-counter">
                                      <div class="rate">
                                          <input type="radio" id="star5" name="rate" value="5" checked />
                                          <label for="star5" title="text">5 stars</label>
                                          <input type="radio" id="star4" name="rate" value="4" checked />
                                          <label for="star4" title="text">4 stars</label>
                                          <input type="radio" id="star3" name="rate" value="3" checked />
                                          <label for="star3" title="text">3 stars</label>
                                          <input type="radio" id="star2" name="rate" value="2" />
                                          <label for="star2" title="text">2 stars</label>
                                          <input type="radio" id="star1" name="rate" value="1" />
                                          <label for="star1" title="text">1 star</label>
                                        </div>
                                      <span>3 Reviews</span>
                                    </div>
                                        <div > <?php echo number_format($productDetail['prd_id'],0,'.','.') ;?><span></span>
                                      </div> 
                                      </div>

                                      <ul>
                              
                                        <li><span>Bảo hành </span><?php echo $productDetail['prd_warranty'];?></li>
                                        <li><span>Đi kèm </span><?php echo $productDetail['prd_accessories'];?></li>
                                        <li><span>Khuyến mại </span><?php echo $productDetail['prd_promotion'];?>%</li>
                                        <li id= "status">
                                          <?php 
                                           if($productDetail['prd_status'] == 1){
                                            echo "Còn hàng";
                                           }else{
                                            echo "Hết hàng";
                                           }
                                          ?>
                                        </li>

                                
                                      </ul>
                                    
                                      <div class="product-count">
                                        <label for="size">Quantity</label>
                                        <form action="#" class="display-flex">
                                        <div class="qtyminus">-</div>
                                        <input type="text" name="quantity" value="1" class="qty">
                                        <div class="qtyplus">+</div>
                                    </form>
                                    <a href="#" class="round-black-btn">Add to Cart</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="product-info-tabs">
                                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Đặc điểm nổi bật</a>
                                  </li>
                                  <!-- <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Thông số kỹ thuật</a>
                                  </li> -->
                                  <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Đánh giá (0)</a>
                                  </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                   <h3>Chi tiết sản phẩm</h3>
                                   <?php echo $productDetail['prd_intro'];?>
                              
                  
                             
                                  </div>
                                  
                                  
                                  <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="review-heading">Đánh giá và nhận xét</div>
                                    <p class="mb-20">There are no reviews yet.</p>
                                    <form class="review-form">
                                        <div class="form-group">
                                          <label>Đánh giá</label>
                                          <div class="reviews-counter">
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                      </div>
                                    </div>
                                        <div class="form-group">
                                          <label>Nhận xét</label>
                                          <textarea class="form-control" rows="10"></textarea>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <input type="text" name="" class="form-control" placeholder="Name*">
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <input type="text" name="" class="form-control" placeholder="Email*">
                                            </div>
                                          </div>
                                        </div>
                                        <button class="round-black-btn">Gửi đánh giá</button>
                                      </form>
                                  </div>
                              </div>
                            </div>
                            
                           
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity=" sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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