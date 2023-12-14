<?php

include '../../Controller/config.php';
include '../../Controller/commandeC.php';
session_start();

// Fetch the data from the database 
$newcommandeC = new CmdC();
$results = $newcommandeC->readAll();
if (isset($_POST['imprimer'])) {
	$imprimer_date = isset($_POST['imprimer_date']) ? $_POST['imprimer_date'] : null;

	if ($imprimer_date !== null) {
		// Include the PDF generation code here with $imprimer_date
		include 'C:\wamp64\www\snm\View\front-office\pdf.php';
		include '../front-office/pdf.php';
	}
}
if (isset($_POST['mail'])) {
	require 'confirmation_commande.php';
}
if (isset($_POST['delite'])) {
	$dateToDelete = $_POST['delete_date'];
	$newc = new pannC();
	$newc->deleteByDate($dateToDelete);
	// Ajoutez ici toute autre logique de redirection ou d'affichage
}




?>

<?php
include '../../Controller/usersC.php';
include '../../Controller/appoinmentC.php';

$id_user = $_SESSION['user_id'];
$controller = new apppoinementC();
$result = $controller->readAllRdvforoneuser($id_user);




?>



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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Vkoo8qMyvjnXLGq6qDg6+PYYsB82vKQHz6dU9uEPs5L" crossorigin="anonymous">

</head>

