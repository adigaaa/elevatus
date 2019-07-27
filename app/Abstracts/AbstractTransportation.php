<?php

namespace App\Abstracts;

use App\Interfaces\TransportationInterface;
// singlton
abstract class AbstractTransportation implements TransportationInterface
{
	protected static $_instances = null;
	
	private function __construct(){}

	// The object is created from within the class itself
	// only if the class has no instance.
	public static function getInstance()
	{
		$class = get_called_class();
        if (!isset(self::$_instances[$class])) {
            self::$_instances[$class] = new $class();
        }
        return self::$_instances[$class];
	}
}
