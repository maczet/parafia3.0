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
    <link rel="stylesheet" href="css/style.css">
</head>

<?php
  include_once('/view/menu.php');
?>

<?php
  if (isset($_GET['view']))
    include_once('/view/' . $_GET['view'] . '.php');
?>

<footer>
    <h5>Najlepszy portal do zarządzania Twoją PARAFIĄ copyright by Maciej and Maciej</h5>
</footer>

</body>
</html>
