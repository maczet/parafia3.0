<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-05-28
 * Time: 20:45
 */
session_start();

require_once('dbconfig.php');

//przesłanie danych metodą POST rozpoczyna próbę logowania użytkownika
if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    //pobranie danych z 'posta' i rozkodowanie do notacji PHP
    $content = file_get_contents("php://input");
    $decoded = json_decode($content);



    try {
        //nawiązanie połączenia z bazą danych
        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //pobranie danych użytkownika o podanej nazwie
        $stmt = $conn->prepare("SELECT username, password FROM users WHERE
      username='$decoded->username'");
        $stmt->execute();

        //sprawdzenie, czy dane się zgadzają, jeśli tak to następuje logowanie
        //jeśli nie, to zwracana jest informacja, że użytkownik nie istniej
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $k=>$row) {

            $pass = hash('sha256', $decoded->password);
            if( $decoded->username == $row['username'] ){
                if( $pass == $row['password'] ){
                    $_SESSION['loggedUser'] = $decoded->username;
                    echo json_encode( $_SESSION['loggedUser'] );
                    $conn = null;
                    exit();
                }else{
                    echo json_encode( 'incorrectPassword');
                    $conn = null;
                    exit();
                }
            }
        }
        echo json_encode('noUser');
        $conn = null;
        exit();
    }
    catch(PDOException $e) {
        echo json_encode( 'error' );
        $conn = null;
        exit();
    }

}elseif( $_SERVER['REQUEST_METHOD'] == "GET" ){
    //jeśli zapytanie przesłane zostanie 'getem', to zostaną pobrane dane zalogowanego użytkownika
    try {
        $loggedUser = $_SESSION['loggedUser'];

        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_PASS);
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