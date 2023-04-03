<?php
require "config/config.php";

?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projet Nemo - Connexion</title>

    <link rel="shortcut icon" href="views/assets/img/whale.png" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="views/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="views/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Ubuntu', sans-serif; !important;">

<div class="container" style="padding-top: 10%">

    <!-- Outer Row -->
    <div class="row justify-content-center pt-5">

        <div class="col-xl-10 col-lg-12 col-md-9">
            <?php foreach ($_SESSION['errors'] as $key => $error) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Erreur : </strong>    <?= $error ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endforeach; ?>
            <div class="card border-0 shadow-none my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row text-center">
                        <div class="col-lg-6">
                            <img src="views/assets/img/logoCy.png" style="width: 415px;padding-top: 20% ;" alt="Whale logo">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4 text-uppercase">
                                        némo
                                    </h1>
                                </div>
                                <form class="user" action="controllers/login_x.php" method="post">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Votre addresse email" name="email" required value="<?=  $_SESSION['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Saisissez votre mot de passe" name="password" required value="<?=  $_SESSION['password'] ?>">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-sign-in"></i>
                                        Se connecter
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
<div class="text-center">
    &copy; Némo Project <?=date('Y')?><br>
    <img src="views/assets/img/whale.png" style="width:5%" alt="Whale logo">
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="views/assets/vendor/jquery/jquery.min.js"></script>
<script src="views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="views/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="views/assets/js/sb-admin-2.min.js"></script>

</body>

</html>