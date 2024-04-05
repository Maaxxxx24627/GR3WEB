<?php 
// Au début de public/index.php
$controller = "home";

setcookie("session_cookie", session_id(), time() + (86400 * 30), "/");


session_start();

require "../app/core/init.php";

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

$app = new App; 
$app->loadController($controller);

