<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day2\ElfComputer;

$elfComputer = new ElfComputer('day2/part1/input.txt');
$elfComputer->initialise();
$elfComputer->writeMemory(12, 1);
$elfComputer->writeMemory(2, 2);
$elfComputer->run();
$output = $elfComputer->getProgram();

echo "Day 2 Part 1 answer: " . $output[0] . "\n";
