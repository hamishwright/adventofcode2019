<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\PuzzleSolver;

final class PuzzleSolverTest extends TestCase
{
    public function testCanReadInputFile(): void
    {
        $puzzleSolver = new PuzzleSolver('test.txt');

        $inputs = $puzzleSolver->getInputs();

        $this->assertSame(['123', '456'], $inputs);
    }
}
