<?php
require "../config/config.php";

if (isset($_POST['seconnecter'])) {
    $database_info = checkDbExist($_POST['db_name']);

    $_POST['host'] = $host = $database_info[0]['host'];
    $_POST['port'] = $port = $database_info[0]['port'];
    $_POST['name'] = $database_name = $database_info[0]['db_name'];
    $_POST['type'] = $database_type = $database_info[0]['type'];
    $_POST['username'] = $user_name = $database_info[0]['username'];
    $_POST['password'] = $password = $database_info[0]['password'];
} else {
    $host = $_POST['host'];
    $port = $_POST['port'];
    $database_name = $_POST['name'];
    $database_type = $_POST['type'];
    $user_name = $_POST['username'];
    $password = $_POST['password'];
}

try {
    if (isset($_POST['ajouter'])) {
        if (count(checkDbExist($database_name)) == 0) {
            addDB_distante($database_name, $port, $host, $user_name, $password, $database_type);
            $response['message'] = "Base de données ajoutée à Némo";
        } else {
            updateDB_distante($database_name, $port, $host, $user_name, $password, $database_type);
            $response['message'] = "Base de données déja présente dans Némo, Mise à jour";
        }
    } else {
        $response['message'] = "La base de données est accessible ";
    }
    // If the connexion with de database is in success
    global $db;
    $db = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $database_name, $user_name, $password);
    $response['result'] = true;

    // Insertion ou mise à jour des données en local
    addDB_distante($database_name, $port, $host, $user_name, $password, $database_type);
    // Récupération de la structure des données de la base de données
    $database_data = getDataBaseDataMysql($host, $user_name, $password, $database_name);
    // Enrégistrement des données en session
    $_SESSION['db'] = $database_data;
    $_SESSION['message'] = $response['message'];
    $_SESSION['status'] = true;
    $_SESSION['data'] = $_POST;

    header('Location: ../connecteur.php');

} catch (Exception $e) {
    $response['result'] = $e;
    $response['message'] = "Vérifiez votre connexion et vos saisies";

    $_SESSION['message'] = $response['message'];
    $_SESSION['status'] = false;
    $_SESSION['data'] = $_POST;
    header('Location: ../connecteur.php');
}