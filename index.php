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

		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
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
							<div class="col-sm-4 col-sm-offset-4 col-xs-7">
								<div class="logo text-center">
									<a href="index.php"><img src=" img/logo/logo.png " alt="" /></a>
								</div>
							</div>
							<div class="col-sm-4 col-xs-5">
								<div class="mini-cart text-right">
									<ul>
										<li>
											<a class="cart-icon" href="cart.php">
												<i class="zmdi zmdi-shopping-cart"></i>
												<span><?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) echo count($_SESSION['Cart']); else echo "0"; ?></span>
											</a>
											<div class="mini-cart-brief text-left">
												<div class="cart-items">
													<p class="mb-0">You have <span><?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) echo count($_SESSION['Cart']); else echo "0"; ?> items</span> in your shopping bag</p>
												</div>
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
												
												<div class="cart-totals">
													<h5 class="mb-0">Total <span class="floatright">$NT <?php echo $total_price?></span></h5>
												</div>
												
												<div class="cart-bottom  clearfix">
													<a href="cart.php" class="button-one floatleft text-uppercase" data-text="View cart">View cart</a>
													<a href="#" class="button-one floatright text-uppercase" data-text="Check out">Check out</a>
												</div>
											</div>
										</li>
									</ul>
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
							<li><a href="index.php">home</a></li>
							<li><a href="frontend/shop.php">accesories</a></li>
							<li><a href="frontend/shop.php">lookbook</a></li>
							<li><a href="frontend/blog.php">blog</a></li>
							<li><a href="#">pages</a>
								<div class="sub-menu menu-scroll">
									<ul>
										<li class="menu-title">Page's</li>
										<li><a href="frontend/shop.php">Shop</a></li>
										<li><a href="frontend/single-product.php">Single Product</a></li>
										<li><a href="frontend/cart.php">Shopping Cart</a></li>
										<li><a href="frontend/wishlist.php">Wishlist</a></li>
										<li><a href="frontend/checkout.php">Checkout</a></li>
										<li><a href="frontend/order.php">Order</a></li>
										<li><a href="frontend/login.php">login / Registration</a></li>
										<li><a href="frontend/my-account.php">My Account</a></li>
										<li><a href="frontend/404.php">404</a></li>
										<li><a href="frontend/blog.php">Blog</a></li>
										<li><a href="frontend/single-blog.php">Single Blog</a></li>
										<li><a href="frontend/about.php">About Us</a></li>
										<li><a href="frontend/contact.php">Contact</a></li>
									</ul>
								</div>
							</li>
							<li><a href="frontend/about.php">about us</a></li>
							<li><a href="frontend/contact.php">contact</a></li>
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
										<li><a href="frontend/shop.php">products</a></li>
										<li><a href="frontend/shop.php">accesories</a></li>
										<li><a href="frontend/shop.php">lookbook</a></li>
										<li><a href="frontend/blog.php">blog</a></li>
										<li><a href="#">pages</a>
											<ul>
												<li><a href="frontend/shop.php">Shop</a></li>
												<li><a href="frontend/single-product.php">Single Product</a></li>
												<li><a href="frontend/cart.php">Shopping Cart</a></li>
												<li><a href="frontend/wishlist.php">Wishlist</a></li>
												<li><a href="frontend/checkout.php">Checkout</a></li>
												<li><a href="frontend/order.php">Order</a></li>
												<li><a href="frontend/login.php">login / Registration</a></li>
												<li><a href="frontend/my-account.php">My Account</a></li>
												<li><a href="frontend/404.php">404</a></li>
												<li><a href="frontend/blog.php">Blog</a></li>
												<li><a href="frontend/single-blog.php">Single Blog</a></li>
												<li><a href="frontend/about.php">About Us</a></li>
												<li><a href="frontend/contact.php">Contact</a></li>
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
							<span class="pro-label new-label hidden-md">new</span>
							<span class="price hidden-md">$50.00</span>
							<div class="banner-brief">
								<h2 class="banner-title hidden-md"><a href="#">Product name</a></h2>
								<p class="mb-0 hidden-md">Furniture</p>
							</div>
							<a href="#" class="button-one font-16px" data-text="Buy now">Buy now</a>
						</div>
						<div class="single-banner banner-2">
							<a class="banner-thumb" href="#"><img src="img/banner/2.jpg" alt="" /></a>
							<div class="banner-brief">
								<h2 class="banner-title hidden-md"><a href="#">New Product 2017</a></h2>
								<p class="hidden-md hidden-sm hidden-xs">Lorem Ipsum is simply dummy text of the printing and types sate industry. Lorem Ipsum has been the industry.</p>
								<a href="#" class="button-one font-16px" data-text="Buy now">Buy now</a>
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
												<a href="#" class="button-one style-2 text-uppercase mt-20" data-text="Shop now">Shop now</a>
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
												<h2 class="slider-title3 text-uppercase mb-0" >welcome to our</h2>
											</div>
											<div class="wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0.5s">
												<h2 class="slider-title1 text-uppercase">furniture</h2>
											</div>
											<div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0.5s">
												<p class="slider-pro-brief">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
											</div>
											<div class="wow fadeInUpBig" data-wow-duration="2.5s" data-wow-delay="0.5s">
												<a href="#" class="button-one style-2 text-uppercase mt-20" data-text="Shop now">Shop now</a>
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
						<div class="col-12 col-md-6" >
							<img src="img/index1.jpg" alt="">
						</div>
						<div class="col-12 col-md-6" style="height: 600px;">
							<div class="showcase__column-content">
								<div href="#" class="showcase__column-text" style="word-wrap:break-word;">
									<p class="front">Classics that Stand Apart</p>
									<h4>Joining the Urbo 2 family, introducing classic Navy and Gray. Designed for urban exploring, this city bag fits all your essentials with ease and comfort.</h4>
								</div>
								
								<div class="showcase__sm-image">
									<img src="img/index6.png" alt="" >
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
								<h4 class="footer-title ">Inspired by real journeys</h4>
								<h5 class=" " >Designed for today’s traveler.</h5>
							</div>
						</div>
						<div class=" col-md-4 ">
							<div class="text-center">
								<img src="img/shield.png" alt="">
							</div>
							<div class="three-col__content">
								<h4 class="footer-title ">Premium quality</h4>
								<h5 class=" ">Crafted from the highest-grade materials.</h5>
							</div>
						</div>
						<div class=" col-md-4 ">
							<div class="text-center">
								<img src="img/icon.png" alt="">
							</div>
							<div class="three-col__content">
								<h4 class="footer-title ">Thoughtful innovation</h4>
								<h5 class=" ">Intelligent solutions. Zero gimmicks.</h5>
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
								<h2 class="title-border">Featured Products</h2>
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
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2 class="title-border">From The Blog</h2>
							</div>
						</div>
					</div>
					<!-- Section-title end -->
					<div class="row">
						<!-- Single-blog start -->
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
						</div>
						<!-- Single-blog end -->
						<!-- Single-blog start -->
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
						</div>
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
									<h3 class="footer-title  title-border">Contact Us</h3>
									<ul class="footer-contact">
										<li><span>Address :</span>28 Green Tower, Street Name,<br>New York City, USA</li>
										<li><span>Cell-Phone :</span>012345 - 123456789</li>
										<li><span>Email :</span>your-email@gmail.com</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								<div class="single-footer">
									<h3 class="footer-title  title-border">accounts</h3>
									<ul class="footer-menu">
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>My Account</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>My Wishlist</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>My Cart</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Sign In</a></li>
										<li><a href="#"><i class="zmdi zmdi-dot-circle"></i>Check out</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								<div class="single-footer">
									<h3 class="footer-title  title-border">shipping</h3>
									<ul class="footer-menu">
										<?php foreach($categories as $footer_categories){  ?>
											<li><a href="frontend/shop.php?category_id=<?php echo $footer_categories['product_categoryID']; ?>"><i class="zmdi zmdi-dot-circle"></i>
												<?php echo $footer_categories['category']; ?>
											</li>
										<?php } ?>  </a>
									</ul>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 hidden-sm col-xs-12">
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
								</div>
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
									<p class="mb-0">Copyright <i class="fa fa-copyright"></i> 2018 <span><a href="https://freethemescloud.com/" target="_blank" >Free Themes Cloud</a></span> . All rights reserved. </p>
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