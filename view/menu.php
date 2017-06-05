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
        <a href="index.php?view=logout" title="Wyloguj">Wyloguj</a>
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