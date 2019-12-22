<?php

namespace PuzzleSolvers\Day7;

use PuzzleSolvers\PuzzleSolver;
use PuzzleSolvers\Day7\ElfComputer4;

class AmplifierToEleven extends PuzzleSolver
{
    public function run()
    {
        $maxOutput = 0;

        for ($a = 0; $a < 5; $a++) {
            for ($b = 0; $b < 5; $b++) {
                if (in_array($b, [$a])) {
                    continue;
                }
                for ($c = 0; $c < 5; $c++) {
                    if (in_array($c, [$a, $b])) {
                        continue;
                    }
                    for ($d = 0; $d < 5; $d++) {
                        if (in_array($d, [$a, $b, $c])) {
                            continue;
                        }
                        for ($e = 0; $e < 5; $e++) {
                            if (in_array($e, [$a, $b, $c, $d])) {
                                continue;
                            }

                            $phaseSequence = [$a, $b, $c, $d, $e];
                            $input = 0;

                            foreach ($phaseSequence as $phase) {
                                $elfComputer4 = new ElfComputer4('day7/part1/input');
                                $elfComputer4->initialise();
                                $elfComputer4->input = $phase;
                                $elfComputer4->run();
                                $elfComputer4->input = $input;
                                $elfComputer4->run();
                                $input = $elfComputer4->outputs[0];
                            }

                            if ($elfComputer4->outputs[0] > $maxOutput) {
                                $maxOutput = $elfComputer4->outputs[0];
                            }
                        }
                    }
                }
            }
        }

        $this->output = $maxOutput;
    }
}
