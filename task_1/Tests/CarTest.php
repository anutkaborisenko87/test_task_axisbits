<?php
require_once __DIR__ . '/../baseClasses/Car.php';
class CarTest
{
    /**
     * @return void
     */
    public function testSetSpeed()
    {
        $car = new Car();
        $car->setSpeed(100);
        return assert($car->getSpeed() === 100);
    }

    /**
     * @return bool|void
     */
    public function testToString()
    {
        $car = new Car();
        $car->setSpeed(100);
        return assert($car->__toString() === 'Car: 100');
    }
}