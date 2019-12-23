<?php

namespace PuzzleSolvers\Day1;

use PuzzleSolvers\PuzzleSolver;

class FuelCounterUpper2 extends PuzzleSolver
{
    public function run()
    {
        $this->output = 0;

        foreach ($this->inputs as $mass) {
            $fuelForModule = 0;

            while ($mass > 0) {
                $mass = $this->calculateFuelForMass($mass);
                if ($mass > 0) {
                    $fuelForModule += $mass;
                }
            }
            $this->output += $fuelForModule;
        }
    }

    public function calculateFuelForMass($mass)
    {
        return (int) floor($mass / 3) - 2;
    }
}
