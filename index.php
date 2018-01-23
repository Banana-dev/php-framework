<?php
require_once 'vendor/autoload.php';

\Banana\Utility\DB::initialize();

// Déterminer le controleur et l'action
$controller = 'pages';
$action = 'index';


if (isset($_GET['controller']) && !empty($_GET['controller'])) {
    $controller = $_GET['controller'];
}

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Chemin vers le fichier du controleur
$controllerFile = 'src/Controller/' . ucfirst($controller) . 'Controller.php';

// Test si le fichier existe
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // Nom de la classe dans le fichier
    $className = 'App\Controller\\' . ucfirst($controller . 'Controller');
    // Chargement de la classe
    $page = new $className;

    // Test de la présence de l'action
    if (method_exists($page, $action)) {
        // Execution de l'action
        $page->$action();
    } else {
        // Erreur
        throw new Exception('L\'action n\'existe pas');
    }
} else {
    // Erreur
    throw new Exception('Le controlleur n\'existe pas');
}
