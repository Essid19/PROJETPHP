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
	<?php include 'includes/navbar.php' ?>
	<?php

	include '../../Controller/config.php';
	include '../../Controller/usersC.php';
	include '../../Controller/appoinmentC.php';
	include '../../Controller/commandeC.php';
	include '../../Controller/drugsC.php';

	$id_user = $_SESSION['user_id'];
	$controller = new apppoinementC();
	$result = $controller->readAllRdvforoneuser($id_user);

	$Controler = new usersC();
	$Read = $Controler->read($id_user);







	?>
	<?php




	// Fetch the data from the database
	$newcommandeC = new CmdC();
	$results = $newcommandeC->readAllforuser($id_user);


	if (isset($_POST['delite'])) {
		$dateToDelete = $_POST['delete_date'];
		$newc = new pannC();
		$newc->deleteByDate($dateToDelete);
	}




	?>

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
			<ul class="nav nav-tabs active" id="myTab" role="tablist">
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
			<div class="tab-content active" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="table-responsive">
						<table class="table active">
							<thead>
								<tr class="text-center">

									<th>DATE RDV</th>
									<th>DOCTOR NAME</th>
									<th>TIME</th>
									<th>STATUS</th>
									<th>UPDATE</th>
									<th>DELETTE</th>
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
	<th><a href='updateappoinement.php?id_rdv={$row['id_rendezvous']}'  style='background-color: white; color:MediumBlue'><i class='fa fa-pencil'></i></a></th>
	<th><a href='deleteappoinement.php?id_rdv={$row['id_rendezvous']}'  style='background-color: white; color:MediumBlue'><i class='fa fa-trash'></i></a></th>
</tr>";
								}

								?>

							</tbody>
						</table><a href='' style="color: red;"></a>
					</div>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr class="text-center">
									<th style="text-align: left;">Medicament</th>
									<th style="text-align: left;">Quantity</th>
									<th style="text-align: left;">Prix</th>
								</tr>
							</thead>
							<tbody id="housesadmin">
								<?php





								// Initialiser la variable pour le total
								$totalPrix = 0;

								foreach ($results as $order) {
									$controller = new MedicamentC();
									$res = $controller->getMedicamentById($order['id_med']);

									// Calculer le prix total pour chaque commande
									$prixTotalCommande = $order['qte_cmd'] * $res[0]['prix'];

									// Ajouter le prix total de la commande au total général
									$totalPrix += $prixTotalCommande;

									// Stocker les valeurs dans les tableaux respectifs

								?>
									<tr>
										<td>
											<div class="form-group">
												<?php
												echo $res[0]['nom'];
												?>
											</div>
										</td>
										<td>
											<div class="form-group">
												<?php echo $order['qte_cmd']; ?>
											</div>
										</td>
										<td>
											<div class="form-group">
												<?php echo $res[0]['prix'] ?>
											</div>
										</td>
										<td>
											<form>
												<a href="supprimerDrugs.php?id_cmd=<?php echo $order['id_cmd']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet article du panier ?');" class=" tm-product-delete-link"><i class='fa fa-trash'></i></a>
											</form>
										</td>
										</td>
										<td>
											<form method="POST" action="updatedrug.php">
												<a href="updatedrug.php?id_cmd=<?php echo $order['id_cmd'] ?>" class=" tm-product-update-link" name="apply_changes">
													<i class='fa fa-pencil'></i>
												</a>
												<input type="hidden" value="<?php echo $order['id_cmd']; ?>" name="id_cmd">
											</form>
										</td>
									</tr>
								<?php
								}


								?>

							</tbody>
						</table>
						<div class="text-center">
							<p><strong>Total Prix: <?php echo $totalPrix; ?> DT</strong></p>
							<p><strong>Frais de la livraison: 7 DT</strong></p>

						</div>
						<tr>
							<!--<div class="text-center">
								<form method="POST" action="updatedrug.php">
									<button type="submit" class="btn btn-success">Confirmer la commande</button>
								</form>
passerunecommande							</div>-->
						</tr>
						<div class="text-center">

							<form method="POST">
								<a href="passerunecommande.php?id=<?php echo $id_user; ?>&email=<?php echo $Read[0]['email']; ?>" class="btn btn-success" name='bouton_passer_caisse' style="color: #fff;" type="submit">Passer à la Caisse</a>
							</form>
						</div>
						<br><br>
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
														<p><strong>Total Prix: <?php echo $prixtotale + 7; ?> DT</strong></p>
													</td>
												</tr>

												<tr>
													<td colspan="3"></td>
													<td style="text-align: center;">
														<form method="POST">
															<input type="hidden" name="delete_date" value="<?php echo $a; ?>">
															<button onclick="return confirm('Voulez-vous vraiment supprimer cet article du vos commandes ?');" name='delite' class="btn" type="submit">Delete <i class='fa fa-trash'></i></button>
														</form>
														<form method="POST">
															<input type="hidden" name="imprimer_date" value="<?php echo $a; ?>">
															<a href="pdf.php?date=<?php echo $a; ?>" name='imprimer' type="submit" class="btn" style="margin-top: 10px;">Imprimer <i class='fa fa-print'></i></a>
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