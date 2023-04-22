<?php
require_once 'Vehicle.php';
class Bus extends Vehicle
{
    public function getName(): string
    {
        return "Bus";
    }

}