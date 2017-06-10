<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 10.06.2017
 * Time: 17:51
 */

require_once ($_SERVER['DOCUMENT_ROOT'].'/php/dbengine.php');

$content = file_get_contents("php://input");
$decoded = json_decode($content);

//łączeni się z bazą danych
try {
    // dodanie użytkownika
    //ustanowienie połączenia z bazą danych
    DBEngine::getDatabase()->query()->open("INSERT INTO OSOBA (imie, nazwisko, data_urodzenia, plec) VALUES (?, ?, ?, ?) ",
        array($decoded->imie, $decoded->nazwisko, $decoded->data_urodzenia, $decoded->plec));

    echo json_encode('success');

    exit();

}
catch(PDOException $e) {
    echo json_encode( 'error:' + $e->getMessage());
    exit();
}