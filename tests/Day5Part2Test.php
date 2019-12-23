<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day5\ElfComputer3;
use PuzzleSolvers\PuzzleDebugger;

final class Day5Part2Test extends TestCase
{
    public function testDay2EndToEnd(): void
    {
        $outputs = [
            '3500,9,10,70,2,3,11,0,99,30,40,50',
            '2,0,0,0,99',
            '2,3,0,6,99',
            '2,4,4,5,99,9801',
            '30,1,1,4,2,5,6,0,99',
        ];
        foreach ($outputs as $inputFileNumber => $output) {
            $puzzleSolver = new ElfComputer3('day2/part1/' . $inputFileNumber);
            $puzzleSolver->initialise();
            $puzzleSolver->run();
            $this->assertSame($output, $puzzleSolver->getOutput());
        }
    }

    public function testInitialiseLoadsInputToProgramAndSetsPositionTo0(): void
    {
        $elfComputer = new ElfComputer3('day2/part1/0');

        $elfComputer->initialise();

        $this->assertSame([1, 9, 10, 3, 2, 3, 11, 0, 99, 30, 40, 50], $elfComputer->getProgram());
        $this->assertSame(0, $elfComputer->getPosition());
    }

    public function testPart1EndToEnd()
    {
        $outputs = [
            [42, 0, 4, 0, 99],
            [1002, 4, 3, 4, 99],
            [1101, 100, -1, 4, 99],
        ];
        $programOutput = [
            [42],
            [],
            [],
        ];
        foreach ($outputs as $inputFileNumber => $output) {
            $elfComputer = new ElfComputer3('day5/part1/' . $inputFileNumber);
            $elfComputer->initialise();
            $elfComputer->input = 42;
            $elfComputer->run();

            $this->assertSame($programOutput[$inputFileNumber], $elfComputer->outputs);
            $this->assertSame($outputs[$inputFileNumber], $elfComputer->program);
        }
    }

    public function testEndToEnd()
    {
        $outputs = [
            [0],
            [1],
            [0],
            [0],
            [1],
            [0],
            [1],
            [0],
            [1],
            [999],
            [1000],
            [1001],
        ];
        $inputs = [
            7,
            8,
            9,
            8,
            7,
            55,
            8,
            8,
            7,
            7,
            8,
            9,
        ];
        foreach ($outputs as $inputFileNumber => $output) {
            PuzzleDebugger::print('TESTING FILE: ' . $inputFileNumber);
            $elfComputer = new ElfComputer3('day5/part2/' . $inputFileNumber);
            $elfComputer->initialise();
            $elfComputer->input = $inputs[$inputFileNumber];
            $elfComputer->run();

            $this->assertSame($outputs[$inputFileNumber], $elfComputer->outputs);
        }
    }

    public function testReadMemory(): void
    {
        $elfComputer = new ElfComputer3('day2/part1/0');
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
        $elfComputer = new ElfComputer3('day2/part1/0');
        $elfComputer->initialise();
        $elfComputer->setPosition(1);

        $value1 = $elfComputer->readMemoryOffset(0);
        $this->assertSame(9, $value1);

        $value3 = $elfComputer->readMemoryOffset(2);
        $this->assertSame(3, $value3);
    }

    public function testWriteMemory(): void
    {
        $elfComputer = new ElfComputer3('day2/part1/0');
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
        $elfComputer = new ElfComputer3('day2/part1/0');
        $elfComputer->initialise();
        $elfComputer->setPosition(1);

        $elfComputer->writeMemoryOffset(5, 2);
        $elfComputer->writeMemoryOffset(42);

        $program = $elfComputer->getProgram();
        $this->assertSame(5, $program[3]);
        $this->assertSame(42, $program[1]);
    }

    public function testParseInstruction()
    {
        $elfComputer = new ElfComputer3('day5/part1/0');
        $parsedInstruction = $elfComputer->parseInstruction('1002');

        $this->assertSame(2, $parsedInstruction['opcode']);
        $this->assertSame(0, $parsedInstruction['mode1']);
        $this->assertSame(1, $parsedInstruction['mode2']);
        $this->assertSame(0, $parsedInstruction['mode3']);
    }
}
