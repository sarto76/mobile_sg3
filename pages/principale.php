<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 09.05.2017
 * Time: 09:13
 */

require_once('libs/connection.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
} else {
    $controller = 'pages';
    $action     = 'home';
}

require_once('views/layout.php');





?>