<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Checkout || Hurst</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php require_once('template/head.php'); ?>
		
	</head>
	<body>	
	<?php require_once('template/nav.php'); ?>
	
			<!-- HEADING-BANNER START -->
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>check out</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="../index.php">Home</a></li>
										<li>check out</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- HEADING-BANNER END -->
			<!-- CHECKOUT-AREA START -->
			<div class="shopping-cart-area  pt-80 pb-80">
				<div class="container">	
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="shopping-cart">
								<!-- Nav tabs -->
								<ul class="cart-page-menu row clearfix mb-30">
									<li class=""><a href="cart.php"disabled="disabled" >shopping cart</a></li>
									<li class="active" style="user-select: none;"><a href="#" disabled="disabled">check out</a></li>
									<li class="disabled"><a href="#"disabled="disabled" >order complete</a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<!-- check-out start -->
									<div class="tab-pane active" id="check-out">
										<form action="order_success.php" method="post">
											<div class="shop-cart-table check-out-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="billing-details pr-20">
															<h4 class="title-1 title-border text-uppercase mb-30">顧客資料</h4>
															<div class="col-sm-12 col-md-12">
																<div class="form-group">
																	<label for="firstname">姓名</label>
																	<input type="text" placeholder="Your name here..." class="form-control" id="name" name="name" value="<?php echo $_SESSION['member']['name']; ?>">
																</div>
															</div>
															<div class="col-sm-12 col-md-12">
																<div class="form-group">
																	<label for="firstname">帳號</label>
																	<input type="text" disabled="disabled"  class="form-control" id="account" name="account" value="<?php echo $_SESSION['member']['account']; ?>">
																</div>
															</div>
															<div class="col-sm-12 col-md-12">
																<div class="form-group">
																	<label for="phone">行動電話</label>
																	<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $_SESSION['member']['mobile']; ?>">
																</div>
															</div>	
															
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 mt-xs-30">
													<div class="billing-details pr-20">
															<h4 class="title-1 title-border text-uppercase mb-30">送貨資料</h4>
															<div class="col-sm-12 col-md-12">
																<div class="form-group">
																	<label for="firstname">收件人姓名</label>
																	<input type="text" placeholder="Your name here..." class="form-control" id="name" name="name" value="<?php echo $_SESSION['member']['name']; ?>">
																</div>
															</div>
															
															<div class="col-sm-12 col-md-12">
																<div class="form-group">
																	<label for="phone">聯絡電話</label>
																	<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $_SESSION['member']['mobile']; ?>">
																</div>
															</div>	
															<div id="twzipcode">
																<div class="col-sm-4 col-md-4">
																	<div class="form-group">
																		<label for="zip">郵遞區號</label>
																		<input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $_SESSION['member']['zipcode']; ?>">
																	</div>
																</div>
																<div class="col-sm-4 col-md-4">
																	<div class="form-group">
																		<label for="state">城市</label>
																		<select class="custom-select mb-15" id="county" name="county"></select>
																	</div>
																</div>
																<div class="col-sm-4 col-md-4">
																	<div class="form-group">
																		<label for="country">地區</label>
																		<select class="custom-select mb-15" id="district" name="district"></select>
																	</div>
																</div>
															</div>
															<div class="col-sm-12 col-md-12">
																<div class="form-group">
																	<label for="city">地址</label>
																	<!-- <textarea placeholder="Your address here..." class="custom-textarea" ></textarea> -->
																	<input type="text" class="form-control" id="address" name="address" value="<?php echo $_SESSION['member']['address']; ?>">
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="our-order payment-details mt-60 pr-20">
															<h4 class="title-1 title-border text-uppercase mb-30">訂單項目</h4>
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
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="payment-method mt-60  pl-20">
															<h4 class="title-1 title-border text-uppercase mb-30">付款方式</h4>
															<div class="payment-accordion">
																<!-- Accordion start  -->
																<div class="form-group">
																	<div class="form-control" style="border:none;">
																		<label class="radio-inline payment-accordion"><input type="radio" name="gender" value="1" checked>宅配到府</label>
																	</div>
																</div>
																<div class="form-group">
																	<div class="form-control" style="border:none;">
																		<label class="radio-inline payment-accordion"><input type="radio" name="gender" value="2" checked>超商取貨付款</label>
																	</div>
																</div>
																<!-- Accordion start -->
																<!-- <h3 class="payment-accordion">PayPal</h3> -->
																<!-- Accordion end --> 
																<div class="form-group">
																	<div class="form-control" style="border:none;">
																		<label class="radio-inline payment-accordion"><input type="radio" name="gender" value="3" checked>銀行轉帳</label>
																	</div>
																</div>
																<input type="hidden" name="status" value="0">
																
																<input type="hidden" name="order_date" value="<?php echo date('Y-m-d H:i:s');?>"> 
																<input type="hidden" name="order_no" value="<?php echo "HC" .date('YmdHis');?>"> 
																<input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s');?>"> 
																
																<button class="button-one submit-button mt-15" data-text="place order" type="submit" style="float:right">下訂單</button>			
															</div>															
														</div>
													</div>
												</div>
											</div>
										</form>											
									</div>
									<!-- check-out end -->
									
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- CHECKOUT-AREA END -->
			
			<?php require_once('template/footer.php'); ?>
			<script>
        $(function(){
            $('#twzipcode').twzipcode();
            $('#twzipcode').find('input[name="zipcode"]').eq(1).remove();
            $('#twzipcode').find('select[name="county"]').eq(1).remove();
            $('#twzipcode').find('select[name="district"]').eq(1).remove();
            $( "#birthday" ).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange : "1980:2030"
    });

        });
        </script>

	</body>
</html>
