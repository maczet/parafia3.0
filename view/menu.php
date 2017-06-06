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
<!--    Menu for login person-->
    <div class="menuContainer">
        <a href="main.php?view=add_person" title="Dodaj nową osobę">Dodaj nową osobę</a>
        <a href="main.php?view=add_contact" title="Dodaj nowy kontakt">Dodaj kontakt</a>
        <a href="main.php?view=add_address" title="Dodaj nowy adres">Dodaj adres</a>
        <a href="index.php?view=persons" title="Lista parafian">Lista parafian</a>
        <a href="index.php?view=addresses" title="Lista adresów">Lista adresów</a>
        <a href="index.php?view=contacts" title="Lista kontaktów">Kontakty</a>
        <button class="logoutButton" onclick="logOut('php/logout.php')">Log out</button>
    </div>
    <?php
} else {
    ?>
<!--    Menu for no login person-->
    <div class="menuContainer">
        <a href="index.php?view=login" title="Strona logowania">Logowanie</a>
        <a href="index.php?view=register" title="Strona rejestracji nowego użytkownika">Rejestracja</a>
        <a href="index.php?view=help" title="Strona pomocy">Pomoc</a>
    </div>

    <?php
}
    ?>