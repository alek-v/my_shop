<?php

require '../vendor/autoload.php';

define('BASEDIR', rtrim(__DIR__, 'app'));

error_reporting(E_ALL);

// Start application
new \App\Classes\Start();