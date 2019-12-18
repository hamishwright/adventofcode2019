<?php

use PHPUnit\Framework\TestCase;
use PuzzleSolvers\Day4\PasswordCracker;

final class Day4Part1Test extends TestCase
{
    public function testEndToEnd(): void
    {
        $outputs = [1, 0, 0];
        foreach ($outputs as $inputFileNumber => $output) {
            $inputFile = 'day4/part1/' . $inputFileNumber;
            \PuzzleDebugger::print('TESTING INPUT FILE ' . $inputFile);
            $puzzleSolver = new PasswordCracker($inputFile);
            $puzzleSolver->run();
            $this->assertSame($output, $puzzleSolver->getOutput());
        }
    }

    public function testHasSixDigits()
    {
        $passwordCracker = new PasswordCracker('day4/part1/sample_range');

        $passwordCracker->password = '123';
        $this->assertFalse($passwordCracker->hasSixDigits());

        $passwordCracker->password = '123456';
        $this->assertTrue($passwordCracker->hasSixDigits());
    }

    public function testIsWithingRange()
    {
        $passwordCracker = new PasswordCracker('day4/part1/sample_range');

        $passwordCracker->password = '1';
        $this->assertFalse($passwordCracker->isWithinRange());

        $passwordCracker->password = '123456';
        $this->assertTrue($passwordCracker->isWithinRange());
    }

    public function testHasTwoAdjacentSameDigits()
    {
        $passwordCracker = new PasswordCracker('day4/part1/sample_range');

        $passwordCracker->password = '123456';
        $this->assertFalse($passwordCracker->hasTwoAdjacentSameDigits());

        $passwordCracker->password = '223456';
        $this->assertTrue($passwordCracker->hasTwoAdjacentSameDigits());
    }

    public function testDigitsNeverDecrease()
    {
        $passwordCracker = new PasswordCracker('day4/part1/sample_range');

        $passwordCracker->password = '654321';
        $this->assertFalse($passwordCracker->hasDigitsNeverDecrease());

        $passwordCracker->password = '109366';
        $this->assertFalse($passwordCracker->hasDigitsNeverDecrease());

        $passwordCracker->password = '123456';
        $this->assertTrue($passwordCracker->hasDigitsNeverDecrease());
    }
}
