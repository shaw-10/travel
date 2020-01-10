<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Single Product || Hurst</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php require_once('template/head.php'); ?>
		
	</head>
	<body>	
	<?php require_once('template/nav.php'); ?>
	<?php
		$query = $db->query("SELECT * FROM products WHERE productID=".$_GET['productID']);
		$one_product = $query->fetch(PDO::FETCH_ASSOC);
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
										<li><a href="#">luggage</a></li>
										<li>luggage</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- HEADING-BANNER END -->
			<!-- PRODUCT-AREA START -->
			<div class="product-area single-pro-area pt-80 pb-80 product-style-2">
				<div class="container">	
					<div class="row shop-list single-pro-info no-sidebar">
						<!-- Single-product start -->
						<div class="col-lg-12">
							<div class="single-product clearfix">
								<!-- Single-pro-slider Big-photo start -->
								<div class="single-pro-slider single-big-photo view-lightbox slider-for">
									<div>
										<img src="../uploads/products/<?php echo $one_product['picture']; ?>" alt="" />
										<a class="view-full-screen" href="../uploads/products/<?php echo $one_product['picture']; ?>"  data-lightbox="roadtrip" data-title="My caption">
											<i class="zmdi zmdi-zoom-in"></i>
										</a>
									</div>
									<div>
										<img src="../uploads/products/<?php echo $one_product['picture1']; ?>" alt="" />
										<a class="view-full-screen" href="../uploads/products/<?php echo $one_product['picture1']; ?>"  data-lightbox="roadtrip" data-title="My caption">
											<i class="zmdi zmdi-zoom-in"></i>
										</a>
									</div>
									<div>
										<img src="../uploads/products/<?php echo $one_product['picture2']; ?>" alt="" />
										<a class="view-full-screen" href="../uploads/products/<?php echo $one_product['picture2']; ?>"  data-lightbox="roadtrip" data-title="My caption">
											<i class="zmdi zmdi-zoom-in"></i>
										</a>
									</div>

									<div>
										<img src="../uploads/products/<?php echo $one_product['picture3']; ?>" alt="" />
										<a class="view-full-screen" href="../uploads/products/<?php echo $one_product['picture3']; ?>"  data-lightbox="roadtrip" data-title="My caption">
											<i class="zmdi zmdi-zoom-in"></i>
										</a>
									</div>

									<div>
										<img src="../uploads/products/<?php echo $one_product['picture4']; ?>" alt="" />
										<a class="view-full-screen" href="../uploads/products/<?php echo $one_product['picture4']; ?>"  data-lightbox="roadtrip" data-title="My caption">
											<i class="zmdi zmdi-zoom-in"></i>
										</a>
									</div>

									<div>
										<img src="../uploads/products/<?php echo $one_product['picture5']; ?>" alt="" />
										<a class="view-full-screen" href="../uploads/products/<?php echo $one_product['picture5']; ?>"  data-lightbox="roadtrip" data-title="My caption">
											<i class="zmdi zmdi-zoom-in"></i>
										</a>
									</div>
									
								</div>	
								<!-- Single-pro-slider Big-photo end -->								
								<div class="product-info">
									<div class="fix">
										<h4 class="post-title floatleft"><?php echo $one_product['name']; ?></h4>
										<span class="pro-rating floatright">
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star-half"></i></a>
											<a href="#"><i class="zmdi zmdi-star-half"></i></a>
											<span>( 27 Rating )</span>
										</span>
									</div>
									<div class="fix mb-20">
										<span class="pro-price">$NT <?php echo $one_product['price']; ?></span>
									</div>
									<div class="product-description">
										<p>There are many variations of passages of Lorem Ipsum available, but the majority have be suffered alteration in some form, by injected humou or randomised words which donot look even slightly believable. If you are going to use a passage of Lorem Ipsum. </p>
									</div>
									<!-- color start -->								
									<div class="color-filter single-pro-color mb-20 clearfix">
										
									</div>
									<!-- color end -->
									<!-- Size start -->
									<div class="size-filter single-pro-size mb-35 clearfix">
										
										</ul>
									</div>
									<!-- Size end -->
									
									<div class="clearfix btn1">
									<form action="cart/add_cart_demo.php" method="post">
										<div class="cart-plus-minus">
											<input type="text" value="1" min="1" name="quantity" class="cart-plus-minus-box">
										</div>
										
										<div class="product-action clearfix">
											<a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
											<a href="#" data-toggle="modal"  data-target="#productModal" title="Quick View"><i class="zmdi zmdi-zoom-in"></i></a>
											<a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
											<button type="submit"><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a></button>
											<input type="hidden" name="pic" value="<?php echo $one_product['picture']; ?>">
											<input type="hidden" name="product_name" value="<?php echo $one_product['name']; ?>">
											<input type="hidden" name="price" value="<?php echo $one_product['price']; ?>">
											<input type="hidden" name="product_id" value="<?php echo $one_product['productID']; ?>">
										</div>
									</div>
									</form>
									<!-- Single-pro-slider Small-photo start -->
									<div class="single-pro-slider single-sml-photo slider-nav showcase__sm-image">
										<div>
											<img src="../uploads/products/<?php echo $one_product['picture']; ?>" alt="" />
										</div>
										<div>
											<img src="../uploads/products/<?php echo $one_product['picture1']; ?>" alt="" />
										</div>
										<div>
											<img src="../uploads/products/<?php echo $one_product['picture2']; ?>" alt="" />
										</div>
										<div>
											<img src="../uploads/products/<?php echo $one_product['picture3']; ?>" alt="" />
										</div>
										<div>
											<img src="../uploads/products/<?php echo $one_product['picture4']; ?>" alt="" />
										</div>
										<div>
											<img src="../uploads/products/<?php echo $one_product['picture5']; ?>" alt="" />
										</div>
										
									</div>
									<!-- Single-pro-slider Small-photo end -->
								</div>
							</div>
						</div>
						<!-- Single-product end -->
					</div>
				
					
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
