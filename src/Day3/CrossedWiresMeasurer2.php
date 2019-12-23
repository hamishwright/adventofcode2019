<?php

namespace PuzzleSolvers\Day3;

use PuzzleSolvers\PuzzleSolver;

class CrossedWiresMeasurer2 extends PuzzleSolver
{
    public $wires = [
        [
            '0,0' => [
                'x' => 0,
                'y' => 0,
                'length' => 0,
            ]
        ],
        [
            '0,0' => [
                'x' => 0,
                'y' => 0,
                'length' => 0,
            ]
        ],
    ];

    public $wireEndPoints = [
        [
            'x' => 0,
            'y' => 0,
            'length' => 0,
        ],
        [
            'x' => 0,
            'y' => 0,
            'length' => 0,
        ],
    ];

    public function run()
    {
        $this->initialise();
        $intersections = $this->getIntersections();
        foreach ($intersections as $intersectionPoint) {
            $distance = $this->getWireLengths($intersectionPoint);
            if (empty($this->output) || $distance < $this->output) {
                $this->output = $distance;
            }
        }
    }

    public function getIntersections()
    {
        $intersections = [];

        $intersections = array_intersect_key($this->wires[0], $this->wires[1]);
        unset($intersections['0,0']);

        return $intersections;
    }

    public function getWireLengths($point)
    {
        return $this->wires[0][$point['x'] . ',' . $point['y']]['length'] + $this->wires[1][$point['x'] . ',' . $point['y']]['length'];
    }

    public function getPointManhattenDistance($point)
    {
        return abs($point['x']) + abs($point['y']);
    }

    public function initialise()
    {
        foreach ($this->inputs as $wireId => $wireSequenceString) {
            $wireSequence = explode(',', $wireSequenceString);
            foreach ($wireSequence as $moveInstruction) {
                $direction = $moveInstruction[0];
                $length = intval(substr($moveInstruction, 1));
                $this->layWire($wireId, $direction, $length);
            }
        }
    }

    public function layWire(int $wireId, string $direction, int $length = 1)
    {
        for ($i = 0; $i < $length; $i++) {
            $wireEndPoint = $this->wireEndPoints[$wireId];

            if ($direction === 'U') {
                $newY = $wireEndPoint['y'] + 1;
                $newX = $wireEndPoint['x'];
            }

            if ($direction === 'D') {
                $newY = $wireEndPoint['y'] - 1;
                $newX = $wireEndPoint['x'];
            }

            if ($direction === 'R') {
                $newY = $wireEndPoint['y'];
                $newX = $wireEndPoint['x'] + 1;
            }

            if ($direction === 'L') {
                $newY = $wireEndPoint['y'];
                $newX = $wireEndPoint['x'] - 1;
            }

            $newPositionKey = $newX . ',' . $newY;

            if (isset($this->wires[$wireId][$newPositionKey])) {
                $newLength = $this->wires[$wireId][$newPositionKey]['length'];
            } else {
                $newLength = $wireEndPoint['length'] + 1;
            }

            $this->wires[$wireId][$newPositionKey] = [
                'x' => $newX,
                'y' => $newY,
                'length' => $newLength,
            ];

            $this->wireEndPoints[$wireId] = [
                'x' => $newX,
                'y' => $newY,
                'length' => $wireEndPoint['length'] + 1,
            ];
        }
    }
}
