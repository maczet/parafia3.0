<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 02.06.2017
 * Time: 18:31
 */
include_once($_SERVER['DOCUMENT_ROOT']."/php/dbengine.php");
if (DBEngine::getDatabase()->isLogged()) {
    ?>
    <div class="menuContainer">
        <a href="index.php?view=login" title="Lista parafian">Lista parafian</a>
        <a href="index.php?view=register" title="Lista adresów">Lista adresów</a>
        <a href="index.php?view=help" title="Lista miast">Lista miast</a>
<<<<<<< HEAD
        <button class="logoutButton" onclick="logOut('php/logout.php')">Log out</button>
=======
        <a href="index.php?view=logout" title="Wyloguj">Wyloguj</a>
>>>>>>> 5b899b3fea57860a047d4e2f3be54c2a7fc13862
    </div>
    <?php
} else {
    ?>
    <div class="menuContainer">
        <a href="index.php?view=login" title="Strona logowania">Logowanie</a>
        <a href="index.php?view=register" title="Strona rejestracji nowego użytkownika">Rejestracja</a>
        <a href="index.php?view=help" title="Strona pomocy">Pomoc</a>
    </div>

    <?php
}
    ?>