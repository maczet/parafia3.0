<?php

extract($_POST);
mail("admin@parafia.pl", "Wiadomość od użytkowniaka", $wiadomosc, $headers);
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

    <link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>

<body>
<header>
    <h1>Parafia WEB 3.0</h1>
</header>
<div id="container">
    <div class="menuContainer">
        <a href="../index.php">Powrót</a>
    </div>
    <?php
        echo "e-mail został wyslany!";
    ?>

</br>

</br>


</div>

</body>