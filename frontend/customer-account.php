<?php 
require_once('is_login.php');
?>
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
									<h2>會員專區</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li>會員專區</li>
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
						<form data-toggle="validator" action="change_password.php" method="post">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="customer-login text-left">
									<h4 class="title-1 title-border text-uppercase mb-30">修改密碼</h4>
									<div class="billing-details ">
									<div class="col-sm-12 col-md-12">
										<div class="form-group">
											<label for="password_old">舊密碼</label>
											<input type="password" class="form-control" id="password_old" name="password_old" data-match="#password_old1" data-error="密碼錯誤" required >
											<input type="hidden" id="password_old1" name="password_old1"  value="<?php echo $_SESSION['member']['password']; ?>">
											<div class="help-block with-errors"></div>
										</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label for="password_1">新密碼</label>
												<input type="password" class="form-control" data-minlength="6" id="Password_new" name="Password_new" data-error="請輸入至少6個字元" required>
												<div class="help-block with-errors"></div>
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label for="password_2">再次輸入新密碼</label>
												<input type="password" class="form-control" data-minlength="6" id="password_check" name="password_check" data-match="#Password_new" data-error="密碼不符" required>
												<div class="help-block with-errors"></div>
										</div>
										</div>
													
										</div>
										<input type="hidden" name="EditForm" value="UPDATE">
                               			 <input type="hidden" name="memberID" value="<?php echo $_SESSION['member']['memberID']; ?>">
										<button type="submit" data-text="修改" class="button-one submit-button mt-15">修改</button>
								</div>					
							</div>
						</form>

						<form action="update_member.php" method="post">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="customer-login text-left">
									<h4 class="title-1 title-border text-uppercase mb-30">會員資料</h4>
									<div class="billing-details ">
										<div class="col-sm-12 col-md-12">
											<div class="form-group">
												<label for="firstname">帳號</label>
												<input type="text" disabled="disabled"  class="form-control" id="account" name="account" value="<?php echo $_SESSION['member']['account']; ?>">
											</div>
										</div>
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label for="firstname">姓名</label>
													<input type="text" placeholder="Your name here..." class="form-control" id="name" name="name" value="<?php echo $_SESSION['member']['name']; ?>">
												</div>
											</div>
											<div class="col-sm-12 col-md-12">									
												<div class="form-group">
													<label for="company">生日</label>
													<input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo $_SESSION['member']['birthday']; ?>">
												</div>
											</div>	
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label for="street">性別</label>
													<div class="form-control" style="border:none;">
														<label class="radio-inline"><input type="radio" name="gender" value="1" checked>男</label>
														<label class="radio-inline"><input type="radio" name="gender" value="0" >女</label>
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label for="phone">家用電話</label>
													<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $_SESSION['member']['phone']; ?>">
												</div>
											</div>
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label for="phone">行動電話</label>
													<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $_SESSION['member']['mobile']; ?>">
												</div>
											</div>	
											<div class="col-sm-12 col-md-12">
												<div class="form-group">
													<label for="email">備用Email</label>
													<input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['member']['email']; ?>">
												</div>
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
										
										<div>
											<input type="hidden" name="EditForm" value="UPDATE">
											<input type="hidden" name="memberID" value="<?php echo $_SESSION['member']['memberID']; ?>">
											<button type="submit" data-text="更新資料" class="button-one submit-button mt-15">更新資料</button>
									
										</div>
									
												
													
									
									
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
