<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 04.06.2017
 * Time: 18:30
 */

include_once('../php/dbengine.php');

?>

<div class="mainContainer">
    <div id="list">
            <table width="800">
                <tr>
<?php
  foreach (DBEngine::getDatabase()->query()->open("SELECT * FROM OSOBY") as $k=>$row ) {
    // generate table row
    echo $row['id_osoby'].$row['imie'].$row['nazwisko'].$row['data_urodzenia'].$row['plec'];
  }

?>
                </tr>
            </table>


    </div>
    <div id="img">
        <img src="img/businessman.png" width="400px" height="400px">
    </div>
    <div>
        <label id="label_info"></label><label id="success"></label>
    </div>
</div>

