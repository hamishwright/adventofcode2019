<?php

namespace PuzzleSolvers\Day2;

use PuzzleSolvers\PuzzleSolver;

class ElfComputer extends PuzzleSolver
{
    private $program;
    private $position;

    public function initialise()
    {
        $this->position = 0;
        $this->program = array_map('intval', explode(',', $this->inputs[0]));
    }

    public function run()
    {
        while ($this->position < $this->getProgramSize()) {
            $opcode = $this->readMemory();
            $this->execute($opcode);

            $this->position += 4;
        }

        $this->output = implode(',', $this->program);
    }

    public function execute(int $opcode)
    {
        if ($opcode === 1) {
            $operand1Position = $this->readMemoryOffset(1);
            $operand2Position = $this->readMemoryOffset(2);
            $value = $this->readMemory($operand1Position) + $this->readMemory($operand2Position);
            $this->writeMemory($value, $this->readMemoryOffset(3));
        }

        if ($opcode === 2) {
            $operand1Position = $this->readMemoryOffset(1);
            $operand2Position = $this->readMemoryOffset(2);
            $value = $this->readMemory($operand1Position) * $this->readMemory($operand2Position);
            $this->writeMemory($value, $this->readMemoryOffset(3));
        }

        if ($opcode === 99) {
            $this->position = $this->getProgramSize();
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
