<?php
if(!isset($_SESSION)){
session_start();
}
require_once('../function/connection.php');
$query = $db->query("SELECT * FROM product_categories ");
$categories = $query->fetchALL(PDO::FETCH_ASSOC);
?>

		<!-- WRAPPER START -->
		<div class="wrapper bg-dark-white">

			<!-- HEADER-AREA START -->
			<header id="sticky-menu" class="header header-2">
				<div class="header-area">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4 col-xs-7">
								<div class="logo text-center">
									<a href="../index.php"><img src="../img/logo/logo3.png" alt="" /></a>
								</div>
							</div>
							<div class="col-sm-4 col-xs-12">
								<div class="mini-cart text-right">
									<ul>
									<?php if(isset($_SESSION['member']) && $_SESSION['member'] !=null) { ?>
										<li><?php echo $_SESSION['member']['name']?>您好　<a href="customer-account.php" >會員專區 </a><span>|</span></li>
										<li>
											<a href="logout.php"><i class="fa fa-sign-out"></i> 登出</a><span>|</span>
										</li>
									<?php }else{ ?>
										<li><a href="#" data-toggle="modal" data-target="#login-modal">會員登入 </a><span>|</span>
										</li>
										<li><a href="login.php?url=add">加入會員 </a><span>|</span>
										</li>
									<?php } ?>
										<li><a href="contact.php">聯絡我們</a></li>
										
										<li>
											<a class="cart-icon" href="cart.php">
												<i class="zmdi zmdi-shopping-cart"></i>
												<span><?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) echo count($_SESSION['Cart']); else echo "0"; ?></span>
											</a>
											
											<div class="mini-cart-brief text-left">
												<div class="cart-items">
													<p class="mb-0">You have <span><?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) echo count($_SESSION['Cart']); else echo "0"; ?> items</span> in your shopping bag</p>
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
													<a href="cart.php" class="button-one floatright text-uppercase" data-text="View cart">View cart</a>
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
									<form action="member_login.php" method="post">
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
									<p class="text-center text-muted"><a href="register.php"><strong>立即註冊</strong></a>! 1分鐘立即註冊即可領取百元購物金 !</p>

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
							<li><a href="#">shop</a>
								<div class="sub-menu menu-scroll">
										
									<ul>
									
										<li class="menu-title">shop's</li>
										<li class="menu-title"><a href="shop_f.php">All</li>
										<?php foreach($categories as $product_categories){  ?>
										<li><a href="shop.php?category_id=<?php echo $product_categories['product_categoryID']; ?>"><?php echo $product_categories['category']; ?></a></li>
										<!-- <li><a href="shop.php">Bags</a></li>
										<li><a href="blog.php">Accessories</a></li> -->
									<?php } ?>
									</ul>
								
								</div>
							</li>
							<li><a href="about.php">about us</a></li>
							<li><a href="contact.php">contact</a></li>
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
										<li><a href="../index.php">home</a></li>
										<li><a href="shop.php">products</a></li>
										<li><a href="shop.php">accesories</a></li>
										<li><a href="shop.php">lookbook</a></li>
										<li><a href="blog.php">blog</a></li>
										<li><a href="#">pages</a>
											<ul>
												<li><a href="shop.php">Shop</a></li>
												<li><a href="single-product.php">Single Product</a></li>
												<li><a href="cart.php">Shopping Cart</a></li>
												<li><a href="wishlist.php">Wishlist</a></li>
												<li><a href="checkout.php">Checkout</a></li>
												<li><a href="order.php">Order</a></li>
												<li><a href="login.php">login / Registration</a></li>
												<li><a href="my-account.php">My Account</a></li>
												<li><a href="404.php">404</a></li>
												<li><a href="blog.php">Blog</a></li>
												<li><a href="single-blog.php">Single Blog</a></li>
												<li><a href="about.php">About Us</a></li>
												<li><a href="contact.php">Contact</a></li>
											</ul>
										</li>
										<li><a href="about.php">about us</a></li>
										<li><a href="contact.php">contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile-menu end -->