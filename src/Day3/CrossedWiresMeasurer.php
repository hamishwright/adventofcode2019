<?php

namespace PuzzleSolvers\Day3;

use PuzzleSolvers\PuzzleSolver;

class CrossedWiresMeasurer extends PuzzleSolver
{
    public $wires = [
        [
            '0,0' => [
                'x' => 0,
                'y' => 0,
            ]
        ],
        [
            '0,0' => [
                'x' => 0,
                'y' => 0,
            ]
        ],
    ];

    public $wireEndPoints = [
        [
            'x' => 0,
            'y' => 0,
        ],
        [
            'x' => 0,
            'y' => 0,
        ],
    ];

    public function run()
    {
        $this->initialise();
        $intersections = $this->getIntersections();
        foreach ($intersections as $intersectionPoint) {
            $distance = $this->getPointManhattenDistance($intersectionPoint);
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

            $this->wires[$wireId][$newPositionKey] = [
                'x' => $newX,
                'y' => $newY,
            ];

            $this->wireEndPoints[$wireId] = [
                'x' => $newX,
                'y' => $newY,
            ];
        }
    }
}
