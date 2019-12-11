<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Puzzles\Puzzle1;

final class Puzzle1Test extends TestCase
{
    public function testInput1(): void
    {
        $output = (new Puzzle1())->run();

        $this->assertSame($output, 2);
    }
}
