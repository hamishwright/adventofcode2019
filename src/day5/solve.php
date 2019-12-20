<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day5\ElfComputer2;

$elfComputer = new ElfComputer2('day5/part1/input');
$elfComputer->initialise();
$elfComputer->input = 1;
$elfComputer->run();
$outputs = $elfComputer->outputs;

echo "Day 5 Part 1 answer: " . end($outputs) . "\n";
