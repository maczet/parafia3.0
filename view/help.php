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
        <form onsubmit="validForm()">

            <label for="email">Twój adres email</label>
            <br>
            <input id="email" type="email" placeholder="email" required>
            <br>
            <label for="message">Twoja wiadomość</label>
            <br>
            <textarea id="message" type="text" required></textarea>
            <br>
            <button type="submit">Wyślij</button>
            <br>
            <h3>*pola wymagane</h3>
        </form>
    </div>
    <div id="img">
        <img src="img/question-mark.png" width="400px" height="400px">
    </div>
</div>
