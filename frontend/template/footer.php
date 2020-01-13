<!-- FOOTER START -->
<footer>
				<!-- Footer-area start -->
				<div class="footer-area footer-3">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
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
										<li><a href="customer-account.php"><i class="zmdi zmdi-dot-circle"></i>會員專區</a></li>
										<li><a href="cart.php"><i class="zmdi zmdi-dot-circle"></i>購物車</a></li>
										<li><a href="order.php"><i class="zmdi zmdi-dot-circle"></i>我的訂單</a></li>
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
							<!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="single-footer">
									<h3 class="footer-title  title-border">Email Newsletters</h3>
									<div class="footer-subscribe">
										<form action="#">
											<input type="text" name="email" placeholder="Email Address..." />
											<button class="button-one submit-btn-4" type="submit" data-text="Subscribe">Subscribe</button>
										</form>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				<!-- Footer-area end -->
				<!-- Copyright-area start -->
				<div class="copyright-area copyright-2">
					<div class="container">
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<div class="copyright">
									<p class="mb-0">僅供教學作業，不做任何商業用途。</p>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12">
								<div class="payment  text-right">
									<a href="#"><img src="../img/payment/1.png" alt="" /></a>
									<a href="#"><img src="../img/payment/2.png" alt="" /></a>
									<a href="#"><img src="../img/payment/3.png" alt="" /></a>
									<a href="#"><img src="../img/payment/4.png" alt="" /></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Copyright-area start -->
			</footer>
			<!-- FOOTER END -->
			
			
		</div>
		<!-- WRAPPER END -->

		<!-- all js here -->
		<!-- jquery latest version -->
		<script src="../js/vendor/jquery-1.12.0.min.js"></script>
		<script src="../js/jquery-ui/jquery-ui.min.js"></script>
		<!-- bootstrap js -->
		<script src="../js/bootstrap.min.js"></script>
		<!-- jquery.meanmenu js -->
		<script src="../js/jquery.meanmenu.js"></script>
		<!-- slick.min js -->
		<script src="../js/slick.min.js"></script>
		<!-- jquery.treeview js -->
		<script src="../js/jquery.treeview.js"></script>
		<!-- lightbox.min js -->
		<script src="../js/lightbox.min.js"></script>
		<!-- jquery-ui js -->
		<script src="../js/jquery-ui.min.js"></script>
		<!-- jquery.nivo.slider js -->
		<script src="../lib/js/jquery.nivo.slider.js"></script>
		<script src="../lib/home.js"></script>
		<!-- jquery.nicescroll.min js -->
		<script src="../js/jquery.nicescroll.min.js"></script>
		<!-- countdon.min js -->
		<script src="../js/countdon.min.js"></script>
		<!-- wow js -->
		<script src="../js/wow.min.js"></script>
		<!-- plugins js -->
		<script src="../js/plugins.js"></script>
		<script src="../js/validator.min.js"></script>
		
		<!-- main js -->
		<script src="../js/main.js"></script>
		<script src="../js/jquery.twzipcode.min.js"></script>
   
