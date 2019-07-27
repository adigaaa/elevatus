<?php

use App\Transportation\Plane;
use PHPUnit\Framework\TestCase;


class PlaneTest extends TestCase
{

	public function getData()
	{
		return Plane::getInstance()->getTrip([
			'Departure' => 'D',
			'Transportation_number' => 'T',
			'Arrival' => 'A',
			'Gate' => 'G',
			'Seat_number' => 'S',
		]);
	}
	public function getDataWithBaggage()
	{
		return Plane::getInstance()->getTrip([
			'Departure' => 'D',
			'Transportation_number' => 'T',
			'Arrival' => 'A',
			'Gate' => 'G',
			'Seat_number' => 'S',
			'Baggage' => 'B', 
		]);
	}
	public function testMessage()
	{
		$this->assertEquals($this->getData(),'From D take flight T to A. Gate G, seat S. Baggage will we automatically transferred from your last leg');
	}
	public function testMesasgeWithBaggage()
	{
		$this->assertEquals($this->getDataWithBaggage(),'From D take flight T to A. Gate G, seat S. Baggage drop at ticket counter B.');
	}
}