<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 04.06.2017
 * Time: 18:30
 */

include_once($_SERVER['DOCUMENT_ROOT'].'/php/dbengine.php');

?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<div class="mainContainer">
    <!--div id="list">-->
    <table>
        <tr width="800">
        </tr>
        <th>Nazwisko</th>
        <th>Imię</th>
        <th>Ulica</th>
        <th>Numer budynku</th>
        <th>Numer mieszkania</th>
        <th>Kod pocztowy</th>
        <th>Miasto</th>
        </tr>

        <?php
        foreach (DBEngine::getDatabase()->query()->open("SELECT * FROM adres_all")->getResult() as $k=>$row ) {
            // generujemy wiersz tabeli na podstawie krotki
            echo
                '<tr>'.
                '<td>'.$row['nazwisko'].'</td>'.
                '<td>'.$row['imie'].'</td>'.
                '<td>'.$row['ulica'].'</td>'.
                '<td>'.$row['numer_budynku'].'</td>'.
                '<td>'.$row['numer_mieszkania'].'</td>'.
                '<td>'.$row['kod_pocztowy'].'</td>'.
                '<td>'.$row['miasto'].'</td>'.
                '</tr>';
        }

        ?>
    </table>

    <!-- </div> -->
    <div id="img">
        <img src="img/businessman.png" width="400px" height="400px">
    </div>
    <div>
        <label id="label_info"></label><label id="success"></label>
    </div>
</div>

