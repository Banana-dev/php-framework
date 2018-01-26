<?php
require_once 'vendor/autoload.php';

use Banana\Utility\DB;
use Banana\Utility\Router;

// Connexion à la bdd:
DB::initialize();

// Chargement de la route
Router::boot();


