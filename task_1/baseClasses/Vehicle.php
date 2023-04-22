<?php
require_once 'SpeedTrait.php';
abstract class Vehicle
{
    use SpeedTrait;
    abstract public function getName(): string;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName() . ": " . $this->getSpeed();
    }

}