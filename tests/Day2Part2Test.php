<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day2\ElfComputerInputFinder;

final class Day2Part2Test extends TestCase
{
    public function testInputs(): void
    {
        $outputs = [
            true,
        ];
        foreach ($outputs as $inputFileNumber => $output) {
            $puzzleSolver = new ElfComputerInputFinder('day2/part2/' . $inputFileNumber);
            $puzzleSolver->run();
            $this->assertSame($output, $puzzleSolver->isMatchFound());
        }
    }

    public function testOutputForVerbNoun()
    {
        $elfComputerInputFinder = new ElfComputerInputFinder('day2/part2/0');
        $elfComputerInputFinder->SetNoun(12);
        $elfComputerInputFinder->SetVerb(2);

        $output = $elfComputerInputFinder->getOutput();

        $this->assertSame(1202, $output);
    }
}
