<?php

namespace Banana\Utility;

use Banana\Template\Template;
use Throwable;

class ExceptionHandler {

	public function __construct($e) {

		$error_class = get_class($e);

//		var_dump($error_class);

		switch ($error_class){
			case "PDOException":

				$template = new Template("src/views/errors/PDO.php");
				$template->set('title', $error_class);
				$template->set('message', $e->getMessage());
				echo $template->output();

				break;

			case "Banana\Exception\NotFoundException":

				$template = new Template("src/views/errors/404.php");
				$template->set('title', '404 not found');
				$template->set('message', $e->getMessage());
				echo $template->output();

				break;

			case "Banana\Exception\MissingTemplateException":

				echo "<div style='width: 100%;height: 100%;display: flex;'><div style='margin: auto;'><h1 style='color: red;font-size: 10em;'>FATAL ERROR</h1></div></div>";

				break;
		}
		die();
	}
}