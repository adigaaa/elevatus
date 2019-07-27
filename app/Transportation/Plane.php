<?php

namespace App\Transportation;

use App\Abstracts\AbstractTransportation;

class Plane extends AbstractTransportation
{
	public function getTrip($stop)
	{
		$trip = sprintf('From %s take flight %s to %s. Gate %s, seat %s.',
			$stop['Departure'],
			$stop['Transportation_number'],
			$stop['Arrival'],
			$stop['Gate'],
			$stop['Seat_number']
		);


		if (array_key_exists('Baggage', $stop)) {
			return sprintf($trip .' Baggage drop at ticket counter %s.',
				$stop['Baggage']
			);
		}
		return $trip. ' Baggage will we automatically transferred from your last leg';

	}
}