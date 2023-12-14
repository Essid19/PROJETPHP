<?php 


 var_dump($_POST) ;
//  die();
//  $curl =curl_init(); 
//  curl_setopt_array($curl, [
//   CURLOPT_RETURNTRANSFER=>1,
//   CURLOPT_URL=>'http://www.google.com/recaptcha/api/siteverify', 
//   CURLOPT_POST=>1 ,
//   CURLOPT_POSTFIELDS=> [
//   'secret'=> '6LeiJCcpAAAAAPkaC80XzmcjlabTmLNdGaBzQp7H', 
//   'response'=>$_POST['g-recaptcha-response'],
// ]
//  ]);

//  $response = json_decode(curl_exec($curl));

// include '../../Model/user.php';
// include '../../Controller/usersC.php';
// if (isset($_POST['btn']) && isset($_POST['g-recaptcha-response'])) {
    
//     $controller = new usersC();
//     $result = $controller->isEmailUnique($email);
// if ($result) {
//   $user = new user();
//   $user->doctor($nom, $prenom, $email, $pwd ,'' ,'', '', '', "patient");
//   $controller=new usersC();
//   $controller->adduser($user); 
//   echo '<script>window.location.href = "login.php";</script>';
//   exit ;
// }
// else {
//   echo '<div style="color: red;" class="alert alert-danger  mb-4">Email already exists!</div>';
// }
// }
?>