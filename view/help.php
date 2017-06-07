<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 02.06.2017
 * Time: 18:35
 */

?>

<div class="mainContainer">
    <div id="helpForm">
        <form method="POST" action="../php/mail.php">
            Twój adres e-mail:*
            </br>
            <input type="email" name="headers">
            </br>
            Twoja wiadomość e-mail:*
            </br>
            <textarea type="text" name="wiadomosc"></textarea>
            </br>
            <input type="submit" value="ok">
        </form>
            <h3>*pola wymagane</h3>

    </div>
    <div id="img">
        <img src="img/question-mark.png" width="400px" height="400px">
    </div>
</div>
