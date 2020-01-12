<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Contact Us || Hurst</title>
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
									<h2>聯絡我們</h2>
								</div>
								<div class="breadcumbs pb-15">
									<ul>
										<li><a href="../index.php">Home</a></li>
										<li>聯絡我們</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- HEADING-BANNER END -->
			<!-- contact-us-AREA START -->
			<div class="contact-us-area  pt-80 pb-80">
				<div class="container">	
					<div class="contact-us customer-login bg-white">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
								<div class="contact-details">
									<h4 class="title-1 title-border text-uppercase mb-30">聯絡方式</h4>
									<ul>
										<li>
											<i class="zmdi zmdi-pin"></i>
											<span>新北市鶯歌區</span>
											<!-- <span>New York City, USA</span> -->
										</li>
										<li>
											<i class="zmdi zmdi-phone"></i>
											<span><a href="tel:555-555-1212">555-555-1212</a></span>
											<span><a href="tel:555-555-1212">666-666-1313</a></span>
										</li>
										<li>
											<i class="zmdi zmdi-email"></i>
											<span>company-email@gmail.com</span>
											<!-- <span>your-email@gmail.com</span> -->
										</li>
									</ul>
								</div>
								<div class="send-message mt-60">
									<form action="mail.php">
										<h4 class="title-1 title-border text-uppercase mb-30">聯絡表單</h4>
										<input type="text" name="name" placeholder="Your name here..." />
										<input type="text" name="email" placeholder="Your email here..." />
										<textarea class="custom-textarea" name="message" placeholder="Your comment here..."></textarea>
										<button class="button-one submit-button mt-20" data-text="submit message" type="submit">submit message</button>
									</form>
								</div>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 mt-xs-30">
								<div class="map-area">
									<div id="googleMap" style="width:100%;height:600px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ABOUT-US-AREA END -->
			
			<?php require_once('template/footer.php'); ?>

		<!-- Google Map js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
		
		<script>
			function initialize() {
				var mapOptions = {
					zoom: 10,
					scrollwheel: false,
					center: new google.maps.LatLng( 47.606205, -122.332046 ),
				};
				var map = new google.maps.Map(document.getElementById('googleMap'),
					mapOptions
				);
				var marker = new google.maps.Marker({
					position: map.getCenter(),
					icon: ' ',
					map: map
				});
				var contentString = '<div id="content">'+
					'<div id="siteNotice">'+
					'</div>'+
					'<div id="bodyContent">'+
					'<p>New York City Center, </br>Street Name, </br>New York City, USA</p>'+		
					'</div>'+
					'</div>';
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
					infowindow.open(map, marker);
	
				var styles = 
				[
					{
						"featureType": "all",
						"elementType": "labels.text.fill",
						"../stylers": [
							{
								"color": "#636363"
							}
						]
					},
					{
						"featureType": "all",
						"elementType": "labels.text.stroke",
						"../stylers": [
							{
								"visibility": "on"
							},
							{
								"color": "#1f1f1f"
							}
						]
					},
					{
						"featureType": "all",
						"elementType": "labels.icon",
						"../stylers": [
							{
								"visibility": "off"
							}
						]
					},
					{
						"featureType": "administrative",
						"elementType": "geometry.fill",
						"../stylers": [
							{
								"color": "#1F1F1F"
							}
						]
					},
					{
						"featureType": "administrative",
						"elementType": "geometry.stroke",
						"../stylers": [
							{
								"color": "#1F1F1F"
							}
						]
					},
					{
						"featureType": "landscape",
						"elementType": "geometry",
						"../stylers": [
							{
								"color": "#2A2A2A"
							},
						]
					},
					{
						"featureType": "poi",
						"elementType": "geometry",
						"../stylers": [
							{
								"color": "#2A2A2A"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry.fill",
						"../stylers": [
							{
								"color": "#2A2A2A"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry.stroke",
						"../stylers": [
							{
								"color": "#2A2A2A"
							}
						]
					},
					{
						"featureType": "road.arterial",
						"elementType": "geometry",
						"../stylers": [
							{
								"color": "#1a1a1a"
							}
						]
					},
					{
						"featureType": "road.local",
						"elementType": "geometry",
						"../stylers": [
							{
								"color": "#1a1a1a"
							}
						]
					},
					{
						"featureType": "transit",
						"elementType": "geometry",
						"../stylers": [
							{
								"color": "#1a1a1a"
							}
						]
					},
					{
						"featureType": "water",
						"elementType": "geometry",
						"../stylers": [
							{
								"color": "#1F1F1F"
							},
						]
					}
				];

				map.setOptions({styles: styles});
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		
		
	</body>
</html>
