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
    $query = $db->query("SELECT * FROM order_details WHERE customer_orderID=".$_GET['order']);
    $customer_orders = $query->fetchAll(PDO::FETCH_ASSOC);
    $query2 = $db->query("SELECT * FROM customer_orders WHERE customer_orderID=".$_GET['order']);
    $one_order = $query2->fetch(PDO::FETCH_ASSOC);

?>

			<!-- HEADING-BANNER START -->
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>訂單明細</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="../index.php">Home</a></li>
										<li><a href="order.php">我的訂單</a></li>
										<li>訂單明細</li>
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
								
								<!-- Tab panes -->
								<div class="tab-content">
									
									<!-- order-complete start -->
											<div class="shop-cart-table check-out-wrap">
												<div class="row">
													<div class="col-md-12 col-sm-12 col-sm-12">
														<div class="our-order payment-details pr-20">
															<h4 class="title-1 title-border text-uppercase mb-30">#<?php echo $one_order['order_no']; ?></h4>
															<table>
															<thead>
																<tr>
																	<th >產品圖片</th>
																	<th >產品名稱</th>
																	<th>數量</th>
																	<th>單價</th>
																	<th>總金額</th>
																</tr>
															</thead>
																
															<tbody>
																<?php 
																	$total_price = 0;
																	foreach($customer_orders as $customer_order) {?>
																	<tr>
																		<td >
																			<img src="../uploads/products/<?php echo $customer_order['picture'] ?>" style="width: 110px;"  alt="<?php echo $customer_order['name'] ?>">
																		</td>
																		<td><a href="#"><?php echo $customer_order['name']?></a>
																		</td>
																		<td><?php echo $customer_order['quantity']?></td>
																		<td>$NT <?php echo $customer_order['price']?></td>
																		<td>$NT <?php echo $customer_order['quantity'] * $customer_order['price']?></td>
																		
																	</tr>
																	<?php } ?>
																</tbody>
																	
																<tfoot>
																	<tr>
																		<td colspan="4" class="text-right">合計(不含運)</td>
																		<td >$NT<?php $sub_total = $customer_order['quantity'] * $customer_order['price']; echo $sub_total;?></td>
																	</tr>
																	<tr>
																		<td colspan="4" class="text-right"> 運費</td>
																		<td>$NT 60</td>
																	</tr>
																	<tr>
																		<td colspan="4" class="text-right">總金額</td>
																		<td>$NT <?php echo $one_order['total']+60; ?></td>
																	</tr>
																</tfoot>
																
															</table>
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
