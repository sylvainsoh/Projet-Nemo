<?php
require "config/config.php";

$host = $_GET['host'];
$port = $_GET['port'];
$database_name = $_GET['name'];
$database_type = $_GET['type'];
$user_name = $_GET['username'];
$password = $_GET['p'];
$table_name = $_GET['table_name'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projet Nemo - visualisation</title>

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
                <h1 class="h3 mb-4 text-gray-800">
                    <a href="visualiser_db.php?name=<?= $_SESSION['data']['name'] ?>&host=<?= $_SESSION['data']['host'] ?>&username=<?= $_SESSION['data']['username'] ?>&p=<?= $_SESSION['data']['password'] ?>&port=<?= $_SESSION['data']['port'] ?>&type=<?= $_SESSION['data']['type'] ?>">
                        <i class='fas fa-fw fa-backspace'></i>
                        Retour
                    </a> |
                    Ajouter des données dans la table : <?= $table_name ?>
                </h1>
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
                <div class="row">
                    <div class="col-lg-12">
                        <?php if ($_SESSION['status']) : ?>
                            <?php
                                $table_structure = getTableStructure($host, $port, $database_name, $user_name, $password, $table_name);
                            ?>
                            <form class="user" action="controllers/add_data_to_table.php" method="post">
                                <?php foreach ($table_structure as $column) : ?>
                                    <div class="form-group">
                                        <?php if ($column['Type']=='date' || $column['Type']=='timestamp' ) : ?>
                                            <input type="date" class="form-control" placeholder="<?= $column['Field'] ?>" name="<?=$column['Field']?>">
                                        <?php else: ?>
                                            <input type="text" class="form-control" placeholder="<?= $column['Field'] ?>" name="<?=$column['Field']?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                                <input type="text" value="<?= $table_name ?>" name="table_name" style="display: none">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-fw fa-plus"></i>
                                        Enrégister
                                    </button>
                                </div>
                            </form>
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
