<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day7\AmplifierToTwelve;
use PuzzleSolvers\Day7\ElfComputer4;

final class Day7Part2Test extends TestCase
{
    public function testEndToEnd(): void
    {
        $outputs = [
            139629729,
            18216,
        ];

        $phaseSequences = [
            [9, 8, 7, 6, 5],
            [9, 7, 8, 5, 6],
        ];

        foreach ($outputs as $inputFileNumber => $output) {
            $amplifierToTwelve = new AmplifierToTwelve('day7/part2/' . $inputFileNumber);
            $amplifierToTwelve->phaseSequence = $phaseSequences[$inputFileNumber];
            $amplifierToTwelve->run();
            $this->assertSame($output, $amplifierToTwelve->getOutput());
        }
    }

    public function testProgramCanHaltAndResumeOnInput()
    {
        $elfComputer4 = new ElfComputer4('day7/part2/halt_and_resume');
        $elfComputer4->initialise();
        $elfComputer4->run();

        $this->assertSame([3, 1, 3, 3, 99], $elfComputer4->program);
        $this->assertSame(0, $elfComputer4->position);

        $elfComputer4->input = 9;
        $elfComputer4->run();

        $this->assertSame([3, 9, 3, 3, 99], $elfComputer4->program);

        $elfComputer4->input = 12;
        $elfComputer4->run();

        $this->assertSame([3, 9, 3, 12, 99], $elfComputer4->program);
    }
}
