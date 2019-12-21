<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day6\OrbitMapper;

final class Day6Part1Test extends TestCase
{
    public function testEndToEnd(): void
    {
        $outputs = [
            42,
        ];
        foreach ($outputs as $inputFileNumber => $output) {
            $puzzleSolver = new OrbitMapper('day6/part1/' . $inputFileNumber);
            $puzzleSolver->initialise();
            $puzzleSolver->run();
            $this->assertSame($output, $puzzleSolver->getOutput());
        }
    }

    public function testObjectStructure()
    {
        $orbitMapper = new OrbitMapper('day6/part1/two_objects');
        $orbitMapper->initialise();
        $expectedOutput = [
            'B' => [
                'parent' => 'COM',
                'orbitDepth' => 1,
            ],
            'C' => [
                'parent' => 'B',
                'orbitDepth' => 2,
            ],
        ];

        $this->assertSame($expectedOutput, $orbitMapper->objects);
    }
}
