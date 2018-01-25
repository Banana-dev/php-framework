<?php

namespace Banana\Exception;

use Banana\Template\Template;
use Banana\Utility\Config;
use Throwable;

class MissingTemplateException extends \Exception {

	public function __construct($message = "", $code = 404, \Throwable $previous = NULL) {
		parent::__construct( $message, $code, $previous );
	}
}