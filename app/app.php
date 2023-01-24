<?php

use App\Classes\Start;

require '../vendor/autoload.php';

define('BASEDIR', rtrim(__DIR__, 'app'));

error_reporting(E_ALL);

// Start application
new Start();