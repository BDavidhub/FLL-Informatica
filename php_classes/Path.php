<?php
class Path extends Utility
{
    private $arrayOfHub;

    public function __construct($arrayOfHub)
    {
        parent::__construct("path");
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
