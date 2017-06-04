<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 02.06.2017
 * Time: 18:36
 */

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Parafia WEB</title>
    <meta name="description" content="Najlepszy portal do zarządzania parfią wraz ze zintegrowanymi modułami.
    Jeśli znajdziesz lepszy postal my zwrócimy Ci pieniądze"/>
    <link rel="stylesheet" href="css/style.css">
    <meta name="keywords" content="parafia, program, najlepszy portal" />
</head>

<body>
<div id="container"></div>
    <div id="logo">
        <h1>Parafia WEB 3.0</h1>
    </div>


        <div id="menu">
        <?php
          include_once('view/menu.php');
        ?>
        </div>

        <div id="content">
        <?php
          if (isset($_GET['view']))
            include_once('view/' . $_GET['view'] . '.php');
        ?>
        </div>

    <footer>
        <h5>Najlepszy portal do zarządzania Twoją PARAFIĄ copyright by Maciej and Maciej &copy;</h5>
    </footer>
</body>
</html>
