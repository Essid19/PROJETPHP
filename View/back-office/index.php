<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'includes/navbar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

            <!-- Nav Item - Alerts -->

            <!-- Nav Item - Messages -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->

          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

          </div>

          <!-- Content Row -->

          <!-- Content Row -->
          <?php
          include '../../Controller/config.php';
          include '../../Controller/usersC.php';
          $controller = new usersC();
          $users = $controller->countAdmins();
          $doctor = $controller->countDoctors();
          $p = $controller->countPatients();
          $ph = $controller->countPharmacies();

          ?>
          <?php
          include '../../Controller/forumC.php';
          include '../../Model/forum.php';
          $read = new frmC();
          $forums = $read->countForums();
          $cmn = new cmnC();
          $comment = $cmn->countComments();
          include '../../Controller/drugsC.php';
          $r = new MedicamentC();
          $count = $r->countdrugs();
          $qtc = new qtc();
          $c = $qtc->countcatg();
          include '../../Controller/commandeC.php';
          $cc = new CmdC();
          $cmnd = $cc->countcmd();

          ?>


          <!-- Content Row -->
          <div class="row">
            <!-- Content Column -->
            <div class="col-12">
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">STATISTIQUE USERS</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">
                    users <span class="float-right"><?php echo $users; ?></span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $users; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                    doctor <span class="float-right"><?php echo $doctor; ?></span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: <?php echo $doctor; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                    patients <span class="float-right"><?php echo $p; ?></span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: <?php echo $p; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                    pharmacies <span class="float-right"><?php echo $ph; ?></span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $ph; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>





                </div>
              </div>

              <!-- Color System -->
            </div>
          </div>
          <!-- edhouma stat lo5ryn-->
          <div class="row">
            <!-- Content Column -->
            <div class="col-12">
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"> AUTRES STATISTIQUE</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">
                    commande <span class="float-right"><?php echo $cmnd; ?></span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $cmnd; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                    Forums<span class="float-right"><?php echo $forums; ?></span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $forums; ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                    Comment Forums <span class="float-right"><?php echo $comment; ?></span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $comment; ?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                    Drugs <span class="float-right"><?php echo $count; ?></span>
                  </h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $count; ?>%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                    Category Drugs <span class="float-right"><?php echo $c; ?></span>
                  </h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $c; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                </div>
              </div>

              <!-- Color System -->
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MediPlus 2024</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Cancel
          </button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>