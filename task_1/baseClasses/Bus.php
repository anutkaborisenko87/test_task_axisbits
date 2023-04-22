<?php
require_once 'Vehicle.php';
class Bus extends Vehicle
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return "Bus";
    }

}