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
  <style>
    .news-single {
      display: flex;
      justify-content: center;
      align-items: center;

    }

    .container {
      width: 80%;
      /* Adjust the width as needed */
      max-width: 1200px;
      margin: auto;
      /* Center the container horizontally */
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .col-12 {
      width: 100%;
      max-width: 800px;
      /* Adjust the maximum width as needed */
      margin: 0 auto;
      /* Center the column within the row */
    }

    .blog-comments,
    .comments-form {
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
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

  <!-- Get Pro Button -->
  
  <!-- Header Area -->
  <header class="header">
    <!-- Topbar -->
    <!-- End Topbar -->
    <!-- Header Inner -->
    <?php include 'includes/navbar.php' ?>
    <?php

    include '../../Controller/forumC.php';
    include '../../Model/forum.php';
    include '../../Controller/usersC.php';

    $user_id = $_SESSION['user_id'];
    //read forum from DB
    $id_forum = $_GET['id_forum'];

    $read = new frmC();
    $result = $read->getForumById($id_forum);

    $Controler = new usersC();
    $Read = $Controler->read($user_id);

    //recuperer les champs de formulaire et les envoyer a la BD
    if (isset($_POST['btn_cmn'])) {
      //echo "Formulaire soumis"; 
      $auteur = $Read[0]['nom'];
      $texte_cmn = $_POST['message'];




      $comment = new cmn($auteur, $texte_cmn, $id_forum, $user_id);
      $commentC = new CmnC();
      $commentC->addCmn($comment);
      echo '<script>window.location.href = "commenter.php?id_forum=' . $id_forum . '";</script>';
    }

    //read comment:
    $newcommentC = new CmnC();
    $resultCmn = $newcommentC->getCmnById($id_forum);

    //delete comment:
    if (isset($_POST['btn_delete'])) {
      $id_cmn = isset($_POST['id_cmn']) ? $_POST['id_cmn'] : null;
      $delcmn = new cmnC();
      $delcmn->deleteCmn($id_cmn);
      $url = 'commenter.php?id_forum=' . $id_forum;
      header('Location:' . $url);
    }

    $newcommentC = new CmnC();
    $resultCmn = $newcommentC->readAll();




    ?>

    <!--/ End Header Inner -->

  </header>
  <!-- End Header Area -->

  <!-- Breadcrumbs -->
  <div class="breadcrumbs overlay">
    <div class="container">
      <div class="bread-inner">
        <div class="row">
          <div class="col-12">
            <h2>Forum</h2>
            <ul class="bread-list">
              <li><a href="index.php">Home</a></li>
              <li><i class="icofont-simple-right"></i></li>
              <li class="active">Commenter Forum</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->

  <!-- Single News -->
  <!-- Single News -->

  <section class="news-single section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-12">
          <div class="row">
            <?php
            foreach ($result as $row) {
              echo "
              <div class='col-12'>
              <div class='single-main' style='display: flex; align-items: center;'>
                <!-- News Head -->
                <div class='news-head' style='margin-right: 20px;'width: 500px; height:300px;'>
                  <img src='../../src/{$row['img']}' alt='#' />
                </div>
            
                <!-- News Text -->
                <div style='display: flex; flex-direction: column; border: 2px solid #ddd; box-shadow: 13px 3px 30px rgba(0, 0, 0, 0.1); padding: 15px;'>
                  <div>
                    <span style='color: #3498db; font-size: 10px; font-weight: bold; margin-bottom: 5px;'>Name:</span> {$row['auteur']}
                  </div>
                  <div>
                    <span style='color: #3498db; font-size: 10px; font-weight: bold; margin-bottom: 5px;'>Forum's Title:</span> {$row['titre']}
                  </div>
                  <div>
                    <span style='color: #3498db; font-size: 10px; font-weight: bold;'>Forum's Topic:</span> {$row['texte_forum']}
                  </div>
                </div>
              </div>
            </div>
            ";
            } ?>





            <div class="col-12">
              <div class="blog-comments">
                <h2>All Comments</h2>

                <!--njaaaaareb-->

                <?php



                foreach ($resultCmn as $row) {
                  if ($id_forum == $row['id_forum']) {


                    echo "
                  <!-- Single Comments -->
                  <div class='single-comments' style='width= 50px;'>
                    <div class='main'>
                    <div class='head'>
            <img src='img/smile.jpg' alt='#' />
          </div>
                      
                      <div class='body'>
                      <span><span style='color: #3498db; font-size: 16px;'></span> {$Read[0]['nom']} {$Read[0]['prenom']} </span>
                        <div class='comment-meta'>
                          <span class='meta'><span style='color: #3498db; font-size: 16px;'>Published on:</span>  <i class='fa fa-calendar'></i>  {$row['date_cmn']}</span><span class='meta'><i class='fa fa-clock-o'></i></span>
                        </div>
                        
                        <span> <span style='color: #3498db; font-size: 16px;'> Comment: </span>
                        {$row['texte_cmn']}
                          
                        </span>
                       
                        <form method='POST' >
                        <input type='hidden' name='id_cmn' value='{$row['id_cmn']}' />
                        <input type='hidden' name='id_forum' value='{$row['id_forum']}' />
                        <div class='align-center'>
                        </div>
                       
                        
                       

                        </div>
                      </div>
                    </div>";

                    if ($user_id == $row['user_id']) {
                      echo " <a href='updateComment.php?id_cmn={$row['id_cmn']}&id_forum={$row['id_forum']}'   style=' margin-right: 30px; background-color:white ;color: RoyalBlue ; ' type='submit' name='btn_update' ><i class='fa fa-pencil'></i> </a>
                      <a href='deletecomment.php?id_cmn={$row['id_cmn']}&id_forum={$id_forum}' type= 'submit' name='btn_delete' style=' margin-right: 30px; background-color:white ;color: RoyalBlue ;' ><i class='fa fa-trash'></i>   </a>
                        
                        </form>
                        <br>
                        
                        <input type='hidden' name='id_cmn' value='{$row['id_cmn']}' />
                        
                        
                       

                      
                  
                  
                  ";
                    }
                  }
                }
                ?>
                <!--fin tajerba-->
              </div>
            </div>



            <!--yabda el formulaire de commentaire-->
            <div class="col-12">
              <div class="comments-form">
                <h2>Leave Comments</h2>

                <!-- Contact Form -->
                <form class="form" id="cmn_form" method="post">
                  <div class="row">



                    <div class="col-12">
                      <div class="form-group message">
                        <i class="fa fa-pencil"></i>
                        <textarea name="message" id="msg" rows="7" placeholder="Put Your Message Here" required="required"></textarea>
                        <span id="parag_msg"></span>
                      </div>
                    </div>
                    <?php
                    foreach ($result as $row) {
                      echo "
                      <input type='hidden' name='id_forum' value='{$row['id_forum']}' />
                      ";
                    } ?>


                    <div class='col-12'>
                      <div class='form-group button'>
                        <button type='submit' id='btn_cmn' name='btn_cmn' class='btn primary' enabled>
                          <i class='fa fa-send'></i>Submit Comment
                        </button>
                      </div>
                    </div>

                  </div>
                </form>
                <!--/ End Contact Form -->
              </div>
            </div>
          </div>
        </div>
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
                Welcome to our Forum space, the online community dedicated to discussing health topics. Our mission is to provide an open and informative space for exchanging ideas, experiences, and advice on various health-related subjects.
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
  <script src="/script/signupdoctor.js"></script>
  <!-- <script src="../script/comments.js"></script> -->

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var form = document.getElementById("cmn_form");
      form.addEventListener("submit", function(event) {
        // champ nom
        var name_saisie = document.getElementById("name");
        var nameInput = name_saisie.value;
        var spanNom = document.getElementById("parag_name");

        // champ message
        var msg_saisie = document.getElementById("msg");
        var msgInput = msg_saisie.value;
        var spanmsg = document.getElementById("parag_msg");

        // controle de saisie pour les lettres
        const regexLettres = /^[a-zA-Z\s]+$/;

        // verifier le nom saisi
        if (nameInput.length > 3 && regexLettres.test(nameInput)) {
          spanNom.textContent = "";
        } else {
          spanNom.textContent =
            "Veuillez entrer un nom valide (lettres uniquement)";
          spanNom.style.color = "red";
          event.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
        }

        // verifier le message saisi
        if (msgInput.length > 5) {
          spanmsg.textContent = "";
        } else {
          spanmsg.textContent =
            "Veuillez entrer un message valide (au moins 5 caractères)";
          spanmsg.style.color = "red";
          event.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
        }
      });
    });
  </script>
</body>

</html>