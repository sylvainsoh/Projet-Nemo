<?php
session_start();
// Database connexion parameters
$host = 'localhost';
$port = "3306";
$database_name = 'nemo_db';
$user_name = 'syl20';
$password = '12345678';

try {
    // If the connexion with de database is in success
    global $db;
    $db = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $database_name, $user_name, $password);
    $response['success'] = true;
    $response['message'] = "Connexion with the database established successfully";
} catch (Exception $e) {
    // If the connexion with de database is failed
    var_dump("<pre>$e</pre>");
    $response['success'] = false;
    $response['message'] = "Connexion with the database failed";
}

/**
if (empty($_SESSION['user'])) {
    $_SESSION['errors'][] = "Connectez-vous !";
    header('Location: index.php');
}
**/
function getPdoByDBType($db_type, $host , $port, $database_name, $user_name, $password){
    switch ( $db_type) {
        case "mysql" :
            $db = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $database_name, $user_name, $password);
            break;
        case "pgsql" :
            $db = new PDO('pgsql:host=' . $host . ';port=' . $port . ';dbname=' . $database_name, $user_name, $password);
            break;
        case "oci" :
            $db = new PDO('oci:host=' . $host . ';port=' . $port . ';dbname=' . $database_name, $user_name, $password);
            break;
    }
    return $db;
}

function getUser($email, $password): array
{
    global $db;
    $passwordHash = sha1($password);
    $request = $db->prepare("SELECT * FROM administrateur WHERE  email='" . $email . "' AND password='" . $passwordHash . "' ");
    $request->execute();
    return $request->fetchAll();
}

function setActivePage($currentPage): string
{
    if ($currentPage == explode('/', $_SERVER["PHP_SELF"])[2]) {
        return "active";
    }
    return "";
}

function getDataBaseDataMysql($host, $user_name, $password, $database_name): array
{
    $conn = new mysqli($host, $user_name, $password, $database_name);
    $response[][] = [];
// Vérification de la connexion
    if ($conn->connect_error) {
        die('Erreur de connexion : ' . $conn->connect_error);
    }
// Récupération de la liste des tables dans la base de données
    $tables = array();
    $result = $conn->query("SHOW TABLES");
    while ($row = $result->fetch_array()) {
        $tables[] = $row[0];
    }
// Parcours de toutes les tables
    foreach ($tables as $table) {
        // Récupération de la structure de la table
        $result = $conn->query("SHOW CREATE TABLE $table");
        $row = $result->fetch_row();
        $structure = $row[1];

        // Récupération du détail des colonnes de la table
        $result = $conn->query("DESCRIBE $table");
        $columns = array();
        while ($row = $result->fetch_assoc()) {
            $columns[] = $row;
        }
        // Affichage du détail des colonnes de la table
        foreach ($columns as $column) {
            $response[$table][] = $column;
        }
    }
    unset($response[0]);
// Fermeture de la connexion
    $conn->close();
    return $response;
}

function getDataFromDatabaseForTable($host, $port, $database_name, $user_name, $password, $table_name)
{
    try {
        // If the connexion with de database is in success
        global $db;
        $db = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $database_name, $user_name, $password);
        $response['success'] = true;
    } catch (Exception $e) {
        // If the connexion with de database is failed
        var_dump("<pre>$e</pre>");
        $response['success'] = false;
    }
    global $db;
    $request = $db->prepare("SELECT * FROM " . $table_name);
    $request->execute();
    return $request->fetchAll();
}

function getTableStructure($host, $port, $database_name, $user_name, $password, $table_name)
{
    try {
        // If the connexion with de database is in success
        global $db;
        $db = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $database_name, $user_name, $password);
        $response['success'] = true;
    } catch (Exception $e) {
        // If the connexion with de database is failed
        var_dump("<pre>$e</pre>");
        $response['success'] = false;
    }
    global $db;
    $request = $db->prepare("DESCRIBE " . $table_name);
    $request->execute();
    return $request->fetchAll();
}

function insertDataInTable($host, $port, $database_name, $user_name, $password, $table_name, $data)
{
    try {
        // If the connexion with de database is in success
        global $db;
        $db = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $database_name, $user_name, $password);
    } catch (Exception $e) {
        echo $e;
    }
    global $db;
    $i = 0;
    $query = "";
    $query .= "INSERT INTO " . $table_name . " ( ";
    foreach ($data as $nomCham => $valeur) {
        $i++;
        if ($i > count($data) - 1) {
            $query .= $nomCham;
        } else {
            $query .= $nomCham . ", ";
        }
    }
    $query .= " ) ";
    $query .= " VALUES ( ";
    $i = 0;
    foreach ($data as $nomCham => $valeur) {
        if ($nomCham == "password") {
            $valeur = sha1($valeur);
        }
        $i++;
        if ($i > count($data) - 1) {
            $query .=' " ' . $valeur . ' " ';
        } else {
            $query .= ' " ' . $valeur . ' ", ';
        }
    }
    $query .= " ) ";

    try {
        $request = $db->prepare($query);
        $request->execute();
        return true;
    } catch (Exception $exception) {
        echo $exception->getMessage();
        return false;
    }
}

function getAdminList()
{
    global $db;
    $request = $db->prepare("SELECT * FROM administrateur");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_OBJ);
}

function checkDbExist($db_name): array
{
    global $db;
    $request = $db->prepare("SELECT * FROM db_distante where db_name='" . $db_name . "' ");
    $request->execute();
    return $request->fetchAll();

}

function dd($var)
{
    echo "<pre>";
    var_dump($var);
    echo "<pre>";
    die();
}

function addDB_distante($db_name, $port, $host, $username, $password, $type)
{
    global $db;
    try {
        $request = $db->prepare("INSERT INTO db_distante (db_name, port, host, username, password, type)  VALUES ( :db_name, :port, :host, :username, :password, :type) ");
        $request->bindParam(":db_name", $db_name);
        $request->bindParam(":port", $port);
        $request->bindParam(":host", $host);
        $request->bindParam(":username", $username);
        $request->bindParam(":password", $password);
        $request->bindParam(":type", $type);
        $request->execute();
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}

function updateDB_distante($db_name, $port, $host, $username, $password, $type)
{
    try {
        global $db;
        $request = $db->prepare(
            "UPDATE  db_distante SET 
                     db_name = '" . $db_name . "', 
                     port =  '" . $port . "', 
                    host = '" . $host . "', 
                    username =  '" . $username . "', 
                    password =  '" . $password . "', 
                    type =  '" . $type . "' 
                    WHERE db_name = '" . $db_name . "' 
                  ");
        $request->execute();
        return true;
    } catch (Exception $exception) {
        echo $exception->getMessage();
        return false;
    }
}

function getDatabasesList()
{
    global $db;
    $request = $db->prepare("SELECT * FROM db_distante");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_OBJ);
}

// Gestion des  utilisateurs
function getUsersList()
{
    global $db;
    $request = $db->prepare("SELECT * , u.id as id  FROM utilisateur u  INNER  JOIN  profile p ON p.id=u.id_profile");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_OBJ);
}

function getProfileList()
{
    global $db;
    $request = $db->prepare("SELECT * FROM profile");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_OBJ);
}

function getDatabaseList()
{
    global $db;
    $request = $db->prepare("SELECT * FROM db_distante ");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_OBJ);
}