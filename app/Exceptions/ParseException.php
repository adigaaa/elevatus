<?php

namespace App\Exceptions;

use Exception;
use App\Exceptions\Interfaces\ExceptionInterface;

class ParseException extends Exception implements ExceptionInterface
{
	public function getErrors()
	{
		return 'ParseExceptions';
	}
}
