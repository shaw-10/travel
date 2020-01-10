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
									<h2>會員註冊</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li>會員註冊</li>
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
									<h4 class="title-1 title-border text-uppercase mb-30">會員登入</h4>
									<p class="text-gray">如果您擁有我們的帳戶，請登錄！</p>
									<label for="email">帳號(Email)</label>
										<input type="text" placeholder="Email here..." class="form-control" id="account" name="account">

									<label for="password1">密碼</label>
										<input type="password" placeholder="Password" class="form-control" id="password" name="password">
										<input type="hidden" name="url" value="<?php echo $_GET['url']; ?>">

									<!-- <p><a href="#" class="text-gray">Forget your password?</a></p> -->
									<button type="submit" data-text="login" class="button-one submit-button mt-15 text-right" >登入</button>
								</div>					
							</div>
						</form>

						<form data-toggle="validator" action="register_success.php" method="post">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="customer-login text-left">
									<h4 class="title-1 title-border text-uppercase mb-30">註冊會員</h4>
									<!-- <p class="text-gray">If you have an account with us, Please login!</p> -->
									<div class="form-group">
										<label for="name">姓名</label>
										<input type="text" placeholder="Your name here..." id="name" name="name" data-error="請輸入姓名" required>
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group">
										<label for="email">帳號(Email)</label>
										<input type="email" placeholder="Email address here..." id="Account" name="account" data-error="請以email為帳號" required>
										<div class="help-block with-errors"></div>
										<div class="help-block is_repeat"></div>
									</div>
									<div class="form-group">
										<label for="password">密碼</label>
										<input type="password" placeholder="Password" data-minlength="6" id="Password" name="password" required>
										<div class="help-block">請輸入至少6個字元</div>
										<input type="hidden" name="url" value="<?php echo $_GET['url']; ?>">
									</div>
									<div class="form-group">
										<label for="password">確認密碼</label>
										<input type="password" placeholder="Confirm password" class="form-control" id="comfirm_password" name="comfirm_password" data-match="#Password" data-match-error="密碼不符">
										<div class="help-block with-errors"></div>
										<input type="hidden" name="created_at" value="<?php echo date('Y-m-d:H-i-s'); ?>">
									</div>
									
									<button type="submit" data-text="regiter" class="button-one submit-button mt-15" >註冊</button>
								</div>					
							</div>
						</form>
						</div>
					
				</div>
			</div>
			<!-- SHOPPING-CART-AREA END -->

		<?php require_once('template/footer.php'); ?>
		<script>
			$(function(){
			$('#password').focus(function(){
				$.ajax({
						type: "POST", //傳送方式
						url: "check_email.php", //傳送目的地
						dataType: "text", //資料格式
						data: { //傳送資料
							account: $("#account").val(), //表單欄位 ID nickname               
						},
						success: function(data) {
						console.log(data);
						if(data == "repeat"){
								$('.is_repeat').parent().addClass('has-error');
								$('.is_repeat').html('帳號重覆，請選擇其他帳號註冊');
						}else{
								$('.is_repeat').html('');
						}
						}
					});
			});
			});
		</script>
	</body>
</html>
