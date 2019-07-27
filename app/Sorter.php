<?php

namespace App;

use App\Transportation\Bus;
use App\Transportation\Plane;
use App\Transportation\Train;
use App\Exceptions\InvalidTransportationType;

class Sorter
{
	// transportation types
	protected $transportation = [
		'Bus' => Bus::class,
		'Plane' => Plane::class,
		'Train' => Train::class, 
	];

	protected $stops;

	public function __construct($stops)
	{
		$this->stops = $stops;
	}

	public function sort()
	{
		$firstElement = null;
		$lastElement = null;
		// find first and last element
		for ($i = 0 ; $i < count($this->stops) ; $i++ ) {

			$hasPrevius = false;
			$hasNext = false;
			if (!is_null($firstElement) && !is_null($lastElement)) {
				break;
			}
			foreach ($this->stops as $stop) {
				// check if this is the first stop
				if (!$hasPrevius && $this->stops[$i]['Departure'] == $stop['Arrival']) {
					$hasPrevius = true;
				}
				// check if this is the last stop
				if (!$hasNext && $this->stops[$i]['Arrival'] == $stop['Departure']) {
					$hasNext = true;
				}
			}
			if (!$hasPrevius) {
				$firstElement = $this->stops[$i]['Departure'];
			}elseif (!$hasNext) {
				$lastElement = $this->stops[$i]['Arrival'];
			}
		}
		return $this->response($firstElement);
	}
	public function response($firstElement)
	{
		$result = [];
		$nextElement = $firstElement;
		for ($i = 0 ; $i < count($this->stops) ; $i++ ) { 
			foreach ($this->stops as $stop) {
				if ($stop['Departure'] == $nextElement) {
					echo  $this->getTrip($stop) . PHP_EOL;
					$nextElement = $stop['Arrival'];
				}
			}
		}

	}
	public function getTrip($stop)
	{
		if (!array_key_exists($stop['Transportation_type'], $this->transportation)) {
			throw new InvalidTransportationType();
		}
		
		return $this->transportation[$stop['Transportation_type']]::getInstance()->getTrip($stop);
	}

}
