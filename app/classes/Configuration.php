<?php

namespace App\Classes;

class Configuration {
    private array $configuration;

    public function __construct()
    {
        // Get data from the .env
        $config_data = file('../.env');

        foreach($config_data as $config) {
            $current_option = explode('=', $config);

            $this->configuration[$current_option[0]] = trim($current_option[1]);
        }
    }

    public function getParameter($param): string
    {
        return $this->configuration[$param];
    }
}