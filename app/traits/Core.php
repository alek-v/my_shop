<?php

namespace App\Traits;

trait Core {
    private function parseUrl(): array
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);

        // Remove first value if it is empty
        if (isset($url[0]) && empty($url[0])) {
            unset($url[0]);
        }

        return array_values($url);
    }
}