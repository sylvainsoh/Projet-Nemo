<?php
require "../config/config.php";

$email=$_POST['email'];
$password=$_POST['password'];

$user = getUser($email, $password);

if (!empty($user)){
    $_SESSION['user']=$user[0];
    unset($_SESSION['errors']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('Location: ../landing_page.php');
}else{
   $_SESSION['errors'][] = "Aucun utilisateur trouvé identifiants incorrectes";
   $_SESSION['email']=$email;
   $_SESSION['password']=$password;

    header('Location: ../index.php');
}