<body>

	<!-- Preloader -->


	<!-- Header Area -->
	<header class="header">
		<!-- Topbar -->
		<!-- End Topbar -->
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-2">
							<!-- Start Logo -->
							<div class="logo">
								<a href="index.php"><img src="img/logo.png" alt="#" /></a>
							</div>
							<!-- End Logo -->
							<!-- Mobile Nav -->

							<!-- End Mobile Nav -->
						</div>
						<div class="col-lg-8 col-md-10 col-8">
							<!-- Main Menu -->
							<div class="main-menu">
								<nav class="navigation">
									<ul class="nav menu">
										<li><a href="index.php">Home </a></li>
										<li><a href="../back-office/index.php">ADMIN</a></li>
										<li><a href="doctors.php">Doctors </a></li>
										<li><a href="dashdoctor.php">Doctor </a></li>
										<li><a href="dashpatient.php">user</a></li>
										<li><a href="dashpharmacie.php">pharmacy </a></li>
										<li><a href="medicament.php">drugs </a></li>
										<li>
											<a href="#">Signup <i class="icofont-rounded-down"></i></a>
											<ul class="dropdown">
												<li><a href="signupclient.php">Patient</a></li>
												<li><a href="signuppharmacie.php">Pharmacy</a></li>
												<li><a href="signupdoctor.php">Doctor</a></li>
											</ul>
										</li>
										<li><a href="login.php">Login</a></li>
									</ul>
								</nav>
							</div>
							<!--/ End Main Menu -->
						</div>
						<div class="col-lg-2 col-12">
							<div class="get-quote">
								<a href="contact.php" class="btn">Contact us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!-- End Header Area -->

	<!-- Breadcrumbs -->
	<div class="breadcrumbs overlay">
		<div class="container">
			<div class="bread-inner">
				<div class="row">
					<div class="col-12">
						<h2>Dashboard doctor</h2>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	<section class="product_description_area">
		<div class="container">
			<div id="updateUser"></div>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Appointments</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">🛒</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="false">Vos Commandes</a>
				</li>


			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr class="text-center">
									<th>ID</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>tel</th>
									<th>Pwd</th>
									<th>Stauts</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php

								foreach ($result as $row) {
									$c = new usersC();
									$res = $c->read($row['id_d']);
									echo "
	<tr class='text-center'>									
	<th>{$row['date']}</th>
	<th>{$res[0]['nom']}</th>
	<th>{$row['time']}</th>
	<th>{$row['status']}</th>
	<th><a href='updateappoinement.php?id_rdv={$row['id_rendezvous']}' class='btn btn-success' style='background-color: green; color:white'>UPDATE</a></th>
	<th><a href='deleteappoinement.php?id_rdv={$row['id_rendezvous']}' class='btn btn-danger' style='background-color: red; color:white'>DELETTE</a></th>
</tr>";
								}

								?>

							</tbody>
						</table>
					</div>
				</div>


				<div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="home-tab">
					<div class="table-responsive">
						<table class="table">

							<tbody id="usersadmin">
								<?php
								echo '<thead>
								<tr class="text-center">
									<th style="text-align: left;">Medicament</th>
									<th style="text-align: left;">Quantity</th>
									<th style="text-align: left;">Prix</th>
								</tr>
							</thead>';
								if (isset($_SESSION['dates'])) {
									$dates = $_SESSION['dates'];

									if (empty($dates)) {
										echo 'aucune commande';
									} else {
										$newc = new pannC();

										foreach ($dates as $date) {
											$result = $newc->readwithdate($date);
											$firstRow = true;


											$prixtotale = 0; // Réinitialiser le prix total pour chaque date


											foreach ($result as $row) {
								?>
												<tr>
													<td><?php
														$c = new MedicamentC();
														$ress = $c->getMedicamentById($row['id_med']);
														echo $ress[0]['nom'];
														?></td>
													<td><?php echo $row['qte_med']; ?></td>
													<td><?php echo $ress[0]['prix']; ?></td>
													<?php $prixtotale += $ress[0]['prix'] * $row['qte_med'];
													$a = $row['date']; ?>
												</tr>
											<?php
												$firstRow = false;
											}
											if ($firstRow == false) {
											?>
												<tr>
													<td colspan="3"></td>
													<td style="text-align: right; font-weight: bold;">
														<p><strong>Total Prix: <?php echo $prixtotale; ?> DT</strong></p>

													</td>
												</tr>

												<tr>
													<td colspan="3"></td>
													<td style="text-align: center;">
														<form method="POST">
															<input type="hidden" name="delete_date" value="<?php echo $a; ?>">
															<button onclick="return confirm('Voulez-vous vraiment supprimer cet article du vos commandes ?');" class="btn btn-danger" name='delite' type="submit">DELETE</button>
														</form>
														<form method="POST">
															<input type="hidden" name="imprimer_date" value="<?php echo $a; ?>">
															<button class="btn btn-success" name='imprimer' type="submit" style="margin-top: 10px;">Imprimer</button>
														</form>


													</td>
												</tr>
								<?php
											}
										}
									}
								}
								?>



							</tbody>
						</table>





					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Start Contact Us -->

	<!--/ End Contact Us -->

	<!-- Footer Area -->
	<footer id="footer" class="footer ">
		<!-- Footer Top -->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>About Us</h2>
							<p>Lorem ipsum dolor sit am consectetur adipisicing elit do eiusmod tempor incididunt ut labore dolore magna.</p>
							<!-- Social -->
							<ul class="social">
								<li><a href="#"><i class="icofont-facebook"></i></a></li>
								<li><a href="#"><i class="icofont-google-plus"></i></a></li>
								<li><a href="#"><i class="icofont-twitter"></i></a></li>
								<li><a href="#"><i class="icofont-vimeo"></i></a></li>
								<li><a href="#"><i class="icofont-pinterest"></i></a></li>
							</ul>
							<!-- End Social -->
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer f-link">
							<h2>Quick Links</h2>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<ul>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Cases</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Other Links</a></li>
									</ul>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<ul>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Consuling</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Finance</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Testimonials</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>FAQ</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>Open Hours</h2>
							<p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.</p>
							<ul class="time-sidual">
								<li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
								<li class="day">Saturday <span>9.00-18.30</span></li>
								<li class="day">Monday - Thusday <span>9.00-15.00</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>Newsletter</h2>
							<p>subscribe to our newsletter to get allour news in your inbox.. Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="email" placeholder="Email Address" class="common-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'" required="" type="email">
								<button class="button"><i class="icofont icofont-paper-plane"></i></button>
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
							<p>© Copyright 2018 | All Rights Reserved by <a href="https://www.wpthemesgrid.com" target="_blank">wpthemesgrid.com</a> </p>
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