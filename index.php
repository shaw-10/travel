<!-- 資料集區間-->
<?php
session_start();
require_once('function/connection.php');
 $query = $db->query("SELECT * FROM products Order BY created_at DESC LIMIT 5");
 $products = $query->fetchALL(PDO::FETCH_ASSOC);
// 產品名稱資料集
$query2 = $db->query("SELECT * FROM product_categories ");
$categories = $query2->fetchALL(PDO::FETCH_ASSOC);

$query3 = $db->query("SELECT * FROM news Order By published_at DESC LIMIT 2");
$news = $query3->fetchALL(PDO::FETCH_ASSOC);
?>

<!-- END 資料集區間-->

<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Home || Hurst</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="img/Tripcom.ico">
		<!-- Place favicon.ico in the root directory -->

		<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- animate css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- jquery-ui.min css -->
		<link rel="stylesheet" href="css/jquery-ui.min.css">
		<!-- meanmenu css -->
		<link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- nivo-slider css -->
		<link rel="stylesheet" href="lib/css/nivo-slider.css">
		<link rel="stylesheet" href="lib/css/preview.css">
		<!-- slick css -->
		<link rel="stylesheet" href="css/slick.css">
		<!-- lightbox css -->
		<link rel="stylesheet" href="css/lightbox.min.css">
		<!-- material-design-iconic-font css -->
		<link rel="stylesheet" href="css/material-design-iconic-font.css">
		<!-- All common css of theme -->
		<link rel="stylesheet" href="css/default.css">
		<!-- style css -->
		<link rel="stylesheet" href="style.css">
        <!-- shortcode css -->
        <link rel="stylesheet" href="css/shortcode.css">
		<!-- responsive css -->
		<link rel="stylesheet" href="css/responsive.css">
		<!-- modernizr css -->
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
	</head>
	<body>
		<!-- WRAPPER START -->
		<div class="wrapper">

			<!-- Mobile-header-top Start -->
			<div class="mobile-header-top hidden-lg hidden-md hidden-sm">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<!-- header-search-mobile start -->
							<div class="header-search-mobile">
								<div class="table">
									<div class="table-cell">
										<ul>
											<li><a class="search-open" href="#"><i class="zmdi zmdi-search"></i></a></li>
											<li><a href="login.php"><i class="zmdi zmdi-lock"></i></a></li>
											<li><a href="my-account.php"><i class="zmdi zmdi-account"></i></a></li>
											<li><a href="wishlist.php"><i class="zmdi zmdi-favorite"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- header-search-mobile start -->
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile-header-top End -->
			<!-- HEADER-AREA START -->
			<header id="sticky-menu" class="header">
				<div class="header-area">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4 col-xs-12">
								<div class="logo text-center" style="width=80px;">
									<a href="index.php"><img src=" img/logo/logo3.png " style="width=80px;" alt="" /></a>
								</div>
							</div>
							<div class="col-sm-4 col-xs-12">
								<div class="mini-cart text-right">
									<ul>
									<?php if(isset($_SESSION['member']) && $_SESSION['member'] !=null) { ?>
										<li><?php echo $_SESSION['member']['name']?>您好　<a href="frontend/customer-account.php" >會員專區 </a><span>|</span></li>
										<li>
											<a href="frontend/logout.php"><i class="fa fa-sign-out"></i> 登出</a>
										</li>
									<?php }else{ ?>
										<li><a href="#" data-toggle="modal" data-target="#login-modal">會員登入 </a><span>|</span>
										</li>
										<li><a href="frontend/login.php?url=add">加入會員 </a><span>|</span>
										</li>
									<?php } ?>
										<li><a href="frontend/contact.php">聯絡我們</a></li>
										
										<li>
											<a class="cart-icon" href="cart.php">
												<i class="zmdi zmdi-shopping-cart"></i>
												<span><?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) echo count($_SESSION['Cart']); else echo "0"; ?></span>
											</a>
											
											<div class="mini-cart-brief text-left">
												<div class="cart-items">
												<p class="mb-0">購物車內 <span><?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) echo count($_SESSION['Cart']); else echo "0"; ?>件 </span> 商品</p>
												</div>
												<?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) {?>>
												<div class="all-cart-product clearfix">
												<?php 
													$total_price = 0;
													for($i = 0; $i < count($_SESSION['Cart']); $i++){ 
												?>
														
													<div class="single-cart clearfix">
														<div class="cart-photo">
															<a href="#"><img src="../uploads/products/<?php echo $_SESSION['Cart'][$i]['pic'] ?>" alt="" /></a>
														</div>
														<div class="cart-info">
															<h5><a href="#"><?php echo $_SESSION['Cart'][$i]['product_name'] ?></a></h5>
															<p class="mb-0">Price : $NT <?php echo $_SESSION['Cart'][$i]['price'] ?></p>
															<p class="mb-0">Qty : <?php echo $_SESSION['Cart'][$i]['quantity'] ?> </p>
															<p class="mb-0">Total : $NT <?php $sub_total = $_SESSION['Cart'][$i]['quantity']*$_SESSION['Cart'][$i]['price']; echo $sub_total;?> </p>
															<span class="cart-delete"><a href="cart/test_delete.php?index=<?php echo $i; ?>"><i class="zmdi zmdi-close"></i></a></span>
														</div>
													</div>
													<?php $total_price += $sub_total;
														} 
														$_SESSION['order']['sub_total'] = $total_price;
                                   	 					$_SESSION['order']['total_price'] = $total_price;
														?>
												</div>
												<?php } else{ 
												$total_price = 0; ?>
												<div class="cart-items">
												<p class="mb-0">目前購物車沒有商品，請至<a href="shop_f.php">產品專區</a>進行購物。</p> 
												</div>        
												<?php } ?>
												<div class="cart-totals">
													<h5 class="mb-0">Total <span class="floatright">$NT <?php echo $total_price?></span></h5>
												</div>
												
												<div class="cart-bottom  clearfix">
													<a href="frontend/cart.php" class="button-one floatright text-uppercase" data-text="View cart">View cart</a>
													<!-- <a href="#" class="button-one floatright text-uppercase" data-text="Check out">Check out</a> -->
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
						<div class="modal-dialog modal-sm">

							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="Login">會員登入</h4>
								</div>
								<div class="modal-body">
									<form action="frontend/member_login.php" method="post">
										<div class="form-group">
											<input type="text" class="form-control" id="account" placeholder="email" name="account">
										</div>
										<div class="form-group">
											<input type="password" class="form-control" id="password" placeholder="password" name="password">
										</div>
										

										<p class="text-center">
											<button class="btn btn-primary"><i class="fa fa-sign-in"></i> 登入</button>
										</p>

									</form>

									<p class="text-center text-muted">尚未註冊會員?</p>
									<p class="text-center text-muted"><a href="frontend/login.php"><strong>立即註冊</strong></a>! 1分鐘立即註冊即可領取百元購物金 !</p>

								</div>
							</div>
						</div>
       				</div>
				</div>
				<!-- MAIN-MENU START -->
				<div class="menu-toggle hamburger hamburger--emphatic hidden-xs">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
				<div class="main-menu  hidden-xs">
				<nav>
						<ul>
							<li><a href="../index.php">home</a></li>
							<li><a href="#">商品</a>
								<div class="sub-menu menu-scroll">
										
									<ul>
									
										<li class="menu-title">商品們</li>
										<li><a href="frontend/shop_f.php">All</li>
										<?php foreach($categories as $product_categories){  ?>
										<li><a href="frontend/shop.php?category_id=<?php echo $product_categories['product_categoryID']; ?>"><?php echo $product_categories['category']; ?></a></li>
										<!-- <li><a href="shop.php">Bags</a></li>
										<li><a href="blog.php">Accessories</a></li> -->
									<?php } ?>
									</ul>
								
								</div>
							</li>
