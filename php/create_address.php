<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 10.06.2017
 * Time: 18:52
 */

require_once ($_SERVER['DOCUMENT_ROOT'].'/php/dbengine.php');

$content = file_get_contents("php://input");
$decoded = json_decode($content);

//łączeni się z bazą danych
try {
    // dodanie użytkownika
    //ustanowienie połączenia z bazą danych
    DBEngine::getDatabase()->query()->open("INSERT INTO ADRES (id_osoby, ulica, numer_budynku, numer_mieszkania, kod_pocztowy, miasto) VALUES (?, ?, ?, ?) ",
        array($decoded->id_osoby, $decoded->ulica, $decoded->numer_budynku, $decoded->numer_mieszkania, $decoded->kod_pocztowy,  $decoded->miasto));

    echo json_encode('success');

    exit();

}
catch(PDOException $e) {
    echo json_encode( 'error:' + $e->getMessage());
    exit();
}