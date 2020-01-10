<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Shop || Hurst</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php require_once('template/head.php'); ?>
	
	</head>
	<body>	
	<?php require_once('template/nav.php'); ?>

	<!-- 資料集區間-->
	<?php
$query = $db->query("SELECT * FROM products Order BY created_at");
$products = $query->fetchAll(PDO::FETCH_ASSOC);
?>

			<!-- HEADING-BANNER START -->
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>旅行好夥伴</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="../index.php">Home</a></li>
										<li>全部商品</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- HEADING-BANNER END -->
			<!-- PRODUCT-AREA START -->
			<div class="product-area pt-80 pb-80 product-style-2">
				<div class="container">
					<!-- Shop-Content End -->
					<div class="shop-content">
						<div class="row">
							<div class="col-md-12">
								<div class="product-option mb-30 clearfix">
									<!-- Categories start -->
									<div class="dropdown floatleft">
										<button class="option-btn" >
										Categories
										</button>
										<div class="dropdown-menu dropdown-width" >
											<!-- Widget-Categories start -->
											<aside class="widget widget-categories">
												<div class="widget-title">
													<h4>Categories</h4>
												</div>
												<div id="cat-treeview"  class="widget-info product-cat boxscrol2">
													<ul class="footer-menu">
													<?php foreach($categories as $category){ 
														 $query = $db->query("SELECT * FROM products WHERE product_categoryID=".$category['product_categoryID']);
													?>
														<li><span>
														<a href="#"><?php echo $category['category']; ?> </a>
														</span>
															
														</li>
													<?php } ?>          
													</ul>
												</div>
											</aside>
											<!-- Widget-categories end -->
										</div>
									</div>	
									<!-- Categories end -->
									
									
								
									<div class="showing text-right">
										<p class="mb-0 hidden-xs">Showing 01-09 of 17 Results</p>
									</div>
								</div>						
							</div>	
							<div class="col-md-12">
								<div class="row">
									<!-- Single-product start -->
									<?php foreach($products as $product){ ?>
									<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
										<div class="single-product">
											<div class="product-img">
											<?php if($product['status'] == 0){ ?>
												<span class="pro-label new-label">new</span>
											<?php }else if($product['status'] == 1){  ?>
												<span class="pro-label sale-label">Sale</span>
										<?php } ?>
												<span class="pro-price-2">$NT <?php echo $product['price']; ?></span>
												<a href="single-product.php?productID=<?php echo $product['productID']; ?>">
													<img src="../uploads/products/<?php echo $product['picture']; ?>" alt="" /></a>
											</div>
											<div class="product-info clearfix text-center">
												<div class="fix">
													<h4 class="post-title"><a href="#"><?php echo $product['name']; ?></a></h4>
												</div>
												<div class="fix">
													<span class="pro-rating">
														<a href="#"><i class="zmdi zmdi-star"></i></a>
														<a href="#"><i class="zmdi zmdi-star"></i></a>
														<a href="#"><i class="zmdi zmdi-star"></i></a>
														<a href="#"><i class="zmdi zmdi-star-half"></i></a>
														<a href="#"><i class="zmdi zmdi-star-half"></i></a>
													</span>
												</div>
												<div class="product-action clearfix">
												<form action="cart/add_cart_demo1.php" method="post">
													<a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
													<a href="#" data-toggle="modal"  data-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
													<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
													<button type="submit"><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i>
													<input type="hidden" value="1" name="quantity" class="cart-plus-minus-box">
													<input type="hidden" name="pic" value="<?php echo $product['picture']; ?>">
													<input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
													<input type="hidden" name="price" value="<?php echo $product['price']; ?>">
													<input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
													</a></button>
													
													
												</form>
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
									<!-- Single-product end -->
									
									
								</div>
							</div>
							<div class="col-md-12">
								<!-- Pagination start -->
								<div class="shop-pagination  text-center">
									<div class="pagination">
										<ul>
											<li><a href="#"><i class="zmdi zmdi-long-arrow-left"></i></a></li>
											<li><a href="#">01</a></li>
											<li class="active"><a href="#">02</a></li>
											<li><a href="#">03</a></li>
											<li><a href="#">04</a></li>
											<li><a href="#">05</a></li>
											<li><a href="#"><i class="zmdi zmdi-long-arrow-right"></i></a></li>
										</ul>
									</div>
								</div>
								<!-- Pagination end -->
							</div>
						</div>
					</div>
					<!-- Shop-Content End -->
				</div>
			</div>
			<!-- PRODUCT-AREA END -->

			<?php require_once('template/footer.php'); ?>

			<div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-labelledby="info" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">訊息</h4>
            </div>
            <div class="modal-body text-center">
                <p class="text-center text-muted">成功更新數量!</p>
                <button type="button" class="btn btn-primary" data-dismiss="modal">確定</button>
            </div>
        </div>
    </div>
</div>      


<?php if(isset($_GET['Existed']) && $_GET['Existed']== "true"){ ?>
     <script>
        $(function(){
            $('.modal-body>p').html('此商品已存在購物車，請至「我的購物車」修改數量。');
            $('#info-modal').modal();            
        });
     </script> 
<?php }else if(isset($_GET['Existed']) && $_GET['Existed']== "false"){ ?>   
     <script>
        $(function(){
            $('.modal-body>p').html('成功加入購物車!');
            $('#info-modal').modal();  
            // 2秒後視窗自動消失   
            setTimeout(function() {
                $('#info-modal').modal('hide');
            }, 2000);       
        });
     </script> 
<?php } ?>
	</body>
</html>
