<?php
require_once 'baseClasses/Bike.php';
require_once 'baseClasses/Bus.php';
require_once 'baseClasses/Car.php';
require_once 'Tests/BusTest.php';
require_once 'Tests/BikeTest.php';
require_once 'Tests/CarTest.php';

$bus = new Bus();
$bus->setSpeed(80);
echo $bus . "<br/>";

$bike = new Bike();
$bike->setSpeed(20);
echo $bike . "<br/>";

$car = new Car();
$car->setSpeed(100);
echo $car . "<br/>";

echo "<hr/>";

echo "Tests <br/>";
echo "<br/>";

$busTest = new BusTest();
echo 'Tests for Bus class </br>';
echo 'Test set speed method for speed 80 is '. ($busTest->testSetSpeed() ? 'passed' : 'failed') . '</br>';
echo 'Test class to string method for speed 80 is '. ($busTest->testToString() ? 'passed' : 'failed') . '</br>';
echo "<br/>";
$bikeTest = new BikeTest();
echo 'Tests for Bike class </br>';
echo 'Test Bike set speed method for speed 20 is '. ($bikeTest->testSetSpeed() ? 'passed' : 'failed') . '</br>';
echo 'Test Bike class to string method for speed 20 is '. ($bikeTest->testToString() ? 'passed' : 'failed') . '</br>';
echo "<br/>";
echo "<br/>";
$carTest = new CarTest();
echo 'Tests for Car class </br>';
echo 'Test Bike set speed method for speed 100 is '. ($carTest->testSetSpeed() ? 'passed' : 'failed') . '</br>';
echo 'Test Bike class to string method for speed 100 is '. ($carTest->testToString() ? 'passed' : 'failed') . '</br>';
echo "<br/>";