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
    DBEngine::getDatabase()->query()->open("INSERT INTO KONTAKTY (id_osoby, numer_stacjonarny, numer_komurkowy, email) VALUES (?, ?, ?, ?) ",
        array($decoded->id_osoby, $decoded->numer_stacjonarny, $decoded->numer_komurkowy, $decoded->email));

    echo json_encode('success');

    exit();

}
catch(PDOException $e) {
    echo json_encode( 'error:' + $e->getMessage());
    exit();
}