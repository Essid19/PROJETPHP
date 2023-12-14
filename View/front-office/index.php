<?php
include('../../Controller/config.php');
include '../../Controller/drugsC.php';
include '../../Controller/usersC.php';
$read = new MedicamentC();
$drugs = $read->countdrugs();
$readd = new usersC();
$doc = $readd->countDoctors();
$pat = $readd->countPatients();
$phar = $readd->countPharmacies();
?>





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
  <?php include 'includes/navbar.php' ?>

  <!-- End Header Area -->

  <!-- Slider Area -->
  <section class="slider">
    <div class="hero-slider">
      <!-- Start Single Slider -->
      <div class="single-slider" style="background-image: url('img/dweee.jpg') ">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="text">
                <h1>
                  Welcome To <span> Medi</span>Plus
                  <span>+</span>
                </h1>
                <strong>
                <p style="color:black">
                  Explore our extensive range of carefully curated parapharmacy products for your well-being. From nutrition to beauty, we're here to guide you towards a healthier life.

                  Meet our qualified online doctors and schedule appointments with just a few clicks. Receive personalized medical advice without leaving the comfort of your home.
                </p>
                </strong>
                <br>
                <h5>
                  <span style="color:cornflowerblue;">Our Services:</span>
                </h5>
                <div>
                  <p style="color:black">High-quality parapharmacy products</p>
                  <p style="color:black">Online consultations with medical experts</p>
                  <p style="color:black">Easy and fast appointment scheduling</p>

                </div>

                <p style="color:cornflowerblue;">Your health is our priority. Explore our site now and embark on the path to health and well-being!</p>


              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Single Slider -->
     
      <!-- Start Single Slider -->
      <div class="single-slider" style="background-image: url('img/slider.jpg')">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="text">
                <h1>
                  Welcome To <span> Medi</span>Plus
                  <span>+</span>
                </h1>
                <p>
                  Explore our extensive range of carefully curated parapharmacy products for your well-being. From nutrition to beauty, we're here to guide you towards a healthier life.

                  Meet our qualified online doctors and schedule appointments with just a few clicks. Receive personalized medical advice without leaving the comfort of your home.
                </p>
                <br>
                <h5>
                  <span style="color:cornflowerblue;">Our Services:</span>
                </h5>
                <div>
                  <p>High-quality parapharmacy products</p>
                  <p>Online consultations with medical experts</p>
                  <p>Easy and fast appointment scheduling</p>

                </div>

                <p style="color:cornflowerblue;">Your health is our priority. Explore our site now and embark on the path to health and well-being!</p>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Start End Slider -->
      <div class="single-slider" style="background-image: url('img/ecran.jpg') ">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="text">
                <h1>
                  Welcome To <span> Medi</span>Plus
                  <span>+</span>
                </h1>
                <strong>
                <p style="color:black">
                  Explore our extensive range of carefully curated parapharmacy products for your well-being. From nutrition to beauty, we're here to guide you towards a healthier life.

                  Meet our qualified online doctors and schedule appointments with just a few clicks. Receive personalized medical advice without leaving the comfort of your home.
                </p>
                </strong>
                <br>
                <h5>
                  <span style="color:cornflowerblue;">Our Services:</span>
                </h5>
                <div>
                  <p style="color:black">High-quality parapharmacy products</p>
                  <p style="color:black">Online consultations with medical experts</p>
                  <p style="color:black">Easy and fast appointment scheduling</p>

                </div>

                <p style="color:cornflowerblue;">Your health is our priority. Explore our site now and embark on the path to health and well-being!</p>


              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Start Single Slider -->
      <div class="single-slider" style="background-image: url('img/slider3.jpg')">
        <div class="container">
          <div class="row">
            <div class="col-lg-7">
              <div class="text">
                <h1>
                  Welcome To <span> Medi</span>Plus
                  <span>+</span>
                </h1>
                <p>
                  Explore our extensive range of carefully curated parapharmacy products for your well-being. From nutrition to beauty, we're here to guide you towards a healthier life.

                  Meet our qualified online doctors and schedule appointments with just a few clicks. Receive personalized medical advice without leaving the comfort of your home.
                </p>
                <br>
                <h5>
                  <span style="color:cornflowerblue;">Our Services:</span>
                </h5>
                <div>
                  <p>High-quality parapharmacy products</p>
                  <p>Online consultations with medical experts</p>
                  <p>Easy and fast appointment scheduling</p>

                </div>

                <p style="color:cornflowerblue;">Your health is our priority. Explore our site now and embark on the path to health and well-being!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
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
          <!-- Start Single Fun -->
          <div class="single-fun">
            <i class="icofont icofont-drug"></i>
            <div class="content">
              <span class="counter"><?php echo $drugs; ?></span>
              <p>Number of medications</p>
            </div>
          </div>
          <!-- End Single Fun -->
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <!-- Start Single Fun -->
          <div class="single-fun">
            <i class="icofont icofont-doctor"></i>
            <div class="content">
              <span class="counter"><?php echo $doc; ?></span>
              <p>Specialist Doctors</p>
            </div>
          </div>
          <!-- End Single Fun -->
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <!-- Start Single Fun -->
          <div class="single-fun">
            <i class="icofont-user-alt-3"></i>
            <div class="content">
              <span class="counter"><?php echo $pat; ?></span>
              <p> Patients</p>
            </div>
          </div>
          <!-- End Single Fun -->
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <!-- Start Single Fun -->
          <div class="single-fun">
            <i class="icofont icofont-pills"></i>
            <div class="content">
              <span class="counter"><?php echo $phar; ?></span>
              <p>Pharmacies</p>
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
  <section class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>We Offer Different Services To Improve Your Health</h2>
            <img src="img/section-img.png" alt="#" />

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Start Single Service -->
          <div class="single-service">
            <i class="icofont icofont-prescription"></i>
            <h4><a href="service-details.php">General Treatment</a></h4>
            <p>
              Experience personalized and comprehensive care with our General Treatment services. From routine check-ups to addressing common ailments, our dedicated healthcare professionals prioritize your overall well-being. Trust us for high-quality, compassionate care and a patient-centric approach to guide you on your path to better health
            </p>
          </div>
          <!-- End Single Service -->
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Start Single Service -->
          <div class="single-service">
            <i class="icofont icofont-tooth"></i>
            <h4><a href="service-details.php">Teeth Whitening</a></h4>
            <p>
              Unveil a brighter, more confident smile with our professional teeth whitening services. Our experienced dental professionals utilize state-of-the-art techniques to brighten your teeth, effectively removing stains and discoloration. Enjoy a personalized approach that caters to your unique dental needs, resulting in a radiant and rejuvenated smile. Say goodbye to teeth stains caused by lifestyle factors and embrace the brilliance of a whiter, more vibrant smile with our expert teeth whitening services
            </p>
          </div>
          <!-- End Single Service -->
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Start Single Service -->
          <div class="single-service">
            <i class="icofont icofont-heart-alt"></i>
            <h4><a href="service-details.php">Heart Surgery</a></h4>
            <p>
              At the forefront of cardiovascular care, our experienced medical team is dedicated to providing cutting-edge and compassionate heart surgery services. We understand the critical nature of cardiac health, and our skilled surgeons employ advanced techniques to address a range of heart conditions. From bypass surgeries to valve replacements, we prioritize patient safety and well-being throughout every step of the process. Trust us to deliver expert care, utilizing the latest medical advancements to ensure optimal outcomes and a healthier heart for you or your loved ones
            </p>
          </div>
          <!-- End Single Service -->
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Start Single Service -->
          <div class="single-service">
            <i class="icofont icofont-listening"></i>
            <h4><a href="service-details.php">Ear Treatment</a></h4>
            <p>
              Ear Treatment: Rediscover the joy of crystal-clear hearing with our specialized ear treatment services. Our team of skilled ENT specialists is committed to addressing a variety of ear-related concerns, from routine check-ups to the management of ear infections and hearing disorders. Utilizing state-of-the-art diagnostics and personalized care plans, we strive to provide effective solutions tailored to your unique needs. Whether you're experiencing discomfort, hearing loss, or seeking preventive care, trust us to deliver comprehensive and compassionate ear treatment, restoring your auditory well-being with expertise and care
            </p>
          </div>
          <!-- End Single Service -->
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Start Single Service -->
          <div class="single-service">
            <i class="icofont icofont-eye-alt"></i>
            <h4><a href="service-details.php">Vision Problems</a></h4>
            <p>
              Our dedicated team of eye care professionals is committed to preserving and enhancing your visual health. If you're experiencing vision problems, from blurred vision to eye discomfort, we offer comprehensive diagnostic and treatment services. Our experienced optometrists employ advanced technologies to assess your vision and create personalized solutions. Whether it's prescribing corrective lenses, managing eye conditions, or providing surgical interventions, our goal is to optimize your visual acuity and overall eye health. Trust us to address your vision problems with expertise, ensuring a clearer and brighter outlook for your eyes
            </p>
          </div>
          <!-- End Single Service -->
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Start Single Service -->
          <div class="single-service">
            <i class="icofont icofont-blood"></i>
            <h4><a href="service-details.php">Blood Transfusion</a></h4>
            <p>
              In times of critical medical need, our Blood Transfusion services stand as a lifeline, providing essential support to patients requiring blood replenishment. Our dedicated team of healthcare professionals ensures a safe and efficient process, from blood typing to transfusion. We adhere to the highest standards of safety and hygiene, prioritizing the well-being of both donors and recipients. Whether for surgical procedures, trauma care, or medical conditions requiring blood support, trust us to deliver timely and expertly managed blood transfusions, contributing to the health and recovery of those in need.
            </p>
          </div>
          <!-- End Single Service -->
        </div>
      </div>
    </div>
  </section>
  <!--/ End service -->

  <!-- Pricing Table -->

  <!--/ End Pricing Table -->

  <!-- Start Blog Area -->

  <!-- End Blog Area -->

  <!-- Start clients -->

  <!--/Ens clients -->

  <!-- Start Appointment -->

  <!-- End Appointment -->

  <!-- Start Newsletter Area -->

  <!-- /End Newsletter Area -->

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
                Welcome to our space, the online community dedicated to discussing health topics. Our mission is to provide an open and informative space for exchanging ideas, experiences, and advice on various health-related subjects.
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