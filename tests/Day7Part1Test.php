<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day7\ElfComputer4;

final class Day7Part1Test extends TestCase
{
    public function testEndToEnd(): void
    {
        $outputs = [
            [43210],
            [54321],
            [65210],
        ];

        $phaseSequences = [
            [4, 3, 2, 1, 0],
            [0, 1, 2, 3, 4],
            [1, 0, 4, 3, 2],
        ];

        foreach ($outputs as $inputFileNumber => $output) {
            $phaseSequence = $phaseSequences[$inputFileNumber];
            $input = 0;

            foreach ($phaseSequence as $phase) {
                $elfComputer4 = new ElfComputer4('day7/part1/' . $inputFileNumber);
                $elfComputer4->initialise();
                $elfComputer4->inputSequence = [$input, $phase];
                $elfComputer4->run();
                $input = $elfComputer4->outputs[0];
            }
            $this->assertSame($output, $elfComputer4->outputs);
        }
    }
}
