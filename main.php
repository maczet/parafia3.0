<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-06-04
 * Time: 15:06
 */
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Parafia WEB</title>

    <script src="js/script.js"></script>
    <script src="lib/jquery-3.2.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
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
        include_once('view/menu_login.php');
        ?>
    </div>

    <div id="content">
    <?php
    if (isset($_GET['view']))
        include_once('view/' . $_GET['view'] . '.php');
    ?>
    </div>
    <footer>
        <div id="stopka">
            <h5>Najlepszy portal do zarządzania Twoją PARAFIĄ copyright by Maciej and Maciej &copy;</h5>
        </div>
    </footer>
</div>
</body>
</html>
