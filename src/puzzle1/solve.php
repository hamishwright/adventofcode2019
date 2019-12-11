<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Puzzle1\FuelCounterUpper;

$fuelCounterUpper = new FuelCounterUpper('puzzle1/input.txt');
$fuelCounterUpper->run();
echo "answer: " . $fuelCounterUpper->getOutput() . "\n";
