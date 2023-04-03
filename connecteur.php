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

    <title>Projet Nemo - BD distante</title>

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
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">
                    Application - distante
                </h1>
                <?php
                        $databases = getDatabasesList();
                ?>
                <form action="controllers/test_connexion_x.php" method="post">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <select name="db_name" class="form-control">
                                    <option>Sélectionnez une base de données pour vous y connecter</option>
                                    <?php foreach ($databases as $database) : ?>
                                        <option value="<?= $database->db_name ?>"><?= $database->db_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button value="seconnecter" name="seconnecter" class="btn btn-primary btn-block">
                                <i class="fas fa-link"></i>
                                Se connecter
                            </button>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-lg-4">
                        <?php if ($_SESSION['status']) : ?>
                            <div class="alert alert-primary" role="alert">
                                <i class='fas fa-fw fa-info-circle'></i>
                                <?= $_SESSION['message'] ?>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                                <i class='fas fa-fw fa-info-circle'></i>
                                Connexion échouée : <?= $_SESSION['message'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-8">
                        <?php if ($_SESSION['status']) : ?>
                            <div class="alert alert-primary" role="alert">
                                <i class='fas fa-fw fa-database'></i>
                                Contenu de la base de données distante - <?= count($_SESSION['db']) ?> Tables
                                <a href="visualiser_db.php?name=<?= $_SESSION['data']['name'] ?>&host=<?= $_SESSION['data']['host'] ?>&username=<?= $_SESSION['data']['username'] ?>&p=<?= $_SESSION['data']['password'] ?>&port=<?= $_SESSION['data']['port'] ?>&type=<?= $_SESSION['data']['type'] ?>">
                                    <i class='fas fa-fw fa-eye'></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-4">
                        <form class="user" action="controllers/test_connexion_x.php" method="post">
                            <div class="form-group">
                                <input value="<?= $_SESSION['data']['name'] ?>" type="text" class="form-control"
                                       placeholder="Nom de la base de données" name="name" required>
                            </div>
                            <div class="form-group">
                                <input value="<?= $_SESSION['data']['host'] ?>" type="text" class="form-control"
                                       placeholder="Hôte" name="host" required>
                            </div>
                            <div class="form-group">
                                <input value="<?= $_SESSION['data']['username'] ?>" type="text" class="form-control"
                                       placeholder="Nom d'utilisateur" name="username" required>
                            </div>
                            <div class="form-group">
                                <input value="<?= $_SESSION['data']['password']?>" type="password" class="form-control"
                                       placeholder="Mot de passe" name="password">
                            </div>
                            <div class="form-group">
                                <input value="<?= $_SESSION['data']['port'] ?>" type="text" class="form-control"
                                       placeholder="Port" name="port" required>
                            </div>
                            <div class="form-group">
                                <select name="type" class="form-control">
                                    <option value="mysql">MySQL</option>
                                    <option value="pgsql">PostgreSQL</option>
                                    <option value="oci">Oracle</option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit'" class="btn btn-primary btn-block" name="test_connexion" value="test_connexion">
                                    <i class="fas fa-fw fa-database"></i>
                                    Tester la connexion
                                </button>
                                <?php if ($_SESSION['status']) : ?>
                                    <button type="submit" name="ajouter" value="ajouter" class="btn btn-primary btn-block">
                                        <i class="fas fa-fw fa-plus"></i>
                                        Ajouter
                                    </button>
                                <?php endif; ?>
                            </div>
                        </form>
                        <img src="views/assets/img/undraw_maintenance_re_59vn.svg" class="table-responsive" alt="Image database illustration">
                    </div>
                    <div class="col-lg-8">
                        <?php if ($_SESSION['status']) : ?>
                            <div>
                                <?php foreach ($_SESSION['db'] as $key => $databaseInfo) : ?>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                       <span class="badge badge-primary h1"> Table :
                                           <?= $key ?>
                                       </span>
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Nom de la colonne</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Clé</th>
                                                    <th scope="col">Nullable ? </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($databaseInfo as $column) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $column["Field"]?></th>
                                                        <td><?= $column["Type"]?></td>
                                                        <td><?= $column["Key"]=="PRI" ? "<i class='fas fa-fw fa-key text-warning'></i>" : "" ?></td>
                                                        <td><?= $column["Null"]=="NO" ? "<i class='fas fa-fw fa-check-circle'></i>" : "<i class='fas fa-fw fa-times-circle'></i>" ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </li>
                                    </ul>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
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
