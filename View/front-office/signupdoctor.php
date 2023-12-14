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
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
  <?php include 'includes/navbar.php' ?>

  <!-- End Header Area -->

  <!-- Breadcrumbs -->
  <div class="breadcrumbs overlay">
    <div class="container">
      <div class="bread-inner">
        <div class="row">
          <div class="col-12">
            <h2>Signup Doctor</h2>
            <ul class="bread-list">
              <li><a href="index.php">Home</a></li>
              <li><i class="icofont-simple-right"></i></li>
              <li class="active">Signup Doctor</li>
            </ul>
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
              <h2>Signup here</h2>
              <!-- Form -->
              <form class="form" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" name="nom" id="firstNameInput" placeholder="firstName" required="" />
                      <div id="error-message-firstname" style="color: red"></div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" name="prenom" placeholder="lastName" id="lastNameInput" />
                      <div id="error-message-lastname" style="color: red"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="email" name="email" placeholder="Email" required="" id="email" />
                      <div id="error-message-email" style="color: red"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="password" name="pwd" placeholder="pwd" required="" id="pwd" />
                      <div id="error-message-pwd" style="color: red"></div>
                    </div>
                  </div>
                  <div class="col-lg-6 form-group">
                    <input type="text" id="select" name="specialite" placeholder="Specialite" />
                    <div id="error-message-category" style="color: red"></div>
                  </div>
                  <div class="col-lg-6 form-group">
                    <input type="text" id="adresse" name="adresse" placeholder="adresse" />
                    <div id="error-message-adresse" style="color: red"></div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <textarea placeholder="experience" required="" name="experience" id="experience"></textarea>
                    </div>
                    <div id="error-message-experience" style="color: red"></div>
                  </div>
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="file" class="custom-file-input" name="file" required="" id="fileInput" style="display: none" />
                      <button type="button" id="customButton" class="btn btn-primary">
                        mettez votre photo ici
                      </button>
                      <div style="color: red"></div>
                    </div>
                  </div>
                  <div class="col-lg-3"></div>

                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                    <div class="form-group login-btn">
                      <div id="error" style="color: red"></div>
                      <br>
                      <div class="col-lg- 6">
                        <div class="g-recaptcha" data-sitekey="6LfPwigpAAAAACteJ9Yc5unT7f7u7nxXy8lVS2SX

