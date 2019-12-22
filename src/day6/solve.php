<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day6\OrbitMapper;

$orbitMapper = new OrbitMapper('day6/part1/input');
$orbitMapper->initialise();
$orbitMapper->run();
$output = $orbitMapper->getOutput();

echo "Day 6 Part 1 answer: " . $output . "\n";

$orbitMapper = new OrbitMapper('day6/part1/input');
$orbitMapper->initialise();
$santasLocation = $orbitMapper->objects['SAN']['parent'];
$yourLocation = $orbitMapper->objects['YOU']['parent'];
$output = $orbitMapper->getDistanceBetweenPoints($yourLocation, $santasLocation);

echo "Day 6 Part 2 answer: " . $output . "\n";
