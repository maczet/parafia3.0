<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-05-30
 * Time: 18:35
 */

session_start();

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "parafia";
$email= "email";
$phone_number = "phone_number";



//jeżeli dane są przysyłane 'postem' to tworzone jest konto użytkownika
if( $_SERVER['REQUEST_METHOD'] == "POST" ){

    //pobranie danych JSON wysyłanych 'postem' i rozkodowanie na notację PHP
    $content = file_get_contents("php://input");
    $decoded = json_decode($content);

    //łączeni się z bazą danych
    try {
        //ustanowienie połączenia z bazą danych
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //zapytanie SQL sprawdzające, czy nazwa użytkownika już istnieje
        $sql = "SELECT COUNT(*) FROM users WHERE username='$decoded->username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if( $stmt->fetchColumn() != 0 ){
            //gdy użytkownik istnieje zwracana jest o tym informacja
            echo json_encode('userExist');
            $conn = null;
            exit();
        }else{
            //gdy nazwa użytkownika jest wolna tworzone jest nowe konto
            $pass = hash('sha256', $decoded->password);
            $sql = "INSERT INTO users (firstname, lastname, username, password, email, phone_number)
          VALUES ('$decoded->firstName', '$decoded->lastName', '$decoded->username', '$pass',
           '$decoded->email', '$decoded->phone_number')";

            $conn->exec($sql);
            echo json_encode('success');
            $conn = null;
            exit();
        }

    }
    catch(PDOException $e) {
        echo json_encode( 'error' );
        $conn = null;
        exit();
    }

}else{
    //przesłanie do tego pliku danych inną metodą niż POST, kończy się wystąpieniem błędu.
    echo 'error';
    exit();
}