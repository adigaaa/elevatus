<?php

namespace App\Exceptions;

use Exception;
use App\Exceptions\Interfaces\ExceptionInterface;

class ValidationException extends Exception implements ExceptionInterface
{
	public function getErrors()
	{
		return 'ValidationException';
	}
}
