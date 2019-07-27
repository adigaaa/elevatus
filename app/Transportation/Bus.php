<?php

namespace App\Transportation;

use App\Abstracts\AbstractTransportation;

class Bus extends AbstractTransportation
{
	public function getTrip($stop)
	{
		 return sprintf('Take the airport bus from %s to %s. No seat assignment.',
		 	$stop['Departure'],
		 	$stop['Arrival']
		);
	}
}