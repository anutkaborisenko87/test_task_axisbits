<?php
require_once __DIR__ . '/../baseClasses/Bus.php';
class BusTest
{
    /**
     * @return void
     */
    public function testSetSpeed()
    {
        $bus = new Bus();
        $bus->setSpeed(80);
        return assert($bus->getSpeed() === 80);
    }

    /**
     * @return bool|void
     */
    public function testToString()
    {
        $bus = new Bus();
        $bus->setSpeed(80);
        return assert($bus->__toString() === 'Bus: 80');
    }
}