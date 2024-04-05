<?php

// if (!isset($_COOKIE['nom_du_cookie'])) {
//     setcookie("nom_du_cookie", "valeur_du_cookie", time() + (86400 * 30), "/");
// }

spl_autoload_register(function($classname){
    $filename = "../app/models/".ucfirst($classname).".php";
    if (file_exists($filename)) {
        require $filename;
    }
});

require 'config.php';

require 'functions.php';
require 'Database.php';  // Assurez-vous que ceci est soit une classe autonome soit géré par l'autoloader
require 'Model.php';     // Idem pour Model
require 'Controller.php';// Et pour Controller
require 'App.php';       // Et pour App
require_once '/var/www/douvinaigrette/vendor/autoload.php';
// //echo instance de smarty
// use Smarty\Smarty;

// Initialiser Smarty
// $smarty = new Smarty();
// $smarty->setTemplateDir('/var/www/douvinaigrette/MVC/app/views/templates');
// $smarty->setCompileDir('/var/www/douvinaigrette/MVC/app/views/templates_c');
// $smarty->setCacheDir('/var/www/douvinaigrette/MVC/app/cache');

// // Créer une instance de App
// $app = new App();

// $app->loadController();
// Set Controller instance
// $controller = new Controller();
// $app->setController($controller);