<?php
class Path
{
    private $arrayOfHub;

    public function __construct($arrayOfHub)
    {
        $this->arrayOfHub = $arrayOfHub;
    }

    public function getArrayOfHub()
    {
        return $this->arrayOfHub;
    }

    public function setArrayOfHub($arrayOfHub)
    {
        $this->arrayOfHub = $arrayOfHub;
    }
}
