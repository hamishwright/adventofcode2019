<?php

namespace PuzzleSolvers;

class PuzzleSolver
{
    protected $filepath;
    protected $inputs = [];
    protected $output;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->filepath = 'inputs/' . $filename;
        $this->inputs = $this->readInputsFromFile();
    }

    public function getInputs(): array
    {
        return $this->inputs;
    }

    public function getOutput()
    {
        return $this->output;
    }

    protected function readInputsFromFile(): array
    {
        return file($this->filepath, FILE_IGNORE_NEW_LINES);
    }
}
