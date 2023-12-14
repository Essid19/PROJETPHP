<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="Site keywords here">
	<meta name="description" content="">
	<meta name='copyright' content=''>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Title -->
	<title>Mediplus - Free Medical and Doctor Directory HTML Template.</title>

	<!-- Favicon -->
	<link rel="icon" href="img/favicon.png">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="css/nice-select.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- icofont CSS -->
	<link rel="stylesheet" href="css/icofont.css">
	<!-- Slicknav -->
	<link rel="stylesheet" href="css/slicknav.min.css">
	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Datepicker CSS -->
	<link rel="stylesheet" href="css/datepicker.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="css/animate.min.css">
	<!-- Magnific Popup CSS -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Medipro CSS -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/responsive.css">

</head>

<body>

	<!-- Preloader -->


	<!-- Header Area -->
	<?php include 'includes/navbar.php'; ?>
	<?php
	include '../../Controller/config.php';
	include '../../Model/commande.php';
	include '../../Controller/commandeC.php';
	$id_user = $_SESSION['user_id'];
	$id_med = $_GET['id_med'];
	if (isset($_POST['bout'])) {
		$qte_cmd = $_POST['qte'];

		$cmd = new cmd($qte_cmd, $id_med, $id_user);
		$commandeC = new CmdC();
		$commandeC->addCmd($cmd);


		echo '<script>window.location.href = "medicament.php";</script>';
	}






	?>
	<!-- End Header Area -->

	<!-- Breadcrumbs -->
	<div class="breadcrumbs overlay">
		<div class="container">
			<div class="bread-inner">
				<div class="row">
					<div class="col-12">
						<h2>Order</h2>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Start Contact Us -->
	<section class="contact-us section">
		<div class="container">
			<div class="inner">
				<div class="row">

					<div class="col-lg-12">
						<div class="contact-us-form">
							<h2>Order here</h2>
							<!-- Form -->
							<form class="form" method="post">
								<div class="row">

									<div class="col-lg-12">
										<div class="form-group">
											<input type="number" name="qte" placeholder="Number of product" required="">
										</div>
									</div>


									<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<div class="form-group login-btn">
											<button class="btn" name='bout' type="submit">Order Now</button>
										</div>
									</div>
									<div class="col-lg-3"></div>
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
	<!--/ End Contact Us -->

	<!-- Footer Area -->
	<footer id="footer" class="footer">
		<!-- Footer Top -->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>About Us</h2>
							<p>
								Welcome to our  space, the online community dedicated to discussing health topics. Our mission is to provide an open and informative space for exchanging ideas, experiences, and advice on various health-related subjects.
							</p>
							<br>
							<!-- Social -->
							<div class="footer-section">
								<h2>Useful Links</h2>
								<p>Explore our resources and articles for in-depth information on various aspects of health. Check out our privacy policy and terms of use to learn more about our practices.</p>
							</div>

							<ul class="social">
								<li>
									<a href="#"><i class="icofont-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="icofont-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="icofont-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="icofont-vimeo"></i></a>
								</li>
								<li>
									<a href="#"><i class="icofont-pinterest"></i></a>
								</li>
							</ul>
							<!-- End Social -->
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer f-link">
							<div class="footer-section">

								<p>If you have questions, concerns, or suggestions, feel free to contact us. You can use our <a href="contact.php"> <span style="color:aqua">contact form</span></a> or find us on social media.</p>
							</div>
							<br>
							<h2>Quick Links</h2>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">

								</div>
								<ul>
									<li>
										<a href="index.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a>
									</li>
									<li>
										<a href="doctors.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Doctors</a>
									</li>
									<li>
										<a href="medicament.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Drugs</a>
									</li>
									<li>
										<a href="showForum.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Forums</a>
									</li>
									<li>
										<a href="Forum.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Put Forum</a>
									</li>
								</ul>
							</div>

						</div>
					</div>
				</div>
				<br>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="single-footer">
						<h2>Open Hours</h2>
						<ul>
							<li><strong>Monday:</strong> 9:00 AM - 5:00 PM</li>
							<li><strong>Tuesday:</strong> 9:00 AM - 5:00 PM</li>
							<li><strong>Wednesday:</strong> 9:00 AM - 5:00 PM</li>
							<li><strong>Thursday:</strong> 9:00 AM - 5:00 PM</li>
							<li><strong>Friday:</strong> 9:00 AM - 4:00 PM</li>
							<li><strong>Saturday:</strong> Closed</li>
							<li><strong>Sunday:</strong> Closed</li>
						</ul>
					</div>
				</div>
				<br>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="single-footer">
						<h2>Newsletter</h2>
						<p>
							subscribe to our newsletter to get all our news in your inbox..
						</p>
						<form action="commenter.php" method="get" target="_blank" class="newsletter-inner">
							<input name="email" placeholder="Email Address" class="common-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'" required="" type="email" />
							<button class="button">
								<i class="icofont icofont-paper-plane"></i>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
		<!--/ End Footer Top -->
		<!-- Copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="copyright-content">
							<p>
								© Copyright 2023 <span style="color:darkblue">[MediPlus] </span>| All Rights Reserved
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Copyright -->
	</footer>
	<!--/ End Footer Area -->

	<!-- jquery Min JS -->
	<script src="js/jquery.min.js"></script>
	<!-- jquery Migrate JS -->
	<script src="js/jquery-migrate-3.0.0.js"></script>
	<!-- jquery Ui JS -->
	<script src="js/jquery-ui.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap Datepicker JS -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Jquery Nav JS -->
	<script src="js/jquery.nav.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/jquery.scrollUp.min.js"></script>
	<!-- Niceselect JS -->
	<script src="js/niceselect.js"></script>
	<!-- Tilt Jquery JS -->
	<script src="js/tilt.jquery.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- counterup JS -->
	<script src="js/jquery.counterup.min.js"></script>
	<!-- Steller JS -->
	<script src="js/steller.js"></script>
	<!-- Wow JS -->
	<script src="js/wow.min.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- Counter Up CDN JS -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
	<!-- Google Map API Key JS -->
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyDGqTyqoPIvYxhn_Sa7ZrK5bENUWhpCo0w"></script>
	<!-- Gmaps JS -->
	<script src="js/gmaps.min.js"></script>
	<!-- Map Active JS -->
	<script src="js/map-active.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
</body>

</html>