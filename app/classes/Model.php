<?php

namespace App\Classes;
use Pimple\Container;

class Model {
    public function __construct(protected Container $container)
    {
        $this->container = $this->container;
    }
}