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
  <!-- Preloader -->

  <!-- Header Area -->
  <?php
  include '../../Controller/config.php';
  include 'includes/navbar.php' ?>
  <?php
  include('../../Model/drugs.php');
  include('../../Controller/drugsC.php');
  if (isset($_POST['btn_add'])) {

    $nom = $_POST['name'];

    $description = $_POST['description'];
    $prix = $_POST['price'];
    $id_catg = $_POST['category'];
    $qte_med = $_POST['qte'];

    $id_ph = $_SESSION['user_id'];


    // Vérifie si un fichier a été téléchargé
    if (isset($_FILES['file'])) {
      $img = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_type = $_FILES['file']['type'];

      // Déplace le fichier téléchargé vers le dossier de destination src
      move_uploaded_file($file_tmp, "../../src/" . $img);
    }

    $DrugsC = new MedicamentC();

    $Drugs = new Medicament($nom, $description, $prix, $qte_med, $id_catg, $img, $id_ph);

    $DrugsC->addMedicament($Drugs);

    echo '<script>window.location.href = "dashpharmacie.php";</script>';
  }
  $id_ph = $_SESSION['user_id'];
  //récuperer category
  $lire = new qtc();
  $results = $lire->read_catg($id_ph);


  ?>





  <!-- End Header Area -->

  <!-- Breadcrumbs -->
  <div class="breadcrumbs overlay">
    <div class="container">
      <div class="bread-inner">
        <div class="row">
          <div class="col-12">
            <h2>Add drugs</h2>
            <ul class="bread-list">
              <li><a href="index.php">Home</a></li>
              <li><i class="icofont-simple-right"></i></li>
              <li class="active">Add drugs</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <!-- Start add drugs -->
  <section class="contact-us section">
    <div class="container">
      <div class="inner">
        <div class="row">
          <div class="col-lg-12">
            <div class="contact-us-form">
              <h2>Add here</h2>
              <!-- Form -->
              <form class="form" id="med_form" method="POST" action="adddrugs.php" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" name="name" id="name" placeholder="name" required="required" />
                      <span id="parag_name"></span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <label>Select Category:</label>
                    <div class="form-group">

                      <select type="text" name="category" id="category" placeholder="category" required="required ">
                        <option>Category</option>
                        <?php
                        foreach ($results as $row) { ?>
                          <option value="<?php echo $row['id_catg']; ?>"><?php echo $row['nom']; ?></option>

                        <?php
                        }
                        ?>


                      </select>
                      <span id="parag_category"></span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" name="description" id="description" placeholder="description" required="required" />
                      <span id="parag_description"></span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">

                      <input type="text" name="price" id="price" placeholder="price" required="required" />
                      <span id="parag_price"></span>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" name="qte" id="qte" placeholder="quantity" required="required" />
                      <span id="parag_qte"></span>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="file" class="custom-file-input" name="file" required="required" id="fileInput" style="display: none" />
                      <button type="button" id="customButton" class="btn btn-primary">
                        mettez la photo de medicament ici
                      </button>
                      <div style="color: red"></div>
                    </div>
                  </div>
                  <div class="col-lg-3"></div>

                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                    <div class="form-group login-btn">
                      <button name="btn_add" class="btn" type="submit">Add drugs</button>
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
  </div>
  </form>
  <script>
    const customButton = document.getElementById("customButton");
    const fileInputs =
      document.getElementsByClassName("custom-file-input");

    // Ajoutez un écouteur d'événements "click" à chaque élément avec la classe "custom-file-input"
    customButton.addEventListener("click", function() {
      for (const fileInput of fileInputs) {
        fileInput.click(); // Cliquez sur l'input de type "file" correspondant
      }
    });
  </script>
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
                Lorem ipsum dolor sit am consectetur adipisicing elit do
                eiusmod tempor incididunt ut labore dolore magna.
              </p>
              <!-- Social -->
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
              <h2>Quick Links</h2>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Cases</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Other Links</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Consuling</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Finance</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Testimonials</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>FAQ</a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer">
              <h2>Open Hours</h2>
              <p>
                Lorem ipsum dolor sit ame consectetur adipisicing elit do
                eiusmod tempor incididunt.
              </p>
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
              <p>
                subscribe to our newsletter to get allour news in your inbox..
                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              </p>
              <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
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
                © Copyright 2018 | All Rights Reserved by
                <a href="https://www.wpthemesgrid.com" target="_blank">wpthemesgrid.com</a>
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
  <script src="C:\wamp64\www\raslen\View\script\drugs.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var form = document.getElementById("med_form");
      form.addEventListener("submit", function(event) {
        // champ nom
        var name_saisie = document.getElementById("name");
        var nameInput = name_saisie.value;
        var spanNom = document.getElementById("parag_name");

        // champ description
        var description_saisie = document.getElementById("description");
        var descriptionInput = description_saisie.value;
        var spandescription = document.getElementById("parag_description");
        // champ price
        var price_saisie = document.getElementById("price");
        var priceInput = price_saisie.value;
        var spanprice = document.getElementById("parag_price");
        // champ quantite
        var qte_saisie = document.getElementById("qte");
        var qteInput = qte_saisie.value;
        var spanqte = document.getElementById("parag_qte");

        // controle de saisie pour les lettres
        const regexLettresChiffres = /^[a-zA-Z0-9\s]+$/;
        // Contrôle de saisie pour les prix
        const regexPrix = /^\d+(\.\d{1,2})?$/;
        // Contrôle de saisie pour la quantité (nombre entier positif)
        const regexQuantite = /^\d+$/
        // Expression régulière pour autoriser les lettres, les chiffres, les espaces et vérifier au moins un caractère autre qu'un symbole
        const regexDescription = /^[a-zA-Z0-9]+$/;
        // verifier le nom saisi
        if (nameInput.length > 3 && regexLettresChiffres.test(nameInput)) {
          spanNom.textContent = "";
        } else {
          spanNom.textContent =
            "Veuillez entrer un nom valide (lettres uniquement)";
          spanNom.style.color = "red";
          event.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
        }

        // verifier le description saisi
        if (descriptionInput.length > 5) {
          spandescription.textContent = "";
        } else {
          spandescription.textContent =
            "Veuillez entrer une description valide ";
          spandescription.style.color = "red";
          event.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
        }
        if (regexPrix.test(priceInput)) {
          spanprice.textContent = "";
        } else {
          spanprice.textContent = "Veuillez entrer un prix valide";
          spanprice.style.color = "red";
          event.preventDefault();
        }
        if (regexQuantite.test(qteInput)) {
          spanqte.textContent = "";
        } else {
          spanqte.textContent = "Veuillez entrer une quantite valide (nombre positif uniquement )";
          spanqte.style.color = "red";
          event.preventDefault();
        }
      });
    });
  </script>
</body>

</html>