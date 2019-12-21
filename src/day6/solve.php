<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day6\OrbitMapper;

$orbitMapper = new OrbitMapper('day6/part1/input');
$orbitMapper->initialise();
$orbitMapper->run();
$output = $orbitMapper->getOutput();

echo "Day 5 Part 1 answer: " . $output . "\n";
