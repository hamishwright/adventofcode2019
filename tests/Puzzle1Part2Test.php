<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Puzzle1\FuelCounterUpper2;

final class Puzzle1Part2Test extends TestCase
{
    public function testInputs(): void
    {
        $outputs = [2, 966, 50346, (2 + 966 + 50346)];
        foreach ($outputs as $inputFileNumber => $output) {
            $puzzleSolver = new FuelCounterUpper2('puzzle1/part2/' . $inputFileNumber . '.txt');
            $puzzleSolver->run();
            $this->assertSame($output, $puzzleSolver->getOutput());
        }
    }
}
