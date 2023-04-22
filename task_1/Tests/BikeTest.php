<?php
require_once __DIR__ . '/../baseClasses/Bike.php';
class BikeTest
{
    /**
     * @return bool|void
     */
    public function testSetSpeed()
    {
        $bus = new Bus();
        $bus->setSpeed(20);
        return assert($bus->getSpeed() === 20);
    }

    /**
     * @return bool|void
     */
    public function testToString()
    {
        $bus = new Bus();
        $bus->setSpeed(20);
        return assert($bus->__toString() === 'Bike: 20');
    }
}