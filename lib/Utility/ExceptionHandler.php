<?php

namespace Banana\Utility;

use Banana\Template\Template;
use Exception;

class ExceptionHandler
{

    public function __construct(Exception $e)
    {

        $error_class = get_class($e);

//		var_dump($error_class);

        switch ($error_class) {
            case "PDOException":

                $template = new Template("errors/PDO");
                echo $template->render(['title' => $error_class, 'message' => $e->getMessage()]);

                break;

            case "Banana\Exception\NotFoundException":

                $template = new Template("errors/404");
                echo $template->render(['title' => '404 not found', 'message' => $e->getMessage()]);

                break;

            case "Banana\Exception\MissingTemplateException":

                $filename = 'errors/404';

                if (file_exists(__DIR__ . '/../../src/Views/' . $filename . '.php')) {

                    $template = new Template($filename);
                    echo $template->render(['title' => '404 not found', 'message' => $e->getMessage()]);

                } else {
                    echo "<div style='width: 100%;height: 100%;display: flex;'><div style='margin: auto;'><h1 style='color: red;font-size: 10em;'>FATAL ERROR</h1></div></div>";
                    if (Config::get('debug')) {
                        echo '<pre>';
                        var_dump($e->getMessage());
                        echo '</pre>';
                        echo '<pre>';
                        var_dump($e->getTraceAsString());
                        echo '</pre>';
                    }
                }

                break;
            default:
                echo "<div style='width: 100%;height: 100%;display: flex;'><div style='margin: auto;'><h1 style='color: blue;font-size: 10em;'>FATAL ERROR</h1></div></div>";
                if (Config::get('debug')) {
                    echo '<pre>';
                    var_dump($e->getMessage());
                    echo '</pre>';
                    echo '<pre>';
                    var_dump($e->getTraceAsString());
                    echo '</pre>';
                }
        }
        die();
    }
}