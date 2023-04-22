<?php
require_once 'Vehicle.php';
class Bike extends Vehicle
{

    public function getName(): string
    {
        return 'Bike';
    }
}