=							<li><a href="frontend/about.php">關於我們</a></li>
							<li><a href="frontend/contact.php">連絡我們</a></li>
							<li><a href="frontend/customer-account.php">會員中心</a>
								<div class="sub-menu menu-scroll">
										
									<ul>
										<li class="menu-title">會員中心</li>
										<li><a href="frontend/customer-account.php"><i class="zmdi zmdi-dot-circle"></i>會員專區</a></li>
										<li><a href="frontend/cart.php"><i class="zmdi zmdi-dot-circle"></i>購物車</a></li>
										<li><a href="frontend/order.php"><i class="zmdi zmdi-dot-circle"></i>我的訂單</a></li>
									</ul>
								
								</div>
							</li>
						</ul>
					</nav>
				</div>
				<!-- MAIN-MENU END -->
			</header>
			<!-- HEADER-AREA END -->
			<!-- Mobile-menu start -->
			<div class="mobile-menu-area">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 hidden-lg hidden-md hidden-sm">
							<div class="mobile-menu">
								<nav id="dropdown">
									<ul>
										<li><a href="index.php">home</a></li>
										<li><a href="#">shop</a>
											<ul>
=												<li class="menu-title">shop's</li>
												<?php foreach($categories as $product_categories){  ?>
												<li><a href="shop.php?category_id=<?php echo $product_categories['product_categoryID']; ?>"><?php echo $product_categories['category']; ?></a></li>
												<!-- <li><a href="shop.php">Bags</a></li>
												<li><a href="blog.php">Accessories</a></li> -->
											<?php } ?>
											</ul>
										</li>
										<li><a href="frontend/about.php">about us</a></li>
										<li><a href="frontend/contact.php">contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile-menu end -->
			<!-- SLIDER-BANNER-AREA START -->
			<section class="slider-banner-area clearfix">
				<!-- Sidebar-social-media start -->
				<div class="sidebar-social hidden-xs">
					<div class="table">
						<div class="table-cell">
							<ul>
								<li><a href="#" target="_blank" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>
								<li><a href="#" target="_blank" title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>
								<li><a href="#" target="_blank" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>
								<li><a href="#" target="_blank" title="Linkedin"><i class="zmdi zmdi-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Sidebar-social-media start -->
				<div class="banner-left floatleft">
					<!-- Slider-banner start -->
					<div class="slider-banner">
						<div class="single-banner banner-1">
							<a class="banner-thumb" href="#"><img src="img/banner/1.jpg" alt="" /></a>
							<span class="price hidden-md">$NT 1500</span>
							<div class="banner-brief">
								<h2 class="banner-title hidden-md"><a href="#">Urbo 2 都市包</a></h2>
								<p class="mb-0 hidden-md"></p>
							</div>
							<a href="#" class="button-one font-16px" data-text="Buy now">馬上購買</a>
						</div>
						<div class="single-banner banner-2">
						<span class="pro-label new-label hidden-md">new</span>
							<a class="banner-thumb" href="#"><img src="img/banner/2.jpg" alt="" /></a>
							<div class="banner-brief">
								<h2 class="banner-title hidden-md"><a href="#"></a></h2>
								<p class="hidden-md hidden-sm hidden-xs">以自己喜歡的方式安排必需品，同時使所有事情都唾手可得。</p>
								<a href="#" class="button-one font-16px" data-text="Buy now">馬上購買</a>
							</div>
						</div>
					</div>
					<!-- Slider-banner end -->
				</div>
				<div class="slider-right floatleft">
					<!-- Slider-area start -->
					<div class="slider-area">
						<div class="bend niceties preview-2">
							<div id="ensign-nivoslider" class="slides">
								<img src="img/slider/slider-1/1.jpg" alt="" title="#slider-direction-1"  />
								<img src="img/slider/slider-1/2.jpg" alt="" title="#slider-direction-2"  />
								<img src="img/slider/slider-1/3.jpg" alt="" title="#slider-direction-3"  />
							</div>
							<!-- direction 1 -->
							<div id="slider-direction-1" class="t-cn slider-direction">
								<div class="slider-progress"></div>
								<div class="slider-content t-lfl s-tb slider-1">
									<div class="title-container s-tb-c title-compress">
										<div class="layer-1">
											<div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
												<h2 class="slider-title3 text-uppercase mb-0" >welcome to our</h2>
											</div>
											<div class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="1.5s">
												<h2 class="slider-title1 text-uppercase mb-0">furniture</h2>
											</div>
											<div class="wow fadeIn" data-wow-duration="2s" data-wow-delay="2.5s">
												<h3 class="slider-title2 text-uppercase" >gallery 2017</h3>
											</div>
											<div class="wow fadeIn" data-wow-duration="2.5s" data-wow-delay="3.5s">
												<a href="#" class="button-one style-2 text-uppercase mt-20" data-text="Shop now">馬上購買</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- direction 2 -->
							<div id="slider-direction-2" class="slider-direction">
								<div class="slider-progress"></div>
								<div class="slider-content t-lfl s-tb slider-1">
									<div class="title-container s-tb-c title-compress">
										<div class="layer-1">
											<div class="wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.5s">
												<h2 class="slider-title3 text-uppercase mb-0" >加入Urbo 2家族 </h2>
											</div>
											<div class="wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0.5s">
												<h2 class="slider-title1 text-uppercase">經典的海軍和灰色</h2>
											</div>
											<div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0.5s">
												<p class="slider-pro-brief">專為城市探索而設計，這款城市包輕鬆舒適地滿足您的所有必需品。</p>
											</div>
											<div class="wow fadeInUpBig" data-wow-duration="2.5s" data-wow-delay="0.5s">
												<a href="#" class="button-one style-2 text-uppercase mt-20" data-text="Shop now">查    看</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- direction 3 -->
							<div id="slider-direction-3" class="slider-direction">
								<div class="slider-progress"></div>
								<div class="slider-content t-lfl s-tb slider-1">
									<div class="title-container s-tb-c title-compress">
										<div class="layer-1">
											<div class="wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.5s">
												<h2 class="slider-title3 text-uppercase mb-0" >welcome to our</h2>
											</div>
											<div class="wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0.5s">
												<h2 class="slider-title1 text-uppercase mb-0">furniture</h2>
											</div>
											<div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0.5s">
												<h3 class="slider-title2 text-uppercase" >gallery 2017</h3>
											</div>
											<div class="wow fadeInUpBig" data-wow-duration="2.5s" data-wow-delay="0.5s">
												<p class="slider-pro-brief">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
											</div>
											<div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
												<a href="#" class="button-one style-2 text-uppercase mt-20" data-text="Shop now">Shop now</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Slider-area end -->
				</div>
				<!-- Sidebar-social-media start -->
				<div class="sidebar-account hidden-xs">
					<div class="table">
						<div class="table-cell">
							<ul>
								<li><a class="search-open" href="#" title="Search"><i class="zmdi zmdi-search"></i></a></li>
								<li><a href="#" title="Login"><i class="zmdi zmdi-lock"></i></a>
									<div class="customer-login text-left">
										<form action="#">
											<h4 class="title-1 title-border text-uppercase mb-30">Registered customers</h4>
											<p class="text-gray">If you have an account with us, Please login!</p>
											<input type="text" name="email" placeholder="Email here..." />
											<input type="password" placeholder="Password" />
											<p><a class="text-gray" href="#">Forget your password?</a></p>
											<button class="button-one submit-button mt-15" data-text="login" type="submit">login</button>
										</form>
									</div>
								</li>
								<li><a href="frontend/my-account.php" title="My-Account"><i class="zmdi zmdi-account"></i></a></li>
								<li><a href="frontend/wishlist.php" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Sidebar-social-media start -->
			</section>
			<!-- End Slider-section -->
			<!-- sidebar-search Start -->
			<div class="sidebar-search animated slideOutUp">
				<div class="table">
					<div class="table-cell">
						<div class="container">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2 p-0">
									<div class="search-form-wrap">
										<button class="close-search"><i class="zmdi zmdi-close"></i></button>
										<form action="#">
											<input type="text" placeholder="Search here..." />
											<button class="search-button" type="submit">
												<i class="zmdi zmdi-search"></i>
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- sidebar-search End -->
			<!-- PRODUCT-AREA START -->
			<div class="product-area pt-80 pb-35" style="padding-bottom: 90px;">
				<div class="container">
					<div class="row">
					<div class="col-sm-12 col-xs-12">
						<div class="col-12 col-md-6" >
							<img src="img/index1.jpg" alt="">
						</div>
						<div class="col-12 col-md-6" style="height: 600px;">
							<div class="showcase__column-content">
								<div href="#" class="showcase__column-text" style="word-wrap:break-word;">
									<p class="front" style="line-height:30px;">準備一個包包來裝重要的行李吧</p>
									<h4> 考量行李的量與移動方式，選擇適切旅行方式的包包吧。如果打算多買伴手禮，估計回程行李量較多時，建議購買稍微大一點的包款比較放心。</h4>
								</div>
								
								<div class="showcase__sm-image">
									<img src="img/index6.png" alt="" >
								</div>
							</div>
							
						</div>
					</div>						
					</div>
				</div>
			</div>
			<!-- PRODUCT-AREA END -->
			<!-- DISCOUNT-PRODUCT START -->
			<div class="three-col-wrapper front-page-section" style="background-color: #F2F2F2;">
				<div class="container" style="padding-left: 40px; padding-right: 40px;">
					<div class="row">
						<div class=" col-md-4 ">
							<div class="text-center">
								<img src="img/airplane.png" alt="">
							</div>
							<div class="three-col__content">
								<h4 class="footer-title ">真實旅程的啟發</h4>
								<h5 class=" " >專為旅行者設計</h5>
							</div>
						</div>
						<div class=" col-md-4 ">
							<div class="text-center">
								<img src="img/shield.png" alt="">
							</div>
							<div class="three-col__content">
								<h4 class="footer-title ">優良品質</h4>
								<h5 class=" ">由最高等級的材料製成</h5>
							</div>
						</div>
						<div class=" col-md-4 ">
							<div class="text-center">
								<img src="img/icon.png" alt="">
							</div>
							<div class="three-col__content">
								<h4 class="footer-title ">周到的服務</h4>
								<h5 class=" ">安心的保證</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- DISCOUNT-PRODUCT END -->
			<!-- PRODUCT-AREA START -->
			<div class="product-area pt-80 pb-35">
				<div class="container">
					<!-- Section-title start -->
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2 class="title-border">熱門產品</h2>
							</div>
						</div>
					</div>
					<!-- Section-title end -->
					
					<div class="row cus-row-30">
						<div class="product-slider arrow-left-right">
							<!-- Single-product start -->
							<?php foreach($products as $product){ ?>
							<div class="single-product col-lg-12">
								<div class="product-img">
									<?php if($product['status'] == 0){ ?>
										<span class="pro-label new-label">new</span>
									<?php }else if($product['status'] == 1){  ?>
										<span class="pro-label sale-label">Sale</span>
									<?php } ?>
									<a href="frontend/single-product.php?productID=<?php echo $product['productID']; ?>">
										<img src="uploads/products/<?php echo $product['picture']; ?>" alt="" /></a>
									
								</div>
								<div class="product-info clearfix">
									<div class="fix">
										<h4 class="post-title floatleft"><a href="frontend/single-product.php?productID=<?php echo $product['productID']; ?>"><?php echo $product['name']; ?></a></h4>
										<p class="floatright hidden-sm hidden-xs">Furniture</p>
									</div>
									<div class="fix">
										<span class="pro-price floatleft">$NT <?php echo $product['price']; ?></span>
										<span class="pro-rating floatright">
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star-half"></i></a>
											<a href="#"><i class="zmdi zmdi-star-half"></i></a>
										</span>
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- Single-product end -->
							
						</div>
					</div>
				
				</div>
			</div>
			<!-- PRODUCT-AREA END -->
			<!-- BLGO-AREA START -->
			<div class="blog-area pt-55">
				<div class="container">
					<!-- Section-title start -->
					<!-- <div class="row">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2 class="title-border">From The Blog</h2>
							</div>
						</div>
					</div> -->
					<!-- Section-title end -->
					<div class="row">
						<!-- Single-blog start -->
						<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="single-blog mt-30">
								<div class="row">
									<div class="col-lg-6 col-md-7 col-sm-7 col-xs-12">
										<div class="blog-info">
											<div class="post-meta fix">
												<div class="post-date floatleft"><span class="text-dark-red">30</span></div>
												<div class="post-year floatleft">
													<p class="text-uppercase text-dark-red mb-0">June, 2017</p>
													<h4 class="post-title"><a href="#" tabindex="0">Farniture drawing 2017</a></h4>
												</div>
											</div>
											<div class="like-share fix">
												<a href="#"><i class="zmdi zmdi-favorite"></i><span>89 Like</span></a>
												<a href="#"><i class="zmdi zmdi-comments"></i><span>59 Comments</span></a>
												<a href="#"><i class="zmdi zmdi-share"></i><span>29 Share</span></a>
											</div>
											<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered If you are going to use a passage  Lorem Ipsum, you alteration in some form.</p>
											<a href="#" class="button-2 text-dark-red">Read more...</a>
										</div>
									</div>
									<div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
										<div class="blog-photo">
											<a href="#"><img src="img/blog/1.jpg" alt="" /></a>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!-- Single-blog end -->
						<!-- Single-blog start -->
						<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="single-blog mt-30">
								<div class="row">
									<div class="col-lg-6 col-md-7 col-sm-7 col-xs-12">
										<div class="blog-info">
											<div class="post-meta fix">
												<div class="post-date floatleft"><span class="text-dark-red">30</span></div>
												<div class="post-year floatleft">
													<p class="text-uppercase text-dark-red mb-0">June, 2017</p>
													<h4 class="post-title"><a href="#" tabindex="0">Farniture drawing 2017</a></h4>
												</div>
											</div>
											<div class="like-share fix">
												<a href="#"><i class="zmdi zmdi-favorite"></i><span>89 Like</span></a>
												<a href="#"><i class="zmdi zmdi-comments"></i><span>59 Comments</span></a>
												<a href="#"><i class="zmdi zmdi-share"></i><span>29 Share</span></a>
											</div>
											<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered If you are going to use a passage  Lorem Ipsum, you alteration in some form.</p>
											<a href="#" class="button-2 text-dark-red">Read more...</a>
										</div>
									</div>
									<div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
										<div class="blog-photo">
											<a href="#"><img src="img/blog/2.jpg" alt="" /></a>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!-- Single-blog end -->
					</div>
				</div>
			</div>
			<!-- BLGO-AREA END -->
			<!-- SUBSCRIVE-AREA START -->
			<div class="subscribe-area pt-80">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="subscribe">
								<form action="#">
									<input type="text" placeholder="Enter your email address"/>
									<button class="submit-button submit-btn-2 button-one" data-text="subscribe" type="submit" >subscribe</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- SUBSCRIVE-AREA END -->
			<!-- FOOTER START -->
			<footer>
				<!-- Footer-area start -->
				<div class="footer-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="single-footer">
									<h3 class="footer-title  title-border">聯絡我們</h3>
									<ul class="footer-contact">
										<li><span>地址 :</span>新北市鶯歌區<br></li>
										<li><span>連絡電話 :</span>012345 - 123456789</li>
										<li><span>Email :</span>oooxxx12345email@gmail.com</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								<div class="single-footer">
									<h3 class="footer-title  title-border">會員中心</h3>
									<ul class="footer-menu">
										<li><a href="frontend/customer-account.php"><i class="zmdi zmdi-dot-circle"></i>會員專區</a></li>
										<li><a href="frontend/cart.php"><i class="zmdi zmdi-dot-circle"></i>購物車</a></li>
										<li><a href="frontend/order.php"><i class="zmdi zmdi-dot-circle"></i>我的訂單</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								<div class="single-footer">
									<h3 class="footer-title  title-border">商品分類</h3>
									<ul class="footer-menu">
										<?php foreach($categories as $footer_categories){  ?>
											<li><a href="frontend/shop.php?category_id=<?php echo $footer_categories['product_categoryID']; ?>"><i class="zmdi zmdi-dot-circle"></i>
												<?php echo $footer_categories['category']; ?>
											</li>
										<?php } ?>  </a>
									</ul>
								</div>
							</div>
							<!-- <div class="col-lg-4 col-md-4 hidden-sm col-xs-12">
								<div class="single-footer">
									<h3 class="footer-title  title-border">your choice Products</h3>
									<div class="footer-product">
										<div class="row">
											<div class="col-sm-6 col-xs-12">
												<div class="footer-thumb">
													<a href="#"><img src="img/footer/1.jpg" alt="" /></a>
													<div class="footer-thumb-info">
														<p><a href="#">Furniture Product<br>Name</a></p>
														<h4 class="price-3">$ 60.00</h4>
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-xs-12">
												<div class="footer-thumb">
													<a href="#"><img src="img/footer/1.jpg" alt="" /></a>
													<div class="footer-thumb-info">
														<p><a href="#">Furniture Product<br>Name</a></p>
														<h4 class="price-3">$ 60.00</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
				<!-- Footer-area end -->
				<!-- Copyright-area start -->
				<div class="copyright-area">
					<div class="container">
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<div class="copyright">
									<p class="mb-0">僅供教學作業，不做任何商業用途。</p>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12">
								<div class="payment  text-right">
									<a href="#"><img src="img/payment/1.png" alt="" /></a>
									<a href="#"><img src="img/payment/2.png" alt="" /></a>
									<a href="#"><img src="img/payment/3.png" alt="" /></a>
									<a href="#"><img src="img/payment/4.png" alt="" /></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Copyright-area start -->
			</footer>
			<!-- FOOTER END -->
			<!-- QUICKVIEW PRODUCT -->
			<div id="quickview-wrapper">
			   <!-- Modal -->
			   <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<div class="modal-product">
									<div class="product-images">
										<div class="main-image images">
											<img alt="#" src="img/product/quickview-photo.jpg"/>
										</div>
									</div><!-- .product-images -->

									<div class="product-info">
										<h1>Aenean eu tristique</h1>
										<div class="price-box-3">
											<hr />
											<div class="s-price-box">
												<span class="new-price">$160.00</span>
												<span class="old-price">$190.00</span>
											</div>
											<hr />
										</div>
										<a href="frontend/shop.php" class="see-all">See all features</a>
										<div class="quick-add-to-cart">
											<form method="post" class="cart">
												<div class="numbers-row">
													<input type="number" id="french-hens" value="3">
												</div>
												<button class="single_add_to_cart_button" type="submit">Add to cart</button>
											</form>
										</div>
										<div class="quick-desc">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
										</div>
										<div class="social-sharing">
											<div class="widget widget_socialsharing_widget">
												<h3 class="widget-title-modal">Share this product</h3>
												<ul class="social-icons">
													<li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="zmdi zmdi-google-plus"></i></a></li>
													<li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="zmdi zmdi-twitter"></i></a></li>
													<li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="zmdi zmdi-facebook"></i></a></li>
													<li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
												</ul>
											</div>
										</div>
									</div><!-- .product-info -->
								</div><!-- .modal-product -->
							</div><!-- .modal-body -->
						</div><!-- .modal-content -->
					</div><!-- .modal-dialog -->
			   </div>
			   <!-- END Modal -->
			</div>
			<!-- END QUICKVIEW PRODUCT -->

		</div>
		<!-- WRAPPER END -->

		<!-- all js here -->
		<!-- jquery latest version -->
		<script src="js/vendor/jquery-1.12.0.min.js"></script>
		<!-- bootstrap js -->
		<script src="js/bootstrap.min.js"></script>
		<!-- jquery.meanmenu js -->
		<script src="js/jquery.meanmenu.js"></script>
		<!-- slick.min js -->
		<script src="js/slick.min.js"></script>
		<!-- jquery.treeview js -->
		<script src="js/jquery.treeview.js"></script>
		<!-- lightbox.min js -->
		<script src="js/lightbox.min.js"></script>
		<!-- jquery-ui js -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- jquery.nivo.slider js -->
		<script src="lib/js/jquery.nivo.slider.js"></script>
		<script src="lib/home.js"></script>
		<!-- jquery.nicescroll.min js -->
		<script src="js/jquery.nicescroll.min.js"></script>
		<!-- countdon.min js -->
		<script src="js/countdon.min.js"></script>
		<!-- wow js -->
		<script src="js/wow.min.js"></script>
		<!-- plugins js -->
		<script src="js/plugins.js"></script>
		<!-- main js -->
		<script src="js/main.js"></script>
	</body>
</html>
