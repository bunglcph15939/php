<?php
session_start();
require_once './commons/helpers.php';
require_once './vendor/autoload.php';
require_once './commons/db.php';
require_once './commons/route.php';





$url = isset($_GET['url']) ? $_GET['url'] : "login";
 defineRoute($url);

var_dump($_SESSION['login']);

?>