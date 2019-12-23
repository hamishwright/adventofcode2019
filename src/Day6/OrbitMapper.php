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

    public function getParentObjects($objectId, $parentObjects = [])
    {
        if ($objectId == 'COM') {
            return $parentObjects;
        } else {
            $object = $this->objects[$objectId];
            array_push($parentObjects, $object['parent']);
            return $this->getParentObjects($object['parent'], $parentObjects);
        }
    }

    public function getDistanceBetweenPoints($objectId1, $objectId2)
    {
        $commonObject = $this->getCommonObjectBetweenPoints($objectId1, $objectId2);

        $distance1 = $this->objects[$objectId1]['orbitDepth'] - $this->objects[$commonObject]['orbitDepth'];
        $distance2 = $this->objects[$objectId2]['orbitDepth'] - $this->objects[$commonObject]['orbitDepth'];

        return $distance1 + $distance2;
    }

    public function getCommonObjectBetweenPoints($objectId1, $objectId2)
    {
        $parentObjects1 = $this->getParentObjects($objectId1);
        $parentObjects2 = $this->getParentObjects($objectId2);

        foreach ($parentObjects1 as $parentObject1) {
            if (in_array($parentObject1,  $parentObjects2)) {
                return $parentObject1;
            }
        }

        return 'COM';
    }

    public function run()
    {
        $this->output = 0;
        foreach ($this->objects as $object) {
            $this->output += $object['orbitDepth'];
        }
    }
}
