<?php

namespace App\Classes;
use Pimple\Container;

class Model {
    protected Database $db;

    public function __construct(protected Container $container)
    {
        $this->container = $this->container;
        $this->db = $this->container['database'];
    }
}