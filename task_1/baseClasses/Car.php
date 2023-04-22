<?php
require_once 'Vehicle.php';
class Car extends Vehicle
{
    public function getName(): string
    {
        return 'Car';
    }
}