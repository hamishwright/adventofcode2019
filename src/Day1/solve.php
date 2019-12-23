<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day1\FuelCounterUpper;
use PuzzleSolvers\Day1\FuelCounterUpper2;

$fuelCounterUpper = new FuelCounterUpper('day1/part1/input.txt');
$fuelCounterUpper->run();
echo "Part 1 answer: " . $fuelCounterUpper->getOutput() . "\n";

$fuelCounterUpper2 = new FuelCounterUpper2('day1/part1/input.txt');
$fuelCounterUpper2->run();
echo "Part 2 answer: " . $fuelCounterUpper2->getOutput() . "\n";
