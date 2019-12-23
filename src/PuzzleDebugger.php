<?php

namespace PuzzleSolvers;

class PuzzleDebugger
{
    public static function print($message)
    {
        if (is_array($message)) {
            $message = print_r($message, true);
        }

        fwrite(STDERR, $message . "\n");
    }
}
