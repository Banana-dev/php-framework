<?php

namespace Banana\Helper;

use Banana\Utility\Router;

class htmlHelper
{

    /**
     * Créée un lien absolu vers un fichier css présent dans le dossier assets/css
     *
     * @param string $file Nom de fichier (avec extension)
     * @return string Element HTML 'link'
     */
    public static function loadCss(string $file)
    {
        return '<link rel="stylesheet" href="/assets/css/' . $file . '">';
    }

    /**
     * Créée un lien absolu vers un fichier JS présent dans le dossier assets/js
     * @param string $file Nom de fichier (avec extension)
     * @return string Element HTML 'script'
     */
    public static function loadJs(string $file)
    {
        return '<script src="/assets/js/' . $file . '"></script>';
    }

    /**
     * Créée un lien HTML
     * Cette méthode ne permet pas de faire des liens personnalisés (avec classes ou autre).
     * Utilisez la méthode url() dans ces cas là.
     *
     * @param string $title Titre du lien
     * @param string $controller Nom du controller
     * @param string $action Action à effectuer
     * @param array $params Paramètres additionnels pour la querystring
     *
     * @return string Element HTML 'a'
     */
    public static function link(string $title, string $controller, string $action, array $params = [])
    {
        $url = self::url($controller, $action, $params);
        return '<a href="' . $url . '">' . $title . '</a>';
    }

    public static function url(string $controller, string $action, array $params = [])
    {
        return Router::url($controller, $action, $params);
    }
}