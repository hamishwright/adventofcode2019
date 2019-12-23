<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use PuzzleSolvers\Day4\PasswordCracker;
use PuzzleSolvers\Day4\PasswordCracker2;

$passwordCracker = new PasswordCracker('day4/part1/input');
$passwordCracker->run();
$output = $passwordCracker->getOutput();

echo "Day 4 Part 1 answer: " . $output . "\n";

$passwordCracker = new PasswordCracker2('day4/part1/input');
$passwordCracker->run();
$output = $passwordCracker->getOutput();

echo "Day 4 Part 2 answer: " . $output . "\n";
