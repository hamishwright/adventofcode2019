<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Puzzle1\FuelCounterUpper;

final class Puzzle1Test extends TestCase
{
    public function testInputs(): void
    {
        $outputs = [2, 2, 654, 33583, (2 + 2 + 654 + 33583)];
        foreach ($outputs as $inputFileNumber => $output) {
            $puzzleSolver = new FuelCounterUpper('puzzle1/' . $inputFileNumber . '.txt');
            $puzzleSolver->run();
            $this->assertSame($output, $puzzleSolver->getOutput());
        }
    }
}
