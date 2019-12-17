<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day3\CrossedWiresMeasurer;
use PuzzleSolvers\Day3\CrossedWiresMeasurer2;

$crossedWiresMeasurer = new CrossedWiresMeasurer('day3/part1/input');
$crossedWiresMeasurer->run();
$output = $crossedWiresMeasurer->getOutput();

echo "Day 3 Part 1 answer: " . $output . "\n";

$crossedWiresMeasurer2 = new CrossedWiresMeasurer2('day3/part1/input');
$crossedWiresMeasurer2->run();
$output = $crossedWiresMeasurer2->getOutput();

echo "Day 3 Part 2 answer: " . $output . "\n";
