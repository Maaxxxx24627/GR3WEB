<?php

class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // Vérifie si le contrôleur existe et remplace le contrôleur par défaut
        if (file_exists('../app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }

        // Inclut le fichier du contrôleur
        require_once '../app/controllers/' . $this->controller . '.php';

        // Instancie le contrôleur
        $this->controller = new $this->controller;

        // Vérifie si la méthode existe dans le contrôleur
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Récupère les paramètres de l'URL s'il y en a
        $this->params = $url ? array_values($url) : [];

        // Appelle la méthode du contrôleur avec les paramètres
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
