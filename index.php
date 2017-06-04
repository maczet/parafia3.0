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

    <meta name="keywords" content="parafia, program, najlepszy portal" />

    <script src="js/script.js"></script>
    <script src="lib/jquery-3.2.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<header>
    <h1>Parafia WEB 3.0</h1>
</header>
<div id="container">
    <div id="logo">

    </div>

        <div id="menu">
        <?php
          include_once('view/menu.php');
        ?>
        </div>

        <?php
          if (isset($_GET['view']))
            include_once('view/' . $_GET['view'] . '.php');
        ?>

    <footer>
        <h5>Najlepszy portal do zarządzania Twoją PARAFIĄ copyright by Maciej and Maciej &copy;</h5>
    </footer>
</div>
</body>
</html>
