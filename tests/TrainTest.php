<?php

use App\Transportation\Train;
use PHPUnit\Framework\TestCase;


class TrainTest extends TestCase
{

	public function getData()
	{
		return Train::getInstance()->getTrip([
			'Transportation_number' => 'T',
			'Departure' => 'D',
			'Arrival' => 'A',
			'Seat_number' => 'S',
		]);
	}

	public function testMessage()
	{
		$this->assertEquals($this->getData(),'Take train T from D to A. Sit in seat S');
	}
}