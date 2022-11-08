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
        if (isset($url[0]) && !empty($url[0]) && file_exists(BASEDIR . 'app/controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = $url[0];

            // Remove data from the array
            unset($url[0]);
        }
        var_dump($url);exit;
        // Load controller
        require BASEDIR . 'app/controllers/' . ucfirst($this->controller) . '.php';

        $controller = new $this->controller;

        // Find a page name
        if (isset($url[1]) && !empty($url[1]) && method_exists($controller, $url[1])) {
            $this->page = $url[1];
        }

        // Put page name in a variable, so we can call this method below
        $page_to_call = $this->page;

        echo $controller->$page_to_call();
    }
}