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

    public function getWagonsByTrain($train,$hub)
    {
        if($train->getPreviousHub($this)!=false ) $in = $train->getPreviousHub($this)->getTrainInOutConfig($train);
        else $in=null;
        $out = $this->getTrainInOutConfig($train,$hub);
       
        return array($in,$out);
    }

    public function getTrainInOutConfig($train,$hub){
        $wagons = array();
         if (!in_array($hub, $train->getHubs())) return null;
         foreach($train->getWagons() as $key => $wagon){
             if(in_array($hub,$wagon->getHubs()) && $wagon->getHubArrive() != $this){
                 $wagons[] = $wagon;
             }
         }
         $wagons=$train->getOrdinatedWagons($hub,$wagons);
         if(count($wagons)==0) return null;
         return $wagons;
     }

    //  Spostato dalla classe hub le due funzioni soprastanti
    //  aspetto commento per capire se modificare anche tutto il resto

}
