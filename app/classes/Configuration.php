<?php

namespace App\Classes;

class Configuration {
    private array $configuration;

    public function __construct(private string $config_file = '../.env')
    {
        // Get data from the .env
        $config_data = file($this->config_file);

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