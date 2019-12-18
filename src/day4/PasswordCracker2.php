<?php

namespace PuzzleSolvers\Day4;

use PuzzleSolvers\PuzzleSolver;

class PasswordCracker2 extends PuzzleSolver
{
    public $lowerRange;
    public $upperRange;
    public $password;

    public function __construct($filename)
    {
        parent::__construct($filename);

        $inputPieces = explode('-', $this->inputs[0]);
        $this->lowerRange = $inputPieces[0];
        $this->upperRange = $inputPieces[1];
    }

    public function run()
    {
        $validPasswords = [];
        $invalidPasswords = [];
        $this->password = $this->lowerRange;
        while ($this->password <= $this->upperRange) {
            if (
                $this->hasSixDigits()
                && $this->isWithinRange()
                && $this->hasTwoAdjacentSameDigits()
                && $this->hasDigitsNeverDecrease()
            ) {
                $validPasswords[] = $this->password;
            } else {
                $invalidPasswords[] = $this->password;
            }

            $this->password = (string) ($this->password + 1);
        }

        $this->output = count($validPasswords);
    }

    public function hasSixDigits()
    {
        return (strlen($this->password) === 6);
    }

    public function isWithinRange()
    {
        return ($this->password >= $this->lowerRange && $this->password <= $this->upperRange);
    }

    public function hasTwoAdjacentSameDigits()
    {
        $i = 1;
        $repeatingCount = 1;
        while ($i < strlen($this->password)) {
            if ($this->password[$i] != $this->password[$i - 1] && $repeatingCount == 2) {
                return true;
            }

            if ($this->password[$i] == $this->password[$i - 1]) {
                $repeatingCount++;
            } else {
                $repeatingCount = 1;
            }

            if ($i == strlen($this->password) - 1 && $repeatingCount == 2) {
                return true;
            }

            $i++;
        }

        return false;
    }

    public function hasDigitsNeverDecrease()
    {
        $i = 1;
        while ($i < strlen($this->password)) {
            if ($this->password[$i] < $this->password[$i - 1]) {
                return false;
            }
            $i++;
        }

        return true;
    }
}
