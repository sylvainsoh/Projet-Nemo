<?php

require "../config/config.php";


if (isset($_POST['add_user'])) {
    $_POST['password'] = sha1($_POST['password']);
    $table_name = "utilisateur";
    unset($_POST['add_user']);

    if ($_POST['interne']==0){
        $_POST['identifiant']='int_'.$_POST['identifiant'];
    }else{
        $_POST['identifiant']='ext_'.$_POST['identifiant'];
    }

    $isInsert = insertDataInTable($host, $port, $database_name, $user_name, $password, $table_name, $_POST);
    $isInsert = insertDataInTable($host, $port, 'cergy_universite', $user_name, $password, $table_name, $_POST);

    $_SESSION['message_insertion_user'] = "Compte créé dans Némo ! Données insérées dans la Base de données Cergy_université";

    header('Location: ../user_add.php');
} else {
    $host = $_SESSION['data']['host'];
    $port = $_SESSION['data']['port'];
    $database_name = $_SESSION['data']['name'];
    $database_type = $_SESSION['data']['type'];
    $user_name = $_SESSION['data']['username'];
    $password = $_SESSION['data']['password'];
    $table_name = $_POST['table_name'];

    unset($_POST['table_name']);
    unset($_POST['id']);

    try {
        // If the connexion with de database is in success
        global $db;
        $db = getPdoByDBType($database_type, $host, $port, $database_name, $user_name, $password);
        $response['result'] = true;
        $response['message'] = "La base de donnée est accessible";

        // Récupération de la structure des données de la base de données
        $isInsert = insertDataInTable($host, $port, $database_name, $user_name, $password, $table_name, $_POST);
        $_SESSION['status'] = $isInsert;
        $_SESSION['message_insertion'] = "Ligne insérée avec susccès";
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    } catch (Exception $e) {
        $response['result'] = $e;
        $response['message'] = "Vérifiez votre connexion et vos saisies";

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    echo "<pre>";
    var_dump($response);
    echo "<pre>";
    die();
}