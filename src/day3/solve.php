<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day3\CrossedWiresMeasurer;

$crossedWiresMeasurer = new CrossedWiresMeasurer('day3/part1/input');
$crossedWiresMeasurer->run();
$output = $crossedWiresMeasurer->getOutput();

echo "Day 3 Part 1 answer: " . $output . "\n";
