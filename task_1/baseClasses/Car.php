<?php
require_once 'Vehicle.php';
class Car extends Vehicle
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Car';
    }
}