<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Cart</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
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
                    <!--	End Slider	-->

                    <!--	Cart	-->
                    <div id="my-cart">
                        <div class="row">
                            <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
                            <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
                            <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
                        </div>
                        <form method="post">
                            <div class="cart-item row">
                                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                    <img src="images/product/10048388-laptop-macbook-air-m1-13-3-inch-256gb-mgnd3sa-a-vang-01.jpg">
                                    <h4>iPhone Xs Max 2 Sim - 256GB Gold</h4>
                                </div>

                                <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                    <input type="number" id="quantity" class="form-control form-blue quantity" value="1"
                                        min="1">
                                </div>
                                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b>32.990.000đ</b><a href="#"><i class="fa-solid fa-circle-xmark"></i></a></div>
                            </div>
                            <div class="cart-item row">
                                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                    <img src="images/product/10047667-dien-thoai-iphone-12-mini-64gb-xanh-la-1.jpg">
                                    <h4>iPhone Xs Max 2 Sim - 256GB Gold</h4>
                                </div>
                                <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                    <input type="number" id="quantity" class="form-control form-blue quantity" value="1"
                                        min="1">
                                </div>
                                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b>32.990.000đ</b><a
                                        href="#"><i class="fa-solid fa-circle-xmark"></i></a></div>
                            </div>
                
                            <div class="row">
                                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                    <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật
                                        giỏ hàng</button>
                                </div>
                                <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
                                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b>88.970.000đ</b></div>
                            </div>
                        </form>

                    </div>
                    <!--	End Cart	-->

                    <!--	Customer Info	-->
                    <div id="customer">
                        <form method="post">
                            <div class="row">

                                <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Họ và tên (bắt buộc)" type="text" name="name"
                                        class="form-control" required>
                                </div>
                                <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone"
                                        class="form-control" required>
                                </div>
                                <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                                    <input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control"
                                        required>
                                </div>
                                <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                                    <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text"
                                        name="add" class="form-control" required>
                                </div>

                            </div>
                        </form>
                        <div class="row">
                            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                                <a href="#">
                                    <b>Mua ngay</b>
                                    <span>Giao hàng tận nơi siêu tốc</span>
                                </a>
                            </div>
                            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                                <a href="#">
                                    <b>Trả góp Online</b>
                                    <span>Vui lòng call (+84) 03.95.95.4444</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--	End Customer Info	-->

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