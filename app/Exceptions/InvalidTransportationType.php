<?php
namespace App\Exceptions;

use Exception;
use App\Exceptions\Interfaces\ExceptionInterface;

class InvalidTransportationType extends Exception implements ExceptionInterface
{
	public function getErrors()
	{
		return 'Invalid Transportation Type';
	}
}
