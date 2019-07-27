<?php
use App\Sorter;
use PHPUnit\Framework\TestCase;
use App\Abstracts\AbstractTransportation;

class SorterTest extends TestCase
{
	

    public function getTransportation()
    {
    	$class = new ReflectionClass(Sorter::class);
  		$property = $class->getProperty('transportation');
  		$property->setAccessible(true);
		$transportation = $property->getValue(new Sorter([]));
		return $transportation;
    }

    public function testInstanceOf()
    {
    	foreach ($this->getTransportation() as $transportation_type => $instance) {
    		$this->assertInstanceOf(AbstractTransportation::class,$instance::getInstance());
    	}
    }
}