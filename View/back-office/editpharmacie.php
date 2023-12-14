<?php
include '../../Controller/usersC.php'; 
include '../../Model/user.php' ;

$id =$_GET['id'];

$controller =new usersC(); 
$result= $controller->read($id);

if (isset($_POST['btn'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom']; 
    $email = $_POST['email'];
    $pwd = $_POST['pwd']; 
    $experience = $_POST['experience'];
    $specialite =$_POST['specialite'] ;
    $img = $_FILES['file']['name'];
    $img_temp = $_FILES['file']['tmp_name'];
    move_uploaded_file($img_temp, "../../src/" . $img);
    $user = new user();
    $user->doctor($nom, $prenom, $email, $pwd, $specialite, $experience, $img, "pharmacie");
    $controller = new usersC();
    $controller->updateuser($user, $id) ;
    header('Location:pharmacys.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="nom" class="form-control form-control-user" value="<?php echo $result[0]['nom']; ?>"  id="exampleFirstName"
                                        placeholder="First Name">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="prenom" class="form-control form-control-user" value="<?php echo $result[0]['prenom']; ?>"  id="exampleLastName"
                                        placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user" value="<?php echo $result[0]['email']; ?>"  id="exampleInputEmail"
                                    placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="password" name="pwd" class="form-control form-control-user" value="<?php echo $result[0]['pwd']; ?>" 
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                              
                            </div>
                            <button name="btn" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                           
                        </form>
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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

</body>

</html>