"></div>
                      </div>
                      <br>
                      <br>
                      <button class="btn" type="submit" id="signupButton" name="btn" disabled>
                        Signup
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-3"></div>
                </div>
                <?php
                include '../../Controller/config.php';

                include '../../Model/user.php';
                include '../../Controller/usersC.php';

                if (isset($_POST['btn'])) {
                  if (empty($_POST['g-recaptcha-response'])) {
                    echo '<div style="color: red;" class="alert alert-danger  mb-4">verify that u are a human </div>';
                  } else {
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $email = $_POST['email'];
                    $controller = new usersC();
                    $result = $controller->isEmailUnique($email);
                    $pwd = $_POST['pwd'];
                    $adresse = $_POST['adresse'];
                    $specialite = $_POST['specialite'];
                    $experience = $_POST['experience'];
                    $img = $_FILES['file']['name'];
                    $img_temp = $_FILES['file']['tmp_name'];
                    move_uploaded_file($img_temp, "../../src/" . $img);

                    if ($result) {
                      $user = new user();
                      $user->doctor($nom, $prenom, $email, $pwd, $adresse, $specialite, $experience, $img, "doctor");
                      $result = $controller->adddoctor($user);
                      echo '<script>window.location.href = "login.php";</script>';
                      exit;
                    } else {
                      echo '<div style="color: red;" class="alert alert-danger">Email already exists!</div>';
                    }
                  }
                }
                ?>
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
  <script>
    const firstNameInput = document.getElementById("firstNameInput");
    const errorFirstName = document.getElementById("error-message-firstname");
    const lastNameInput = document.getElementById("lastNameInput");
    const errorLastName = document.getElementById("error-message-lastname");
    const emailInput = document.getElementById("email");
    const errorEmail = document.getElementById("error-message-email");
    const categorySelect = document.getElementById("select");
    const errorCategory = document.getElementById("error-message-category");
    const experienceTextarea = document.getElementById("experience");
    const errorExperience = document.getElementById("error-message-experience");
    const fileInput = document.getElementById("fileInput");
    const errorFile = document.getElementById("error-message-file"); // Ajout du message d'erreur pour le fichier
    const signupButton = document.getElementById("signupButton");
    const passwordInput = document.getElementById("pwd");
    const errorPassword = document.getElementById("error-message-pwd");
    const adresseInput = document.getElementById("adresse");
    const erroradresse = document.getElementById("error-message-adresse");
    firstNameInput.addEventListener("keyup", validateFirstName);
    lastNameInput.addEventListener("keyup", validateLastName);
    emailInput.addEventListener("keyup", validateEmail);
    categorySelect.addEventListener("keyup", validateCategory);
    experienceTextarea.addEventListener("keyup", validateExperience);
    passwordInput.addEventListener("keyup", validatePassword);
    adresseInput.addEventListener("keyup", validateAdresse);

    function validateFirstName() {
      const firstName = firstNameInput.value.trim();
      // Utilisez une expression régulière pour vérifier que le prénom ne contient que des lettres et des espaces
      if (/^[A-Za-z\s]*$/.test(firstName) && firstName.length > 3) {
        errorFirstName.textContent = "";
      } else {
        errorFirstName.textContent =
          "Le prénom doit contenir plus de 3 caractères et ne doit contenir que des lettres et des espaces.";
      }
      validateForm();
    }



    function validateLastName() {
      const lastName = lastNameInput.value.trim();
      // Utilisez une expression régulière pour vérifier que le nom de famille ne contient que des lettres et des espaces
      if (/^[A-Za-z\s]*$/.test(lastName) && lastName.length > 3) {
        errorLastName.textContent = "";
      } else {
        errorLastName.textContent =
          "Le nom de famille doit contenir plus de 3 caractères et ne doit contenir que des lettres et des espaces.";
      }
      validateForm();
    }

    function validateEmail() {
      const email = emailInput.value.trim();
      if (/^\S+@\S+\.\S+$/.test(email)) {
        errorEmail.textContent = "";
      } else {
        errorEmail.textContent = "Adresse e-mail non valide.";
      }
      validateForm();
    }

    function validateCategory() {
      const category = categorySelect.value.trim();
      if (/^[A-Za-z\s]*$/.test(category) && category.length > 3) {
        errorCategory.textContent = "";
      } else {
        errorCategory.textContent = "donner une specialite valide";
      }
      validateForm();
    }

    function validateAdresse() {
      const category = adresseInput.value.trim();
      if (/^[A-Za-z\s]*$/.test(category) && category.length > 3) {
        erroradresse.textContent = "";
      } else {
        erroradresse.textContent = "donner une adresse valide";
      }
      validateForm();
    }


    function validateExperience() {
      const experience = experienceTextarea.value.trim();
      if (experience.length > 10) {
        errorExperience.textContent = "";
      } else {
        errorExperience.textContent =
          "L'expérience doit contenir plus de 10 caractères.";
      }
      validateForm();
    }

    function validatePassword() {
      const password = passwordInput.value.trim();
      if (password.length > 5) {
        errorPassword.textContent = "";
      } else {
        errorPassword.textContent =
          "Le mot de passe doit contenir plus de 5 caractères.";
      }
      validateForm();
    }

    function validateForm() {
      const isFirstNameValid =
        firstNameInput.value.trim().length > 3 && !/\d/.test(firstNameInput.value);
      const isLastNameValid = lastNameInput.value.trim().length > 5;
      const isEmailValid = /^\S+@\S+\.\S+$/.test(emailInput.value.trim());
      const isCategoryValid = categorySelect.value !== "";
      const isExperienceValid = experienceTextarea.value.trim().length > 10;
      const isPasswordValid = passwordInput.value.trim().length > 5; // Nouvelle validation du mot de passe
      const isAdresseValid = adresseInput.value !== "";

      if (
        isFirstNameValid &&
        isLastNameValid &&
        isEmailValid && // Vérification du champ téléphone
        isCategoryValid &&
        isExperienceValid &&
        isPasswordValid &&
        isAdresseValid
      ) {
        signupButton.disabled = false; // Activation du bouton Signup
      } else {
        signupButton.disabled = true; // Désactivation du bouton Signup
      }
    }
  </script>
</body>

</html>