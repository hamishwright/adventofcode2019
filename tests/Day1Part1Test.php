<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day1\FuelCounterUpper;

final class Day1Part1Test extends TestCase
{
    public function testInputs(): void
    {
        $outputs = [2, 2, 654, 33583, (2 + 2 + 654 + 33583)];
        foreach ($outputs as $inputFileNumber => $output) {
            $puzzleSolver = new FuelCounterUpper('day1/part1/' . $inputFileNumber . '.txt');
            $puzzleSolver->run();
            $this->assertSame($output, $puzzleSolver->getOutput());
        }
    }
}
