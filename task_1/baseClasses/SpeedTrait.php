<?php

trait SpeedTrait
{
    protected $speed;

    /**
     * @param int $speed
     * @return void
     */
    public function setSpeed(int $speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }
}