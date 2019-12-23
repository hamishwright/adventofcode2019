<?php

namespace PuzzleSolvers\Day2;

use PuzzleSolvers\PuzzleSolver;
use PuzzleSolvers\Day2\ElfComputer;

class ElfComputerInputFinder extends PuzzleSolver
{
    private $noun;
    private $verb;
    private $isMatchFound;

    public function run()
    {
        $elfComputer = new ElfComputer('day2/part1/input.txt');

        for ($input0 = 0; $input0 < 99 && !$this->isMatchFound; $input0++) {
            for ($input1 = 0; $input1 < 99 && !$this->isMatchFound; $input1++) {
                $elfComputer->initialise();
                $elfComputer->writeMemory($input0, 1);
                $elfComputer->writeMemory($input1, 2);
                $elfComputer->run();
                $elfComputerProgram = $elfComputer->getProgram();

                $this->isMatchFound = ($elfComputerProgram[0] === (int) $this->inputs[0]);
                if ($this->isMatchFound) {
                    $this->noun = $input0;
                    $this->verb = $input1;
                }
            }
        }
    }

    public function setNoun(int $value)
    {
        $this->noun = $value;
    }

    public function isMatchFound()
    {
        return $this->isMatchFound;
    }

    public function setVerb(int $value)
    {
        $this->verb = $value;
    }

    public function getOutput()
    {
        return 100 * $this->noun + $this->verb;
    }
}
