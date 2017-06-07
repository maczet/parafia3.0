<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 02.06.2017
 * Time: 18:34
 */
if (DBEngine::getDatabase()->isLogged()) {
    header('Location: ../index.php');
}else{
?>

<div class="mainContainer">
            <div id="loginForm">
                <label for="username">Login:</label>
                <input id="username" type="text" title="Wpisz swój login">
                <br>
                <label for="password">Hasło:</label>
                <input id="password" type="password" title="Wpisz swoje hasło">
                <br>
                <button onclick="logIn()">Log In</button>
                <br>
                <label id="error"></label>
                <br>
        </div>
    <div id="img">
        <img src="img/church.jpg" width="400px">
    </div>
</div>
<?php
    }
?>