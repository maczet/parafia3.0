<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-05-29
 * Time: 21:21
 */
session_start();
session_destroy();
echo 'success';
exit();