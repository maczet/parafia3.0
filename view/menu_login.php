<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-06-04
 * Time: 15:12
 */
?>


<!--do usunięcia kiedy menu bedzie działać-->
<div class="menuContainer">
    <a href="main.php?view=add_person" title="Dodaj nową osobę">Dodaj nową osobę</a>
    <a href="main.php?view=add_contact" title="Dodaj nowy kontakt">Dodaj kontakt</a>
    <a href="main.php?view=add_address" title="Dodaj nowy adres">Dodaj adres</a>
    <a href="index.php?view=persons" title="Lista parafian">Lista parafian</a>
    <a href="index.php?view=addresses" title="Lista adresów">Lista adresów</a>
    <a href="index.php?view=cities" title="Lista miast">Lista miast</a>
    <button class="logoutButton" onclick="logOut('php/logout.php')">Log out</button>
</div>