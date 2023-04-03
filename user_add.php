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

    <title>Projet Nemo - ajout d'un utilisateur</title>

    <link rel="shortcut icon" href="views/assets/img/whale.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="views/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="views/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>
<body id="page-top" style="font-family: 'Ubuntu', sans-serif; !important;">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <?php include "partials/_sidebar.php" ?>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php include "partials/_navBar.php" ?>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800 text-center">
                    Ajouter d'un utilisateur
                </h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-primary" role="alert">
                            <a href="admin_users.php" class="btn btn-primary">
                                <i class="fas fa-1x fa-backspace"></i>
                                Retour
                            </a> &nbsp;
                            <i class='fas fa-fw fa-database'></i>
                            Base de données : <strong>Némo</strong>
                        </div>
                    </div>
                </div>
                <?php if (isset( $_SESSION['message_insertion_user'])) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?=  $_SESSION['message_insertion_user'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if ($_SESSION['message_insertion']) : ?>
                            <div class="alert alert-primary" role="alert">
                                <i class='fas fa-fw fa-check-circle'></i>
                                Données insérées avec succès
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                    $profiles = getProfileList();
                ?>
                <div class="row">
                    <div class="col-lg-6 offset-3">

                        <form class="user" action="controllers/add_data_to_table.php" method="post">
                            <div class="form-group">Identifiant
                                <input type="text" class="form-control" placeholder="Identifiant" name="identifiant"
                                       value="<?= uniqid() ?>" readonly>
                            </div>
                            <div class="form-group">Type de compte
                                <select class="form-control" name="id_profile" id="id_profile">
                                    <?php foreach ($profiles as $profile) : ?>
                                        <option value="<?=$profile->id?>"><?=$profile->libelle?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">Email
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">Mot de passe
                                <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                            </div>
                            <div class="form-group">Date de début
                                <input type="date" class="form-control" placeholder="Date de début" name="date_debut">
                            </div>
                            <div class="form-group">Date de fin
                                <input type="date" class="form-control" placeholder="Date de fin" name="date_fin">
                            </div>
                            <div class="form-group">Téléphone
                                <input type="tel" class="form-control" placeholder="Téléphone" name="telephone">
                            </div>
                            <div class="form-group">Nom usuel
                                <input type="text" class="form-control" placeholder="Nom usuel" name="nom_usuel">
                            </div>
                            <div class="form-group">Nom legal
                                <input type="text" class="form-control" placeholder="Nom legal" name="nom_legal">
                            </div>
                            <div class="form-group">Prénom
                                <input type="text" class="form-control" placeholder="Prenom" name="prenom">
                            </div>
                            <div class="form-group">Date de naissance
                                <input type="date" class="form-control" placeholder="Date de naissance" name="date_naissance">
                            </div>
                            <div class="form-group">Adresse
                                <input type="text" class="form-control" placeholder="Addresse" name="adresse">
                            </div>
                            <div class="form-group">Numero de sécurité sociale
                                <input type="text" class="form-control" placeholder="Numero de sécurité sociale" name="numero_ss">
                            </div>
                            <div class="form-group">Personne interne ?
                                <select class="form-control" name="interne" id="interne">
                                    <option selected value="0">Oui</option>
                                    <option value="1">Non</option>
                                </select>
                            </div>
                            <div class="form-group">Status
                                <select class="form-control" name="status" id="status">
                                    <option selected value="Actif">Actif</option>
                                    <option value="Incactif">Inactif</option>
                                </select>
                            </div>
                            <div class="form-group">Informations supplémentaires
                                <textarea name="information_supp"  class="form-control" rows="7" placeholder="Informations supplémentaires" required></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block" value="add_user" name="add_user">
                                    <i class="fas fa-fw fa-plus"></i>
                                    Ajouter
                                </button>
                            </div>
                        </form>

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
                    <span>Copyright &copy;  Némo Project <?= date('Y') ?></span>
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

<?php include "partials/_footer.php" ?>


<?php include "partials/_js.php" ?>


</html>
