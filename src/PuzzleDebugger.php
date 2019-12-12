<?php

class PuzzleDebugger
{
    public static function echo($message)
    {
        if (is_array($message)) {
            $message = print_r($message, true);
        }

        fwrite(STDERR, $message . "\n");
    }
}
