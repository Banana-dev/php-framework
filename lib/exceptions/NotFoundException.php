<?php

namespace Banana\Exception;

use Throwable;

class NotFoundException extends \Exception {

	public function __construct( $message = "", $code = 0, \Throwable $previous = NULL) {
		parent::__construct( $message, 404, $previous );
	}
}