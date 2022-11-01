<?php

namespace App\Classes;
use App\Traits\Core;

class Start {
    use Core;

    private string $controller = 'Page';
    private string $page = 'index';

    public function __construct()
    {
        $url = $this->parseUrl();

        // Find a controller
        if (isset($url[1]) && !empty($url[1]) && file_exists(BASEDIR . 'app/controllers/' . ucfirst($url[1]) . '.php')) {
            $this->controller = $url[1];
        }

        // Load controller
        require BASEDIR . 'app/controllers/' . $this->controller . '.php';

        $controller = new $this->controller;

        // Find a page name
        if (isset($url[2]) && !empty($url[2]) && method_exists($controller, $url[2])) {
            $this->page = $url[2];
        }

        // Put page name in a variable, so we can call this method below
        $page_to_call = $this->page;

        echo $controller->$page_to_call();
    }
}