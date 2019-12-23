<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day3\CrossedWiresMeasurer2;
use PuzzleSolvers\PuzzleDebugger;

final class Day3Part2Test extends TestCase
{
    public function testEndToEnd(): void
    {
        $outputs = [30, 610, 410];
        foreach ($outputs as $inputFileNumber => $output) {
            $inputFile = 'day3/part1/' . $inputFileNumber;
            PuzzleDebugger::print('TESTING INPUT FILE ' . $inputFile);
            $puzzleSolver = new CrossedWiresMeasurer2($inputFile);
            $puzzleSolver->run();
            $this->assertSame($output, $puzzleSolver->getOutput());
        }
    }

    public function testWirePointStoresShortestLength()
    {
        $inputFile = 'day3/part2/crossing_wires_length';
        $crossedWiresMeasurer2 = new CrossedWiresMeasurer2($inputFile);
        $crossedWiresMeasurer2->initialise();

        $this->assertSame(1, $crossedWiresMeasurer2->wires[0]['0,1']['length']);
    }
}
