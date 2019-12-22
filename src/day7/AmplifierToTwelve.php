<?php

namespace PuzzleSolvers\Day7;

use PuzzleSolvers\PuzzleSolver;
use PuzzleSolvers\Day7\ElfComputer4;

class AmplifierToTwelve extends PuzzleSolver
{
    public $phaseSequence;

    public $maxThrust = 0;

    public function testAllPhaseSequences()
    {
        for ($a = 5; $a < 10; $a++) {
            for ($b = 5; $b < 10; $b++) {
                if (in_array($b, [$a])) {
                    continue;
                }
                for ($c = 5; $c < 10; $c++) {
                    if (in_array($c, [$a, $b])) {
                        continue;
                    }
                    for ($d = 5; $d < 10; $d++) {
                        if (in_array($d, [$a, $b, $c])) {
                            continue;
                        }
                        for ($e = 5; $e < 10; $e++) {
                            if (in_array($e, [$a, $b, $c, $d])) {
                                continue;
                            }

                            $this->phaseSequence = [$a, $b, $c, $d, $e];
                            $this->run();
                        }
                    }
                }
            }
        }
    }

    public function run()
    {
        $input = 0;

        $amplifiers = [
            new ElfComputer4($this->filename),
            new ElfComputer4($this->filename),
            new ElfComputer4($this->filename),
            new ElfComputer4($this->filename),
            new ElfComputer4($this->filename),
        ];

        // Initialise amplifiers
        foreach ($amplifiers as $key => $amplifier) {
            $amplifiers[$key]->initialise();
            $amplifiers[$key]->input = $this->phaseSequence[$key];
            $amplifiers[$key]->run();
            $amplifiers[$key]->input = $input;
            $amplifiers[$key]->run();
            $input = $amplifiers[$key]->outputs[0];
        }

        $running = true;
        // Run feedback mode
        while ($running) {
            foreach ($amplifiers as $key => $amplifier) {
                $amplifiers[$key]->input = $input;
                $amplifiers[$key]->run();
                if (empty($amplifiers[$key]->outputs)) {
                    $running = false;
                    break;
                } else {
                    $input = $amplifiers[$key]->outputs[0];
                }
                if (!empty($amplifiers[4]->outputs) && $amplifiers[4]->outputs[0] > $this->maxThrust) {
                    $this->maxThrust = $amplifiers[4]->outputs[0];
                }
            }
        }

        $this->output = $this->maxThrust;
    }
}
