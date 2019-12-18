<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day4\PasswordCracker2;

final class Day4Part2Test extends TestCase
{
    public function testHasTwoAdjacentSameDigits()
    {
        $passwordCracker = new PasswordCracker2('day4/part1/sample_range');

        $passwordCracker->password = '112233';
        $this->assertTrue($passwordCracker->hasTwoAdjacentSameDigits());

        $passwordCracker->password = '111122';
        $this->assertTrue($passwordCracker->hasTwoAdjacentSameDigits());

        $passwordCracker->password = '123444';
        $this->assertFalse($passwordCracker->hasTwoAdjacentSameDigits());

        $passwordCracker->password = '223333';
        $this->assertTrue($passwordCracker->hasTwoAdjacentSameDigits());
    }
}
