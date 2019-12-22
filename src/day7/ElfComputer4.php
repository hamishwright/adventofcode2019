<?php

namespace PuzzleSolvers\Day7;

use PuzzleSolvers\PuzzleSolver;

class ElfComputer4 extends PuzzleSolver
{
    public $program;
    public $position;
    public $input;
    public $outputs;
    public $inputSequence;
    public $parameterMode;
    public $instructionLength = 4;

    public function initialise()
    {
        $this->position = 0;
        $this->program = array_map('intval', explode(',', $this->inputs[0]));
        $this->outputs = [];
    }

    public function run()
    {
        while ($this->position < $this->getProgramSize()) {
            $instruction = $this->parseInstruction($this->readMemory());
            $this->execute($instruction);
        }

        $this->output = implode(',', $this->program);
    }

    public function parseInstruction($instruction)
    {
        $parsedInstuction = [];
        $parsedInstuction['opcode'] = (int) substr($instruction, -2, 2);
        $parsedInstuction['mode1'] = (strlen($instruction) > 2) ? (int) substr($instruction, -3, 1) : 0;
        $parsedInstuction['mode2'] = (strlen($instruction) > 3) ? (int) substr($instruction, -4, 1) : 0;
        $parsedInstuction['mode3'] = (strlen($instruction) > 4) ? (int) substr($instruction, -5, 1) : 0;

        return $parsedInstuction;
    }

    public function getParameter(int $offset, int $mode)
    {
        $parameter = $this->readMemoryOffset($offset);
        if ($mode == 0) {
            $parameter = $this->readMemory($parameter);
        }

        return $parameter;
    }

    public function getNextInput()
    {
        return array_pop($this->inputSequence);
    }

    public function execute($instruction)
    {
        $opcode = $instruction['opcode'];

        if ($opcode === 1) {
            $parameter1 = $this->getParameter(1, $instruction['mode1']);
            $parameter2 = $this->getParameter(2, $instruction['mode2']);
            $parameter3 = $this->readMemoryOffset(3);
            $value = $parameter1 + $parameter2;
            $this->writeMemory($value, $parameter3);
            $this->position += 4;
        }

         else if ($opcode === 2) {
            $parameter1 = $this->getParameter(1, $instruction['mode1']);
            $parameter2 = $this->getParameter(2, $instruction['mode2']);
            $parameter3 = $this->readMemoryOffset(3);
            $value = $parameter1 * $parameter2;
            $this->writeMemory($value, $parameter3);
            $this->position += 4;
        }

        else if ($opcode == 3) {
            $this->writeMemory($this->getNextInput(), $this->readMemoryOffset(1));
            $this->position += 2;
        }

        else if ($opcode == 4) {
            $parameter1 = $this->getParameter(1, $instruction['mode1']);
            $this->outputs[] = $parameter1;
            $this->position += 2;
        }

        else if ($opcode == 5) {
            $parameter1 = $this->getParameter(1, $instruction['mode1']);
            $parameter2 = $this->getParameter(2, $instruction['mode2']);
            if ($parameter1 != 0) {
                $this->position = $parameter2;
            } else {
                $this->position += 3;
            }
        }

        else if ($opcode == 6) {
            $parameter1 = $this->getParameter(1, $instruction['mode1']);
            $parameter2 = $this->getParameter(2, $instruction['mode2']);
            if ($parameter1 == 0) {
                $this->position = $parameter2;
            } else {
                $this->position += 3;
            }
        }

        else if ($opcode == 7) {
            $parameter1 = $this->getParameter(1, $instruction['mode1']);
            $parameter2 = $this->getParameter(2, $instruction['mode2']);
            $parameter3 = $this->readMemoryOffset(3);
            $value = ($parameter1 < $parameter2) ? 1 : 0;
            $this->writeMemory($value, $parameter3);
            $this->position += 4;
        }

        else if ($opcode == 8) {
            $parameter1 = $this->getParameter(1, $instruction['mode1']);
            $parameter2 = $this->getParameter(2, $instruction['mode2']);
            $parameter3 = $this->readMemoryOffset(3);
            $value = ($parameter1 == $parameter2) ? 1 : 0;
            $this->writeMemory($value, $parameter3);
            $this->position += 4;
        }

        else if ($opcode === 99) {
            $this->position = $this->getProgramSize();
        } else {
            $this->position += 1;
        }
    }

    public function getProgramSize(): int
    {
        return count($this->program);
    }

    public function readMemory($position = null)
    {
        if (is_null($position)) {
            $position = $this->position;
        }

        return $this->program[$position];
    }

    public function readMemoryOffset($offset = 0)
    {
        return $this->program[$this->position + $offset];
    }

    public function writeMemoryOffset(int $value, $offset = 0)
    {
        $this->program[$this->position + $offset] = $value;
    }

    public function writeMemory(int $value, $position = null)
    {
        if (is_null($position)) {
            $position = $this->position;
        }
        $this->program[$position] = $value;
    }

    public function getProgram(): array
    {
        return $this->program ?: [];
    }

    public function getPosition(): int
    {
        return $this->position ?: 0;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }
}
