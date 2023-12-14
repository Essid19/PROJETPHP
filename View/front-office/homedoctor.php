<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="keywords" content="Site keywords here" />
  <meta name="description" content="" />
  <meta name="copyright" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Title -->
  <title>Mediplus - Free Medical and Doctor Directory HTML Template.</title>

  <!-- Favicon -->
  <link rel="icon" href="img/favicon.png" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="css/nice-select.css" />
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <!-- icofont CSS -->
  <link rel="stylesheet" href="css/icofont.css" />
  <!-- Slicknav -->
  <link rel="stylesheet" href="css/slicknav.min.css" />
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="css/owl-carousel.css" />
  <!-- Datepicker CSS -->
  <link rel="stylesheet" href="css/datepicker.css" />
  <!-- Animate CSS -->
  <link rel="stylesheet" href="css/animate.min.css" />
  <!-- Magnific Popup CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css" />

  <!-- Medipro CSS -->
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="css/responsive.css" />



</head>

<body>

  <!-- Le reste de votre contenu d'en-tête -->

  <!-- Preloader -->
  <div class="preloader">
    <div class="loader">
      <div class="loader-outter"></div>
      <div class="loader-inner"></div>

      <div class="indicator">
        <svg width="16px" height="12px">
          <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
          <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
        </svg>
      </div>
    </div>
  </div>
  <!-- End Preloader -->




  <!-- Header Area -->
  <?php include 'includes/navbar.php'

  ?>

  <?php
  include('../../Controller/config.php');

  include '../../Controller/usersC.php';
  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

  $readd = new usersC();
  $appo = $readd->countrdv($user_id);
  $read = $readd->readall($user_id);
  $forum = $readd->countForums($user_id);


  ?>

  <!-- End Header Area -->

  <!-- Slider Area -->
  <section class="slider">
    <div class="hero-slider">
      <!-- Start Single Slider -->
      <div class="single-slider" style="background-image: url('img/<?php echo $read[0]['img']; ?>')">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="text">
                <h1>
                  Doctor <span><?php echo $read[0]['nom'];
                                ?></span> <?php echo $read[0]['prenom']; ?>

                </h1>
                <p>
                  <?php echo $read[0]['experience']; ?>
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Single Slider -->
      <!-- Start Single Slider -->
      <div class="single-slider" style="background-image: url('img/<?php echo $read[0]['img']; ?>')">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="text">
                <h1>
                  Doctor <span><?php echo $read[0]['nom'];
                                ?></span> <?php echo $read[0]['prenom']; ?>

                </h1>
                <p>
                  <?php echo $read[0]['experience']; ?>
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Start End Slider -->
      <!-- Start Single Slider -->

      <!-- End Single Slider -->
    </div>
  </section>
  <!--/ End Slider Area -->

  <!-- Start Schedule Area -->

  <!--/End Start schedule Area -->

  <!-- Start Feautes -->

  <!--/ End Feautes -->

  <!-- Start Fun-facts -->
  <div id="fun-facts" class="fun-facts section overlay">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <!-- Start Single Fun -->
          <div class="single-fun">
            <i class="icofont icofont-paper"></i>
            <div class="content">
              <span class="counter"><?php echo $appo; ?></span>
              <p> My Appoinments</p>
            </div>
          </div>
          <!-- End Single Fun -->
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <!-- Start Single Fun -->
          <div class="single-fun">
            <i class="icofont-user-alt-3"></i>
            <div class="content">
              <span class="counter"><?php echo $appo; ?></span>
              <p> My Patients</p>
            </div>
          </div>
          <!-- End Single Fun -->
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <!-- Start Single Fun -->
          <div class="single-fun">
            <i class="icofont icofont-list"></i>
            <div class="content">
              <span class="counter"><?php echo $forum; ?></span>
              <p> My Forums</p>
            </div>
          </div>
          <!-- End Single Fun -->
        </div>



      </div>
    </div>
  </div>
  <!--/ End Fun-facts -->

  <!-- Start Why choose -->

  <!--/ End Why choose -->

  <!-- Start Call to action -->

  <!--/ End Call to action -->

  <!-- Start portfolio -->

  <!--/ End portfolio -->

  <!-- Start service -->

  <div>
    <br>

  </div>
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
  <!-- Bootstrap JS -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Main JS -->
  <script src="js/main.js"></script>
  <!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      const darkSwitch = document.getElementById('darkSwitch');
      const body = document.body;


      // Vérifiez le statut du mode sombre lors du chargement de la page
      if (localStorage.getItem('dark-mode') === 'enabled') {
        body.classList.add('dark-mode');

        darkSwitch.checked = true;
      }

      // Ajoutez un écouteur d'événement au changement du commutateur
      darkSwitch.addEventListener('change', () => {
        body.classList.toggle('dark-mode', darkSwitch.checked);

        // Enregistrez le choix de l'utilisateur dans le stockage local
        if (body.classList.contains('dark-mode')) {
          localStorage.setItem('dark-mode', 'enabled');
        } else {
          localStorage.setItem('dark-mode', 'disabled');
        }
      });
    });
  </script>-->

</body>

</html>