<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 04.06.2017
 * Time: 18:30
 */

include_once($_SERVER['DOCUMENT_ROOT'].'/php/dbengine.php');

?>
<?php
if (DBEngine::getDatabase()->isLogged()) {
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
            <th>ID osoby</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Numer stacjonarny</th>
            <th>Numer komórkowy</th>
            <th>E-mail</th>
        </tr>

        <?php
        foreach (DBEngine::getDatabase()->query()->open("SELECT * FROM KONTAKTY JOIN OSOBA USING (ID_OSOBY)")->getResult() as $k=>$row ) {
            // generujemy wiersz tabeli na podstawie krotki
            echo
                '<tr>'.
                '<td>'.$row['id_osoby'].'</td>'.
                '<td>'.$row['imie'].'</td>'.
                '<td>'.$row['nazwisko'].'</td>'.
                '<td>'.$row['numer_stacjonarny'].'</td>'.
                '<td>'.$row['numer_komurkowy'].'</td>'.
                '<td>'.$row['email'].'</td>'.
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

    <?php
} else {
    header('Location: ../index.php');
}?>
