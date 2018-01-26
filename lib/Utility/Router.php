<?php

namespace Banana\Utility;

class Router
{
    protected static $instanciated = false;
    protected static $route = null;
    protected static $routes = [];

    public static function boot()
    {
        // Si la classe n'a jamais été appelée, on charge le fichier de routes
        if (!self::$instanciated) {
            self::$instanciated = true;
            $routesFile = __DIR__ . '/../../routes.php';

            if (file_exists($routesFile)) {
                self::$routes = require $routesFile;
            } else {
                throw new \Exception('Fichier \'routes.php\' manquant.');
            }
        }

        // Trouver la route actuelle
        $route = null;
        foreach (self::$routes as $r => $c) {
            if (self::is_match($r) && is_null(self::$route)) {
                $route = [
                    'route' => $r,
                    'name' => Hash::get($c, 'name'),
                    'controller' => Hash::get($c, 'controller'),
                    'action' => Hash::get($c, 'action'),
                    'params' => Hash::get($c, 'params', [])
                ];
                // Route trouvée
                self::$route = $route;
            }
        }

        if (is_null($route)) {
            throw new \Exception('Route non trouvée');
        }

        $controller = $route['controller'];
        $action = $route['action'];

        // Chemin vers le fichier du controleur
        $controllerFile = 'src/Controller/' . ucfirst($controller) . 'Controller.php';

        // Charger le controleur, executer l'action
        try {
            // Teste si le fichier existe
            if (file_exists($controllerFile)) {
                require_once $controllerFile;

                // Nom de la classe dans le fichier
                $className = Str::controllerName($controller, true);

                try {
                    // Chargement de la classe
                    $page = new $className;
                } catch (\Error $exception) {
                    throw new \Banana\Exception\NotFoundException('La classe "' . $className . '" n\'existe pas dans le fichier');
                }

                // Test de la présence de l'action
                if (method_exists($page, $action)) {
                    // Execution de l'action
                    $page->$action();

                } else {
                    // Erreur
                    throw new \Banana\Exception\NotFoundException('L\'action n\'existe pas');
                }
            } else {
                // Erreur
                throw new \Banana\Exception\NotFoundException('Le controlleur "' . $controller . '" n\'existe pas');
            }
        } catch (\Exception $exception) {
            new \Banana\Utility\ExceptionHandler($exception);
        }
    }

    /**
     * Teste une route et renvoie vrai si c'est la route actuelle.
     *
     * @param string $path Route
     * @return bool
     */
    protected static function is_match(string $path)
    {
        // On prépare l'expression régulière
        $regex = str_replace('/', '\/', $path);
        // On teste l'expression régulière sur l'adresse
        $is_match = preg_match('/^' . ($regex) . '$/', $_SERVER['REQUEST_URI'], $matches, PREG_OFFSET_CAPTURE);
        // Si on a trouvé une correspondance:
        if ($is_match) {
            return true;
        }
        return false;
    }

    /**
     * Créée une route à partir de l'URL, si elle n'a pas été trouvée avant
     *
     * @return array
     * @throws \Exception
     */
    public static function genericRoute()
    {
        // On récupère l'uri (ex: /felins/chats/persans)
        $uriChunks = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        // Controleur et action par défaut:
        $controller = Config::get('site.defaultController');
        $action = Config::get('site.defaultAction');
        $params = [];

        $nb = count($uriChunks);
//        echo "Chunks:<br>";
//        var_dump($uriChunks);
        if ($nb === 1 && !empty($uriChunks[0])) {
            $controller = $uriChunks[0];
        } elseif ($nb >= 2) {
            $controller = $uriChunks[0];
            $action = $uriChunks[1];
            for ($i = 2; $i < $nb; $i++) {
                $params[] = $uriChunks[$i];
            }
        }
        $selectedRoute = ['controller' => $controller, 'action' => $action, 'params' => $params];
//        echo "Route selectionnée:<br>";
//        var_dump($selectedRoute);
        return $selectedRoute;
    }

    /**
     * Renvoie la route actuelle
     *
     * @return array
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * Renvoie toutes les routes
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function url($controller, $action, $params)
    {
        // Check for config in routes
        foreach (self::$routes as $r => $c) {
            if ($c['controller'] === $controller && $c['action'] === $action && $r !== '(.*)') {
                // Ici, on devrait gérer les paramètres possibles
                return $r;
            } else {
                return "/$controller/$action/" . join('/', $params);
            }
        }
    }

    public static function redirect($controller, $action, $params = [])
    {
        $url = self::url($controller, $action, $params);

        header('Location: ' . $url);
    }
}