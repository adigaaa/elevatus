<?php

namespace App\Transportation;

use App\Abstracts\AbstractTransportation;

class Train extends AbstractTransportation
{
	public function getTrip($stop)
	{
		return sprintf('Take train %s from %s to %s. Sit in seat %s', 
			$stop['Transportation_number'],
			$stop['Departure'],
			$stop['Arrival'],
			$stop['Seat_number']
		);
	}
}
