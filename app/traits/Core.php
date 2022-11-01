<?php

namespace App\Traits;

trait Core {
    private function parseUrl(): array
    {
        return explode('/', $_SERVER['REQUEST_URI']);
    }
}