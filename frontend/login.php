<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Login / Registration || Hurst</title>
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
									<h2>Registration</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li>Registration</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- HEADING-BANNER END -->
			<!-- SHOPPING-CART-AREA START -->
			<div class="login-area  pt-80 pb-80">
				<div class="container">
					
						<div class="row">
						<form action="member_login.php" method="post">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="customer-login text-left">
									<h4 class="title-1 title-border text-uppercase mb-30">Registered customers</h4>
									<p class="text-gray">If you have an account with us, Please login!</p>
									<label for="email">帳號(Email)</label>
										<input type="text" placeholder="Email here..." class="form-control" id="account" name="account">

									<label for="password1">密碼</label>
										<input type="password" placeholder="Password" class="form-control" id="password" name="password">
										<input type="hidden" name="url" value="<?php echo $_GET['url']; ?>">

									<p><a href="#" class="text-gray">Forget your password?</a></p>
									<button type="submit" data-text="login" class="button-one submit-button mt-15">login</button>
								</div>					
							</div>
						</form>

						
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="customer-login text-left">
									<h4 class="title-1 title-border text-uppercase mb-30">new customers</h4>
									<p class="text-gray">If you have an account with us, Please login!</p>
									<label for="name">姓名</label>
										<input type="text" placeholder="Your name here..." id="name" name="name" data-error="請輸入姓名" required>
										<div class="help-block with-errors"></div>

									
									<label for="email">帳號(Email)</label>
										<input type="email" placeholder="Email address here..." id="Account" name="account" data-error="請以email為帳號" required>
										<div class="help-block with-errors"></div>
										<div class="help-block is_repeat"></div>
								
									<label for="password">密碼</label>
										<input type="password" placeholder="Password" data-minlength="6" id="Password" name="password" required>
										<div class="help-block">請輸入至少6個字元</div>
										<input type="hidden" name="url" value="<?php echo $_GET['url']; ?>">
									
									<label for="password">確認密碼</label>
										<input type="password" placeholder="Confirm password" class="form-control" id="comfirm_password" name="comfirm_password" data-match="#Password" data-match-error="密碼不符">
										<div class="help-block with-errors"></div>
										<input type="hidden" name="created_at" value="<?php echo date('Y-m-d:H-i-s'); ?>">
									
									
									<button type="submit" data-text="regiter" class="button-one submit-button mt-15">regiter</button>
								</div>					
							</div>
						</div>
					
				</div>
			</div>
			<!-- SHOPPING-CART-AREA END -->

		<?php require_once('template/footer.php'); ?>
		
	</body>
</html>
