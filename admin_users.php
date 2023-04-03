<?php
require "config/config.php";
unset($_SESSION['message_insertion_user']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projet Nemo - Comptes utilisateurs</title>

    <link rel="shortcut icon" href="views/assets/img/whale.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="views/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="views/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                <h1 class="h3 mb-4 text-gray-800">
                    Liste des utilisateurs
                </h1>
                <div class="row">
                    <div class="col-lg-12">
                            <div class="alert alert-primary" role="alert">
                                <a href="user_add.php" class="btn btn-primary">
                                    <i class="fas fa-1x fa-plus-circle"></i>
                                    Ajouter
                                </a> &nbsp;
                                <i class='fas fa-fw fa-database'></i>
                                Base de données : <strong>Némo</strong>
                            </div>
                    </div>
                </div>
                <!-- Page Heading -->
                <?php
                        $utilisateurs = getUsersList();
                 ?>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Profil</th>
                                    <th>Email</th>
                                    <th>Début</th>
                                    <th>Fin</th>
                                    <th>Téléphone</th>
                                    <th>Nom usuel</th>
                                    <th>Nom légal</th>
                                    <th>Prénom</th>
                                    <th>Naissance</th>
                                    <th>Adresse</th>
                                    <th>Num SS</th>
                                    <th>Interne ? </th>
                                    <th>Status </th>
                                    <th>Informations</th>
                                    <th>Création</th>
                                    <th>Mise à jour</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($utilisateurs as $utilisateur) : ?>
                                    <tr>
                                        <td><?= $utilisateur->id ?></td>
                                        <td><?= $utilisateur->identifiant ?></td>
                                        <td><?= $utilisateur->libelle ?></td>
                                        <td><?= $utilisateur->email ?></td>
                                        <td><?= $utilisateur->date_debut ?></td>
                                        <td><?= $utilisateur->date_fin ?></td>
                                        <td><?= $utilisateur->telephone ?></td>
                                        <td><?= $utilisateur->nom_usuel ?></td>
                                        <td><?= $utilisateur->nom_legal ?></td>
                                        <td><?= $utilisateur->prenom ?></td>
                                        <td><?= $utilisateur->date_naissance ?></td>
                                        <td><?= $utilisateur->adresse ?></td>
                                        <td><?= $utilisateur->numero_ss ?></td>
                                        <td><?= $utilisateur->interne==1 ? "INT" : "EXT" ?></td>
                                        <td><?= $utilisateur->status ?></td>
                                        <td><?= $utilisateur->information_supp ?></td>
                                        <td><?= $utilisateur->created_at ?></td>
                                        <td><?= $utilisateur->updated_at ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
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
                    <span>Copyright &copy; Némo Project <?= date('Y') ?></span>
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

<script src="views/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="views/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            }
        });
    });

</script>
</html>
