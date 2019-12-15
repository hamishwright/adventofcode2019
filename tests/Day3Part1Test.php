<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day3\CrossedWiresMeasurer;

final class Day3Part1Test extends TestCase
{
    public function testEndToEnd(): void
    {
        $outputs = [6, 159, 135];
        foreach ($outputs as $inputFileNumber => $output) {
            $inputFile = 'day3/part1/' . $inputFileNumber;
            \PuzzleDebugger::print('TESTING INPUT FILE ' . $inputFile);
            $puzzleSolver = new CrossedWiresMeasurer($inputFile);
            $puzzleSolver->run();
            $this->assertSame($output, $puzzleSolver->getOutput());
        }
    }

    public function testLayWireUp()
    {
        $crossedWiresMeasurer = new CrossedWiresMeasurer('day3/part1/0');

        $crossedWiresMeasurer->layWire(0, 'U');

        $this->assertSame([
            '0,0' => [
                'x' => 0,
                'y' => 0,
            ],
            '0,1' => [
                'x' => 0,
                'y' => 1,
            ],
        ], $crossedWiresMeasurer->wires[0]);
    }

    public function testLayWireDown()
    {
        $crossedWiresMeasurer = new CrossedWiresMeasurer('day3/part1/0');

        $crossedWiresMeasurer->layWire(0, 'D');

        $this->assertSame([
            '0,0' => [
                'x' => 0,
                'y' => 0,
            ],
            '0,-1' => [
                'x' => 0,
                'y' => -1,
            ],
        ], $crossedWiresMeasurer->wires[0]);
    }

    public function testLayWireRight()
    {
        $crossedWiresMeasurer = new CrossedWiresMeasurer('day3/part1/0');

        $crossedWiresMeasurer->layWire(0, 'R');

        $this->assertSame([
            '0,0' => [
                'x' => 0,
                'y' => 0,
            ],
            '1,0' => [
                'x' => 1,
                'y' => 0,
            ],
        ], $crossedWiresMeasurer->wires[0]);
    }

    public function testLayWireLeft()
    {
        $crossedWiresMeasurer = new CrossedWiresMeasurer('day3/part1/0');

        $crossedWiresMeasurer->layWire(0, 'L');

        $this->assertSame([
            '0,0' => [
                'x' => 0,
                'y' => 0,
            ],
            '-1,0' => [
                'x' => -1,
                'y' => 0,
            ],
        ], $crossedWiresMeasurer->wires[0]);
    }

    public function testLayWireLeft2()
    {
        $crossedWiresMeasurer = new CrossedWiresMeasurer('day3/part1/0');

        $crossedWiresMeasurer->layWire(0, 'L', 2);

        $this->assertSame([
            '0,0' => [
                'x' => 0,
                'y' => 0,
            ],
            '-1,0' => [
                'x' => -1,
                'y' => 0,
            ],
            '-2,0' => [
                'x' => -2,
                'y' => 0,
            ],
        ], $crossedWiresMeasurer->wires[0]);
    }

    public function testInitialiseWires()
    {
        $crossedWiresMeasurer = new CrossedWiresMeasurer('day3/part1/test_intitialise_wires');

        $crossedWiresMeasurer->initialise();

        $this->assertSame([
            [
                '0,0' => [
                    'x' => 0,
                    'y' => 0,
                ],
                '1,0' => [
                    'x' => 1,
                    'y' => 0,
                ],
                '2,0' => [
                    'x' => 2,
                    'y' => 0,
                ],
                '2,-1' => [
                    'x' => 2,
                    'y' => -1,
                ],
            ],
            [
                '0,0' => [
                    'x' => 0,
                    'y' => 0,
                ],
                '-1,0' => [
                    'x' => -1,
                    'y' => 0,
                ],
                '-1,1' => [
                    'x' => -1,
                    'y' => 1,
                ],
                '-1,2' => [
                    'x' => -1,
                    'y' => 2,
                ],
            ]
        ], $crossedWiresMeasurer->wires);
    }

    public function testGetIntersections()
    {
        $crossedWiresMeasurer = new CrossedWiresMeasurer('day3/part1/0');
        $crossedWiresMeasurer->wires = [
            [
                '0,0' => [
                    'x' => 0,
                    'y' => 0,
                ],
                '5,5' => [
                    'x' => 5,
                    'y' => 5,
                ],
                '3,2' => [
                    'x' => 3,
                    'y' => 2,
                ]
            ],
            [
                '0,0' => [
                    'x' => 0,
                    'y' => 0,
                ],
                '1,6' => [
                    'x' => 1,
                    'y' => 6,
                ],
                '5,5' => [
                    'x' => 5,
                    'y' => 5,
                ]
            ],
        ];

        $intersections = $crossedWiresMeasurer->getIntersections();

        $this->assertSame([
            '5,5' => [
                'x' => 5,
                'y' => 5,
            ],
        ], $intersections);
    }

    public function testGetPointManhattenDistance()
    {
        $crossedWiresMeasurer = new CrossedWiresMeasurer('day3/part1/0');
        $point = [
            'x' => 3,
            'y' => 3,
        ];

        $pointManhattenDistance = $crossedWiresMeasurer->getPointManhattenDistance($point);

        $this->assertSame(6, $pointManhattenDistance);
    }
}
