<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>About Us || Hurst</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php require_once('template/head.php'); ?>
		
	</head>
	<body>	
	<?php require_once('template/nav.php'); ?>
	<?php 
	$query = $db->query("SELECT * FROM page WHERE pageID=1");
	$about = $query->fetch(PDO::FETCH_ASSOC);

	?>

			<!-- HEADING-BANNER START -->
			<div class="heading-banner-area overlay-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-banner">
								<div class="heading-banner-title">
									<h2>關於我們</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="../index.php">Home</a></li>
										<li>關於我們</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- HEADING-BANNER END -->
			<!-- ABOUT-US-AREA START -->
			<div class="about-us-area  pt-80 pb-80">
				<div class="container">	
					<div class="about-us bg-white">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="about-photo">
									<img src="../img/bg/about.jpg" alt="" />
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="about-brief bg-dark-white">
									<h4 class="title-1 title-border text-uppercase mb-30"><?php echo $about['title']; ?></h4>
									<p> <?php echo $about['content']; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ABOUT-US-AREA END -->
			<!-- TEAM-MEMBER-AREA END -->
			<div class="team-member-area pb-80">
				<div class="container">
					<!-- Section-title start -->
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h2 class="title-border">密碼鎖設定方法</h2>
							</div>
						</div>
					</div>
					<!-- Section-title end -->	
					<div class="about-us-area  pt-80 pb-80">
				<div class="container">	
					<div class="about-us bg-white">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="about-photo">
									<img src="../img/lock1.png" alt="" />
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="about-photo">
									<img src="../img/lock2.png" alt="" />
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
				</div>
			</div>
			<!-- TEAM-MEMBER-AREA END -->		

			<?php require_once('template/footer.php'); ?>
			
	</body>
</html>
