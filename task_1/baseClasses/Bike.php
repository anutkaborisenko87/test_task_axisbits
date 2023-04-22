<?php
require_once 'Vehicle.php';
class Bike extends Vehicle
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Bike';
    }
}