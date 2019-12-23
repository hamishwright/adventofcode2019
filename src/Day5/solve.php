<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day5\ElfComputer2;
use PuzzleSolvers\Day5\ElfComputer3;

$elfComputer = new ElfComputer2('day5/part1/input');
$elfComputer->initialise();
$elfComputer->input = 1;
$elfComputer->run();
$outputs = $elfComputer->outputs;

echo "Day 5 Part 1 answer: " . end($outputs) . "\n";

$elfComputer = new ElfComputer3('day5/part1/input');
$elfComputer->initialise();
$elfComputer->input = 5;
$elfComputer->run();
$outputs = $elfComputer->outputs;

echo "Day 5 Part 2 answer: " . end($outputs) . "\n";
