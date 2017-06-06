<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-05-28
 * Time: 20:45
 */
session_start();

require_once('dbconfig.php');
require_once ('dbengine.php');

//send data POST method
if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    //pobranie danych z 'posta' i rozkodowanie do notacji PHP
    $content = file_get_contents("php://input");
    $decoded = json_decode($content);

    try
    {
        if (DBEngine::getDatabase()->login($decoded->username,$decoded->password))
            echo json_encode(DBEngine::getDatabase()->getLoggedUser());
        else
            // nie podajemy co było źle :)
            echo json_encode( 'incorrectData');
    }
    catch(PDOException $e)
    {
        echo json_encode( 'error: '.$e->getMessage());
        $conn = null;
        exit();
    }

}elseif( $_SERVER['REQUEST_METHOD'] == "GET" ){
    //jeśli zapytanie przesłane zostanie 'getem', to zostaną pobrane dane zalogowanego użytkownika
    try {
        $loggedUser = $_SESSION['loggedUser'];

        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT firstname, lastname FROM users WHERE
          username=?"); // SQL Injection
        $stmt->execute(array($loggedUser));

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $k=>$row) {
            echo json_encode( $row );
            $conn = null;
            exit();
        }
        echo json_encode('noUser');
        $conn = null;
        exit();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo json_encode( 'error' );
        $conn = null;
        exit();
    }

}