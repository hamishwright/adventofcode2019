<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day2\ElfComputer;

final class Puzzle1Part2Test extends TestCase
{
    public function testInputs(): void
    {
        $outputs = [
            '3500,9,10,70,2,3,11,0,99,30,40,50',
            '2,0,0,0,99',
            '2,3,0,6,99',
            '2,4,4,5,99,9801',
            '30,1,1,4,2,5,6,0,99',
        ];
        foreach ($outputs as $inputFileNumber => $output) {
            $puzzleSolver = new ElfComputer('day2/part1/' . $inputFileNumber);
            $puzzleSolver->initialise();
            $puzzleSolver->run();
            $this->assertSame($output, $puzzleSolver->getOutput());
        }
    }

    public function testInitialiseLoadsInputToProgramAndSetsPositionTo0(): void
    {
        $elfComputer = new ElfComputer('day2/part1/0');

        $elfComputer->initialise();

        $this->assertSame([1, 9, 10, 3, 2, 3, 11, 0, 99, 30, 40, 50], $elfComputer->getProgram());
        $this->assertSame(0, $elfComputer->getPosition());
    }

    public function testReadMemory(): void
    {
        $elfComputer = new ElfComputer('day2/part1/0');
        $elfComputer->initialise();
        $elfComputer->setPosition(1);

        $value0 = $elfComputer->readMemory(0);
        $this->assertSame(1, $value0);

        $value1 = $elfComputer->readMemory();
        $this->assertSame(9, $value1);

        $value2 = $elfComputer->readMemory(2);
        $this->assertSame(10, $value2);
    }

    public function testReadMemoryOffset(): void
    {
        $elfComputer = new ElfComputer('day2/part1/0');
        $elfComputer->initialise();
        $elfComputer->setPosition(1);

        $value1 = $elfComputer->readMemoryOffset(0);
        $this->assertSame(9, $value1);

        $value3 = $elfComputer->readMemoryOffset(2);
        $this->assertSame(3, $value3);
    }

    public function testWriteMemory(): void
    {
        $elfComputer = new ElfComputer('day2/part1/0');
        $elfComputer->initialise();
        $elfComputer->setPosition(1);

        $elfComputer->writeMemory(5, 0);
        $elfComputer->writeMemory(42);

        $program = $elfComputer->getProgram();
        $this->assertSame(5, $program[0]);
        $this->assertSame(42, $program[1]);
    }

    public function testWriteMemoryOffset(): void
    {
        $elfComputer = new ElfComputer('day2/part1/0');
        $elfComputer->initialise();
        $elfComputer->setPosition(1);

        $elfComputer->writeMemoryOffset(5, 2);
        $elfComputer->writeMemoryOffset(42);

        $program = $elfComputer->getProgram();
        $this->assertSame(5, $program[3]);
        $this->assertSame(42, $program[1]);
    }
}
