<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Puzzle1\FuelCounterUpper;
use PuzzleSolvers\Puzzle1\FuelCounterUpper2;

$fuelCounterUpper = new FuelCounterUpper('puzzle1/input.txt');
$fuelCounterUpper->run();
echo "Part 1 answer: " . $fuelCounterUpper->getOutput() . "\n";

$fuelCounterUpper2 = new FuelCounterUpper2('puzzle1/input.txt');
$fuelCounterUpper2->run();
echo "Part 2 answer: " . $fuelCounterUpper2->getOutput() . "\n";
