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
	<style>
		.rbt-pagination {
			margin: -8px;
			padding: 0;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		@media only screen and (max-width: 767px) {
			.rbt-pagination {
				margin: -4px;
			}
		}

		.rbt-pagination li {
			margin: 8px;
		}

		@media only screen and (max-width: 767px) {
			.rbt-pagination li {
				margin: 4px;
			}
		}

		.rbt-pagination li a {
			width: 45px;
			height: 45px;
			background: var(--color-white);
			border-radius: 6px;
			text-align: center;
			color: RoyalBlue;
			transition: 0.4s;
			font-weight: 500;
			box-shadow: var(--shadow-1);
			display: flex;
			align-items: center;
			justify-content: center;
		}

		@media only screen and (max-width: 767px) {
			.rbt-pagination li a {
				width: 45px;
				height: 45px;
			}
		}

		.rbt-pagination li a i {
			font-size: 22px;
			font-weight: 500;
		}

		.rbt-pagination li.active a,
		.rbt-pagination li:hover a {
			background: RoyalBlue !important;
			color: white;
		}

		a:hover,
		a:focus,
		a:active {
			text-decoration: none;
			outline: none;
			color: var(--color-primary);
		}

		a:focus {
			outline: none;
		}
	</style>

</head>

<body>

	<!-- Preloader -->


	<!-- Header Area -->
	<?php include 'includes/navbar.php' ?>
	<?php
	include('../../Controller/config.php');
	include('../../Model/drugs.php');
	include('../../Controller/drugsC.php');

	$read = new MedicamentC();
	if (isset($_POST['btn_search'])) {
		$searchTerm = $_POST['search'];
		$result = $read->searchDrugs($searchTerm);
	} else {
		$result = $read->read_med();
	}

	//delete drugs


	if (isset($_POST['btn_delete'])) {
		$id_med = $_POST['id_med'];
		$delmed = new MedicamentC();
		$delmed->deleteMedicament($id_med);
	}

	/*$read = new MedicamentC();
	$result = $read->read_med();*/


	?>
	<!-- End Header Area -->

	<!-- Breadcrumbs -->
	<div class="breadcrumbs overlay">
		<div class="container">
			<div class="bread-inner">
				<div class="row">
					<div class="col-12">
						<h2>Medicament </h2>
						<ul class="bread-list">
							<li><a href="index.php">Home</a></li>
							<li><i class="icofont-simple-right"></i></li>
							<li class="active">Medicament</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Single News -->
	<section class="blog section" id="blog">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Keep up with Our Most Recent Medical News.</h2>
						<img src="img/section-img.png" alt="#">
					</div>
				</div>
			</div>
			

			<div style="float: right;">


<form action="medicament.php" method="POST">
	<input type="text" name="search" style="width: 400px; height: 35px; background-color: white;margin-top:23px; border: 1px solid black;  box-shadow: 6px 6px 5px #888;" placeholder=" Product's Name...">
	<button type="submit" name="btn_search" style="width: 20px; height: 35px; background-color: RoyalBlue; margin-top:23px; border: 1px solid black; box-shadow: 6px 6px 5px #888; color:white;"><i class="fa fa-search"></i></button>
</form>
</div>
<br> <br> <br> <br>
			<div class='row'>


				<?php


				$totalElements = count($result);
				$elementsPerPage = 3;
				$totalPages = ceil($totalElements / $elementsPerPage);
				$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
				$startIndex = ($currentPage - 1) * $elementsPerPage;
				$currentPageElements = array_slice($result, $startIndex, $elementsPerPage);

				if (is_array($result) && !empty($result)) {
					foreach ($currentPageElements as $row) {
						//print_r($row);
						echo "

				
				<div class='col-lg-4 col-md-6 '>
					<!-- Single Blog -->
					<div class='single-news'>
						<div class='news-head'>
							<a href='singledwe.php?id_med={$row['id_med']}'><img src='../../src/{$row['img']}' alt='#'></a>
						</div>
						<div class='news-body'>
							<div class='news-content'>
							<center>
								<div class='date'>{$row['nom']}</div>
								</center>
								

							</div>
						</div>
					</div>
				</div>
				<!-- End Single Blog -->
			
				";
					}
				}


				?>
			</div>
			<br> <br>

			<div class="row">
				<div class="col-lg-12 mt--60">
					<nav>
						<ul class="rbt-pagination">
							<?php if ($currentPage != 1) { ?>
								<li><a href="?page=<?php echo $currentPage - 1 ?>" aria-label="Previous"><i class="fa fa-arrow-left fa-lg"></i></a></li>
							<?php
							}
							?>
							<?php if ($currentPage > 1) { ?>
								<li><a href="?page=<?php echo $currentPage - 1 ?>"> <?php echo $currentPage - 1 ?> </a></li>

							<?php
							}
							?>

							<li class="active"><a href="#"><?php echo $currentPage; ?></a></li>

							<?php if ($currentPage < $totalPages) { ?>
								<li><a href="?page=<?php echo $currentPage + 1 ?>"><?php echo $currentPage + 1 ?></a></li>
								<li><a href="?page=<?php echo $currentPage + 1 ?>" aria-label="Next">
										<i class="fa fa-arrow-right fa-lg"></i>
										<?php

										?>
										</i></a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>





			</div>

	</section>
	<!--/ End Single News -->

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
										<a href="medicament.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Products</a>
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
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
</body>

</html>