<?php

namespace PuzzleSolvers\Day1;

use PuzzleSolvers\PuzzleSolver;

class FuelCounterUpper extends PuzzleSolver
{
    public function run()
    {
        $this->output = 0;

        foreach ($this->inputs as $mass) {
            $this->output += $this->calculateFuelForMass($mass);
        }
    }

    public function calculateFuelForMass($mass)
    {
        return (int) floor($mass / 3) - 2;
    }
}
