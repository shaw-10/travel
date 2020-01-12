

<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Shopping Cart || Hurst</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php require_once('template/head.php'); ?>
		
	</head>
	<body>	
	<?php require_once('template/nav.php'); ?>
	<?php
		$is_updated = "false";
		if(isset($_POST['quantity']) && $_POST['quantity'] != null){
			for($i = 0; $i < count($_SESSION['Cart']); $i++){
				$_SESSION['Cart'][$i]['quantity'] = $_POST['quantity'][$i];
			}
			$is_updated = "true";
		}
	?>
			<!-- HEADING-BANNER START -->
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>購物車</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="../index.php">Home</a></li>
										<li>購物車</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- HEADING-BANNER END -->
			<!-- SHOPPING-CART-AREA START -->
			<div class="shopping-cart-area  pt-80 pb-80">
				<div class="container">	
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="shopping-cart">
								<!-- Nav tabs -->
								<ul class="cart-page-menu row clearfix mb-30">
									<li class="active"><a href="#shopping-cart" >購物車</a></li>
									<li style="user-select: none;"><a href="#" disabled="disabled">填寫資料</a></li>
									<li class="disabled"><a href="#"disabled="disabled" >訂單完成</a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<!-- shopping-cart start -->
									
									<div class="tab-pane active" id="shopping-cart">
										<form action="cart.php" method="post">
										<?php if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null) {?>>
											<div class="shop-cart-table">
												<div class="table-content table-responsive">
													<table>
														<thead>
															<tr>
																<th class="product-thumbnail">商品</th>
																<th class="product-price">價格</th>
																<th class="product-quantity">數量</th>
																<th class="product-subtotal">小計</th>
																<th class="product-remove">移除商品</th>
															</tr>
														</thead>
														<tbody>
														<?php 
															$total_price = 0;
															for($i = 0; $i < count($_SESSION['Cart']); $i++){ 
														?>
															<tr>
																<td class="product-thumbnail  text-left">
																	<!-- Single-product start -->
																	<div class="single-product">
																		<div class="product-img">
																			<img src="../uploads/products/<?php echo $_SESSION['Cart'][$i]['pic'] ?>" alt="" />
																		</div>
																		<div class="product-info">
																			<h4 class="post-title"><a class="text-light-black" href="#"><?php echo $_SESSION['Cart'][$i]['product_name'] ?></a></h4>
																			<!-- <p class="mb-0">Color :  Black</p>
																			<p class="mb-0">Size :     SL</p> -->
																		</div>
																	</div>
																	<!-- Single-product end -->												
																</td>
																<td class="product-price">$NT <?php echo $_SESSION['Cart'][$i]['price'] ?></td>
																<td class="product-quantity">
																	<div class="cart-plus-minus">
																		<input type="text" value="<?php echo $_SESSION['Cart'][$i]['quantity'] ?>" name="quantity[]" class="cart-plus-minus-box">
																	</div>
																</td>
																<td class="product-subtotal">$NT<?php $sub_total = $_SESSION['Cart'][$i]['quantity']*$_SESSION['Cart'][$i]['price']; echo $sub_total;?></td>
																<td class="product-remove">
																	<a href="cart/test_delete.php?index=<?php echo $i; ?>"><i class="zmdi zmdi-close"></i></a>
																</td>
															</tr>
															<?php $total_price += $sub_total;
																} //end for
																
																$_SESSION['order']['sub_total'] = $total_price;
																$_SESSION['order']['total_price'] = $total_price + 150;
															?>
															
															
														</tbody>
													</table>
													<div class="customer-login payment-details">
														<div class="col-md-12"style="float:right" >
															<table>
																<tbody>
																	
																	<tr>
																		<td class="text-left"></td>
																		<td class="text-right"></td>
																	</tr>
																	<tr>
																		<td class="text-right"></td>
																		<td class="text-right"></td>
																	</tr>
																	
															</tbody>
															</table>
														</div>
														
															<div class="col-md-6" >
																<a href="shop_f.php"><input type="button" value="繼續購物" class=" submit-button mt-15"></a>
															</div>
													
														<div class="col-md-6"style="float:right" >
															<table>
																<tbody>
																	
																	<tr>
																		<td class="text-right">購物車小計</td>
																		<td class="text-right">$NT <?php echo $total_price?></td>
																	</tr>
																	
															</tbody>
															</table>
														</div>
													</div>	
												</div>
											</div>
												
											<div class="row">
												<div class="col-md-12">
												<?php if(isset ($_SESSION['member']) && $_SESSION['member'] !=null){ ?>
													<a href="checkout.php" class="button-one submit-button mt-15" data-text="結 帳" style="float:right">結 帳</a>
												<?php }else { ?>
													<a href="login.php?url=basket" class="button-one submit-button mt-15" data-text="結 帳" style="float:right">結 帳</a>
												<?php } ?>
													<!-- <button type="submit" style="float:right" data-text="結 帳" class="button-one submit-button mt-15">結 帳</button> -->
												</div>
											</div>
										</form>	
										
									</div>
									<!-- shopping-cart end -->
									<!-- wishlist start -->
									<div class="tab-pane" id="wishlist">
										<form action="#">
											<div class="shop-cart-table">
												<div class="table-content table-responsive">
													<table>
														<thead>
															<tr>
																<th class="product-thumbnail">Product</th>
																<th class="product-price">Price</th>
																<th class="product-stock">stock status</th>
																<th class="product-add-cart">Add to cart</th>
																<th class="product-remove">Remove</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="product-thumbnail  text-left">
																	<!-- Single-product start -->
																	<div class="single-product">
																		<div class="product-img">
																			<a href="single-product.php"><img src="../img/product/2.jpg" alt="" /></a>
																		</div>
																		<div class="product-info">
																			<h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
																			<p class="mb-0">Color :  Black</p>
																			<p class="mb-0">Size : SL</p>
																		</div>
																	</div>
																	<!-- Single-product end -->				
																</td>
																<td class="product-price">$56.00</td>
																<td class="product-stock">in stock</td>
																<td class="product-add-cart">
																	<a class="text-light-black" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
																</td>
																<td class="product-remove">
																	<a href="#"><i class="zmdi zmdi-close"></i></a>
																</td>
															</tr>
															<tr>
																<td class="product-thumbnail  text-left">
																	<!-- Single-product start -->
																	<div class="single-product">
																		<div class="product-img">
																			<a href="single-product.php"><img src="../img/product/12.jpg" alt="" /></a>
																		</div>
																		<div class="product-info">
																			<h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
																			<p class="mb-0">Color :  Black</p>
																			<p class="mb-0">Size :     SL</p>
																		</div>
																	</div>
																	<!-- Single-product end -->												
																</td>
																<td class="product-price">$56.00</td>
																<td class="product-stock">in stock</td>
																<td class="product-add-cart">
																	<a class="text-light-black" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
																</td>
																<td class="product-remove">
																	<a href="#"><i class="zmdi zmdi-close"></i></a>
																</td>
															</tr>
															<tr>
																<td class="product-thumbnail  text-left">
																	<!-- Single-product start -->
																	<div class="single-product">
																		<div class="product-img">
																			<a href="single-product.php"><img src="../img/product/6.jpg" alt="" /></a>
																		</div>
																		<div class="product-info">
																			<h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
																			<p class="mb-0">Color :  Black</p>
																			<p class="mb-0">Size :     SL</p>
																		</div>
																	</div>
																	<!-- Single-product end -->												
																</td>
																<td class="product-price">$56.00</td>
																<td class="product-stock">in stock</td>
																<td class="product-add-cart">
																	<a class="text-light-black" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
																</td>
																<td class="product-remove">
																	<a href="#"><i class="zmdi zmdi-close"></i></a>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<?php } else{ 
												$total_price = 0; ?>
												<h4>目前購物車沒有商品，請至<a href="shop_f.php">產品專區</a>進行購物。</h4>         
											<?php } ?>
										</form>									
									</div>
									<!-- wishlist end -->
									<!-- check-out start -->
									<div class="tab-pane" id="check-out">
										<form action="#">
											<div class="shop-cart-table check-out-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="billing-details pr-20">
															<h4 class="title-1 title-border text-uppercase mb-30">billing details</h4>
															<input type="text" placeholder="Your name here...">
															<input type="text" placeholder="Email address here...">
															<input type="text" placeholder="Phone here...">
															<input type="text" placeholder="Company neme here...">
															<select class="custom-select mb-15">
																<option>Contry</option>
																<option>Bangladesh</option>
																<option>United States</option>
																<option>united Kingdom</option>
																<option>Australia</option>
																<option>Canada</option>
															</select>
															<select class="custom-select mb-15">
																<option>State</option>
																<option>Dhaka</option>
																<option>New York</option>
																<option>London</option>
																<option>Melbourne</option>
																<option>Ottawa</option>
															</select>
															<select class="custom-select mb-15">
																<option>Town / City</option>
																<option>Dhaka</option>
																<option>New York</option>
																<option>London</option>
																<option>Melbourne</option>
																<option>Ottawa</option>
															</select>
															<textarea class="custom-textarea" placeholder="Your address here..." ></textarea>
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 mt-xs-30">
														<div class="billing-details pl-20">
															<h4 class="title-1 title-border text-uppercase mb-30">ship to different address</h4>
															<input type="text" placeholder="Your name here...">
															<input type="text" placeholder="Email address here...">
															<input type="text" placeholder="Phone here...">
															<input type="text" placeholder="Company neme here...">
															<select class="custom-select mb-15">
																<option>Contry</option>
																<option>Bangladesh</option>
																<option>United States</option>
																<option>united Kingdom</option>
																<option>Australia</option>
																<option>Canada</option>
															</select>
															<select class="custom-select mb-15">
																<option>State</option>
																<option>Dhaka</option>
																<option>New York</option>
																<option>London</option>
																<option>Melbourne</option>
																<option>Ottawa</option>
															</select>
															<select class="custom-select mb-15">
																<option>Town / City</option>
																<option>Dhaka</option>
																<option>New York</option>
																<option>London</option>
																<option>Melbourne</option>
																<option>Ottawa</option>
															</select>
															<textarea class="custom-textarea" placeholder="Your address here..." ></textarea>
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="our-order payment-details mt-60 pr-20">
															<h4 class="title-1 title-border text-uppercase mb-30">our order</h4>
															<table>
																<thead>
																	<tr>
																		<th><strong>Product</strong></th>
																		<th class="text-right"><strong>Total</strong></th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Dummy Product Name  x 2</td>
																		<td class="text-right">$86.00</td>
																	</tr>
																	<tr>
																		<td>Dummy Product Name  x 1</td>
																		<td class="text-right">$69.00</td>
																	</tr>
																	<tr>
																		<td>Cart Subtotal</td>
																		<td class="text-right">$155.00</td>
																	</tr>
																	<tr>
																		<td>Shipping and Handing</td>
																		<td class="text-right">$15.00</td>
																	</tr>
																	<tr>
																		<td>Vat</td>
																		<td class="text-right">$00.00</td>
																	</tr>
																	<tr>
																		<td>Order Total</td>
																		<td class="text-right">$170.00</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<!-- payment-method -->
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="payment-method mt-60  pl-20">
															<h4 class="title-1 title-border text-uppercase mb-30">payment method</h4>
															<div class="payment-accordion">
																<!-- Accordion start  -->
																<h3 class="payment-accordion-toggle active">Direct Bank Transfer</h3>
																<div class="payment-content default">
																	<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
																</div> 
																<!-- Accordion end -->
																<!-- Accordion start -->
																<h3 class="payment-accordion-toggle">Cheque Payment</h3>
																<div class="payment-content">
																	<p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
																</div>
																<!-- Accordion end -->
																<!-- Accordion start -->
																<h3 class="payment-accordion-toggle">PayPal</h3>
																<div class="payment-content">
																	<p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
																	<a href="#"><img src="../img/payment/1.png" alt="" /></a>
																	<a href="#"><img src="../img/payment/2.png" alt="" /></a>
																	<a href="#"><img src="../img/payment/3.png" alt="" /></a>
																	<a href="#"><img src="../img/payment/4.png" alt="" /></a>
																</div>
																<!-- Accordion end --> 
																<button class="button-one submit-button mt-15" data-text="place order" type="submit">place order</button>			
															</div>															
														</div>
													</div>
												</div>
											</div>
										</form>											
									</div>
									<!-- check-out end -->
									<!-- order-complete start -->
									<div class="tab-pane" id="order-complete">
										<form action="#">
											<div class="thank-recieve bg-white mb-30">
												<p>Thank you. Your order has been received.</p>
											</div>
											<div class="order-info bg-white text-center clearfix mb-30">
												<div class="single-order-info">
													<h4 class="title-1 text-uppercase text-light-black mb-0">order no</h4>
													<p class="text-uppercase text-light-black mb-0"><strong>m 2653257</strong></p>
												</div>
												<div class="single-order-info">
													<h4 class="title-1 text-uppercase text-light-black mb-0">Date</h4>
													<p class="text-uppercase text-light-black mb-0"><strong>june 15, 2017</strong></p>
												</div>
												<div class="single-order-info">
													<h4 class="title-1 text-uppercase text-light-black mb-0">Total</h4>
													<p class="text-uppercase text-light-black mb-0"><strong>$ 170.00</strong></p>
												</div>
												<div class="single-order-info">
													<h4 class="title-1 text-uppercase text-light-black mb-0">payment method</h4>
													<p class="text-uppercase text-light-black mb-0"><a href="#"><strong>check payment</strong></a></p>
												</div>
											</div>
											<div class="shop-cart-table check-out-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-sm-12">
														<div class="our-order payment-details pr-20">
															<h4 class="title-1 title-border text-uppercase mb-30">our order</h4>
															<table>
																<thead>
																	<tr>
																		<th><strong>Product</strong></th>
																		<th class="text-right"><strong>Total</strong></th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Dummy Product Name  x 2</td>
																		<td class="text-right">$86.00</td>
																	</tr>
																	<tr>
																		<td>Dummy Product Name  x 1</td>
																		<td class="text-right">$69.00</td>
																	</tr>
																	<tr>
																		<td>Cart Subtotal</td>
																		<td class="text-right">$155.00</td>
																	</tr>
																	<tr>
																		<td>Shipping and Handing</td>
																		<td class="text-right">$15.00</td>
																	</tr>
																	<tr>
																		<td>Vat</td>
																		<td class="text-right">$00.00</td>
																	</tr>
																	<tr>
																		<td>Order Total</td>
																		<td class="text-right">$170.00</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													<!-- payment-method -->
													<div class="col-md-6 col-sm-6 col-sm-12 mt-xs-30">
														<div class="payment-method  pl-20">
															<h4 class="title-1 title-border text-uppercase mb-30">payment method</h4>
															<div class="payment-accordion">
																<!-- Accordion start  -->
																<h3 class="payment-accordion-toggle active">Direct Bank Transfer</h3>
																<div class="payment-content default">
																	<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
																</div> 
																<!-- Accordion end -->
																<!-- Accordion start -->
																<h3 class="payment-accordion-toggle">Cheque Payment</h3>
																<div class="payment-content">
																	<p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
																</div>
																<!-- Accordion end -->
																<!-- Accordion start -->
																<h3 class="payment-accordion-toggle">PayPal</h3>
																<div class="payment-content">
																	<p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
																	<a href="#"><img src="../img/payment/1.png" alt="" /></a>
																	<a href="#"><img src="../img/payment/2.png" alt="" /></a>
																	<a href="#"><img src="../img/payment/3.png" alt="" /></a>
																	<a href="#"><img src="../img/payment/4.png" alt="" /></a>
																</div>
																<!-- Accordion end --> 
																<button class="button-one submit-button mt-15" data-text="place order" type="submit">place order</button>			
															</div>															
														</div>
													</div>
												</div>
											</div>
										</form>										
									</div>
									<!-- order-complete end -->
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- SHOPPING-CART-AREA END -->
			
			<?php require_once('template/footer.php'); ?>

			<div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-labelledby="info" aria-hidden="true">
				<div class="modal-dialog modal-sm">

					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">訊息</h4>
						</div>
						<div class="modal-body text-center">
							<p class="text-center text-muted">更新成功!</p>
							
						</div>
					</div>
				</div>
			</div>   
			<?php if($is_updated == "true"){ ?>   
			<script>
					$(function(){
						$('#info-modal').modal();  
						// 2秒後視窗自動消失   
						setTimeout(function() {
							$('#info-modal').modal('hide');
						}, 1500);       
					});
			</script> 
			<?php 
			$is_updated = "false";
			} ?>
			<?php if(isset($_GET['Del']) &&  $_GET['Del'] == "true"){ ?>   
			<script>
					$(function(){
						$('.modal-body>p').html("成功移除一個商品!");
						$('#info-modal').modal();  
						// 2秒後視窗自動消失   
						setTimeout(function() {
							$('#info-modal').modal('hide');
						}, 1500);       
					});
			</script> 
			<?php 
			
			} ?>

	</body>
</html>
