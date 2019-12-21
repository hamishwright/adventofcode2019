<?php

namespace PuzzleSolvers\Day6;

use PuzzleSolvers\PuzzleSolver;

class OrbitMapper extends PuzzleSolver
{
    public $objects = [];
    public $centerOfMassObjectId = '';

    public function initialise()
    {
        foreach ($this->inputs as $objectDefinition)
        {
            $pieces = explode(')', $objectDefinition);

            $objectId = $pieces[1];
            $parentObjectId = $pieces[0];

            $this->objects[$objectId] = [
                'parent' => $parentObjectId,
            ];
        }

        foreach ($this->objects as $objectId => $object) {
            $this->objects[$objectId]['orbitDepth'] = $this->getOrbitDepth($object['parent']) + 1;
        }

    }

    public function getOrbitDepth($objectId)
    {
        if ($objectId == 'COM') {
            return 0;
        } else {
            $object = $this->objects[$objectId];
            return 1 + $this->getOrbitDepth($object['parent']);
        }
    }

    public function run()
    {
        $this->output = 0;
        foreach ($this->objects as $object) {
            $this->output += $object['orbitDepth'];
        }
    }
}
