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

    public function testGetParents()
    {
        $orbitMapper = new OrbitMapper('day6/part1/0');
        $orbitMapper->initialise();
        $expectedOutput = ['J', 'E', 'D', 'C', 'B', 'COM'];

        $this->assertSame($expectedOutput, $orbitMapper->getParentObjects('K'));
    }

    public function testCommonObjectBetweenPoints()
    {
        $orbitMapper = new OrbitMapper('day6/part1/0');
        $orbitMapper->initialise();

        $this->assertSame('D', $orbitMapper->getCommonObjectBetweenPoints('J', 'I'));
        $this->assertSame('B', $orbitMapper->getCommonObjectBetweenPoints('H', 'L'));
    }

    public function testGetDistanceBetweenTwoPoints()
    {
        $orbitMapper = new OrbitMapper('day6/part1/0');
        $orbitMapper->initialise();

        $this->assertSame(3, $orbitMapper->getDistanceBetweenPoints('J', 'I'));
        $this->assertSame(8, $orbitMapper->getDistanceBetweenPoints('H', 'L'));
    }
}
