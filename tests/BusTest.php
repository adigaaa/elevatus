<?php

use App\Transportation\Bus;
use PHPUnit\Framework\TestCase;


class BusTest extends TestCase
{

	public function getData()
	{
		return Bus::getInstance()->getTrip([
			'Departure' => 'abc',
			'Arrival' => 'efg',
		]);
	}

	public function testMessage()
	{
		$this->assertEquals($this->getData(),'Take the airport bus from abc to efg. No seat assignment.');
	}
}