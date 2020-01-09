<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Order || Hurst</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php require_once('template/head.php'); ?>
		
	</head>
	<body>	
	<?php require_once('template/nav.php'); ?>
	

<?php 
$query = $db->query("SELECT * FROM customer_orders WHERE memberID=".$_SESSION['member']['memberID']);
$one_order = $query->fetchAll(PDO::FETCH_ASSOC);

?>


			<!-- HEADING-BANNER START -->
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>order complete</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li>order complete</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- HEADING-BANNER END -->
			<!-- ORDER-AREA START -->
			<div class="shopping-cart-area  pt-80 pb-80">
				<div class="container">	
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="shopping-cart">
								<!-- Nav tabs -->
								<ul class="cart-page-menu row clearfix mb-30">
									<li ><a href="#"disabled="disabled" >shopping cart</a></li>
									<li><a href="check.php" disabled="disabled">check out</a></li>
									<li class="active"><a href="#"disabled="disabled" >order complete</a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									
									<!-- order-complete start -->
									<div class="tab-pane active" id="order-complete">
										<form action="#" >
											<div class="thank-recieve bg-white mb-30">
												<p>Thank you. Your order has been received.</p>
											</div>
											<?php foreach($one_order as $one_orders){ ?>
											<div class="order-info bg-white text-center clearfix mb-30">
												<div class="single-order-info">
													<h4 class="title-1 text-uppercase text-light-black mb-0">order no</h4>
													<p class="text-uppercase text-light-black mb-0"><strong>m <?php echo $one_orders['order_no']; ?></strong></p>
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
											<?php } ?>
											<div class="shop-cart-table check-out-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-sm-12">
														<div class="our-order payment-details pr-20">
															<h4 class="title-1 title-border text-uppercase mb-30">our order</h4>
															<table>
																<thead>
																	<tr>
																		<th><strong>商品</strong></th>
																		<th class="text-right"><strong>金額</strong></th>
																	</tr>
																</thead>
																
																<tbody>
																<?php 
																	$total_price = 0;
																	for($i = 0; $i < count($_SESSION['Cart']); $i++){ 
																?>
																	<tr>
																		<td><?php echo $_SESSION['Cart'][$i]['product_name'] ?>  x <?php echo $_SESSION['Cart'][$i]['quantity'] ?></td>
																		<td class="text-right">$NT<?php $sub_total = $_SESSION['Cart'][$i]['quantity']*$_SESSION['Cart'][$i]['price']; echo $sub_total;?></td>
																	</tr>
																	<?php $total_price += $sub_total;
																		} //end for
																		$total_all= $total_price + 60;
																	?>
																	<tr>
																		<td>小計</td>
																		<td class="text-right">$NT<?php echo $total_price;?></td>
																	</tr>
																	
																	<tr>
																		<td>運費</td>
																		<td class="text-right">$NT 60</td>
																	</tr>
																	<tr>
																		<td>總和</td>
																		<td class="text-right">$NT<?php echo $total_all;?></td>
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
																	<p>Pay via PayPal; you can pay with your credit card if you don�t have a PayPal account.</p>
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
			<!-- ORDER-AREA END -->
			
			<?php require_once('template/footer.php'); ?>

	</body>
</html>
