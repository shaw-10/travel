<?php 
require_once('is_login.php');
?>
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
									<h2>我的訂單</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="../index.php">Home</a></li>
										<li>我的訂單</li>
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
															<h4 class="title-1 title-border text-uppercase mb-30">我的訂單</h4>
															<table>
															<thead>
																<tr>
																	<th>訂單編號</th>
																	<th>訂購日期</th>
																	<th>總金額</th>
																	<th>訂單明細</th>
																</tr>
															</thead>
																
																<tbody>
																<?php foreach($one_order as $one_order){ ?>
																	<tr>
																		<td># <?php echo $one_order['order_no']; ?></td>
																		<td ><?php echo $one_order['order_date']; ?></td>
																		<td>$NT <?php echo $one_order['total']+60?></td>
																		<td ><a href="order_details.php?order=<?php echo $one_order['customer_orderID'] ?>" class="button-one submit-button mt-15" data-text="觀看詳細">觀看詳細</a></td>
																	</tr>
																	<?php 
																		} //end for
																	
																	?>
																	
																</tbody>
																
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
