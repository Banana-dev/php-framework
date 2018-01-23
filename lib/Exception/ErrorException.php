<?php

namespace Banana\Exception;

use Throwable;

class ErrorException extends \ErrorException {

	public function __construct( $message = "", $code = 0, $severity = 1, $filename = __FILE__, $lineno = __LINE__, \Exception $previous ) {
		parent::__construct( $message, $code, $severity, $filename, $lineno, $previous );
	}
}