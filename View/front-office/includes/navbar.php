<?php


session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mettez ici vos balises meta, liens CSS, etc. -->
    <title>Votre titre</title>

    <style>
        #icon {
            width: 30px;
            cursor: pointer;
        }

        :root {
            --primary-color: #edf2fc;
            --secondary-color: #212121;

        }

        .dark-theme {
            --primary-color: #000106;
            --secondary-color: #fff;

        }
    </style>
</head>

<body>
    <header class="header">
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

                                        <?php
                                        if ($user_id != '') {
                                            // L'utilisateur est connecté, affichez le contenu spécifique à l'utilisateur
                                            if ($role == 'admin') {
                                                echo '<li><a href="../back-office/index.php">Dashboard Admin</a></li>';
                                                echo '<li><a href="doctors.php">Doctors</a></li>';
                                                echo '<li><a href="medicament.php">Products</a></li>';
                                                echo "<li>
                                                <a href='#'>Profile<i class='icofont-rounded-down'></i></a>
                                                <ul class='dropdown'>
                                                <li><a href='editadmin.php'>Edit Account</a></li>
                                                <li><a href='logout.php'>Logout</a></li>
                                                </ul>
                                            </li>";
                                            } elseif ($role == 'doctor') {
                                                echo '<li><a href="homedoctor.php"> Home Doctor </a></li>';
                                                echo '<li><a href="dashdoctor.php">Appoinments</a></li>';
                                                echo '<li><a href="doctors.php">Doctors</a></li>';
                                                echo '<li><a href="medicament.php">Products</a></li>';
                                                echo "<li>
                                               <a href='#'>Forums<i class='icofont-rounded-down'></i></a>
                                               <ul class='dropdown'>
                                               <li><a href='forum.php'>Write Forum</a></li>
                                               <li><a href='showForum.php'>Consult Forums</a></li>
                                               <li><a href='myForum.php'>My Forums</a></li>
                                               </ul>
                                           </li>";
                                                echo "<li>
                                                <a href='#'>Profile<i class='icofont-rounded-down'></i></a>
                                                <ul class='dropdown'>
                                                <li><a href='editDoctor.php'>Edit Account</a></li>
                                                <li><a href='logout.php'>Logout</a></li>
                                                </ul>
                                            </li>";
                                            } elseif ($role == 'patient') {
                                                echo '<li><a href="index.php">Home </a></li>';
                                                echo '<li><a href="dashpatient.php">Dashboard User</a></li>';
                                                echo '<li><a href="doctors.php">Doctors</a></li>';
                                                echo '<li><a href="medicament.php">Products</a></li>';
                                                echo "<li>
                                               <a href='#'>Forums<i class='icofont-rounded-down'></i></a>
                                               <ul class='dropdown'>
                                               <li><a href='forum.php'>Write Forum</a></li>
                                               <li><a href='showForum.php'>Consult Forums</a></li>
                                               <li><a href='myForum.php'>My Forums</a></li>
                                               </ul>
                                           </li>";

                                                echo "<li>
                                                <a href='#'>Profile <i class='icofont-rounded-down'></i></a>
                                                <ul class='dropdown'>
                                                <li><a href='editpatient.php'>Edit Account</a></li>
                                                <li><a href='logout.php'>Logout</a></li>
                                                </ul>
                                            </li>";
                                            } elseif ($role == 'pharmacie') {
                                                echo '<li><a href="index.php">Home </a></li>';
                                                echo '<li><a href="dashpharmacie.php"> ParaPharmacy</a></li>';
                                                echo '<li><a href="doctors.php">Doctors</a></li>';
                                                echo '<li><a href="medicament.php">Products</a></li>';
                                                echo "<li>
                                               <a href='#'>Forums<i class='icofont-rounded-down'></i></a>
                                               <ul class='dropdown'>
                                               <li><a href='forum.php'>Write Forum</a></li>
                                               <li><a href='showForum.php'>Consult Forums</a></li>
                                               <li><a href='myForum.php'>My Forums</a></li>
                                               </ul>
                                           </li>";
                                                echo "<li>
                                                <a href='#'>Profile <i class='icofont-rounded-down'></i></a>
                                                <ul class='dropdown'>
                                                <li><a href='editpharmacie.php'>Edit Account</a></li>
                                                <li><a href='logout.php'>Logout</a></li>
                                                </ul>
                                            </li>";
                                            }
                                        } else {
                                            // L'utilisateur n'est pas connecté, affichez le contenu par défaut
                                            echo '
                                            <li><a href="index.php">Home </a></li>
                                            <li><a href="doctors.php">Doctors </a></li>
                                            <li><a href="medicament.php">Products </a></li>
                                            <li><a href="showForumm.php">forums</a></li>
                                            <li>
                                                <a href="#">Signup <i class="icofont-rounded-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="signupclient.php">Patient</a></li>
                                                    <li><a href="signuppharmacie.php">ParaPharmacy</a></li>
                                                    <li><a href="signupdoctor.php">Doctor</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="login.php">Login</a></li>
                                            ';
                                        }
                                        ?>
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
    <script>
        var icon = document.getElementById("icon");

        icon.onclick = function() {
            document.body.classList.toggle("dark-theme");
            if (document.body.classList.contains("dark-theme")) {
                icon.src = "img/sun.png";
            } else {
                icon.src = "img/moon.png";
            }
        }
    </script>
    <!-- Mettez ici le reste de votre contenu HTML -->
</body>

</html>