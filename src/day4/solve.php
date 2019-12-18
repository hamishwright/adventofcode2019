<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day4\PasswordCracker;

$passwordCracker = new PasswordCracker('day4/part1/input');
$passwordCracker->run();
$output = $passwordCracker->getOutput();

echo "Day 4 Part 1 answer: " . $output . "\n";
