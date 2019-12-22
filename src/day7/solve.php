<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day7\AmplifierToEleven;

$amplifierToEleven = new AmplifierToEleven('day7/part1/input');
$amplifierToEleven->run();

echo "Day 7 Part 1 answer: " . $amplifierToEleven->getOutput() . "\n";
