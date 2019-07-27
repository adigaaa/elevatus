<?php

namespace App\Exceptions;

use ReflectionClass;
use Exception;

class Handler
{
	protected $exception;

	public function __construct(Exception $e)
	{
		$this->exception = $e;
	}

	public function respond()
	{
		$class = (new ReflectionClass($this->exception))->getShortName();
		if (method_exists($this, $method = "handle{$class}")) {
			return $this->$method($this->exception);
		}
		
		return $this->unhandledException($this->exception);
		
	}

	public function handleValidationException(Exception $e)
	{
		return $e->getErrors();
	}
	public function handleParseException(Exception $e)
	{
		return $e->getErrors();
	}
	public function handleInvalidTransportationType(Exception $e)
	{
		return $e->getErrors();
	}
	public function unhandledException(Exception $e)
	{
		return 'unhandledException' . $e->getMessage();
	}
}
