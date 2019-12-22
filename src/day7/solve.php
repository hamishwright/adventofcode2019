<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day7\AmplifierToEleven;
use PuzzleSolvers\Day7\AmplifierToTwelve;

$amplifierToEleven = new AmplifierToEleven('day7/part1/input');
$amplifierToEleven->run();

echo "Day 7 Part 1 answer: " . $amplifierToEleven->getOutput() . "\n";

$amplifierToTwelve = new AmplifierToTwelve('day7/part1/input');
$amplifierToTwelve->testAllPhaseSequences();

echo "Day 7 Part 2 answer: " . $amplifierToTwelve->getOutput() . "\n";
